<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category(Request $request)
    {
        $category = $request->input('category');

        if ($category) {
            $cheapProducts = Product::whereHas('categories', function ($query) use ($category) {
                $query->where('name', $category);
            })->where('remainder', '>', 0)->orderBy('price')->paginate(10);
        } else {
            $cheapProducts = Product::where('remainder', '>', 0)->orderBy('price')->paginate(10);
        }

        $categories = Category::all();

        return view('category', compact('cheapProducts', 'categories', 'category'));
    }

}
