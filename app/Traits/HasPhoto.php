<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Laravel\Jetstream\Features;

trait HasPhoto
{
    protected function PhotoColumn()
    {
        return self::$photoColumn ?? 'profile_photo_path';
    }

    protected function PhotoFolder()
    {
        return self::$photoColumn ?? 'profile-photos';
    }

    /**
     * Update the user's profile photo.
     *
     * @return void
     */
    public function updateProfilePhoto(UploadedFile $photo)
    {
        $this->updatePhoto($photo);
    }

    /**
     * Update the user's profile photo.
     *
     * @return void
     */
    public function updatePhoto(UploadedFile $photo)
    {
        $column = $this->PhotoColumn();
        $folder = $this->PhotoFolder();

        tap($this->$column, function ($previous) use ($photo, $column, $folder) {
            $this->forceFill([
                $column => $photo->storePublicly(
                    $folder, ['disk' => $this->photoDisk()]
                ),
            ])->save();

            if ($previous) {
                Storage::disk($this->photoDisk())->delete($previous);
            }
        });
    }

    /**
     * Delete the user's profile photo.
     *
     * @return void
     */
    public function deleteProfilePhoto()
    {
        $this->deletePhoto();
    }

    /**
     * Delete the user's profile photo.
     *
     * @return void
     */
    public function deletePhoto()
    {
        $column = $this->PhotoColumn();

        if (! Features::managesProfilePhotos()) {
            return;
        }

        if (is_null($this->$column)) {
            return;
        }

        Storage::disk($this->photoDisk())->delete($this->$column);

        $this->forceFill([
            $column => null,
        ])->save();
    }

    /**
     * Get the URL to the user's profile photo.
     *
     * @return string
     */
    public function getPhotoUrlAttribute()
    {
        $column = $this->PhotoColumn();

        return $this->$column
            ? Storage::disk($this->photoDisk())->url($this->$column)
            : $this->defaultPhotoUrl();
    }

    /**
     * Get the default profile photo URL if no profile photo has been uploaded.
     *
     * @return string
     */
    protected function defaultPhotoUrl()
    {
        $name = trim(collect(explode(' ', $this->name))->map(function ($segment) {
            return mb_substr($segment, 0, 1);
        })->join(' '));

        return 'https://ui-avatars.com/api/?name='.urlencode($name).'&color=7F9CF5&background=EBF4FF';
    }

    /**
     * Get the disk that profile photos should be stored on.
     *
     * @return string
     */
    protected function photoDisk()
    {
        return isset($_ENV['VAPOR_ARTIFACT_NAME']) ? 's3' : config('jetstream.profile_photo_disk', 'public');
    }
}
