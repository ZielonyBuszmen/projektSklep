<?php
/*
 * funkcja wylogowywująca
 * plik STAND ALONE, nie może być includowany
 */ 
function wyloguj()
{
    // na wszelki wypadek ustawiamy ważne zmienne sesyjne na przeciwne wartości
    $_SESSION['zalogowany']=FALSE;
    $_SESSION['id_usera']=0;
    // na wszelki wypadek usuwamy zmienne sesyjne
    unset($_SESSION['zalogowany']);
    unset($_SESSION['typ']);
    // niszczymy sesje
    $_SESSION = array();
    if (isset($_COOKIE[session_name()]))
        setcookie(session_name(), '', time()-42000, '/');
    // koniec sesji
    session_destroy();
    return TRUE;
}

// sprawdzamy, czy przesłano żądanie do wylogowania
if (isset($_GET['wyloguj']) && $_GET['wyloguj']=="tak")
{   // sprawdzamy czy wologowanie się powiodło
    if(wyloguj())
    {   // jeśli wylogowanie się powiodło, przekierowywujemy do strony głównej i wyświetlamy tam komunikat
        header("Location: ../../index.php?wylogowano=tak");
    }
}
?>