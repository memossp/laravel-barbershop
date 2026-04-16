@extends('layouts.main')

@section('title', 'Order Details')

@section('additional_css')
    <style>
        .order-container {
            background: #000;
            min-height: calc(100vh - 200px);
            padding: 40px 20px;
        }

        .order-content {
            max-width: 800px;
            margin: 0 auto;
            background: rgba(20, 20, 20, 0.9);
            border: 1px solid #FFD700;
            border-radius: 8px;
            padding: 30px;
        }

        .order-header {
            color: #FFD700;
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 1px solid #FFD700;
        }

        .order-details {
            margin-bottom: 30px;
        }

        .order-details p {
            color: white;
            margin: 10px 0;
        }

        .order-details strong {
            color: #FFD700;
        }

        .order-items {
            margin-top: 20px;
        }

        .order-item {
            background: rgba(0, 0, 0, 0.3);
            padding: 15px;
            margin: 10px 0;
            border-radius: 4px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }

        .order-total {
            text-align: right;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #FFD700;
        }

        .order-total span {
            color: #FFD700;
            font-size: 1.2em;
            font-weight: bold;
        }

        .status-badge {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9em;
            font-weight: bold;
        }

        .status-pending {
            background: #FFD700;
            color: black;
        }

        .status-confirmed {
            background: #4CAF50;
            color: white;
        }

        .status-cancelled {
            background: #dc3545;
            color: white;
        }

        .success-message {
            background: #4CAF50;
            color: white;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
@endsection

@section('content')
    <div class="order-container">
        <div class="order-content">
            @if(session('success'))
                <div class="success-message">
                    {{ session('success') }}
                </div>
            @endif

            <div class="order-header">
                <h1>Order #{{ $order->id }}</h1>
                <span class="status-badge status-{{ $order->status }}">
                {{ ucfirst($order->status) }}
            </span>
            </div>

            <div class="order-details">
                <p><strong>Order Date:</strong> {{ $order->created_at->format('F j, Y g:i A') }}</p>
                <p><strong>Shipping Address:</strong> {{ $order->shipping_address }}</p>
                <p><strong>Phone:</strong> {{ $order->phone }}</p>
                <p><strong>Payment Method:</strong> {{ ucfirst($order->payment_method) }}</p>
            </div>

            <div class="order-items">
                <h2 style="color: #FFD700;">Order Items</h2>
                @foreach($order->items as $item)
                    <div class="order-item">
                        <div>
                            <span style="color: #FFD700;">{{ $item->product->name }}</span>
                            <br>
                            Quantity: {{ $item->quantity }} x ${{ number_format($item->price, 2) }}
                        </div>
                        <div>${{ number_format($item->total, 2) }}</div>
                    </div>
                @endforeach
            </div>

            <div class="order-total">
                <p>Total: <span>${{ number_format($order->total_amount, 2) }}</span></p>
            </div>
        </div>
    </div>
@endsection
