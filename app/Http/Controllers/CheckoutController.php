<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function show()
    {
        $cartItems = Cart::where('user_id', auth()->id())
            ->with('product')
            ->get();

        $total = $cartItems->sum('total');

        if ($cartItems->isEmpty()) {
            return redirect()->route('shop')->with('error', 'Your cart is empty');
        }

        return view('checkout', compact('cartItems', 'total'));
    }

    public function process(Request $request)
    {
        // Validate checkout form
        $validated = $request->validate(
            [
                'shipping_address' => 'required|string|max:255',
                'city'             => 'required|string|max:100',
                'postal_code'      => 'required|string|max:20',
                'phone'            => 'required|string|max:20',
                'payment_method'   => 'required|in:cash,card',
                'card_number'      => 'required_if:payment_method,card|nullable|string|max:16',
                'expiry_date'      => 'required_if:payment_method,card|nullable|string|max:5',
                'cvv'              => 'required_if:payment_method,card|nullable|string|max:4',
            ]
        );

        try {
            DB::beginTransaction();

            // Get cart items
            $cartItems = Cart::where('user_id', auth()->id())
                ->with('product')
                ->get();

            $total = $cartItems->sum('total');

            // Check stock availability
            foreach ($cartItems as $item) {
                if ($item->product->stock < $item->quantity) {
                    throw new \Exception("Insufficient stock for {$item->product->name}");
                }
            }

            // Create order
            $order = Order::create(
                [
                    'user_id'          => auth()->id(),
                    'total_amount'     => $total,
                    'shipping_address' => $validated['shipping_address'] . ', ' .
                        $validated['city'] . ' ' .
                        $validated['postal_code'],
                    'phone'            => $validated['phone'],
                    'payment_method'   => $validated['payment_method'],
                    'status'           => 'pending',
                ]
            );

            foreach ($cartItems as $item) {
                $order->items()->create(
                    [
                        'product_id' => $item->product_id,
                        'quantity'   => $item->quantity,
                        'price'      => $item->product->price,
                        'total'      => $item->total,
                    ]
                );

                // Update product stock
                $item->product->decrement('stock', $item->quantity);
            }

            if ($validated['payment_method'] === 'card') {
            }

            // Clear cart
            Cart::where('user_id', auth()->id())->delete();

            DB::commit();

            return redirect()->route('orders.show', $order)
                ->with('success', 'Order placed successfully!');
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();

            return back()->with('error', $e->getMessage());
        }
    }

    public function confirmation($orderId)
    {
        $order = Order::with(['items.product'])->findOrFail($orderId);

        if ($order->user_id !== auth()->id()) {
            abort(403);
        }

        return view('orders.confirmation', compact('order'));
    }
}
