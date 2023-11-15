<?php

namespace App\Http\Controllers;

use App\Models\Category;    
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($id)   
    {
        $category = Category::findOrFail($id);
        $products = Product::where("id", $id)->get();

        return view("{category}", compact("category"));
    }
}