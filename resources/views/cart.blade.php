@extends('layouts.main')

@section('title', 'Shopping Cart')

@section('additional_css')
    <style>
        .cart-container {
            background: #000;
            min-height: calc(100vh - 200px);
            padding: 40px 20px;
        }

        .cart-header {
            color: #FFD700;
            text-align: center;
            font-size: 2rem;
            margin-bottom: 30px;
        }

        .cart-item {
            background: rgba(20, 20, 20, 0.9);
            border: 1px solid #FFD700;
            margin-bottom: 20px;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 20px;
            border-radius: 8px;
        }

        .cart-item img {
            width: 100px;
            height: 100px;
            object-fit: cover;
        }

        .item-details {
            flex-grow: 1;
            color: #FFD700;
        }

        .item-name {
            font-size: 1.2rem;
            margin-bottom: 5px;
        }

        .item-price {
            font-size: 1.1rem;
        }

        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .quantity-input {
            background: #000;
            border: 1px solid #FFD700;
            color: #FFD700;
            padding: 8px;
            width: 60px;
            text-align: center;
            border-radius: 4px;
        }

        .btn {
            padding: 8px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }

        .update-btn {
            background: #FFD700;
            color: #000;
        }

        .remove-btn {
            background: #dc3545;
            color: white;
        }

        .cart-summary {
            background: rgba(20, 20, 20, 0.9);
            border: 1px solid #FFD700;
            padding: 20px;
            border-radius: 8px;
            margin-top: 30px;
            text-align: right;
        }

        .cart-total {
            color: #FFD700;
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .checkout-btn {
            background: #FFD700;
            color: #000;
            padding: 15px 30px;
            text-decoration: none;
            display: inline-block;
            border-radius: 4px;
            font-weight: bold;
        }

        .empty-cart {
            text-align: center;
            color: #FFD700;
            padding: 40px;
        }

        .continue-shopping {
            color: #FFD700;
            text-decoration: underline;
            display: block;
            margin-top: 20px;
        }
    </style>
@endsection

@section('content')
    <div class="cart-container">
        <h1 class="cart-header">Shopping Cart</h1>

        @if($cartItems->count() > 0)
            @foreach($cartItems as $item)
                <div class="cart-item">
                    <img src="{{ asset($item->product->image) }}" alt="{{ $item->product->name }}">

                    <div class="item-details">
                        <h3 class="item-name">{{ $item->product->name }}</h3>
                        <p class="item-price">${{ number_format($item->product->price, 2) }}</p>
                    </div>

                    <div class="quantity-controls">
                        <form action="{{ route('cart.update', $item->id) }}" method="POST" style="display: flex; gap: 10px;">
                            @csrf
                            @method('PATCH')
                            <input type="number"
                                   name="quantity"
                                   value="{{ $item->quantity }}"
                                   min="1"
                                   class="quantity-input">
                            <button type="submit" class="btn update-btn">Update</button>
                        </form>

                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn remove-btn">Remove</button>
                        </form>
                    </div>
                </div>
            @endforeach

            <div class="cart-summary">
                <div class="cart-total">
                    Total: ${{ number_format($cartItems->sum('total'), 2) }}
                </div>
                <a href="{{ route('checkout') }}" class="checkout-btn">Proceed to Checkout</a>
            </div>
        @else
            <div class="empty-cart">
                <p>Your cart is empty</p>
                <a href="{{ route('products.index') }}" class="continue-shopping">Continue Shopping</a>
            </div>
        @endif
    </div>
@endsection
