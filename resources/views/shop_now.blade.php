@extends('layouts.main')

@section('title', 'Shop Now')

@section('additional_css')
    <link rel="stylesheet" href="{{ asset('css/shop_now.css') }}"/>
@endsection

@section('content')
        <div class="product-wrap">
            @foreach($products as $product)
            <div class="product-card">
                <img src="{{$product->image}}" alt="Product Image">
                <h2>{{$product->name}}</h2>
                <p>{{$product->description}}</p>
                <p class="price">${{$product->price}}</p>
                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="quantity" value="1">
                    <button type="submit" class="add-to-cart">Add to Cart</button>
                </form>
            </div>
            @endforeach
        </div>
        @endsection

        @section('scripts')
            <script src="{{ asset('js/main.js') }}"></script>
        @endsection
