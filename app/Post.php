<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Mail\Markdown;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Post extends Model
{
    use SoftDeletes;

    private $cardImageSettings = [
        "h" => 200,
        "w" => 200 * 3.2361/2,
        "fit" => "crop",
        "crop" => "focalpoint",
        "auto" => "format,compress,enhance"
    ];

    private $bannerImageSettings = [
        "h" => 200,
        "w" => 200 * 30/9,
        "fit" => "crop",
        "crop" => "focalpoint",
        "auto" => "format,compress,enhance"
    ];

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $model->uid = Str::random(5);
            $model->user_id = Auth::id();
            $model->html = Markdown::parse($model->markdown);
            $model->tags = implode(",", $model->getKeywords());
        });

        static::updating(function ($model) {
            $model->html = Markdown::parse($model->markdown);
            $model->tags = implode(",", $model->getKeywords());
        });
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public static function findByUid ($uid) {
        return static::where('uid', $uid)->firstOrFail();
    }

    public function getRouteKeyName()
    {
        return 'uid';
    }

    public function getKeywords() {
        return array_map(function ($tag) {
            return Str::slug($tag);
        }, explode(",", $this->tags));
    }

    public function getSlugAttribute() {
        return Str::slug($this->title);
    }

    public function getUrlAttribute() {
        return route('blog.reader', [
            "post"=>$this,
            "slug" => $this->slug
        ]);
    }

    public function getPictureAttribute () {
        return imgixUrl($this->image, $this->cardImageSettings);
    }

    public function getScaledPicture($dpr) {
        return imgixUrl($this->image, array_merge(
            $this->cardImageSettings,
            ["dpr" => $dpr]
        ));
    }

    public function getPictureSrcsetAttribute($amount=3) {
        $srcset = [];
        for ($i = 1; $i <= $amount; $i++) {
            $srcset[] = $this->getScaledPicture($i) . " " . $i . "x";
        }
        return implode(",", $srcset);
    }

    public function getBannerAttribute () {
        return imgixUrl($this->image, $this->bannerImageSettings);
    }

    public function getScaledBanner($dpr) {
        return imgixUrl($this->image, array_merge(
            $this->bannerImageSettings,
            ["dpr" => $dpr]
        ));
    }

    public function getBannerSrcsetAttribute($amount=3) {
        $srcset = [];
        for ($i = 1; $i <= $amount; $i++) {
            $srcset[] = $this->getScaledBanner($i) . " " . $i . "x";
        }
        return implode(",", $srcset);
    }
}