<?php
// funkcje wyświetlające produkty

// wyświetla widget z produktem (np do listy produktów na stronie głównej)
function w_produkt_kafelek($id)
{
    $zapytanie = "SELECT * FROM `produkty` WHERE id_produktu={$id}";
    $folder_obrazkow='img/produkty';
    $height = 120;
    echo '<div class="thumbnail">'
          .'<div class="caption" style="text-align: center;">'
          .'';
    $wynik = mysql_query($zapytanie);
    while($r = mysql_fetch_assoc($wynik)) 
    {
        echo "<a href='?v=tresc/karta_produktu/karta_produktu&id_produktu={$r['id_produktu']}'>";
        echo "<img src='{$folder_obrazkow}/{$r['obrazek']}' style ='height:{$height}px; ' >";
        echo "{$r['nazwa']}</a><br>";
        echo "{$r['cena']} zł<br>";
        echo "<a class='btn btn-default btn-sm'"
            . "href='?v=tresc/koszyk/dodaj_do_koszyka&id_produktu={$r['id_produktu']}'>" 
            . "Dodaj do koszyka</a>";
    }
     
    echo '</div>'
          .'</div>';
}


// wyświetla wszystkie prdukty (kafelki)  z kategorii $id_kategorii
// jeśli $id_kategorii jest równe 0, wyświetla wszystko
// $cena_min i max to zakres cenowy. 0 oznacza brak zakresu
function w_produkty_kafelki($id_kategorii, $cena_min=0, $cena_max=0)
{
    // jeżeli $id_kategorii jest rowne 0, wyświetlamy wszystko
    if ($id_kategorii==0) $zapytanie = "SELECT * FROM `produkty` WHERE cena >= {$cena_min}";
    // jesli $id_kategorii jest większe od 0, wyświetlamy tylko daną kategorie
    else if ($id_kategorii>0) $zapytanie ="SELECT * FROM `produkty` WHERE kategoria={$id_kategorii} AND cena >= {$cena_min}";
    if ($cena_max>0) $zapytanie.=" AND cena <= {$cena_max}";
    
    // kilka zmiennych "globalnych"
    $folder_obrazkow='img/produkty';
    $height = 120; // wysykosc zdjecia
    $col_md = 3; // szerokość "kafelka" z produktem
    
    $wynik = mysql_query($zapytanie); // zapytanie do bazy danych
    $i = 0; // potrzeba zmienna $i, by sprawdzac, co ile "przełamać" linię
    while($r = mysql_fetch_assoc($wynik)) 
    {   // rozmiarówka kafelka
        echo '<div class="col-md-'.$col_md.'">';
        // rozpoczenie miniatury
        echo '<div class="thumbnail">'
        .'<div class="caption" style="text-align: center;">';
        
        // linki do karty produktu
        echo "<a href='?v=tresc/karta_produktu/karta_produktu&id_produktu={$r['id_produktu']}'>";
        echo "<img src='{$folder_obrazkow}/{$r['obrazek']}' style ='height:{$height}px; ' >";
        echo "{$r['nazwa']}</a><br>";
        echo "{$r['cena']} zł<br>";
        echo "<a class='btn btn-default btn-sm'"
            . "href='?v=tresc/koszyk/dodaj_do_koszyka&id_produktu={$r['id_produktu']}'>" 
            . "Dodaj do koszyka</a>"; // przycisk do dodawania do koszyka
             echo '</div>';
           
             // TO SIE MOZE ROZWALIC
             // PRZEZ źle zamknięte </div>
             // być może powunny być wyżej
     
        if ($i % 3 == 0) echo '</div><div class="row">';
        $i++;  
         
            echo '</div>' // to te divy, co mogą robić problemy
          .'</div>';
    }
}

// zwraca liczbę produktów w sklepie
function liczba_produktow()
{
    $wynik = mysql_query("SELECT * FROM produkty");
    $liczba = mysql_num_rows($wynik);
    return $liczba;
}

// zwraca nazwę kategorii produktu
function nazwa_kategorii($id_kategorii)
{
    $wynik = mysql_query("SELECT nazwa FROM kategorie WHERE id_kategorii={$id_kategorii}");
    while($r = mysql_fetch_assoc($wynik)) 
    {
        return $r['nazwa'];
    }
}