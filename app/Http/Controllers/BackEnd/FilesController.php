<?php

namespace app\Http\Controllers\BackEnd;

use App\Traits\FileManager;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FilesController extends Controller
{
    use FileManager;

    public function upload(Request $request){
        $folder = $request->folder? $request->folder : 'common';
        return $this->uploadFile($request,"image",$folder);
    }

}
