<?php

namespace App;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use Illuminate\Database\Eloquent\Model;
use App\Image;
use App\Provider;
use App\App;
use Carbon\Carbon;

class Mirror extends Model
{
  protected $fillable = [
    "provider_id", "app_id"
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

  private function getDataFromUrl($plistURL)
  {
    if (!empty($plistURL)) {
      dump(['node', base_path('plist.js'), '--url', $plistURL]);
      $process = new Process(['node', base_path('plist.js'), '--url', $plistURL]);
      $process->setTimeout(60*20);
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

    if (!empty($data) && empty($data->description)) {
      $data = $this->getDataFromUrl($data->ipaurl);
      if (!empty($data->description)) {
        $this->description = $data->description;
        $this->fileSizeInBytes = $data->fileSizeBytes;
        $this->minimumOsVersion = $data->minimumOsVersion;
        $this->formattedPrice = $data->formattedPrice;
        $this->sellerName = $data->sellerName;
        $this->releaseNotes = $data->releaseNotes;
        $this->genres = join(', ', $data->genres);
        $this->sellerURL = $data->sellerUrl;
        $this->iconURL = $data->artworkUrl60;
        $this->version = $data->version;
        $this->fetched_at = Carbon::now();

        foreach (array_merge($data->screenshotUrls, $data->ipadScreenshotUrls) as $screenshot) {
          if (in_array($screenshot, $data->screenshotUrls)) {
            $type = "phone";
          } else if (in_array($screenshot, $data->ipadScreenshotUrls)) {
            $type = "ipad";
          }
          
          $image = Image::firstOrCreate([
            "type" => $type,
            "url" => $screenshot,
            "mirror_id" => $this->id,
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
