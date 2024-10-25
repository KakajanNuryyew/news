<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;


class NewsController extends Controller
{
    public function get() 
    {
        $news = News::cursorPaginate(4);

        foreach ($news as $key => $new) {
            $news[$key] = $new->formattedForApi();
        }

        return [
            'success' => true,
            'message' => '',
            'news' => $news,
        ];
    }

    public function detail($id)
    {
        $new = News::findOrFail($id); 

        return [
            'success' => true,
            'message' => '',
            'new' => $new->formattedDetailForApi(),
        ];
    }

}
