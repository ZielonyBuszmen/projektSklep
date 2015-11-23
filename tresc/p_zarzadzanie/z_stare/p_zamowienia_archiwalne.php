<?php
/*
 * wyświetla zamówienia już przetworzone i zamówienia archiwalne (które np zostały anulowane)
 */

?>
<h2>Zamówienia archiwalne</h2>
<hr>
 <table class="table">
  <thead>
    <tr>
      <th>#id zamówienia</th>
      <th>Data</th>
      <th>Cena</th>
      <th>Stan</th>
      <th>Klient</th>
      <th>Pracownik</th>
    </tr>
  </thead>
    <tbody>     
<?php
    // odpowiednie zapytanie do bazy o zamówienia danego użytkownika
    $wynik = mysql_query("SELECT * FROM sprzedaz INNER JOIN uzytkownicy ON sprzedaz.id_uzytkownika = uzytkownicy.id GROUP BY id_zamowienia HAVING potwierdzenie='tak'");
    while($r = mysql_fetch_assoc($wynik))
    {   // wyświetlenie tabelki z wszystkimi zamówieniami
        $cena = cena_zamowienia($r['id_zamowienia'], $r['id']); // podliczenie ceny danego zamówienia
        echo '<tr>';
        echo "<td><a href='?v=tresc/p_zarzadzanie/p_panel&prawa=tresc/p_zarzadzanie/z_stare/p_dane_zamowienie&stan=tak&id_zamowienia={$r['id_zamowienia']}'>{$r['id_zamowienia']}</a></td>";
        echo "<td>{$r['data']}</td>";
        echo "<td>{$cena} zł</td>";
        echo "<td>".zamowienie_komunikat($r['potwierdzenie'])."</td>";
        echo "<td>{$r['login']} - {$r['imie']} {$r['nazwisko']}</td>";
        echo "<td>".imie_usera($r['id'])."</td>";
        echo "</tr>";
    }
?>
    </tbody></table><hr><br><br><br><br>
        
        
        
        

<h2>Zamówienia anulowane</h2>
<hr>
 <table class="table">
  <thead>
    <tr>
      <th>#id zamówienia</th>
      <th>Data</th>
      <th>Cena</th>
      <th>Stan</th>
      <th>Klient</th>
      <th>Pracownik</th>
    </tr>
  </thead>
    <tbody>     
<?php
    // odpowiednie zapytanie do bazy o zamówienia danego użytkownika
    $wynik = mysql_query("SELECT * FROM sprzedaz INNER JOIN uzytkownicy ON sprzedaz.id_uzytkownika = uzytkownicy.id GROUP BY id_zamowienia HAVING potwierdzenie='blocked'");
    while($r = mysql_fetch_assoc($wynik))
    {   // wyświetlenie tabelki z wszystkimi zamówieniami
        $cena = cena_zamowienia($r['id_zamowienia'], $r['id']); // podliczenie ceny danego zamówienia
        echo '<tr>';
        echo "<td><a href='?v=tresc/p_zarzadzanie/p_panel&prawa=tresc/p_zarzadzanie/z_stare/p_dane_zamowienie&stan=blocked&id_zamowienia={$r['id_zamowienia']}'>{$r['id_zamowienia']}</a></td>";
        echo "<td>{$r['data']}</td>";
        echo "<td>{$cena} zł</td>";
        echo "<td>".zamowienie_komunikat($r['potwierdzenie'])."</td>";
        echo "<td>{$r['login']} - {$r['imie']} {$r['nazwisko']}</td>";
         echo "<td>".imie_usera($r['id'])."</td>";
        echo "</tr>";
    }
?>