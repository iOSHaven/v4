<?php

namespace App\Models;

use App\Builders\ProviderBuilder;
use App\Models\Mirror;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Nova\Actions\Actionable;

class Provider extends Model
{
    use SoftDeletes, Actionable;

    protected $fillable = ['name', 'twitter'];

    public function newEloquentBuilder($query)
    {
        return new ProviderBuilder($query);
    }

    public function mirrors()
    {
        return $this->hasMany(Mirror::class);
    }

    public function itms()
    {
        return $this->belongsToMany(Itms::class)->using(Link::class);
    }

    public function ipas()
    {
        return $this->belongsToMany(Ipa::class)->using(Link::class);
    }

    public static function unknown()
    {
        return null;

        return static::where('name', 'Unknown')->first() ?? null;
    }
}
