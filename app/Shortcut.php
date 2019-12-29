<?php

namespace App;

use App\Builders\ShortcutBuilder;
use App\Traits\HasAnalytics;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Laravel\Nova\Actions\Actionable;

class Shortcut extends Model
{

    use Actionable, HasAnalytics;

    public function newEloquentBuilder($query)
    {
      return new ShortcutBuilder($query);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    // public function impressions() {
    //     return $this->morphMany(View::class, 'trigger');
    // }

    // public function downloads() {
    //     return $this->morphMany(Download::class, 'trigger');
    // }

    // public function installs() {
    //     return $this->morphMany(Install::class, 'trigger');
    // }

    public function getUrlAttribute()
    {
        return "https://www.icloud.com/shortcuts/$this->itunes_id";
    }

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            try {
                $client = new Client();
                $res = $client->get("https://www.icloud.com/shortcuts/api/records/$model->itunes_id");
                if ($res->getStatusCode() == 200) {
                    $data = json_decode($res->getBody()->getContents());
                    $iconURL = $data->fields->icon->value->downloadURL;
                    $model->name = $data->fields->name->value;
                    $client = new Client();
                    $res = $client->get($iconURL);
                    $iconBinary = $res->getBody()->getContents();
                    $path = "/icons/shortcuts/".hash("sha256", $model->name . now());
                    Storage::disk("spaces")->put($path, $iconBinary, ["visibility" => "public"]);
                    $model->icon = env("DO_SPACES_SUBDOMAIN") . "/". $path;  
                    $model->user_id = Auth::id();              
                }
            } catch (\Throwable $th) {
                throw new Exception("Invalid ID for shortcut.");
            }
        });
    }
}
