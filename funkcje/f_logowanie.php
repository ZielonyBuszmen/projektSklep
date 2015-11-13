<?php
// Zawiera funkcje do logowania i wylogowywania użytkowników

// funkcja zwraca TRUE, jeśli użytkownik jest zalogowany. W przeciwnym wypadku FALSE
function zalogowany()
{
   if (isset($_SESSION['zalogowany']) && $_SESSION['zalogowany']==TRUE)
   {
       return TRUE;
   }
   else 
   {
       return FALSE;
   }
}
function zalogowano() { return zalogowany(); }

// sprawdza, czy zalogowany jest pracownik. Zwraca TRUE, jeśli tak. W przeciwnym wypadku FALSE
function pracownik()
{
   if(zalogowany())
   {
        if (isset($_SESSION['typ']) && $_SESSION['typ']=="p")
        {
            return TRUE;
        }
        else 
        {
            return FALSE;
        }
    }
   else 
   {
       return FALSE;
   }
}

// sprawdza, czy zalogowany jest zwykly uzytkownik (klient)
function user()
{
   if(zalogowany())
   {
        if (isset($_SESSION['typ']) && $_SESSION['typ']=="u")
        {
            return TRUE;
        }
        else 
        {
            return FALSE;
        }
    }
   else 
   {
       return FALSE;
   }
}

// taka sama funkcja, inna nazwa
function klient() { return user(); }



// funkcja loguje użytkownika, przyjmuje $login i $haslo
// jeśli $_SESSION['zalogowany'] == TRUE, znaczy że zalogowano. W przeciwnym wypadku nie
// w przeciwnym wypadku zwraca komunikat o błędzie lub niepowodzeniu
function zaloguj($login, $haslo)
{
    // konwersja tekstu na "bezpieczny" dla bazy danych (by nie bylo sql injectow itp)
    $haslo = addslashes($haslo);
    $login = addslashes($login);
    $login = htmlspecialchars($login);
    //inicjujemy tablę na ewentualne błędy
    $bledy;

     // sprawdzenie czy istnieje uzytkownik o takim nicku i hasle
     $czy_zaloguje = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM uzytkownicy WHERE login = '$login' AND haslo = '$haslo'")); 

     // jesli nie ma takiego loginu albo haslo sie nie zgadza, wyswietlamy blad
    if ($czy_zaloguje[0] == 0) 
    {
        $bledy[] = 'Niepoprawne dane logownia!';
    } 
      // jesli wszystko ok, to logujemy
    else 
    {
          // po zalogowaniu przypisanie waznych danych do sesji
        $_SESSION['zalogowany'] = TRUE;
        $_SESSION['login'] = $login;

        // odczytujemy najwazniejsze dane z bazy i przypisujemy do zmiennych sesyjnych
        $wynik = mysql_query("SELECT * FROM uzytkownicy WHERE login = '$login' AND haslo = '$haslo'");
        while($r = mysql_fetch_assoc($wynik)) 
        {
            $_SESSION['typ'] = $r['typ'];
            $_SESSION['id_usera'] = $r['id'];    
            // $_SESSION['imie'] = $r['imie'];
            // $_SESSION['nazwisko'] = $r['nazwisko'];
        }   

        // jesli user jest zablokowany, nie pozwolamy logowac
        if ($_SESSION['typ']=="blocked") 
        {
            // zerowanie tablicy z bledami i przypisanie bledu
            $bledy = "";
            $bledy[] = "Jestes zablokowany";
            //usuwamy sesje
            $_SESSION = array();
            if (isset($_COOKIE[session_name()]))
                setcookie(session_name(), '', time()-42000, '/');
                session_destroy();
                //zakończenie funkcji, zwrócenie błędu
            return $bledy;
        }
    }
    // zwrócenie tablicy z błędami
    return $bledy;
}
