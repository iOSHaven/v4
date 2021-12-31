<?php

use phpDocumentor\Reflection\Types\String_;

function format_int(int $number, string $type = null)
{
  if ($number > 999999999) return number_format($number / 1000000000, 1) . ($type == "file" ? 'gb' : 'b');
  else if ($number > 999999) return number_format($number / 1000000, 1) . ($type == "file" ? 'mb' : 'm');
  else if ($number > 999) return number_format($number / 1000, 1) . ($type == "file" ? 'kb' : 'k');
  else return $number . ($type == "file" ? 'b' : '');
}


function Settings()
{
  return DB::table('settings')->first();
}

function theme(string ...$classes)
{
  if (isset($_GET["theme"])) {
    session([
      "theme" => ($_GET["theme"] ?? "light") == "light" ? "light" : "dark"
    ]);
  }
  $mode = (session("theme") ?? "light") == "light" ? "light" : "dark";
  if (empty($classes)) {
    return $mode;
  }
  return ltrim(collect($classes)->reduce(function ($carry, $item) use ($mode) {
    return $carry . " " . $item . "-" . $mode;
  }));
}

function tab($tab)
{
  return session("current_tab") == $tab ? "text-blue-500" : "";
}

function user_agent_has($str)
{
  $user_agent =  isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
  return stripos($user_agent, $str);
}

function parseQuery($query, $expected = [])
{
  $args = preg_split("~('|\")[^'\"]*('|\")(*SKIP)(*F)|\s+~", urldecode($query));
  $search = implode(" ", array_filter($args, function ($value) {
    return !strpos($value, "=");
  }));
  $args = array_filter($args, function ($value) {
    return strpos($value, "=");
  });
  parse_str(implode('&', $args), $data);
  foreach ($expected as $key => $value) {
    if (empty($data[$key])) {
      $data[$key] = $value;
    }
  }
  foreach ($data as $key => &$value) {
    $value = trim($value, '"');
    $value = trim($value, "'");
  }
  $data["search"] = $search;
  return $data;
}

function markdown($view)
{
  $p = new \Parsedown;
  try {
    $contents = File::get(resource_path("tutorials/$view"));
    $html = $p->setBreaksEnabled(false)->text($contents);
    return $html;
  } catch (\Throwable $th) {
    return abort(404);
  }
}


function handleStorage(string $folder, string $icon = "icon")
{
  return function ($request) use ($folder, $icon) {
    // dd($request);
    $ext = $request->icon->extension();
    return [
      $icon => env("DO_SPACES_SUBDOMAIN") . "/" . Storage::disk("spaces")->putFileAs($folder, $request->icon, hash("sha256", $this->name . now()) . ".$ext", ["visibility" => "public"]),
    ];
  };
}

function handleIcon($icon)
{
  return function () use ($icon) {
    return url($icon);
  };
}

function fa($class)
{
  return '<i class="sidebar-icon ' . $class . '"></i>';
}

function addAppSecurityTimeoutToSession($key, $minutes = 10)
{
  session()->put($key, now()->addMinutes($minutes));
}

function verifyAppSecurity($key)
{
  if (config("app.prevent_scraping")) {
    if (session()->has($key)) {
      $time = session()->get($key, now()->subCenturies(5));
      if (now()->lt($time)) {
        return true;
      }
    }
    abort(401);
    return false;
  }
}

/**
 * @param $url - an existing image url
 * @param $settings - array of settings to turn into query string
 * @return string
 */
function imgixUrl($url, $settings=[]) {
    $parsed = parse_url($url);
    $path = urlencode($parsed["scheme"] . "://" . $parsed["host"] . ($parsed["path"] ?? ""));
    $query = [];
    $parsed["query"] = $parsed["query"] ?? "";
    parse_str($parsed["query"], $query);
    $query = array_merge($query, $settings);
    $queryString = !empty($query) ? "?" . http_build_query($query) : "";
    $signature_base = config('imgix.token') . "/" . $path . $queryString;
    $query["s"] = md5($signature_base);
    $queryString = !empty($query) ? "?" . http_build_query($query) : "";
    return config("imgix.domain") . "/" . $path . $queryString;
}

function slugify($text,$strict = false) {
    $text = html_entity_decode($text, ENT_QUOTES, 'UTF-8');
    // replace non letter or digits by -
    $text = preg_replace('~[^\\pL\d.]+~u', '-', $text);

    // trim
    $text = trim($text, '-');
    setlocale(LC_CTYPE, 'en_GB.utf8');
    // transliterate
    if (function_exists('iconv')) {
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    }

    // lowercase
    $text = strtolower($text);
    // remove unwanted characters
    $text = preg_replace('~[^-\w.]+~', '', $text);
    if (empty($text)) {
        return 'empty_$';
    }
    if ($strict) {
        $text = str_replace(".", "_", $text);
    }
    return $text;
}


function getDefaultImageSettings () {
    return [
        "h" => 200,
        "w" => 200 * 3.2361/2,
        "fit" => "crop",
        "crop" => "focalpoint",
        "auto" => "format,compress,enhance"
    ];
}

function imgix($image, $settings=[]) {
    $settings = array_merge(getDefaultImageSettings(), $settings);
    return imgixUrl($image, $settings);
}

function scaleImage($image, $dpr, $settings=[]) {
    $settings = array_merge(getDefaultImageSettings(), $settings);
    return imgixUrl($image, array_merge(
        $settings,
        ["dpr" => $dpr]
    ));
}

function scaleImages($image, $amount=3, $settings=[]) {
    $srcset = [];
    for ($i = 1; $i <= $amount; $i++) {
        $srcset[] = scaleImage($image, $i, $settings);
    }
    return $srcset;
}

function imageSrcSet($image, $amount=3, $settings=[]) {
    $images = scaleImages($image, $amount, $settings);
    return implode(",", array_map(function ($image, $index) {
        return $image . " $index" . "x";
    }, $images, array_keys($images)));
}

function geoLocation() {
    if (session()->has('geoLocation')) {
        return session()->get('geoLocation');
    }
    $ip = request()->ip();
    $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
    session()->put('geoLocation', $details);
    return $details;
}

function geoCountry () {
    if (isset($_SERVER["HTTP_CF_IPCOUNTRY"])){
        return $_SERVER["HTTP_CF_IPCOUNTRY"];
    }
    return geoLocation()->country;
}

function simpleMarkdown($text) {
    $p = new \App\Lib\ParseDownExtensions\HavenMarkup();
    $removedDuplicateLines = implode("\n", array_filter(explode("\n", $text)));
    return $p->setSafeMode(true)->parse($removedDuplicateLines);
}