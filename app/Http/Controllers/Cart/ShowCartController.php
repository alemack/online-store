<?php

namespace App\Http\Controllers\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowCartController extends Controller
{
    public function show()
    {
        // полчить содержимое корзины из сессии
        $cart = session()->get('cart', []);

        return view('cart.show', ['cart' => $cart]);
    }
}
