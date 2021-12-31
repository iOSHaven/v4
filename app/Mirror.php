<?php

namespace App;

use App\App;
use App\Image;
use App\Provider;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class Mirror extends Model
{
    protected $fillable = [
        'provider_id', 'app_id',
    ];

    // protected $with = ["provider", "images"];

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function app()
    {
        return $this->belongsTo(App::class);
    }

    public function getDataFromUrl($plistURL)
    {
        if (! empty($plistURL)) {
            dump(['node', base_path('plist.js'), '--url', $plistURL]);
            $process = new Process(['node', base_path('plist.js'), '--url', $plistURL]);
            $process->setTimeout(60 * 20);
            $process->run();
            if ($process->isSuccessful()) {
                $plistJSON = json_decode($process->getOutput());

                return json_decode(json_encode($plistJSON));
            } else {
                return null;
            }
        }

        return null;
    }

    public function createFromPlistURL($plistURL)
    {
        $data = $this->getDataFromUrl($plistURL);
        $this->install_link = $plistURL;

        if (! empty($data)) {
            if (empty($data->description)) {
                $data = $this->getDataFromUrl($data->ipaurl);
            }
            if (! empty($data->description)) {
                $this->description = $data->description ?? null;
                $this->fileSizeInBytes = $data->fileSizeBytes ?? null;
                $this->minimumOsVersion = $data->minimumOsVersion ?? null;
                $this->formattedPrice = $data->formattedPrice ?? null;
                $this->sellerName = $data->sellerName ?? null;
                $this->releaseNotes = $data->releaseNotes ?? null;
                $this->genres = implode(', ', $data->genres ?? []);
                $this->sellerURL = $data->sellerUrl ?? null;
                $this->iconURL = $data->artworkUrl60 ?? null;
                $this->version = $data->version ?? null;
                $this->fetched_at = Carbon::now();

                foreach (array_merge($data->screenshotUrls, $data->ipadScreenshotUrls) as $screenshot) {
                    if (in_array($screenshot, $data->screenshotUrls)) {
                        $type = 'phone';
                    } elseif (in_array($screenshot, $data->ipadScreenshotUrls)) {
                        $type = 'ipad';
                    }

                    $image = Image::firstOrCreate([
                        'type' => $type,
                        'url' => $screenshot,
                        'mirror_id' => $this->id,
                    ]);
                }
            }
        }

        $this->save();

        // dump($plistJSON);

    // foreach ($plistJSON->ipadScreenshotUrls as $screenshot) {
    //   $image = new Image;
    //   $image->type = "phone";
    //   $image->url = $screenshot;
    //   $this->images()->save($image);
    // }

    // dd($this);
    // dd($this->toArray());
    }
}
