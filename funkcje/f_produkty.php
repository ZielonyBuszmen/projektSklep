<?php
// funkcje wyświetlające produkty

// wyświetla widget z produktem (np do listy produktów na stronie głównej)
function w_produkt_kafelek($id)
{
    $folder_obrazkow='img/produkty';
    $height = 100;
    echo '<div class="thumbnail">'
          .'<div class="caption">'
          .'';
    $wynik = mysql_query("SELECT * FROM `magazyn` WHERE id_produktu={$id}");
    while($r = mysql_fetch_assoc($wynik)) 
    {
        echo "<img src='{$folder_obrazkow}/{$r['obrazek']}' height='{$height}'><br>";
        echo "<center><a href='?v=tresc/karta_produktu/karta_produktu&id_produktu={$r['id_produktu']}'>{$r['nazwa']}</a></center>";
        echo "<center>{$r['cena']} zł</center>";
    }
     
    echo '</div>'
          .'</div>';
}

// zwraca liczbę produktów w sklepie
function liczba_produktow()
{
    $wynik = mysql_query("SELECT * FROM magazyn");
    $liczba = mysql_num_rows($wynik);
    return $liczba;
}