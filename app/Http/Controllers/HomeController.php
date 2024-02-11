<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // взять 10 самых дешевых продуктов
        $cheapProducts = Product::orderBy('price')->limit(10)->get();

        // подгрузить сразу связанные изображение
        foreach ($cheapProducts as $product) {
            $product->load('images');
        }

        return view('home', ['cheapProducts' => $cheapProducts]);
    }
}
