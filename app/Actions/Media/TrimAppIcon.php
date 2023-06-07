<?php

namespace App\Actions\Media;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\QueueableAction\QueueableAction;

class TrimAppIcon
{
    use QueueableAction;

    /**
     * Create a new action instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Prepare the action for execution, leveraging constructor injection.
    }

    /**
     * Execute the action.
     *
     * @return mixed
     */
    public function execute(
        Media $media,
        string $conversion = '',
        string $name = null,
        string $format = 'png',
        int $size = 77
    ) {
        $disk = config('media-library.disk_name');

        $path = Storage::disk($disk)
            ->path($media->getPathRelativeToRoot($conversion));

        $name ??= $conversion;
        $newPath = Str::before($path, $conversion)."{$name}.{$format}";
        $image = Image::make($media->stream())
            ->trim('transparent')
            ->fit($size, $size);

        Storage::disk($disk)->put($newPath, $image->stream($format), [
            'visibility' => 'public',
        ]);
    }
}
