<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Skin extends Model
{
    // public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = Str::orderedUuid();
        });
    }

    // public function getRouteKeyName()
    // {
    //     return 'id';
    // }

    public function getCoversAttribute() {
        return explode("\n", $this->images);
    }
}
