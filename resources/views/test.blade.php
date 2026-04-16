    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Barber')</title> <!-- Dynamically setting the title -->

    <!-- Linking CSS files from the public/css directory -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/media.css') }}"/>
</head>

<body>
<!-- begin navigator manu -->
<header>
    <div class="wrapper">
        <nav>
            <div class="logo">
                <a href="{{ route('test') }}">
                    <img src="{{ asset('image/logo.svg') }}" alt="master barber"/>
                </a>
            </div>
            <ul>
                <li>
                    <a href="{{ route('about') }}"> ABOUT </a>
                </li>
                <li>
                    <a href="{{ route('bookings.create') }}"> BOOK ONLINE</a>
                </li>
                <li>
                    <a href="{{ route('products.index') }}">SHOP NOW</a>

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
                <!-- begin hero section -->
                 <div class="hero-section">
                    <container class="hero-top">
                         <img src="image/her-top.svg" class="hero-image"/>
                    </container>
                    <container class="hero-bottom">
                        <h2>When the grooming combined with Art then</h2><br>
                        <h1>Master Barber</h1><h3>have been created</h3>
                    </container>
                </div>
            </div>
        </header>
        <!-- end of the hero section -->
        <!-- Begin fisrt content -->
        <div class="wrapper">
            <section class="content-first">
                <div class="card">
                        <img src="image/card.svg" alt="">
                        <a href="intex.html" class="btn-card1" >  BOOK  NOW  </a>
                </div>
                    <img src="image/hearcut.svg" alt="copyright master barber" class="heaircut-img">
           </section>
        </div>
        <!-- end first content -->
        <!-- begin second content -->
        <div class="wrapper">
            <section class="content-second">
                <div class="second-left">
                    <img src="image/tayilors.svg" alt="copyright master barber">
                </div>
                <div class="card">
                    <img src="image/card2.svg">
                    <a href="intex.html" class="btn-card2">  SHOP NOW</a>
                </div>
           </section>
        </div>
        <!-- end second section  -->
        <!-- starts footer -->
        <div class="footer">
            <div class="footer-right">

                <ul class="social">
                    <li><h1>CONTACT US:</h1></li>
                    <li><a href="#">  <h3 class="facebook">Master Barber</h3></a></li>
                    <li><a href="#">  <h3 class="instagram">@MasterBarber</h3></a></li>
                </ul>
            </div>
            <div class="telephone">
                    <ul class="tele">
                        <li><h1 >telephone</h1></li>
                        <li class="wtf"><a href="#"><h3 class="call">694525238652</h3></a></li>
                    </ul>
            </div>
        </div>
        <!-- end footer -->
        <Script src="js/main.js"></script>
    </body>
</html>
