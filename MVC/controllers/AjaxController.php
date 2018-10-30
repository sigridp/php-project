<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class AjaxController extends Controller
{
    /**
    * haal nieuwsinformatie op voor JSON-file
    *
    * @return mixed
    */
    public function newsinfo(){
        $news = News::Published(3);
        
        // wanneer leeg geef een boolean false
        if( empty ($news)){
            return response()->json(false);
        }

        return response()->json($news);
    }
}
