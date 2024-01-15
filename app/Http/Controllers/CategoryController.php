<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all(['cat_title']);

        return response()->json(['categories' => $categories]);
    }
}
