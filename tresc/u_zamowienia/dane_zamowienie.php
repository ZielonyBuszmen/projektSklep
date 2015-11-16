<?php
// Skrypt wyświetla dane zamówienie (szczegóły)

// jeśli nie zalogowano to przerywamy skrypt
if (!zalogowano())
{
    komunikat("Zaloguj sie!");
    return;
}
// sprwadzamy czy podano id zamowienia
if (!isset($_GET['id_zamowienia']) || $_GET['id_zamowienia']=="")
{
    komunikat("Brak podanego id");
    return;
}

    echo '<div class="row">';
    okruszki(okruch_index(), "<a href='?v=tresc/u_zamowienia/moje_zamowienia'>Moje zamówienia</a>", "<a href='?v=tresc/u_zamowienia/dane_zamowienie&id_zamowienia={$_GET['id_zamowienia']}'>Zamówienie #{$_GET['id_zamowienia']}</a>");
    echo '</div>';


// tabelka z produkatmi w tym zamówieniu
?>
<div class="row">
    <div class="col-md-12">
<h2>Zamówienie #<?=$_GET['id_zamowienia']?></h2>
<?=zamowienie_komunikat($_GET['potwierdzenie'], "btn-lg")?>
<hr>
 <table class="table">
  <thead>
    <tr>
      <th>Nazwa</th>
      <th>Cena jednostkowa</th>
      <th>Ilość</th>
      <th>Iloczyn ceny</th>
    </tr>
  </thead>
    <tbody>

<?php
    // odpowiednie zapytanie, by pobrać dane i je wyświetlić w tabeli
    $wynik = mysql_query("SELECT `produkty`.`nazwa`, `produkty`.cena, `sprzedaz`.ilosc FROM sprzedaz INNER JOIN produkty ON produkty.id_produktu = sprzedaz.id_produktu WHERE id_zamowienia={$_GET['id_zamowienia']} AND id_uzytkownika={$_SESSION['id_usera']}");
    $razem = 0;
    while($r = mysql_fetch_assoc($wynik))
    {
        // wiersz tabeli z danymi
        echo "<tr>";
        echo "<td>{$r['nazwa']}</td>";
        echo "<td>{$r['cena']} zł</td>";
        echo "<td>{$r['ilosc']}</td>";
        echo "<td>".$r['ilosc']*$r['cena']." zł</td>";
        echo "</tr>";
        $razem += $r['ilosc']*$r['cena'];
    }
    echo '</tbody></table>';
    echo "<h3>Razem: {$razem} zł</h3>";
?>
</div>       
</div>