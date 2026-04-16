<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        $cart = Cart::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'product_id' => $product->id,
            ],
            [
                'quantity' => DB::raw('quantity + 1'),
                'total'    => $product->price,
            ]
        );

        return back()->with('success', 'Product added to cart');
    }

    public function show()
    {
        $cartItems = Cart::where('user_id', auth()->id())
            ->with('product')
            ->get();

        $total = $cartItems->sum('total');

        return view('cart', compact('cartItems', 'total'));
    }

    public function update(Request $request, Cart $cart)
    {
        $cart->update(
            [
                'quantity' => $request->quantity,
                'total'    => $cart->product->price * $request->quantity,
            ]
        );

        return back();
    }

    public function remove(Cart $cart)
    {
        $cart->delete();

        return back();
    }
}
