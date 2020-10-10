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

    public function getAmountAttribute() {
        return $this->onSale ? $this->salePrice : $this->price;
    }

    public function users() {
        return $this->belongsToMany(User::class);
    }

    public function getPurchaseCountAttribute() {
        return $this->users()->get()->count();
    }

    public function getDownloadAmountAttribute() {
        return $this->affiliate ? 0 : $this->downloadCount;
    }

    public function getClickAmountAttribute() {
        return $this->affiliate ? $this->downloadCount : 0;
    }
}
