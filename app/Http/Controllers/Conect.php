<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

class Conect extends Controller
{

    public function  index(){
        return view('file.index');
    }

    public function store(Request $request){
        /*
         * @var UploadedFile
         */
        $file = $request->file('file');
        $fileFileName = time() . '.' . $file->getClientOriginalExtension();
        $s3 = Storage::disk('s3');
        $filePath = 'images_articles/' . $fileFileName;
        $s3->put($filePath, file_get_contents($file), 'public');


//        $file = Storage::disk('s3')->put('images_articles/',file_get_contents($file),'public');



    }




//     public function uploadFiles()
//     {
//     	$file = public_path() . '/uploads/user.png';
//     	$upload = Storage::disk('s3')->put('images_articles/user.png', file_get_contents($file), 'public');
//     }
}
