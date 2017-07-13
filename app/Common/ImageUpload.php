<?php
namespace App\Common;


use Intervention\Image\Facades\Image;

class ImageUpload{
    public static function Upload($file,$public_path,$w,$h){
        $filename  = time() . '.' . $file->getClientOriginalExtension();
        $path = public_path($public_path . $filename);
        Image::make($file->getRealPath())->resize($w,$h)->save($path);
        return $filename;
    }

}