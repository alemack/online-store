<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Получить выбранную категорию
        $selectedCategory = $request->input('category');

        $cheapProducts =  Product::where('remainder', '>', 0)->orderBy('price')->paginate(10);

        $categories = Category::all();

        return view('home', compact('cheapProducts', 'categories', 'selectedCategory'));
    }
}
