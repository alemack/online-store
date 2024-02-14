<?php

namespace App\Http\Controllers\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowCartController extends Controller
{
    public function show()
    {
        // Полчить содержимое корзины
        $cart = session()->get('cart', []);

        return view('cart.show', ['cart' => $cart]);
    }
}
