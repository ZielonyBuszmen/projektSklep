<?php
/*
 *  Skrypt wyświetla dane zamówienie (szczegóły)
 */

// jeśli nie zalogowano na pracownika to przerywamy skrypt
if (!pracownik())
{
    return;
}
// sprwadzamy czy podano id zamowienia
if (!isset($_GET['id_zamowienia']) || $_GET['id_zamowienia']=="")
{
    komunikat("Brak podanego id");
    return;
}
// sprawdzamy, czy chchemy wykonać jakąś akcję. Jeśli nie ma zniennej akcja, to znaczy że nie. Więc tylko wyświetlamy
if (!isset($_GET['akcja']) || $_GET['akcja']=="")
{
    $tytul = "Tylko do odczytu";
    $przycisk=FALSE;
}
// w przeciwnym wypadku
else if (isset($_GET['akcja']) && $_GET['akcja']!="")
{
    $tytul = "Zarządzanie";
    $przycisk = TRUE;
}
    
// sprawdzamy, czy jest wysłane tak i dodajemy danego pracownika do zarządzania zamówieniem
if (isset($_GET['akcja']) && $_GET['akcja']=="wez")
{
    if (isset($_GET['potwierdzenie']) && $_GET['potwierdzenie']=="tak")
    {
        // dodajemy pracownika do tego zamowienia
        $zapytanie = "UPDATE `sprzedaz` SET `potwierdzenie` = 'czeka',`id_pracownika_co_weryfikowal` = '{$_SESSION['id_usera']}' WHERE `id_zamowienia`='{$_GET['id_zamowienia']}'";
        $idzapytania = mysql_query($zapytanie) or die ("blee");
        
        // wszystko sie udało, przekierowywujemy do strony
        header("Location: index.php?v=tresc/p_zarzadzanie/p_panel&prawa=tresc/p_zarzadzanie/z_moje/p_zamowienia_przetwarzane");
        return; // zatrzymanie skrypu, gdyby przekierowanie sie nie udalo
    }
}

// tabelka z produkatmi w tym zamówieniu
?>
<h2>Zamówienie #<?=$_GET['id_zamowienia']?> <br> <small><?=$tytul?> </small></h2>
<?=zamowienie_komunikat("nowy", "btn-md")?>
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
    $wynik = mysql_query("SELECT `produkty`.`nazwa`, `produkty`.cena, `sprzedaz`.ilosc FROM sprzedaz INNER JOIN produkty ON produkty.id_produktu = sprzedaz.id_produktu WHERE id_zamowienia={$_GET['id_zamowienia']}");
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
    echo "<h4>Razem: {$razem} zł</h4>";
    
    echo '<hr>';
    if ($przycisk)
    {
        $link_tak="?v=tresc/p_zarzadzanie/p_panel"
                . "&prawa=tresc/p_zarzadzanie/z_nowe/p_dane_zamowienie"
                . "&id_zamowienia={$_GET['id_zamowienia']}"
                . "&akcja=wez"
                . "&potwierdzenie=tak";
        $link_nie = "?v=tresc/p_zarzadzanie/p_panel&prawa=tresc/p_zarzadzanie/z_nowe/p_nowe_zamowienia";
        echo "<h3>Czy chcesz zająć się zamówieniem #{$_GET['id_zamowienia']}?</h3>";
        echo "<a href='{$link_tak}' class='btn btn-success btn-lg' style='margin-right:20px;'>Tak</a>";
        echo "<a href='{$link_nie}' class='btn btn-danger btn-lg'>Nie</a>";
    }
    
?>