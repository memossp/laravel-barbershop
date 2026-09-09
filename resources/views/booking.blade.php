<!DOCTYPE html>
<html lang="en" , lang="el">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Barber')</title> <!-- Dynamically setting the title -->

    <!-- Linking CSS files from the public/css directory -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/media.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/book_now.css') }}" />
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
                <!-- here start About First CONTENT -->
                <div class="wrapper">
                <div class="former-wrap">
                    <h1>Barbershop Booking Form</h1>
                    <form action="booking.php" method="POST">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" required>
                        <br>
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                        <br>
                        <label for="phone">Phone:</label>
                        <input type="tel" id="phone" name="phone" required>
                        <br>
                        <label for="date">Preferred Date:</label>
                        <input type="date" id="date" name="date" required>
                        <br>
                        <label for="time">Preferred Time:</label>
                        <input type="time" id="time" name="time" required>
                        <br>
                        <label for="services">Services:</label>
                            <div class="cuts">
                                <div class="cuts-col">
                                    <label for="haircut">Haircut 12 $</label>
                                    <input type="checkbox" id="shave" name="services[]" value="shave">
                                </div>
                                <div class="cuts-col">
                                    <label for="shave">Shave 6$</label>
                                    <input type="checkbox" id="beardtrim" name="services[]" value="beardtrim">
                                </div>
                                <div class="cuts-col">
                                    <label for="beardtrim">Beard Trim 6$</label>
                                    <input type="checkbox" id="beardtrim" name="services[]" value="beardtrim">
                                </div>
                            </div>
                        <br>
                        <label for="comments">Comments:</label>
                        <textarea id="comments" name="comments"></textarea>
                        <br>
                        <input type="submit" value="Book Now">
                    </form>
                </div>
            </div>
                
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