<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;

class FileUpload{


# Image Upload

public static function uploadImage($file, $path)
{
   $fileName = time() . '.' . $file->getClientOriginalExtension();
   $file->move(public_path('uploads/' . $path . '/'), $fileName);
   // full path add hobe database e
   // return "uploads/$path/" . $fileName;

   // only file name add hobe database e
   return $fileName;
}

# Delete Image
public static function deleteImage($image)
{
   if (File::exists($image)) {
      File::delete($image);
   }
}
}