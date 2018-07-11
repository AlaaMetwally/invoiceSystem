<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

use App\File;
use Illuminate\Filesystem\Filesystem;
use App\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use LoggedAccount;
use Intervention\Image\Facades\Image;

class Helper
{
    public static function init($model_name, $data_id, $model_parent, $parent_id, $operation, $description)
    {
        $log = new Log();
        $log->model_name = $model_name;
        $log->data_id = $data_id;
        $log->model_parent = $model_parent;
        $log->parent_id = $parent_id;
        $log->user_id = Auth::user()->id;
        $log->operation = $operation;
        $log->description = $description;
        $log->save();
        return $log->id;
    }

    public static function getImage($file_id, $image_height, $image_width)
    {
        $file = File::where('id', $file_id)->first();
        $dir = new Filesystem();
        if ($file) {
            if ($dir->exists('./uploads/' . $file->hash . '/' . $image_height . 'x' . $image_width . '.jpg')) {
                return '/uploads/' . $file->hash . '/' . $image_height . 'x' . $image_width . '.jpg';
            } else {
                $image = Image::make('./uploads/' . $file->hash . '/' . $file->file . '')
                    ->resize($image_height, $image_width);
                $image->save('./uploads/' . $file->hash . '/' . $image_height . 'x' . $image_width . '.jpg');
                return substr($image->dirname, 1) . '/' . $image->basename;

            }
        } else {
            return '//';
        }

    }



    public static function getUserFiles()
    {
        $files = [];
        $user_files = File::where('user_id', Auth::user()->id)->get();
        foreach ($user_files as $file) {
            // It is a file
            $files[] = array(
                "id" => $file->id,
                "name" => $file->file,
                "type" => "file",
                "path" => 'uploads/' . $file->hash.'/'.$file->file,
                "size" => filesize('uploads/' . $file->hash . '/' . $file->file) // Gets the size of this file
            );
        }
        return array(
            "name" => "uploads",
            "type" => "folder",
            "path" => 'uploads',
            "items" => $files
        );
    }



    public static function deleteFile($model_id, $model, $file_column)
    {
        $model = 'App\\' . $model;
        if ($file_column =="0") { //many to many
            $file_id = $model::where('id', $model_id)->delete();
        } else {
            $file_id = $model::where('id', $model_id)->first()->$file_column;
            $file = File::where('id', $file_id)->first();
            $dir = new Filesystem();
//            $delete_file = $dir->deleteDirectory('./uploads/'.$file->hash);
//            $file= File::where('id', $file_id)->delete();
            $model::where('id', $model_id)->update([$file_column => null]);
        }

    }

    //functions
}