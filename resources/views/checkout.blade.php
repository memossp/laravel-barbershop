@extends('layouts.main')

@section('title', 'Checkout')

@section('additional_css')
    <style>
        .checkout-container {
            background: url('/image/tools.jpg');
            background-size: cover;
            min-height: 100vh;
            padding: 40px 20px;
        }

        .checkout-form {
            max-width: 800px;
            margin: 0 auto;
            background: rgba(0, 0, 0, 0.8);
            padding: 30px;
            border-radius: 10px;
            color: #FFD700;
            border: 1px solid #FFD700;
        }

        .checkout-form h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #FFD700;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #FFD700;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 5px;
            color: white;
        }

        .payment-methods {
            margin: 20px 0;
        }

        .order-summary {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #FFD700;
        }

        .order-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            color: white;
        }

        .total {
            font-size: 1.2em;
            font-weight: bold;
            margin-top: 20px;
            color: #FFD700;
        }

        .submit-btn {
            background: #4CAF50;
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            margin-top: 20px;
            font-size: 1.1em;
        }

        .submit-btn:hover {
            opacity: 0.9;
        }

        .error {
            color: #dc3545;
            font-size: 0.9em;
            margin-top: 5px;
        }
    </style>
@endsection

@section('content')
    <div class="checkout-container">
        <form class="checkout-form" action="{{ route('checkout.process') }}" method="POST">
            @csrf
            <h1>Checkout</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Shipping Information -->
            <div class="form-group">
                <label for="shipping_address">Shipping Address</label>
                <input type="text" id="shipping_address" name="shipping_address" value="{{ old('shipping_address') }}" required>
            </div>

            <div class="form-group">
                <label for="city">City</label>
                <input type="text" id="city" name="city" value="{{ old('city') }}" required>
            </div>

            <div class="form-group">
                <label for="postal_code">Postal Code</label>
                <input type="text" id="postal_code" name="postal_code" value="{{ old('postal_code') }}" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" required>
            </div>

            <!-- Payment Method -->
            <div class="payment-methods">
                <h3>Payment Method</h3>
                <div>
                    <input type="radio" id="cash" name="payment_method" value="cash" checked>
                    <label for="cash">Cash on Delivery</label>
                </div>
                <div>
                    <input type="radio" id="card" name="payment_method" value="card">
                    <label for="card">Credit Card</label>
                </div>
            </div>

            <!-- Credit Card Fields (shown/hidden based on payment method) -->
            <div id="card-fields" style="display: none;">
                <div class="form-group">
                    <label for="card_number">Card Number</label>
                    <input type="text" id="card_number" name="card_number" maxlength="16">
                </div>

                <div class="form-group">
                    <label for="expiry_date">Expiry Date (MM/YY)</label>
                    <input type="text" id="expiry_date" name="expiry_date" maxlength="5">
                </div>

                <div class="form-group">
                    <label for="cvv">CVV</label>
                    <input type="text" id="cvv" name="cvv" maxlength="4">
                </div>
            </div>

            <!-- Order Summary -->
            <div class="order-summary">
                <h3>Order Summary</h3>
                @foreach($cartItems as $item)
                    <div class="order-item">
                        <span>{{ $item->product->name }} x {{ $item->quantity }}</span>
                        <span>${{ number_format($item->total, 2) }}</span>
                    </div>
                @endforeach
                <div class="total">
                    Total: ${{ number_format($total, 2) }}
                </div>
            </div>

            <button type="submit" class="submit-btn">Place Order</button>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        document.querySelectorAll('input[name="payment_method"]').forEach(radio => {
            radio.addEventListener('change', function() {
                const cardFields = document.getElementById('card-fields');
                cardFields.style.display = this.value === 'card' ? 'block' : 'none';
            });
        });
    </script>
@endsection
