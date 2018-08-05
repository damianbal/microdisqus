<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Like;
use App\Http\Resources\LikeResource;

class LikeController extends Controller
{
    public function recent(Request $request) 
    {
        $r = Like::orderBy('created_at', 'DESC')->take($request->input('num', 3))->get();

        return LikeResource::collection($r);
    }
}
