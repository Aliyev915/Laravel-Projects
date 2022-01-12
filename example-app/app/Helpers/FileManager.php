<?php
namespace App\Helpers;

use Illuminate\Support\Facades\File;

class FileManager{
    public static function fileUpload($file,$folder){
        $image = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $filename = pathinfo($image,PATHINFO_FILENAME);
        $path = $filename . '_' . rand() . '.' . $extension;
        $file->move(public_path($folder),$path);
        return $path;
    }

    public static function deleteFile($path){
        if(File::exists($path)){
            File::delete($path);
        }
    }
}