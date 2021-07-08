<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {
    public function index(Request $request) {
        $statistics = [
            "posts" => Post::count(),
            "categories" =>Category::count(),
        ];

        return view("admin.home", [
            "statistics" => $statistics,
            //"user" => $request->user(),
            "userDetails" => $request->user()->detail,
            "user" => Auth::user()
        ]);
    }
}
