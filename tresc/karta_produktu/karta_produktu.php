<div class="row">
    <div class="col-md-12"></div>
<?php
// komunikat po dodaniu produktu do koszyka
    if (isset($_GET['dodano_do_koszyka']) && $_GET['dodano_do_koszyka']=="tak")
    {
        komunikat ("Produkt został pomyślnie dodany do koszyka.", "success");
    }
    else if (isset($_GET['dodano_do_koszyka']) && $_GET['dodano_do_koszyka']=="nie")
    {
        komunikat ("Przedmiot nie może zostać dodany do koszyka. (Nie ma więcej w magazynie)", "warning");
    }


// wyświetla kartę produktu. ID produktu jest podawane przez pasek adresu

    // sprawdzamy, czy podano id_produktu. Jeśli nie to wywalamy komunikat o błędzie
    if (!isset($_GET['id_produktu']) && $_GET['id_produktu']=="")
    {
        komunikat("Nie podano poprawnego ID produktu, wróć do strony głównej.", "info");
        return;
    }
    // zmienne globalne
    $id = $_GET['id_produktu'];
    $folder_obrazkow='img/produkty';
    
    // wyświetlamy dany produkt
    $wynik = mysql_query("SELECT * FROM `produkty` WHERE id_produktu={$id}");
    while($r = mysql_fetch_assoc($wynik)) 
    {
        echo "<h2>{$r['nazwa']}</h2>";
        echo "<small>ID: {$r['id_produktu']}</small><hr>";
        echo "<img src='{$folder_obrazkow}/{$r['obrazek']}' height='200'><br>";
        echo "{$r['cena']} zł<br>";
        echo "Ilość: {$r['ilosc']}<br>";
        echo "<a href='?v=tresc/koszyk/dodaj_do_koszyka&id_produktu={$r['id_produktu']}'>Dodaj do koszyka</a>";
    }  
?>
    </div>
</div>