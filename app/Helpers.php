<?php
use phpDocumentor\Reflection\Types\String_;

function format_int(int $number, string $type=null)
{
  if ($number > 999999999) return number_format($number / 1000000000, 1) . ($type == "file" ? 'gb' : 'b');
  else if ($number > 999999) return number_format($number / 1000000, 1) . ($type == "file" ? 'mb' : 'm');
  else if ($number > 999) return number_format($number / 1000, 1) . ($type == "file" ? 'kb' : 'k');
  else return $number . ($type == "file" ? 'b' : '');
}


function Settings() {
  return DB::table('settings')->first();
}

function theme(string ...$classes)
{
  return ltrim(collect($classes)->reduce(function($carry, $item) {
    return $carry . " " . $item . "-" .(empty($_GET["theme"]) ? "light" : $_GET["theme"]);
  }));
}