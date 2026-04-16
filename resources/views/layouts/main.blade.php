<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>@yield('title', 'Barber')</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/media.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/book_now.css') }}"/>
    @yield('additional_css')
</head>
<body>
<header>
    <div class="wrapper">
        <nav>
            <div class="logo">
                <a href="{{ route('test') }}">
                    <img src="{{ asset('image/logo.svg') }}" alt="master barber"/>
                </a>
            </div>
            <ul>
                <li><a href="{{ route('about') }}">ABOUT</a></li>
                <li><a href="{{ route('bookings.create') }}">BOOK ONLINE</a></li>
                @auth
                    <li><a href="{{ route('cart.show') }}" class="cart-link">
                            View My Cart
                            @if(Auth::user()->cart_items_count > 0)
                                <span class="cart-count">{{ Auth::user()->cart_items_count }}</span>
                            @endif
                        </a></li>
                    <li><a href="{{ route('bookings.index') }}" class="btn-light">MY BOOKINGS</a></li>
                @else
                    <li><a href="{{ route('login') }}" class="btn-light">LOG IN/SIGN UP</a></li>
                @endauth
            </ul>

            <div class="menu-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
        <div class="mobile_menu">
            <ul>
                <li><a href="{{ route('about') }}">ABOUT</a></li>
                <li><a href="{{ route('bookings.create') }}">BOOK ONLINE</a></li>
                @auth
                    <li><a href="{{ route('cart.show') }}" class="cart-link">
                            View My Cart
                            @if(Auth::user()->cart_items_count > 0)
                                <span class="cart-count">{{ Auth::user()->cart_items_count }}</span>
                            @endif
                        </a></li>
                    <li><a href="{{ route('bookings.index') }}" class="btn-light">MY BOOKINGS</a></li>
                @else
                    <li><a href="{{ route('login') }}" class="btn-light">LOG IN/SIGN UP</a></li>
                @endauth
            </ul>
        </div>

        @yield('content')

        <div class="footer">
            <div class="footer-right">
                <ul class="social">
                    <li><h1>CONTACT US:</h1></li>
                    <li><a href="#"><h3 class="facebook">Master Barber</h3></a></li>
                    <li><a href="#"><h3 class="instagram">@MasterBarber</h3></a></li>
                </ul>
            </div>
            <div class="telephone">
                <ul class="tele">
                    <li><h1>telephone</h1></li>
                    <li class="wtf"><a href="#"><h3 class="call">694525238652</h3></a></li>
                </ul>
            </div>
        </div>
    </div>
</header>

<script src="{{ asset('js/main.js') }}"></script>
@yield('scripts')
</body>
</html>
