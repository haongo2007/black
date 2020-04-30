<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;

class ResizeImageController extends Controller
{
    public function ResizeImage (Request $request){
        $url = urldecode($request->url);
        $h = $request->has('height') ? $request->height : null;
        $w = $request->has('width') ? $request->width : null;
        $img = Image::make($url)->resize($w,$h,function($constraint){
            $constraint->aspectRatio();
        });
        return $img->response($request->type);
    }
}
