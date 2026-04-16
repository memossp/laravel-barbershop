<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'search', 'filter']);
    }

    public function index()
    {
        $products = Product::all();
        $cartCount = 0;

        if (Auth::check()) {
            $cartCount = Cart::where('user_id', Auth::id())->sum('quantity');
        }

        return view('shop_now', compact('products', 'cartCount'));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    // Admin Methods

    /**
     * @throws AuthorizationException
     */
    public function edit(Product $product)
    {
        $this->authorize('admin');

        return view('products.edit', compact('product'));
    }

    /**
     * @throws AuthorizationException
     */
    public function destroy(Product $product)
    {
        $this->authorize('admin');

        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully.');
    }

    public function addToCart(Request $request, Product $product)
    {
        $request->validate(
            [
                'quantity' => 'required|integer|min:1',
            ]
        );

        if ($product->stock < $request->quantity) {
            return back()->with('error', 'Insufficient stock available.');
        }

        $cart = Cart::updateOrCreate(
            [
                'user_id'    => Auth::id(),
                'product_id' => $product->id,
            ],
            [
                'quantity' => DB::raw("quantity + {$request->quantity}"),
                'total'    => DB::raw("total + " . ($product->price * $request->quantity)),
            ]
        );

        return back()->with('success', 'Product added to cart successfully.');
    }

    public function updateCartQuantity(Request $request, Cart $cart)
    {
        $request->validate(
            [
                'quantity' => 'required|integer|min:1',
            ]
        );

        if ($cart->product->stock < $request->quantity) {
            return back()->with('error', 'Insufficient stock available.');
        }

        $cart->update(
            [
                'quantity' => $request->quantity,
                'total'    => $cart->product->price * $request->quantity,
            ]
        );

        return back()->with('success', 'Cart updated successfully.');
    }

    public function update(Request $request, Product $product)
    {
        $this->authorize('admin');

        $validated = $request->validate(
            [
                'name'        => 'required|string|max:255',
                'description' => 'required|string',
                'price'       => 'required|numeric|min:0',
                'stock'       => 'required|integer|min:0',
                'image'       => 'nullable|image|max:2048',
            ]
        );

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $validated['image'] = $path;
        }

        $product->update($validated);

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully.');
    }

    // Cart Methods

    public function store(Request $request)
    {
        $this->authorize('admin');

        $validated = $request->validate(
            [
                'name'        => 'required|string|max:255',
                'description' => 'required|string',
                'price'       => 'required|numeric|min:0',
                'stock'       => 'required|integer|min:0',
                'image'       => 'nullable|image|max:2048',
            ]
        );

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $validated['image'] = $path;
        }

        Product::create($validated);

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    public function create()
    {
        $this->authorize('admin');

        return view('products.create');
    }

    public function removeFromCart(Cart $cart)
    {
        $cart->delete();

        return back()->with('success', 'Product removed from cart.');
    }

    // Inventory Management
    public function updateStock(Request $request, Product $product)
    {
        $this->authorize('admin');

        $request->validate([
                               'stock' => 'required|integer|min:0',
                           ]);

        $product->update([
                             'stock' => $request->stock,
                         ]);

        return back()->with('success', 'Stock updated successfully.');
    }

    // Search and Filter
    public function search(Request $request)
    {
        $query = $request->input('query');

        $products = Product::where('name', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->paginate(12);

        return view('products.search', compact('products', 'query'));
    }

    public function filter(Request $request)
    {
        $query = Product::query();

        if ($request->has('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->has('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        if ($request->has('in_stock')) {
            $query->where('stock', '>', 0);
        }

        $products = $query->paginate(12);

        return view('products.index', compact('products'));
    }

    // API Methods for AJAX requests
    public function checkStock(Product $product)
    {
        return response()->json(
            [
                'stock'     => $product->stock,
                'available' => $product->stock > 0,
            ]
        );
    }

    public function getCartCount()
    {
        $count = Cart::where('user_id', Auth::id())->sum('quantity');

        return response()->json(['count' => $count]);
    }
}
