<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


    public function showCategory()
    {
        $categories = Category::all();

        return view('layouts.navigation', compact('categories'));
    }
}
