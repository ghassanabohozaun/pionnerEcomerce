<?php

namespace App\Utils;
use Illuminate\Support\Str;
use File;

class ImageManager
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function uploadSingleImage($path, $image, $disk)
    {
        $file_name = $this->generateImageName($image);
        self::storeImageInLocal($image, $path, $file_name, $disk);
        return $file_name;
    }
    public function generateImageName($image)
    {
        $file_name = Str::uuid() . time() . '.' . $image->getClientOriginalExtension();
        return $file_name;
    }

    private function storeImageInLocal($image, $path, $file_name, $disk)
    {
        $image->storeAs($path, $file_name, ['disk' => $disk]);
    }

    public function removeImageFromLocal($image,$disk)
    {
        $public_path = public_path('uploads\\'.$disk.'\\' . $image);

        if (File::exists($public_path)) {
            File::delete($public_path);
        }
    }
}
