@extends('layouts.main')

@section('title', 'About Us')

@section('additional_css')
    <link rel="stylesheet" href="{{ asset('css/about.css') }}" />
@endsection

@section('content')
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

    <div class="services">
        <div class="services-left">
            <h2>Κούρεμα | CUT</h2>
            Κούρεμα απλό ή με σβήσιμο.
            Haircut with or without fade.
            <h2>RAZOR FADE CUT</h2>
            Κούρεμα με σβήσιμο.
            Fade haircut, ultra skin fade.
            <h2>SHAVER FADE</h2>
            Κούρεμα με σβήσιμο.
            Haircut with shaver fade.
            <h2>DON's Experience - HAIRCUT AND GROOMING</h2>
            Η απόλυτη περιποίηση.
            Αρχικά γίνεται λούσιμο, ακολουθεί το Κούρεμα επιλογής και οι λεπτομέρειες<br> γίνονται με φαλτσέτα. Στο τέλος γίνεται δεύτερο λούσιμο και styling.
            Η υπηρεσία αυτή συνδυάζεται με Παραδοσιακό ξύρισμα με ζεστές/ κρύες κομπρέσες Ή περιποίηση γενειάδας.
        </div>
        <div class="services-right">
            <h2>Παραδοσιακό Ξύρισμα | TRADITIONAL SHAVE</h2>
            <!-- Rest of the services content -->
        </div>
    </div>
@endsection
