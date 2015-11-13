Wyświetla nowe zamówienia (te ze statusem "nowe")
<?php
// Wyświetla wszystkie zamówienia danego użytkowninka


?>
<h2>Nowe zamówienia</h2>
<hr>
 <table class="table">
  <thead>
    <tr>
      <th>#id zamówienia</th>
      <th>Data</th>
      <th>Cena</th>
      <th>Stan</th>
      <th>User</th>
    </tr>
  </thead>
    <tbody>     
<?php
    // odpowiednie zapytanie do bazy o zamówienia danego użytkownikapotwierdzenie='now
    $wynik = mysql_query("SELECT * FROM sprzedaz INNER JOIN uzytkownicy ON sprzedaz.id_uzytkownika = uzytkownicy.id GROUP BY id_zamowienia HAVING potwierdzenie='nowy'");
    while($r = mysql_fetch_assoc($wynik))
    {   // wyświetlenie tabelki z wszystkimi zamówieniami
        $cena = cena_zamowienia($r['id_zamowienia'], $_SESSION['id_usera']); // podliczenie ceny danego zamówienia
        echo '<tr>';
        echo "<td><a href='?v=tresc/u_zamowienia/dane_zamowienie&id_zamowienia={$r['id_zamowienia']}'>{$r['id_zamowienia']}</a></td>";
        echo "<td>{$r['data']}</td>";
        echo "<td>{$cena} zł</td>";
        echo "<td>{$r['potwierdzenie']}</td>";
        echo "<td>{$r['login']} - {$r['imie']} {$r['nazwisko']}</td>";
    }
?>
</div>       
</div>