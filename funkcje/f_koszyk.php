<?php
/*
 * zawiera funkcje związane z koszykiem
 */

// wyświetla miniaturowy spis przedmnitów w koszyku
// spis wyświetla się jako DROPDOWN na górnej belce
function w_pokaz_koszyk_dropdown()
{
    // wyświetlenie menu DROPDOWN
    echo '<li class="dropdown">';
    echo '<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Koszyk ('.sprawdz_liczbe_w_koszyku().') <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a>';
    echo '<ul class="dropdown-menu">';
    
    // wyświetlenie produktów w koszyku
    // jeśli koszyk pusty, wyświetlamy że koszyk jest pusty
    if(!isset($_SESSION['koszyk']) || @$_SESSION['koszyk'][0]['id_produktu']=="")
    {
        echo '<li><a>Koszyk pusty!</a></li>';
    }
    // jeśli jednak coś w koszyku jest, to to wyświetlamy
    else
    {
        foreach($_SESSION['koszyk'] as $idd)
        {
            //$cena_cala = $idd['ilosc'] * $idd['cena'];
            echo "<li> - {$idd['nazwa']} ({$idd['ilosc']} szt.)</li>";
        }
    }
    echo '<li><a href="?v=tresc/koszyk/duzy_koszyk"><b>Przejdź do całego koszyka</b></a></li>';
    
    // zakończenie menu DROPDOWN
    echo '</ul>';
    echo '</li>';
}


// funkcja sprawdza, czy można dodać przedmiot do koszyka
// gdy przedmiotu nie ma na stanie, nie da się go dodać do koszyka - funkcja zwraca FALSE
// jeśli przedmiot jest na stanie - funkcja zwraca TRUE
function sprawdz_czy_mozna_dodac($id_produktu)
{   // pobieramy odpowiedni produkt z bazy
    $wynik = mysql_query("SELECT * FROM `produkty` WHERE id_produktu={$id_produktu}");
    while($r = mysql_fetch_assoc($wynik)) 
    {   // przypisujemy ilość produktu do zmiennej ilosc
        $ilosc = $r['ilosc'];
    }
    if (($ilosc - ilosc_danego_produktu_w_koszyku($id_produktu))>0) return TRUE; // jeśli ilość jest na plusie, zwracamy TRUE
    else if(($ilosc - ilosc_danego_produktu_w_koszyku($id_produktu)) <=0) return FALSE; // jeśli ilość jest na minusie lub równa 0, zwracamy FALSE
    // co robi działanie ($ilosc - ilosc_produktu_w_koszyku($id_produktu))? Otóż te działanie matematyczne odejmuje produkty dodane w koszyku. 
    // Dzięki temu w koszyku nie może być więcej produktów tego typu niż jest w magazynie
}


// zwraca liczbę przedmiotów w koszyku
// jeśli 0, znaczy że koszyk jest pusty
function sprawdz_liczbe_w_koszyku()
{
    $wynik = 0;
    if (isset($_SESSION['koszyk']))
    {
        $wynik = count($_SESSION['koszyk']);
    }
    else $wynik = 0;
    return $wynik;
}

// funkcja zwraca ilosc danego produktu w koszyku
function ilosc_danego_produktu_w_koszyku($id_produktu)
{
    for($i = 0; $i<sprawdz_liczbe_w_koszyku(); $i++) // przechodzimy przez każdy element
        {   // sprawdzamy, czy istenieje taki produkt w koszyku
            if ($_SESSION['koszyk'][$i]['id_produktu'] == $id_produktu) 
            {   // jeśli istnieje, zwracamy jego ilosc
                return $_SESSION['koszyk'][$i]['ilosc'];
            }
        }
    return 0; // jeśli produktu nie ma, zwracamy 0
}


// funkcja dodaje produkt do koszyka
// zwraca TRUE, jeśli dodawanie się powiedzie. W przeciwnym wypadku FALSE
function dodaj_do_koszyka($id_produktu)
{   // sprawdzamy najpierw, czy uda nam się dodać produkt do koszyka
    if(sprawdz_czy_mozna_dodac($id_produktu)==TRUE)
    {   // jeśli tak, przypisujemy dane do kolejnej pozycji w tablicy koszyka
    
        // sprawdzamy, czy już danego przedmiotu nie ma w koszyku. Jeśli jest, zwiększamy jego ilość w jednej ze zmiennych
        for($i = 0; $i<sprawdz_liczbe_w_koszyku(); $i++) // przechodzimy przez każdy element
        { 
            if ($_SESSION['koszyk'][$i]['id_produktu'] == $id_produktu) // sprwaedzamy, czy istnieje już taki produkt w koszyku
            { 
                echo $_SESSION['koszyk'][$i]['ilosc']++; // jeśli tak, zwiększzamy jego ilość i wychodzimy z funkcji
                return TRUE;
            }
        }
        
        // odczytujemy ile jest w tablicy koszyk elementow.
        // liczba elementów jest zawsze większa o 1 od ostatniego indeksu
        // możemy użyć tej informacji i użyć liczby elementów jako następnego indeksu
        $indeks = sprawdz_liczbe_w_koszyku();
        
        // zapytanie do bazy, by pobrac info o przedmiotach wrzucanych do koszyka
        $wynik = mysql_query("SELECT * FROM `produkty` WHERE id_produktu={$id_produktu}");
        while($r = mysql_fetch_assoc($wynik)) 
        {   // przypisujemy dane do zmiennych sesyjnych koszyka
            $_SESSION['koszyk'][$indeks]['id_produktu'] = $id_produktu;
            $_SESSION['koszyk'][$indeks]['nazwa'] = $r['nazwa'];
            $_SESSION['koszyk'][$indeks]['cena'] = $r['cena'];
            $_SESSION['koszyk'][$indeks]['ilosc'] = 1;
            // ETC ETC
            // mozemy dodać dalsze zmienne, jakie mają być przechowywane
            return TRUE;
        }
    }
    // gdy dodawanie się nie powiodło, zwracamy FALSE
    return FALSE;
}

// usuwamy produkt z koszyka
function usun_z_koszyka($id_produktu)
{ 
    unset($_SESSION['koszyk'][$id_produktu]);
    refresh_koszyka();
}

// zwraca sumę wartości przedmiotów w koszyku
function koszyk_suma()
{
    $suma = 0;
    // przechodzi przez wszyskie elementy koszyka
    foreach($_SESSION['koszyk'] as $idd)
    {
        $wiersz = $idd['cena']*$idd['ilosc']; // mnoży cenę i ilość, przypisuje do wiersza
        $suma += $wiersz; // wiersz jest dodawany do całościowej sumy
    }     
    return $suma;
}

// usuwa koszyk
function usun_koszyk()
{
    unset($_SESSION['koszyk']); // usuwa zmienną sesyjną z koszykiem
}

// zwraca cenę danego zamówienia
function cena_zamowienia($id_zamowienia, $id_usera)
{
    $cena = 0;
    $wynik = mysql_query("SELECT produkty.cena, sprzedaz.ilosc FROM sprzedaz INNER JOIN produkty ON produkty.id_produktu = sprzedaz.id_produktu WHERE id_zamowienia=$id_zamowienia AND id_uzytkownika=$id_usera");
    while($r = mysql_fetch_assoc($wynik))
    {
        $cena += $r['cena']*$r['ilosc'];
    }
    return $cena;
}

// odświeża koszyk (czyli prebudowywuje jego tablicę, by była jak nowa) 
function refresh_koszyka()
{
    $i = 0;
    $temp;
    foreach($_SESSION['koszyk'] as $idd)
    {
        $temp[$i]=$idd;
        $i++;
    }
    usun_koszyk();
    for($c = 0; $c<count($temp);$c++)
    {
        $_SESSION['koszyk'][$c] = $temp[$c];
    }  
}