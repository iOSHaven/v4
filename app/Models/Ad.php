<?php

namespace App\Models;

use App\Exception;

class Ad
{
    private $token = '0fe95427f2fd244b88e85dbbcbdf6edc45bebee8';

    private $zoneId = '2944409';

    ///// do not change anything below this point /////
    private $requestDomainName = 'go.transferzenad.com';

    private $requestTimeout = 1000;

    private $requestUserAgent = 'AntiAdBlock API Client';

    private $requestIsSSL = false;

    private $cacheTtl = 30; // minutes

    private $version = '1';

    private $routeGetTag = '/v3/getTag';

    private $selfSourceContent;

    private function getTimeout()
    {
        $value = ceil($this->requestTimeout / 1000);

        return $value == 0 ? 1 : $value;
    }

    private function getTimeoutMS()
    {
        return $this->requestTimeout;
    }

    private function ignoreCache()
    {
        $key = md5('PMy6vsrjIf-'.$this->zoneId);

        return array_key_exists($key, $_GET);
    }

    private function getCurl($url)
    {
        if ((! extension_loaded('curl')) || (! function_exists('curl_version'))) {
            return false;
        }
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_USERAGENT => $this->requestUserAgent.' (curl)',
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_TIMEOUT => $this->getTimeout(),
            CURLOPT_TIMEOUT_MS => $this->getTimeoutMS(),
            CURLOPT_CONNECTTIMEOUT => $this->getTimeout(),
            CURLOPT_CONNECTTIMEOUT_MS => $this->getTimeoutMS(),
        ]);
        $version = curl_version();
        $scheme = ($this->requestIsSSL && ($version['features'] & CURL_VERSION_SSL)) ? 'https' : 'http';
        curl_setopt($curl, CURLOPT_URL, $scheme.'://'.$this->requestDomainName.$url);
        $result = curl_exec($curl);
        curl_close($curl);

        return $result;
    }

    private function getFileGetContents($url)
    {
        if (! function_exists('file_get_contents') || ! ini_get('allow_url_fopen') ||
            ((function_exists('stream_get_wrappers')) && (! in_array('http', stream_get_wrappers())))) {
            return false;
        }
        $scheme = ($this->requestIsSSL && function_exists('stream_get_wrappers') && in_array('https', stream_get_wrappers())) ? 'https' : 'http';
        $context = stream_context_create([
            $scheme => [
                'timeout' => $this->getTimeout(), // seconds
                'user_agent' => $this->requestUserAgent.' (fgc)',
            ],
        ]);

        return file_get_contents($scheme.'://'.$this->requestDomainName.$url, false, $context);
    }

    private function getFsockopen($url)
    {
        $fp = null;
        if (function_exists('stream_get_wrappers') && in_array('https', stream_get_wrappers())) {
            $fp = fsockopen('ssl://'.$this->requestDomainName, 443, $enum, $estr, $this->getTimeout());
        }
        if ((! $fp) && (! ($fp = fsockopen('tcp://'.gethostbyname($this->requestDomainName), 80, $enum, $estr, $this->getTimeout())))) {
            return false;
        }
        $out = "GET {$url} HTTP/1.1\r\n";
        $out .= "Host: {$this->requestDomainName}\r\n";
        $out .= "User-Agent: {$this->requestUserAgent} (socket)\r\n";
        $out .= "Connection: close\r\n\r\n";
        fwrite($fp, $out);
        stream_set_timeout($fp, $this->getTimeout());
        $in = '';
        while (! feof($fp)) {
            $in .= fgets($fp, 2048);
        }
        fclose($fp);

        $parts = explode("\r\n\r\n", trim($in));

        return isset($parts[1]) ? $parts[1] : '';
    }

    private function getCacheFilePath($url, $suffix = '.js')
    {
        return sprintf('%s/pa-code-v%s-%s%s', $this->findTmpDir(), $this->version, md5($url), $suffix);
    }

    private function findTmpDir()
    {
        $dir = null;
        if (function_exists('sys_get_temp_dir')) {
            $dir = sys_get_temp_dir();
        } elseif (! empty($_ENV['TMP'])) {
            $dir = realpath($_ENV['TMP']);
        } elseif (! empty($_ENV['TMPDIR'])) {
            $dir = realpath($_ENV['TMPDIR']);
        } elseif (! empty($_ENV['TEMP'])) {
            $dir = realpath($_ENV['TEMP']);
        } else {
            $filename = tempnam(dirname(__FILE__), '');
            if (file_exists($filename)) {
                unlink($filename);
                $dir = realpath(dirname($filename));
            }
        }

        return $dir;
    }

    private function isActualCache($file)
    {
        if ($this->ignoreCache()) {
            return false;
        }

        return file_exists($file) && (time() - filemtime($file) < $this->cacheTtl * 60);
    }

    private function getCode($url)
    {
        $code = false;
        if (! $code) {
            $code = $this->getCurl($url);
        }
        if (! $code) {
            $code = $this->getFileGetContents($url);
        }
        if (! $code) {
            $code = $this->getFsockopen($url);
        }

        return $code;
    }

    private function getPHPVersion($major = true)
    {
        $version = explode('.', phpversion());
        if ($major) {
            return (int) $version[0];
        }

        return $version;
    }

    private function parseRaw($code)
    {
        $hash = substr($code, 0, 32);
        $dataRaw = substr($code, 32);
        if (md5($dataRaw) !== strtolower($hash)) {
            return null;
        }

        if ($this->getPHPVersion() >= 7) {
            $data = @unserialize($dataRaw, [
                'allowed_classes' => false,
            ]);
        } else {
            $data = @unserialize($dataRaw);
        }

        if ($data === false || ! is_array($data)) {
            return null;
        }

        return $data;
    }

    private function getTag($code)
    {
        $data = $this->parseRaw($code);
        if ($data === null) {
            return '';
        }

        if (array_key_exists('code', $data)) {
            $this->selfUpdate($data['code']);
        }

        if (array_key_exists('tag', $data)) {
            return (string) $data['tag'];
        }

        return '';
    }

    public function get()
    {
        $e = error_reporting(0);
        $url = $this->routeGetTag.'?'.http_build_query([
            'token' => $this->token,
            'zoneId' => $this->zoneId,
            'version' => $this->version,
        ]);
        $file = $this->getCacheFilePath($url);
        if ($this->isActualCache($file)) {
            error_reporting($e);

            return $this->getTag(file_get_contents($file));
        }
        if (! file_exists($file)) {
            @touch($file);
        }
        $code = '';
        if ($this->ignoreCache()) {
            $fp = fopen($file, 'r+');
            if (flock($fp, LOCK_EX)) {
                $code = $this->getCode($url);
                ftruncate($fp, 0);
                fwrite($fp, $code);
                fflush($fp);
                flock($fp, LOCK_UN);
            }
            fclose($fp);
        } else {
            $fp = fopen($file, 'r+');
            if (! flock($fp, LOCK_EX | LOCK_NB)) {
                if (file_exists($file)) {
                    $code = file_get_contents($file);
                } else {
                    $code = '<!-- cache not found / file locked  -->';
                }
            } else {
                $code = $this->getCode($url);
                ftruncate($fp, 0);
                fwrite($fp, $code);
                fflush($fp);
                flock($fp, LOCK_UN);
            }
            fclose($fp);
        }
        error_reporting($e);

        return $this->getTag($code);
    }

    private function getSelfBackupFilename()
    {
        return $this->getCacheFilePath($this->version, '');
    }

    private function selfBackup()
    {
        $this->selfSourceContent = file_get_contents(__FILE__);
        if ($this->selfSourceContent !== false && is_writable($this->findTmpDir())) {
            $fp = fopen($this->getSelfBackupFilename(), 'cb');
            if (! flock($fp, LOCK_EX)) {
                fclose($fp);

                return false;
            }
            ftruncate($fp, 0);
            fwrite($fp, $this->selfSourceContent);
            fflush($fp);
            flock($fp, LOCK_UN);
            fclose($fp);

            return true;
        }

        return false;
    }

    private function selfRestore()
    {
        if (file_exists($this->getSelfBackupFilename())) {
            return rename($this->getSelfBackupFilename(), __FILE__);
        }

        return false;
    }

    private function selfUpdate($newCode)
    {
        if (is_writable(__FILE__)) {
            $hasBackup = $this->selfBackup();

            if ($hasBackup) {
                try {
                    $fp = fopen(__FILE__, 'cb');
                    if (! flock($fp, LOCK_EX)) {
                        fclose($fp);
                        throw new Exception();
                    }
                    ftruncate($fp, 0);
                    if (fwrite($fp, $newCode) === false) {
                        ftruncate($fp, 0);
                        flock($fp, LOCK_UN);
                        fclose($fp);
                        throw new Exception();
                    }
                    fflush($fp);
                    flock($fp, LOCK_UN);
                    fclose($fp);
                    if (md5_file(__FILE__) === md5($newCode)) {
                        @unlink($this->getSelfBackupFilename());
                    } else {
                        throw new Exception();
                    }
                } catch (Exception $e) {
                    $this->selfRestore();
                }
            }
        }
    }
}
// $__aab = new __AntiAdBlock_2944409();
// return $__aab->get();
