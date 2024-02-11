<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // $product = Product::find(3);
        // $category = Category::find(1);
        $image = Image::find(1);

        // dd($image->product);

        return view('home', ['image'=>$image]);
    }
}
