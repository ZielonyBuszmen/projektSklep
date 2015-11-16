<?php
// Wyświetla wszystkie zamówienia danego użytkowninka

// sprawdza, czy zalogowano, jeśli nie to błąd
if (!zalogowano())
{
    komunikat("Zaloguj sie!");
    return;
}
    echo '<div class="row">';
    okruszki(okruch_index(), "<a href='?v=tresc/u_zamowienia/moje_zamowienia'>Moje zamówienia</a>");
    echo '</div>';

?>
<div class="row">
    <div class="col-md-12">
<h2>Moje zamówienia</h2>
<hr>
 <table class="table">
  <thead>
    <tr>
      <th>#id zamówienia</th>
      <th>Data</th>
      <th>Cena</th>
      <th>Stan</th>
    </tr>
  </thead>
    <tbody>     
<?php
    // odpowiednie zapytanie do bazy o zamówienia danego użytkownika
    $wynik = mysql_query("SELECT * FROM sprzedaz GROUP BY id_zamowienia HAVING id_uzytkownika={$_SESSION['id_usera']}");
    while($r = mysql_fetch_assoc($wynik))
    {   // wyświetlenie tabelki z wszystkimi zamówieniami
        $cena = cena_zamowienia($r['id_zamowienia'], $_SESSION['id_usera']); // podliczenie ceny danego zamówienia
        echo '<tr>';
        echo "<td><a href='?v=tresc/u_zamowienia/dane_zamowienie&id_zamowienia={$r['id_zamowienia']}&potwierdzenie={$r['potwierdzenie']}'>{$r['id_zamowienia']}</a></td>";
        echo "<td>{$r['data']}</td>";
        echo "<td>{$cena} zł</td>";
        echo "<td>".zamowienie_komunikat($r['potwierdzenie'])."</td>";
    }
?>
</div>       
</div>