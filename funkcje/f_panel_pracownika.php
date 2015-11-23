<?php
/*
 *  Funkcje do panelu pracownika
 */

// Sprawdza, czy ktoś przypadkiem aby nie przetwarza zamowienia
// zwraca true, jeśli jest przetwarzanie
// zwraca false, jeśli nic nie jest przetwarzane
function czy_przetwarza($id_usera)
{
    // musimy sprawdzić, czy w tabeli 'sprzedaz' ktoś nie nadał polu 'potwierdzenie' wartosci "czeka"
    // jeśli tak, to sprawdzamy, czy to ten user. Jeśli to ten user, to przepuszczamy dalej
    // w przeciwnym wypadku nie przepuszczamy i wyświetlamy komunikat o przetwarzaniu danych
    
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
// jeśli tak (przetwarza), zwraca true
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

// funkcja sprawdza, czy jest tyle towaru w sklepie/magazynie
// zwraca true, jeśli starcza
// zwraca false, jeśli towaru braknie
// $ilosc to wymagana ilosc, ile chcemy zabrac ze sklepu
function czy_starcza_towaru($id_produktu, $ilosc)
{
    $wynik = mysql_query("SELECT * FROM produkty WHERE id_produktu={$id_produktu}");
    while($gg = mysql_fetch_assoc($wynik))
    {   // jesli ilość towaru w magazynie jest mniejsza niz ilość towaru
        if ($gg['ilosc'] < $ilosc) return FALSE;
        else return TRUE;
    }
}

// zwraca ilość danego produktu w bazie
function sprawdz_ilosc_produktu_w_bazie($id_produktu)
{   // pobieramy odpowiedni produkt z bazy
    $wynik = mysql_query("SELECT * FROM `produkty` WHERE id_produktu={$id_produktu}");
    while($r = mysql_fetch_assoc($wynik)) 
    {   // przypisujemy ilość produktu do zmiennej ilosc
        $ilosc = $r['ilosc'];
        return $ilosc;
    }
}