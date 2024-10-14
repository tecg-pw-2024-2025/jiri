<?php

namespace App\Concerns;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

trait HasImageVariants
{
    public function makeImageVariants(UploadedFile $requestImage, string $originalPath): void
    {
        $sizes = config('photos.sizes');
        $search = array_keys($sizes)[0];

        foreach ($sizes as $size => $width) {
            if ($width === null) {
                continue;
            }

            if ($size === 'cover') {
                $imageResized = Image::read($requestImage)
                    ->coverDown(width: $width, height: $width);
            } else {
                $imageResized = Image::read($requestImage)
                    ->scaleDown(width: $width);
            }

            $filePath = str_replace($search, $size, $originalPath);
            $directoryPath = dirname($filePath);
            if (!Storage::exists($directoryPath)) {
                Storage::makeDirectory($directoryPath);
            }

            Storage::put($filePath, $imageResized->encode());
        }
    }
}
