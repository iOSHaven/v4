<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Support\Facades\Auth;
use App\Mirror;
use App\Builders\AppBuilder;

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

  // protected $with = ['mirrors'];

  public static function findByUid ($uid) {
    return App::where('uid', $uid)->firstOrFail();
  }

  // public function toArray() {
  //   $array = parent::toArray();
  //   $array["icon"] = url($array["icon"]);
  //   $array["banner"] = url($array["banner"]);
  //   $array["views_str"] = format_int($array["views"]);
  //   $array["downloads_str"] = format_int($array["downloads"]);
  //   $array["size_str"] = format_int($array["size"], "file");
  //   $array["availableMirrors"] = $this->availableMirrors()->get();
  //   $array["firstMirror"] = $this->firstMirror();
  //   $array["phonePreviews"] = $this->previews("phone");
  //   $array["ipadPreviews"] = $this->previews("ipad");
  //   if(Auth::check()) {
  //     $array["isAdmin"] = Auth::user()->isAdmin;
  //   } else {
  //     $array["isAdmin"] = 0;
  //   }
   
  //   return $array;
  // }

  public function mirrors()
  {
    return $this->hasMany(Mirror::class)->whereNotNull("install_link")->orderByRaw('INET_ATON(version) desc');
  }

  public function availableMirrors() {
    return $this->mirrors()->whereHas("provider", function ($q) {
      $q->where("revoked", false);
    });
  }

  public function firstMirror() {
    return $this->availableMirrors()->whereNotNull('description')->first();
  }

  public function previews ($type) {
    if($this->firstMirror()) {
      return $this->firstMirror()->images()->where('type', $type)->get();
    } else {
      return collect([]);
    }
    
  }

  public function newEloquentBuilder($query)
  {
    return new AppBuilder($query);
  }
}
