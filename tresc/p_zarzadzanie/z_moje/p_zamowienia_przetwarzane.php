<?php
// Wyświetla listę zamówien przetwarzanych przez danego pracownika
?>
<h2>Zamówienia przetwarzane teraz przeze mnie</h2>
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
    $wynik = mysql_query("SELECT * FROM sprzedaz INNER JOIN uzytkownicy ON sprzedaz.id_uzytkownika = uzytkownicy.id GROUP BY id_zamowienia HAVING potwierdzenie='czeka' AND id_pracownika_co_weryfikowal={$_SESSION['id_usera']}");
    while($r = mysql_fetch_assoc($wynik))
    {   // wyświetlenie tabelki z wszystkimi zamówieniami
        $cena = cena_zamowienia($r['id_zamowienia'], $r['id']); // podliczenie ceny danego zamówienia
        $link1= "?v=tresc/p_zarzadzanie/p_panel&prawa=tresc/p_zarzadzanie/z_moje/p_dane_zamowienie&id_zamowienia={$r['id_zamowienia']}";
        echo '<tr>';
        echo "<td><a href='{$link1}&akcja=zarzadzaj'>{$r['id_zamowienia']}</a></td>";
        echo "<td>{$r['data']}</td>";
        echo "<td>{$cena} zł</td>";
        echo "<td>".zamowienie_komunikat($r['potwierdzenie'])."</td>";
        echo "<td>{$r['imie']} {$r['nazwisko']} <i>({$r['login']})</i> </td>";
        echo "<td><a href='{$link1}&akcja=zarzadzaj' class='btn btn-default btn-sm'>Zarządzaj zamówieniem</a></td>";
        echo "</tr>";
    }
?>
    </tbody>
 </table>