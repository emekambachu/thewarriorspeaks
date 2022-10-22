<?php

namespace App\Services\Base;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Ramsey\Uuid\Type\Integer;

/**
 * Class CrudService.
 */
class CrudService
{
    public function publishItem($object): array
    {
        $message = '';
        if($object->status === 'published'){
            $object->status = 'pending';
            $item_name = $object->name ?? $object->title;
            $message = $item_name.' is pending';
        }else{
            $object->status = 'published';
            $item_name = $object->name ?? $object->title;
            $message = $item_name.' is published';
        }
        $object->save();

        return [
            'item' => $object,
            'message' => $message,
        ];
    }

    public function compressAndUploadImage($request, String $path, Int $width, Int $height)
    {
        if($file = $request->file('image')) {
            $name = time() . $file->getClientOriginalName();
            // create path to directory
            if (!File::exists($path)){
                File::makeDirectory($path, 0777, true, true);
            }
            $background = Image::canvas($width, $height);
            // start image conversion (Must install Image Intervention Package first)
            $convert_image = Image::make($file->path());
            // resize image and save to converted path
            // resize and fit width
            $convert_image->resize($width, $height, static function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            // insert image to canvas
            $background->insert($convert_image, 'center');
            $background->save($path.'/'.$name);
            // Return full image upload path
            return $name;
        }
        return false;
    }

    public function uploadDocument($request, $path)
    {
        if($file = $request->file('document')) {
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path($path), $name);
            return $name;
        }
        return false;
    }

    public function uploadAudio($request, $path){
        if($file = $request->file('audio')) {
            $name = time() . $file->getClientOriginalName();
            $file->move($path, $name);
            return $name;
        }
        return false;
    }

    public function deleteFile($fileName, $filePath): void
    {
        if(File::exists(public_path() . '/'.$filePath.'/' . $fileName)){
            FILE::delete(public_path() . '/'.$filePath.'/' . $fileName);
        }
    }

    public function deleteRelation($path = null, ...$relations): void
    {
        foreach($relations as $relation){
            if($relation->count() > 0){
                foreach($relation as $object){
                    $item_file = $object->photo ?? $object->document ?? $object->image ?? $object->file;
                    if($path !== null && !empty($item_file) && File::exists(public_path() . '/'.$path.'/' . $item_file)) {
                        FILE::delete(public_path() . '/'.$path.'/' . $item_file);
                    }
                    $object->delete();
                }
            }
        }
    }

}
