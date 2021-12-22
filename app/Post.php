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

    private $imgixSettings = [
        "h" => 200,
        "w" => 200 * 3.2361/2,
        "fit" => "crop",
        "crop" => "focalpoint",
        "auto" => "compress,enhance"
    ];

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $model->uid = Str::random(5);
            $model->user_id = Auth::id();
            $model->html = Markdown::parse($model->markdown);
        });

        static::updating(function ($model) {
            $model->html = Markdown::parse($model->markdown);
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

    public function getSlugAttribute() {
        return Str::slug($this->title);
    }

    public function getUrlAttribute() {
        return url("/blog/" . $this->uid . "/" . $this->slug);
    }

    public function getPictureAttribute () {
        return imgixUrl($this->image, $this->imgixSettings);
    }

    public function getScaledPicture($dpr) {
        return imgixUrl($this->image, array_merge(
            $this->imgixSettings,
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
}