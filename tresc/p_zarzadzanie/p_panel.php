<!--- Jest to główny plik panelu zarządzania pracownika
      Z lewej strony zawiera menu
      Z prawej strony wyświetlają się podstrony
--->
<?php
if (!pracownik()) // jeśli to nie pracownik, przerywamy skrpyt
{
    komunikat("Dostęp tylko dla pracownika");
    return;
}
    echo '<div class="row">';
    okruszki(okruch_index(), "<a href='?v=tresc/p_zarzadzanie/p_panel'>Panel pracownika</a>");
    echo '</div>';

    // sprawdzamy, czy inny pracownik nie przetwarza zamówienia.
    // jeśli tak, to przerywamy cały skrypt
    // funkcja zwraca true, jak nikt inny nie przetwarza
    // natomiast funkcja zwraca false, jeśli ktoś inny przetwarza
    if (!czy_przetwarza($_SESSION['id_usera']))
    {
        // ktoś, kto nie jest nami przetwarza zamówienie. Return!
        komunikat("Trwa przetwarzanie zamówień przez innego pracownika");
        return;
    }
    // sprawdzamy, czy nasz użytkownik coś przetwarza
    if (czy_ja_cos_przetwarzam($_SESSION['id_usera']))
    {
        komunikat("Uwaga! Przetwarzasz zamówienie. Zakończ ten proces jak najszybciej, gdyż inni pracownicy nie mogą zająć się innymi zamówieniami<a href='?v=tresc/p_zarzadzanie/p_panel&prawa=tresc/p_zarzadzanie/z_moje/p_zamowienia_przetwarzane'> Zobacz </a>", "warning");
    }
    
?>
<div class="row">
<h1>Panel pracownika</h1>
<div id="z_panel_menu_lewe" class="col-md-3">
    <ul class="nav nav-pills nav-stacked thumbnail">
        <?php
        // $plik to adres do tego pliku. Zrobiono dla wygody
        $plik = "?v=tresc/p_zarzadzanie/p_panel";
        $lox = "tresc/p_zarzadzanie/";
        // przyciski do podstron
        standardowy_przycisk("{$plik}&prawa={$lox}z_nowe/p_nowe_zamowienia", "Nowe zamówienia");
        standardowy_przycisk("{$plik}&prawa={$lox}z_moje/p_zamowienia_przetwarzane", "Zamówienia przetwarzane");
        standardowy_przycisk("{$plik}&prawa={$lox}z_stare/p_zamowienia_archiwalne", "Zamowienia archiwalne");
        echo '<hr>';
        standardowy_przycisk("{$plik}&prawa={$lox}produkty/p_dodaj_nowy_produkt", "Dodaj nowy produkt");
        standardowy_przycisk("{$plik}&prawa={$lox}produkty/p_lista_produktow", "Zarządzaj produktami");
        
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
</div>