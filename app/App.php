<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}
