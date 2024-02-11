<?php

namespace App\Http\Controllers;

use session;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function clear()
    {
        // чистка корзины
        session()->forget('cart');

        return redirect()->route('cart.show')->with('success', 'Корзина была успешно очищена');
    }

    public function show()
    {
        // полчить содержимое корзины из сессии
        $cart = session()->get('cart', []);

        return view('cart.show', ['cart' => $cart]);
    }

    public function addToCart(Request $request)
    {

        // Получить id товара и количество из запроса
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1); // по умолчанию "1"

        // получить информацию о товаре из базы данных
        $product = Product::find($productId);

        //получить текущее содержимое корзины из сессии
        $cart = session()->get('cart', []);

        // проверить, есть ли уже такой товар в корзине
        if (isset($cart[$productId])) {
            // если товар уже есть в корзине, увеличить его кол-во
            $cart[$productId]['quantity']+=$quantity;
        } else {
            $cart[$productId] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity,
            ];
        }

        // обновить содержимое корзины в сессии
        session()->put('cart', $cart);

        // $cart = session()->get('cart', []);

        // dd($cart);



        // перенаправить обратно на страницу товара или страницу корзины
        return redirect()->back()->with('success', 'Товар был добавлен в корзину успешно');
    }
}
