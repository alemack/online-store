<?php

namespace App\Http\Controllers\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RemoveFromCartController extends Controller
{
    public function clear()
    {
        // чистка корзины
        session()->forget('cart');

        return redirect()->route('cart.show')->with('success', 'Корзина была успешно очищена');
    }
}
