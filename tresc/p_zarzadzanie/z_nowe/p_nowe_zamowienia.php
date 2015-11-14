<?php
// Wyświetla listę nowych zamówień. Pracownik może zająć się jednym z nich
// 
// jeśli nie zalogowano to przerywamy skrypt
if (!pracownik())
{
    return;
}
?>
<h2>Nowe zamówienia</h2>
<hr>
 <table class="table">
  <thead>
    <tr>
      <th>#id zamówienia</th>
      <th>Data zamówienia</th>
      <th>Cena</th>
      <th>Stan</th>
      <th>Klient</th>
       <th></th>
    </tr>
  </thead>
    <tbody>     
<?php
    // odpowiednie zapytanie do bazy o zamówienia danego użytkownikapotwierdzenie='now
    $wynik = mysql_query("SELECT * FROM sprzedaz INNER JOIN uzytkownicy ON sprzedaz.id_uzytkownika = uzytkownicy.id GROUP BY id_zamowienia HAVING potwierdzenie='nowy'");
    while($r = mysql_fetch_assoc($wynik))
    {   // wyświetlenie tabelki z wszystkimi zamówieniami
        $cena = cena_zamowienia($r['id_zamowienia'], $r['id']); // podliczenie ceny danego zamówienia
        $link1= "?v=tresc/p_zarzadzanie/p_panel&prawa=tresc/p_zarzadzanie/z_nowe/p_dane_zamowienie&id_zamowienia={$r['id_zamowienia']}";
        echo '<tr>';
        echo "<td><a href='{$link1}'>{$r['id_zamowienia']}</a></td>";
        echo "<td>{$r['data']}</td>";
        echo "<td>{$cena} zł</td>";
        echo "<td>".zamowienie_komunikat($r['potwierdzenie'])."</td>";
        echo "<td>{$r['imie']} {$r['nazwisko']} <i>({$r['login']})</i> </td>";
        echo "<td><a href='{$link1}&akcja=wez' class='btn btn-default btn-sm'>Zajmę się tym</a></td>";
        echo "</tr>";
    }
?>
    </tbody>
 </table>