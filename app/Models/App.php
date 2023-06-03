<?php

namespace App\Models;

use App\Builders\AppBuilder;
use App\Traits\HasAnalytics;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Nova\Actions\Actionable;
use Laravel\Scout\Searchable;

class App extends Model
{
    use SoftDeletes, Actionable, HasAnalytics, Searchable, HasFactory;

    protected $fillable = [
        'name',
        'uid',
        'icon',
        'banner',
        'unsigned',
        'signed',
        'unsigned_premium',
        'signed_premium',
        'short',
        'description',
        'tags',
        'views',
        'downloads',
        'version',
        'size', 
    ];

    protected $hidden = ['id'];

    protected $appends = ['is_admin'];

    public function searchableAs()
    {
        return config('app.env').'-apps';
    }

    public static function findByUid($uid)
    {
        return self::where('uid', $uid)->firstOrFail();
    }

    public function mirrors()
    {
        return $this->hasMany(Mirror::class)->whereNotNull('install_link')->orderByRaw('INET_ATON(version) desc');
    }

    public function getAbsIconAttribute($value)
    {
        return $this->attributes['abs_icon'] = url($this->icon);
    }

    public function getIsAdminAttribute($value)
    {
        return $this->attributes['is_admin'] = Auth::check() && Auth::user()->isAdmin;
    }

    public function newEloquentBuilder($query)
    {
        return new AppBuilder($query);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function itms()
    {
        return $this->belongsToMany(Itms::class)->orderBy('working', 'desc')->using(Link::class);
    }

    public function ipas()
    {
        return $this->belongsToMany(Ipa::class)->orderBy('working', 'desc')->using(Link::class);
    }

    // public function impressions() {
    //   return $this->morphMany(View::class, 'trigger');
    // }

    // public function downloads() {
    //   return $this->morphMany(Download::class, 'trigger');
    // }

    // public function installs() {
    //   return $this->morphMany(Install::class, 'trigger');
    // }

    // public function units() {
    //   return $this->morphMany(Promotion::class, 'unit');
    // }

    public function getProvidersAttribute()
    {
        $itms = $this->itms->pluck('providers')->flatten();
        $ipas = $this->ipas->pluck('providers')->flatten();

        return $itms->merge($ipas)->unique('id');
    }

    public function getWorkingProvidersAttribute()
    {
        $itms = $this->itms()->where('working', true)->get()->pluck('providers')->flatten();
        $ipas = $this->ipas()->where('working', true)->get()->pluck('providers')->flatten();

        return $itms->merge($ipas)->unique('id');
    }

    public function toArray()
    {
        return [
            'type' => strtolower(class_basename($this)),
            'id' => $this->id,
            'uid' => $this->uid,
            'icon' => $this->icon,
            'name' => $this->name,
            'impressions' => $this->impressions,
            'short' => $this->short,
            'tags' => $this->tags,
            'providers' => $this->providers,
            'workingProviders' => $this->workingProviders,
        ];
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uid = Str::random(5);
            $model->edited_at = now();
        });
    }
}
