<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as InterventionImage;
use App\Models\Image;

class ImageController extends Controller
{
    public function show($name)
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: *');
        header('Access-Control-Allow-Headers: *');

        $imagePath = Storage::disk('local')->path(Image::dir($name));
        $image = InterventionImage::make($imagePath);

        if ($image->mime() == 'image/gif') {
            header("Content-type: {$image->mime()}");
            readfile($imagePath);
        } else {
            return $image->response();
        }
    }
}
