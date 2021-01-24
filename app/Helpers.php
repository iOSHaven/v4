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
  return session("current_tab") == $tab ? theme("text-blue") : "";
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
  if (session()->has($key)) {
    $time = session()->get($key, now()->subCenturies(5));
    if (now()->lt($time)) {
      return true;
    }
  }
  abort(401);
  return false;
}
