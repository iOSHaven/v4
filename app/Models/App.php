<?php

namespace App\Models;

use App\Builders\AppBuilder;
use App\Models\Stats\Target;
use App\Traits\HasAnalytics;
use App\Traits\StatBuckets;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Nova\Actions\Actionable;
use Laravel\Scout\Searchable;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class App extends Model implements Target, HasMedia
{
    use SoftDeletes, Actionable, HasAnalytics, Searchable, HasFactory;

    // use StatBuckets;
    use InteractsWithMedia;

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

    // protected $with = ['impressionStatBuffer', 'downloadStatBuffer', 'installStatBuffer'];
    protected $appends = ['is_admin'/*'impressions', 'downloads', 'installs', 'weeklyInstalls'*/];

    public function searchableAs()
    {
        return config('app.env').'-apps';
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('tiny')
            ->keepOriginalImageFormat()
            ->fit(Manipulations::FIT_CROP, 10, 10)
            ->nonQueued();

        $this
            ->addMediaConversion('preview')
            ->keepOriginalImageFormat()
            ->fit(Manipulations::FIT_CROP, 77, 77)
            ->nonQueued();

        $this
            ->addMediaConversion('thumb')
            ->keepOriginalImageFormat()
            ->fit(Manipulations::FIT_CROP, 50, 50)
            ->nonQueued();
    }

    public function iconMedia()
    {
        $this->loadMissing('media');

        return $this->getFirstMedia();
    }

    public function getImageAttribute()
    {
        $preview = $this->iconMedia()?->getUrl('preview') ?? $this->icon;
        $tiny = $this->iconMedia()?->getUrl('tiny') ?? $this->icon;

        return "{$preview} 77w, {$tiny} 10w";
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
