<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Mirror;
use Laravel\Nova\Actions\Actionable;

class Provider extends Model
{
    use SoftDeletes, Actionable;
    
    protected $fillable = ["name", "twitter"];

    public function mirrors() {
        return $this->hasMany(Mirror::class);
    }

    public function itms() {
        return $this->belongsToMany(Itms::class);
    }

    public function ipas() {
        return $this->belongsToMany(Ipa::class);
    }
}
