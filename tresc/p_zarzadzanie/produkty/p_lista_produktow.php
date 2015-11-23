<?php
/*
 * Wświetla listę produktów z bazy. Umożliwia usuwanie i edycję
 */

    if (!pracownik()) // jeśli to nie pracownik, przerywamy skrpyt
    {
        komunikat("Dostęp tylko dla pracownika");
        return;
    }

    //edytowano=tak&id_produktu=10
    // sprawdzamy, czy podświetlić jakiś rekord w tabeli
    if(isset($_GET['id_produktu']) && $_GET['id_produktu']!="")
    {
        $id_podswietlenia=$_GET['id_produktu'];
    }
    else
    {
        $id_podswietlenia=0;
    }
    
    // jeśli edytowano, to wyświetlamy komunikat
    if(isset($_GET['edytowano']) && $_GET['edytowano']=="tak")
    {
        komunikat("Produkt został wyedytowany poprawnie", "success");
    }
    // jeśli dodano, wyswietlamy komunikatto
    if(isset($_GET['dodano']) && $_GET['dodano']=="tak")
    {
        komunikat("Produkt został dodany poprawnie", "success");
    }
    
    if(isset($_GET['usunieto']) && $_GET['usunieto']=="tak")
    {
        komunikat("Produkt został usunięty poprawnie", "danger");
    }
    else if(isset($_GET['usunieto']) && $_GET['usunieto']=="anulowano")
    {
        komunikat("Nie wprowadzono zmian", "info");
    }
    
?>
<h2>Zarządzanie produktami</h2>
<hr>
 <table class="table">
  <thead>
    <tr>
      <th>#id</th>
      <th>Nazwa</th>
      <th>Cena</th>
      <th>Ilość</th>
      <th>Kategoria</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
    <tbody>     
<?php

    $wynik = mysql_query("SELECT * FROM produkty");
    while($r = mysql_fetch_assoc($wynik))
    {   
        // podświetlenie rekordu, jeśli ma być podświetlony 
        if ($id_podswietlenia>0 && $id_podswietlenia==$r['id_produktu']) echo "<tr class='success'>";
        else echo "<tr>";
        echo "<td>{$r['id_produktu']}</td>";
        echo "<td><a href='?v=tresc/karta_produktu/karta_produktu&id_produktu={$r['id_produktu']}'>{$r['nazwa']}</a></td>";
        echo "<td>{$r['cena']} zł</td>";
        echo "<td>{$r['ilosc']}</td>";
        echo "<td>".nazwa_kategorii($r['kategoria'])."</td>";
        
        // adresy do plików z edycją i usuwaniem
        $adres_edytuj = "?v=tresc/p_zarzadzanie/p_panel&prawa=tresc/p_zarzadzanie/produkty/p_edytuj_produkt&id_produktu={$r['id_produktu']}";
        $adres_usun = "?v=tresc/p_zarzadzanie/p_panel&prawa=tresc/p_zarzadzanie/produkty/p_usun_produkt&id_produktu={$r['id_produktu']}";
        echo "<td><a href='{$adres_edytuj}' class='btn btn-default'>Edytuj</a></td>";
        echo "<td><a href='{$adres_usun}' class='btn btn-default'>Usuń</a></td>";
        echo "</tr>";
    }
?>