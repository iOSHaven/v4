<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Mirror;

class App extends Model
{
  use SoftDeletes;
  protected $dates = ['deleted_at'];
  protected $fillable = ['name',
                         'uid',
                         'icon',
                         'banner',
                         'unsigned',
                         'signed',
                         'unsigned_premium',
                         'signed_premium',
                         'short',
                         'description',
                         'tags',
                         'views',
                         'downloads',
                         'version',
                         'size'];
  protected $hidden = ['id'];

  public static function findByUid ($uid) {
    return App::where('uid', $uid)->firstOrFail();
  }

  public function toArray() {
    $array = parent::toArray();
    $array["icon"] = url($array["icon"]);
    $array["banner"] = url($array["banner"]);
    $array["views_str"] = format_int($array["views"]);
    $array["downloads_str"] = format_int($array["downloads"]);
    $array["size_str"] = format_int($array["size"], "file");
    return $array;
  }

  public function mirrors()
  {
    return $this->hasMany(Mirror::class);
  }
}
