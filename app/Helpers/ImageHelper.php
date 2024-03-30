<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageHelper
{
    function storeImageInPublicDirectory($image, $directory, $width = null, $hight = null)
    {
        // dd($width);
        $filename = $image->getClientOriginalName();
        $path = $directory;
        // $path = public_path($directory);
        // dd($path);
        // Process the image using Intervention Image (optional)
        if ($width == null && $hight == null) {
            $processedImage = Image::make($image)
                ->encode('webp', 80);
        } elseif ($width != null && $hight != null) {
            $processedImage = Image::make($image)
                ->resize($width, $hight)
                ->encode('webp', 80); // Encode as WebP with 80% quality (adjust as needed)

        } else {
            $processedImage = Image::make($image)
                ->resize(800, 500, function ($constraint) { // Set width and scale height proportionally
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->encode('webp', 80); // Encode as WebP with 80% quality (adjust as needed)
        }
        // Store the processed image in the public directory
        Storage::disk('local')->put($path . '/' . $filename, $processedImage);
        return $path . '/' . $filename; // Return the full path with name
    }
    function removeImageInPublicDirectory($image)
    {
        Storage::disk('local')->delete($image);
    }
}
