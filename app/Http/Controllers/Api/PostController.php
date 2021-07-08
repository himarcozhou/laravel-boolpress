<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with("category")->with("tags")->get();
        //$posts = Post::all();

        return response()->json([
            "success" => true,
            "results" => $posts
        ]);
    }
}
