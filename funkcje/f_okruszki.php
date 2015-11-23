<?php
/*
 * Funkcje, które wyświetlają pasek okruszków (czyli ścieżkę dostępu)
 */

// funkcja wyświetla ścieżkę dostępu
// pobiera dowolną ilość argumentow tekstowych (okruszków)
// wyświetla ściężkę z nich zbudowaną 
function okruszki()
{   // rozpoczęcie wyświetlania ścieżki
    echo '<ol class="breadcrumb">';
    // pobranie ilości argumentów
    $numargs = func_num_args();
    // lista z argumentami
    $arg_list = func_get_args();
    // pętla przechodząca przez wszystkei argumenty
    for ($i = 0; $i < $numargs; $i++)
    {   // jeżeli to ostatni argument, dajemy go do klasy active
        if (($i+1)==$numargs)
        {
            echo '<li class="active">';
            echo $arg_list[$i];
            echo '</li>';
        }
        else // w przeciwnym wypadku wyświetlamy jako zwykły argument
        {
            echo '<li>';
            echo $arg_list[$i];
            echo '</li>';
        }
    }
    echo '</ol>'; // zakonczenie wyswietlania ściezki
}

// zwraca główną stronę
function okruch_index()
{
    return "<a href='index.php'>Strona główna</a>";
}

// zwraca link do kategorii wraz z nazwą
function okruch_kategoria($id_kategorii)
{
    return '<a href="?kat='.$id_kategorii.'">'.nazwa_kategorii($id_kategorii).'</a>';
}

// zwraca link do produktu wraz z nazwą
function okruch_produkt($id_produktu, $nazwa_produktu)
{
    return '<a href="?v=tresc/karta_produktu/karta_produktu&id_produktu='.$id_produktu.'">'.$nazwa_produktu.'</a>';
}