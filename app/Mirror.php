<?php
namespace App;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use Illuminate\Database\Eloquent\Model;
use App\Image;

class Mirror extends Model
{
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

    public function images() {
      return $this->hasMany(Image::class);
    }

    public function createFromPlistURL($plistURL, $provider = null)
    {
      $plistJSON = $this->getDataFromApple($plistURL)->results[0];
      $this->description = $plistJSON->description;
      $this->fileSizeInBytes = $plistJSON->fileSizeBytes;
      $this->minimumOsVersion = $plistJSON->minimumOsVersion;
      $this->formattedPrice = $plistJSON->formattedPrice;
      $this->sellerName = $plistJSON->sellerName;
      $this->releaseNotes = $plistJSON->releaseNotes;
      $this->genres = join(', ', $plistJSON->genres);
      $this->sellerURL = $plistJSON->sellerUrl;
      $this->iconURL = $plistJSON->artworkUrl60;
      $this->save();

      foreach(array_merge($plistJSON->screenshotUrls, $plistJSON->ipadScreenshotUrls) as $screenshot) {
        $image = new Image;
        $image->type = "phone";
        $image->url = $screenshot;
        $this->images()->save($image);
      }

      foreach($plistJSON->ipadScreenshotUrls as $screenshot) {
        $image = new Image;
        $image->type = "phone";
        $image->url = $screenshot;
        $this->images()->save($image);
      }

      dd($this);
      // dd($this->toArray());
    }
}
