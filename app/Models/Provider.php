<?php

namespace App\Models;

use App\Builders\ProviderBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Nova\Actions\Actionable;
use Staudenmeir\EloquentHasManyDeep\HasRelationships;

class Provider extends Model
{
    use SoftDeletes, Actionable;
    use HasRelationships;
    use HasFactory;

    protected $fillable = ['name', 'twitter', 'parsingIdentifier', 'website'];

    public function toArray()
    {
        return [
            'name' => $this->name,
            'revoked' => $this->revoked,
            'avatar' => $this->avatar,
        ];
    }

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

    public function itmsApps()
    {
        return $this->hasManyDeep(App::class, ['itms_provider', Itms::class, 'app_itms']);
    }

    public function ipaApps()
    {
        return $this->hasManyDeep(App::class, ['ipa_provider', Ipa::class, 'app_ipa']);
    }
}
