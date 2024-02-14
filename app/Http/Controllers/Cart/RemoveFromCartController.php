<?php

namespace App\Http\Controllers\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RemoveFromCartController extends Controller
{
    public function clear()
    {
        // Очистить корзину
        session()->forget('cart');

        return redirect()->route('cart.show')->with('success', 'Корзина была успешно очищена');
    }

    public function remove($productId)
    {
        // Получить содержимое корзины из сессии
        $cart = session()->get('cart', []);

        // Удалить позицию товара из корзины
        unset($cart[$productId]);

        // Обновить содержимое корзины в сессии
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Товар был удален из корзины');
    }
}
