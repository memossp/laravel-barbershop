<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Barber - Login</title>

    <!-- Use asset() helper to load CSS files -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/media.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/log_in.css') }}" />
</head>
<body>
   <!-- begin navigator manu -->
   <header>
            <div class="wrapper">
                <nav>
                    <div class="logo">
                    <a href="{{ route('test') }}">
                        <img src="{{ asset('image/logo.svg') }}" alt="master barber" />
                    </a>
                    </div>
                    <ul>
    <li>
        <a href="{{ route('about') }}"> ABOUT </a> 
    </li>
    <li>
        <a href="{{ route('booking') }}"> BOOK ONLINE</a>
    </li>
    <li>
            <a href="{{ route('shop_now') }}">SHOP NOW</a>

    </li>
    <li>
        <a href="{{ route('login') }}" class="btn-light">LOG IN/SIGN UP</a>
    </li>
</ul>


                    <div class="menu-toggle">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </nav>
                <div class="mobile_menu">
                    <ul >
                        <li><a href="about.html">ABOUT</a></li>
                        <li><a href="/book_now.html">BOOK ONLINE</a></li>
                        <li><a href="/shop_now.html">SHOP NOW</a></li>
                        <li><a href="login_in.html" class="btn-light">LOG IN/SIGN UP</a></li>
                    </ul>
                </div>
                <!-- there is the end of navigator menu -->
    <!-- Login Form -->
    <div class="former-wrap">
        <h1>Login</h1>
        <form action="{{ route('login') }}" method="POST">
            @csrf <!-- Laravel's CSRF protection -->
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <input type="submit" value="Login">
        </form>

        <!-- Sign Up Form -->
        <h1>Sign Up</h1>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <label for="newemail">Email:</label>
            <input type="email" id="newemail" name="email" required>
            <br>
            <label for="newpassword">Password:</label>
            <input type="password" id="newpassword" name="password" required>
            <br>
            <label for="confirmpassword">Confirm Password:</label>
            <input type="password" id="confirmpassword" name="password_confirmation" required>
            <br>
            <input type="submit" value="Sign Up">
        </form>
    </div>

    <!-- Footer -->
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
                <li><h1>Telephone</h1></li>
                <li class="wtf"><a href="#"><h3 class="call">694525238652</h3></a></li>
            </ul>
        </div>
    </div>

    <!-- JS File -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
