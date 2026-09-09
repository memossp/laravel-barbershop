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
    <link rel="stylesheet" href="{{ asset('css/about.css') }}" />
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
                <div class="main-content-barber">
                    <img src="/image/barber-in-use.svg" class="in-use">
                    <div class="paragraph">
                        <h1>BARBER SHOP</h1>
                        <p> Στο Master Barber είμαστε ένα παραδοσιακό και αυθεντικό μπαρμπέρικο με όραμα την αναβίωση του παλιού κουρείου μέσα από ποιοτικές υπηρεσίες, εξειδικευμένα προϊόντα περιποίησης και μια ζεστή ατμόσφαιρα.
                            Απευθυνόμαστε σε όλους τους ανθρώπους, μικρούς και μεγάλους, που αγαπάνε την φιλοσοφία μας, τις υπηρεσίες μας και τους ανθρώπους μας.
                            Εξειδικευόμαστε σε κλασικά κουρέματα, παραδοσιακό ξύρισμα με καυτές πετσέτες και περιποίηση γενειάδας.
                            Η εξυπηρέτηση των πελατών μας γίνεται κατά προτεραιότητα των ραντεβού.
                            Διαθέτουμε 24ωρο online ραντεβού.</p>
                    </div>
                </div>
            </div>
        </header>
                <!-- here ENDS About First CONTENT -->

                <!-- here START About SECOND CONTENT -->
                <div class="wrapper">
                        <div class="employee-content-barber">
                            <h1>HEAD BARBER/OWNER</h1>
                            <img src="/image/barber_portrait.jpg" class="portrait"><br>
                            <div class="paragraph_emp">
                                <h1>Ιωαννης Ιωαννης</h1>
                                <p> Στο Master Barber είμαστε ένα παραδοσιακό και αυθεντικό μπαρμπέρικο με όραμα την αναβίωση του παλιού κουρείου μέσα από ποιοτικές υπηρεσίες, εξειδικευμένα προϊόντα περιποίησης και μια ζεστή ατμόσφαιρα.
                                    Απευθυνόμαστε σε όλους τους ανθρώπους, μικρούς και μεγάλους, που αγαπάνε την φιλοσοφία μας, τις υπηρεσίες μας και τους ανθρώπους μας.
                                    Εξειδικευόμαστε σε κλασικά κουρέματα, παραδοσιακό ξύρισμα με καυτές πετσέτες και περιποίηση γενειάδας.
                                    Η εξυπηρέτηση των πελατών μας γίνεται κατά προτεραιότητα των ραντεβού.
                                    Διαθέτουμε 24ωρο online ραντεβού.</p>
                            </div>
                        </div>
                </div>
                <!-- here END About SECOND CONTENT -->

                <!-- here START About THIRD CONTENT -->
                <div class="wrapper">
                    <div class="services">
                        <div class="services-left">
                            <H2>Κούρεμα | CUT </H2>
                                Κούρεμα απλό ή με σβήσιμο.
                                Haircut with or without fade.
                            <h2>RAZOR FADE CUT</h2>
                                Κούρεμα με σβήσιμο.
                                Fade haircut, ultra skin fade.
                            <h2>SHAVER FADE</h2>
                                Κούρεμα με σβήσιμο.
                                Haircut with shaver fade.
                            <h2>DON’s Experience - HAIRCUT AND GROOMING</h2>
                                Η απόλυτη περιποίηση.
                                Αρχικά γίνεται λούσιμο, ακολουθεί το Κούρεμα επιλογής και οι λεπτομέρειες<br> γίνονται με φαλτσέτα. Στο τέλος γίνεται δεύτερο λούσιμο και styling.
                                Η υπηρεσία αυτή συνδυάζεται με Παραδοσιακό ξύρισμα με ζεστές/ κρύες κομπρέσες Ή περιποίηση γενειάδας.
                        </div>
                        <div class="services-right">
                            <h2>Παραδοσιακό Ξύρισμα | TRADITIONAL SHAVE</h2>
                                Η απόλυτη εμπειρία χαλάρωσης και περιποίησης.
                                Μασάζ με ζεστό αφρό στην γενειάδα, καυτή κομπρέσα ώστε να μαλακώσουν οι τρίχες, να ανοίξουν οι πόροι και να ετοιμαστεί <br> 
                                το δέρμα για το ξύρισμα με φαλτσέτα. Ολοκληρώνεται με κρύα κομπρέσα και after shave/balm.
                            <h2>Ξύρισμα κεφαλής | HEAD RAZOR SHAVE</h2>
                                Μασάζ με ζεστό αφρό στην κεφαλή, καυτή κομπρέσα, ώστε να μαλακώσουν οι τρίχες, να ανοίξουν οι πόροι και να ετοιμαστεί το δέρμα για το ξύρισμα με φαλτσέτα.<br> Ολοκληρώνεται με κρύα κομπρέσα και after shave/balm.
                            <H2>Τριμάρισμα γενειάδας | BEARD TRIMMING</H2>
                                Τριμάρισμα γενειάδας με μηχανή και σχηματισμός λεπτομερειών με τρίμερ.
                                Beard oil ή beard conditioner.
                            <H2>Περιποίηση γενειάδας | BEARD GROOMIG</H2>
                            Αρχικά γίνεται περιποίηση της γενειάδας με ειδικά προϊόντα και καυτή πετσέτα ώστε να μαλακώσουν οι τρίχες , να ανοίξουν οι πόροι και να γίνει βαθύς καθαρισμός. <BR>Ακολουθεί κούρεμα ή σχηματισμός γενειάδας. Οι λεπτομέρειες γίνονται με τριμερ ή φαλτσέτα. Στο τέλος χρησιμοποιούμε beard oil ή beard conditioner/after shave.
                        </div>
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