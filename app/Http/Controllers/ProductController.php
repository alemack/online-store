<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::findOrFail($id);

        // Загрузить изображения для товара
        $product->load('images');

        return view('product.show', compact('product'));
    }
}
