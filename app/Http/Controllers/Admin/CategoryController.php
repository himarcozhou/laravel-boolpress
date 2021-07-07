<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller {
    public function index() {
        $categories = Category::all();

        return view("admin.categories.index", compact("categories"));
    }
}
