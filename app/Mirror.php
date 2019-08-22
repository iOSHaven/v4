<?php

namespace App;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use Illuminate\Database\Eloquent\Model;
use App\Image;
use App\Provider;
use App\App;

class Mirror extends Model
{
  protected $fillable = [
    "provider_id", "app_id"
  ];

  protected $with = ["provider"];

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

  private function getDataFromApple($plistURL)
  {
    $process = new Process(['node', base_path('plist.js'), '--url', $plistURL]);
    $process->run();

    // executes after the command finishes
    if (!$process->isSuccessful()) {
      throw new ProcessFailedException($process);
    }
    $plistJSON = json_decode($process->getOutput());
    return $plistJSON;
  }



  public function createFromPlistURL($plistURL, Provider $provider, App $app)
  {
    $data = $this->getDataFromApple($plistURL);
    $this->install_link = $plistURL;
    if (!empty($data)) {
      $plistJSON = $data->results[0];
      $this->description = $plistJSON->description;
      $this->fileSizeInBytes = $plistJSON->fileSizeBytes;
      $this->minimumOsVersion = $plistJSON->minimumOsVersion;
      $this->formattedPrice = $plistJSON->formattedPrice;
      $this->sellerName = $plistJSON->sellerName;
      $this->releaseNotes = $plistJSON->releaseNotes;
      $this->genres = join(', ', $plistJSON->genres);
      $this->sellerURL = $plistJSON->sellerUrl;
      $this->iconURL = $plistJSON->artworkUrl60;
      $this->app()->associate($app)->save();
      $this->provider()->associate($provider)->save();
    }
    $this->save();
    

    // foreach (array_merge($plistJSON->screenshotUrls, $plistJSON->ipadScreenshotUrls) as $screenshot) {
    //   $image = new Image;
    //   $image->type = "phone";
    //   $image->url = $screenshot;
    //   $this->images()->save($image);
    // }

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
