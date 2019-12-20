<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Laravel\Nova\Actions\Actionable;

class Itms extends Model
{
    use Actionable;
    
    protected $fillable = [
        "name", "url"
    ];

    public function providers() {
        return $this->belongsToMany(Provider::class)->limit(1);
    }

    // public function providers() {
    //     return $this->belongsToMany(Provider::class);
    // }

    public function apps() {
        return $this->belongsToMany(App::class);
    }
}


class Asset extends Model {
    public function publisher() {
        return $this->belongsTo(Publisher::class, 'asset_publisher');
    }
}

class Publisher extends Model {
    public function assets() {
        return $this->hasMany(Asset::class, 'asset_publisher');
    }
}