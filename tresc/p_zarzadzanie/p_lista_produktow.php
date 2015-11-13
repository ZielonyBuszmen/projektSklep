<?php
if (!pracownik()) // jeśli to nie pracownik, przerywamy skrpyt
{
    komunikat("Dostęp tylko dla pracownika");
    return;
    
    
}
?>
Wyświetla liste produktow i umożliwia ich EDYTOWANIE i USUWANIE<br>
p_edytuj_produkt - pobiera id, umozliwia edycje<br>
p_usun_produkt - pobiera id, umożliwia usuniecie<br>
<hr>

<?php

    

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
        echo "<tr>";
        echo "<td>{$r['id_produktu']}</td>";
        echo "<td><a href='?v=tresc/karta_produktu/karta_produktu&id_produktu={$r['id_produktu']}'>{$r['nazwa']}</a></td>";
        echo "<td>{$r['cena']} zł</td>";
        echo "<td>{$r['ilosc']}</td>";
        echo "<td>".nazwa_kategorii($r['kategoria'])."</td>";
        
        echo "<td><a href='' class='btn btn-default'>Edytuj</a></td>";
        echo "<td><a href='' class='btn btn-default'>Usuń</a></td>";
        echo "</tr>";
    }
?>
