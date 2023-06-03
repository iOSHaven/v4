<?php

namespace App\Lib\ParseDownExtensions;

class HavenMarkupBase extends \Parsedown
{
    protected function matchSingleTwig($key, $excerpt, \Closure $closure)
    {
        if (preg_match("/^{%(\s+)?{$key}(\s+)?(\w+)(\s+)?%}/", $excerpt['text'], $matches)) {
            $data = [
                // How many characters to advance the Parsedown's
                // cursor after being done processing this tag.
                'extent' => strlen($matches[0]),
                'element' => $closure($matches[3]),
            ];
            //            dump($data);
            return $data;
        }
    }
}
