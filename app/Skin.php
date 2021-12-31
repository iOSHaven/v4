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

    public function getCoversAttribute()
    {
        return explode("\n", $this->images);
    }

    public function getAmountAttribute()
    {
        return $this->onSale ? $this->salePrice : $this->price;
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function getPurchaseCountAttribute()
    {
        if ($this->amount == 0 || $this->affiliate) {
            return 0;
        } else {
            return $this->users()->get()->count();
        }
    }

    public function getDownloadAmountAttribute()
    {
        if ($this->affiliate) {
            return 0;
        } else {
            return $this->users()->get()->count() + $this->downloadCount;
        }
    }

    public function getClickAmountAttribute()
    {
        if ($this->affiliate) {
            return $this->users()->get()->count() + $this->downloadCount;
        } else {
            return 0;
        }
    }
}
