<?php

namespace App\Concerns;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

trait HasImageVariants
{
    public function makeImageVariants(string $originalPath): void
    {
        $sizes = config('photos.sizes');
        $search = array_keys($sizes)[0];

        foreach ($sizes as $size => $width) {
            if ($width === null) {
                continue;
            }
            $image = Image::read(Storage::get($originalPath));
            if ($size === 'cover') {
                $imageResized = $image
                    ->cover(width: $width, height: $width);
            } else {
                $imageResized = $image
                    ->scale(width: $width);
            }

            $filePath = str_replace($search, $size, $originalPath);
            $directoryPath = dirname($filePath);

            if (! Storage::exists($directoryPath)) {
                Storage::makeDirectory($directoryPath);
            }

            Storage::put($filePath, $imageResized->encode());
        }
    }
}
