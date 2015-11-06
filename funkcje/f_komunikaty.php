<?php
// Plik zawiera funkcje wyświetlające komunikaty z informacjami, błędami, itp

// wyświetla ogólny komunikat
// $tresc - treść komunikatu
// $kolor - kolor komuniatu (success, info, danger, warning, itp)
function komunikat($tresc, $kolor="info")
{
    echo '<div class="alert alert-'.$kolor.'" role="alert">'.$tresc.'</div>';
}