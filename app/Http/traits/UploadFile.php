<?php
namespace App\Http\traits;

trait UploadFile{

private function UploadImage($image,$path,$time = true){
        $filename =($time)? time():'' . '_' . $image->getClientOriginalName();
        $image->move(public_path($path), $filename);
        return $filename;
}

private function DeleteImage($old,$path){
    if (file_exists(public_path($path.$old))) {
        unlink(public_path($path.$old));
    }

}
}
