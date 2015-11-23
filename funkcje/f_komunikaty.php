<?php
/*
 * Plik zawiera funkcje wyświetlające komunikaty z informacjami, błędami, itp
*/

// wyświetla ogólny komunikat
// $tresc - treść komunikatu
// $kolor - kolor komuniatu (success, info, danger, warning, itp)
function komunikat($tresc, $kolor="info")
{
    echo '<div class="alert alert-'.$kolor.'" role="alert">'.$tresc.'</div>';
}

// przyjmuje jeden ze stanów zamówienia (tak, czeka, nowy, blocked)
// zwraca ładną ikonkę zamówienia
function zamowienie_komunikat($stan, $wymiar="btn-sm")
{
    if ($stan=="tak") // zamówienie przetworzone i wysłane
    {
        return "<p class='btn btn-success {$wymiar}'>Zrealizowane</p>";
    }
    else if ($stan=="czeka") // zamówienie, którym zajmuje się jakiś pracownik
    {
        return "<p class='btn btn-warning {$wymiar}'>W trakcie przetwarzania</p>";
    }
    else if ($stan=="nowy") // zamówienie nowe, oczekuje na przyjęcie
    {
        return "<p class='btn btn-info {$wymiar}'>Nowe</p>";
    }
    else if ($stan=="blocked") // zamówienie anulowane/przerwane
    {
        return "<p class='btn btn-danger {$wymiar}'>Anulowane</p>";
    }
}