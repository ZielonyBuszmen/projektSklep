<?php
// wyświetla listę produktów, które należa do danych kryteriów

// jeśli jakie kolwiek kryterium jest rowne 0, wyświetlamy wszystko bez filtrowania
// przypisanie wartosci domyslnych
$kategoria = 0;
$cena_min = 0;
$cena_max = 0;
// jeśli jest przesylana kategoria, do zmiennej kategoria przypisujemy odpowiednią wartosc
if (isset($_GET['kat']) && $_GET['kat']>0)
{
    $kategoria = $_GET['kat'];
}
// jeśli jest przesylana cena, przypisujemy ją do odpowiedniej zmiennej
// cena minimalna
if (isset($_POST['cena_min']) && $_POST['cena_min']>0)
{
    $cena_min = $_POST['cena_min'];
}
// cena maksymalna
if (isset($_POST['cena_max']) && $_POST['cena_max']>0)
{
    $cena_max = $_POST['cena_max'];
}

// wyswietlenie tabeli z produktami
//echo '<div class="row">';
// funkcja, która pobiera przefiltrowane dane i wyświetla w zależności od ich podanych
w_produkty_kafelki($kategoria, $cena_min, $cena_max);
//echo '</div>';
?>