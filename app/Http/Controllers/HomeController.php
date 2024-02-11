<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $cheapProducts = Product::orderBy('price')->limit(10)->get();

        foreach ($cheapProducts as $product) {
            $product->load('images');
        }

        return view('home', ['cheapProducts' => $cheapProducts]);
    }
}
