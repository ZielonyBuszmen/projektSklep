<!--- Jest to główny plik panelu zarządzania pracownika
      Z lewej strony zawiera menu
      Z prawej strony wyświetlają się podstrony
--->
<div style="padding:0 20px 20px 20px;"><h1>Panel pracownika</h1></div>
<div id="z_panel_menu_lewe" class="col-md-3">
    <ul class="nav nav-pills nav-stacked thumbnail">
        <?php
        // $plik to adres do tego pliku. Zrobiono dla wygody
        $plik = "?v=tresc/p_zarzadzanie/p_panel";
        $lox = "tresc/p_zarzadzanie/";
        // przyciski do podstron
        standardowy_przycisk("{$plik}&prawa={$lox}p_nowe_zamowienia", "Nowe zamówienia");
        standardowy_przycisk("{$plik}&prawa={$lox}p_zamowienia_przetwarzane", "Zamówienia przetwarzane");
        standardowy_przycisk("{$plik}&prawa={$lox}p_zamowienia_archiwalne", "Zamowienia archiwalne");
        echo '<hr>';
        standardowy_przycisk("{$plik}&prawa={$lox}p_dodaj_nowy_produkt", "Dodaj nowy produkt");
        standardowy_przycisk("{$plik}&prawa={$lox}p_lista_produktow", "Zarządzaj produktami");
        
        ?>
    </ul>
</div>
<div id="z_panel_tresc_prawa" class="col-md-9">
    <div class="thumbnail">
    <?php
    // dołączmy plik z $_GET['prawa']
    dolacz_plik("prawa", "{$lox}p_nowe_zamowienia"); 
    ?>
    </div>
</div>