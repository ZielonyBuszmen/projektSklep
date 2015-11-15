<?php
// Funkcje do panelu pracownika

// Sprawdza, czy ktoś przypadkiem aby nie przetwarza zamowienia
// zwraca true, jeśli jest przetwarzanie
// zwraca false, jeśli nic nie jest przetwarzane
function czy_przetwarza($id_usera)
{
    // musimy sprawdzić, czy w tabeli 'sprzedaz' ktoś nie nadał polu 'potwierdzenie' wartosci "czeka"
    // jeśli tak, to sprawdzamy, czy to ten user. Jeśli to ten user, to puszczamy
    // w preciwnym wypadku nie puszczamy i wyświetlamy komunikat o przetwarzaniu danych
    
    // mądre zapytanie SQL powinno wszystko ładnie rozjaśnić co i jak
    $wynik = mysql_query("SELECT * FROM sprzedaz GROUP BY id_zamowienia HAVING potwierdzenie='czeka' AND id_pracownika_co_weryfikowal!={$id_usera}") or die ("Zdechłem na zawał przetwarzania");
    if (mysql_num_rows($wynik) > 0)
    {   // jeśli znaleźliśmy kogoś, kto przetwara zamowienie i to nie my to zwracamy false
        return FALSE;
    }
    else if (mysql_num_rows($wynik) == 0)
    {   // w przeciwnym wypadku zwracamy true, bo nikt nie przetwarza
        return TRUE;
    }
}

// funkcja sprawdza czy dany uzytkownik niczego nie przetwarza. 
// jeśli tak, zwraca true
// w przeciwnym wypadku zwraca false
function czy_ja_cos_przetwarzam($id_usera)
{
    $wynik = mysql_query("SELECT * FROM sprzedaz GROUP BY id_zamowienia HAVING potwierdzenie='czeka' AND id_pracownika_co_weryfikowal={$id_usera}") or die ("Zdechłem na zawał przetwarzania");
    if (mysql_num_rows($wynik) > 0)
    {   // jeśli nasz uzytkownik przetwarza zamowienie, zwracamy true
        return TRUE;
    }
    else if (mysql_num_rows($wynik) == 0)
    {   // w przeciwnym wypadku zwracamy false, jeśli nic nie przetwarzamy
        return FALSE;
    }
}