<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Like;
use App\Http\Resources\LikeResource;

class LikesController extends Controller
{
    //
    public function recent() 
    {
        $r = Like::orderBy('created_at', 'DESC')->take(3)->get();

        return LikeResource::collection($r);
    }
}
