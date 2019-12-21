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

    public function apps() {
        return $this->belongsToMany(App::class)->limit(1);
    }

    public function getProviderAttribute()
    {
        return $this->providers->first() ?? Provider::unknown();
    }

    public function getProviderAvatarAttribute()
    {
        return $this->provider->avatar ?? null;
    }

    public function getProviderNameAttribute()
    {
        return $this->provider->name ?? null;
    }
}
