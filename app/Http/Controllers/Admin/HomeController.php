<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller {
    public function index() {
        $statistics = [
            "posts" => Post::count(),
            "categories" =>Category::count(),
        ];

        return view("admin.home", compact("statistics"));
    }
}
