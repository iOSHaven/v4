<?php

namespace App\Lib;

use Spatie\MediaLibrary\ResponsiveImages\TinyPlaceholderGenerator\TinyPlaceholderGenerator;
use Spatie\MediaLibrary\Support\ImageFactory;

class TrimmedTinyIcon implements TinyPlaceholderGenerator
{
    public function generateTinyPlaceholder(string $sourceImagePath, string $tinyImageDestinationPath): void
    {
        $sourceImage = ImageFactory::load($sourceImagePath);

        $sourceImage
            ->width(20)
            ->trim('transparent')
            ->blur(5)
            ->save($tinyImageDestinationPath);
    }
}
