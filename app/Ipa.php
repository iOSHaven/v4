<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Nova\Actions\Actionable;

class Ipa extends Model
{
    use Actionable;

    protected $fillable = [
        "name", "url"
    ];

    public function providers() {
        return $this->belongsToMany(Provider::class);
    }

    public function apps() {
        return $this->belongsToMany(App::class);
    }
}
