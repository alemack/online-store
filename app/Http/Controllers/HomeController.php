<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $selectedCategory = $request->input('category'); // Получаем выбранную категорию

        $cheapProducts = Product::orderBy('price')->paginate(10);
        // dd($cheapProducts);
        // $cheapProducts = Product::orderBy('price')->limit(10)->get();
        $categories = Category::all();

        return view('home', compact('cheapProducts', 'categories', 'selectedCategory'));
    }


    public function category(Request $request)
    {
        $category = $request->input('category');

        if ($category) {
            $cheapProducts = Product::whereHas('categories', function ($query) use ($category) {
                $query->where('name', $category);
            })->orderBy('price')->paginate(10);
        } else {
            $cheapProducts = Product::orderBy('price')->paginate(10);
        }

        $categories = Category::all();

        return view('category', compact('cheapProducts', 'categories', 'category'));
    }

    // public function category(Request $request)
    // {
    //     $category = $request->input('category');

    //     if ($category) {
    //         $cheapProducts = Product::whereHas('categories', function ($query) use ($category) {
    //             $query->where('name', $category);
    //         })->orderBy('price')->limit(10)->get();
    //     } else {
    //         $cheapProducts = Product::orderBy('price')->limit(10)->get();
    //     }

    //     $categories = Category::all();

    //     return view('home', compact('cheapProducts', 'categories', 'category'));
    // }



    // public function category($category = null)
    // {
    //     // dd($category);
    //     if ($category) {
    //         $cheapProducts = Product::whereHas('categories', function ($query) use ($category) {
    //             $query->where('name', $category);
    //         })->orderBy('price')->limit(10)->get();
    //     } else {
    //         $cheapProducts = Product::orderBy('price')->limit(10)->get();
    //     }
    //     $categories = Category::all();

    //     return view('home', compact('cheapProducts', 'categories', 'category'));
    // }



    // public function index()
    // {
    //     // взять 10 самых дешевых продуктов
    //     $cheapProducts = Product::orderBy('price')->limit(10)->get();

    //     // подгрузить сразу связанные изображение
    //     foreach ($cheapProducts as $product) {
    //         $product->load('images');
    //     }

    //     return view('home', ['cheapProducts' => $cheapProducts]);
    // }
}
