<?php
/*
 * wyświetla listę produktów, które należą do danych kryteriów 
 * (wybranych w pliku kategorie.php i przesłane przez pasek adresu)
 */

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

// NUMEROWANIE STRON OD 1
// zmienne "huby"
if (isset($_GET['str']) && $_GET['str']!="")
{
    $h_str = $_GET['str'];
}
else $h_str = 0;

if (isset($_GET['liczba_na_strone']) && $_GET['liczba_na_strone']!="")
{
    $h_liczba_na_strone = $_GET['liczba_na_strone'];
}
else $h_liczba_na_strone = 0;

// stworzenie linku
$cc3 = "?liczba_na_strone={$h_liczba_na_strone}&str={$h_str}&kat={$h_kat}";

// wyswietlenie tabeli z produktami
// funkcja, która pobiera przefiltrowane dane i wyświetla listę produktów w zależności od podanych danych
w_produkty_kafelki($kategoria, $cena_min, $cena_max, $h_liczba_na_strone, $h_str); 
?>