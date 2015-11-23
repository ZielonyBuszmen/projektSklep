<?php
/*
 *  wyświetla kasę z podsumowaniem i potwierdzeniem zakupu
 */

// jeśli koszyk jest pusty, wyświetlamy stosowny komunikat i przerywamy skrypt
 if(!isset($_SESSION['koszyk']) || @$_SESSION['koszyk'][0]['id_produktu']=="")
    {
        komunikat("Koszyk pusty, nie nic nie kupujesz", "danger");
        return;
    }
    
    // sprawdzamy, czy na pewno zalogowano. Jeśli nie, to wyświetlamy przyciski do logowania i rejestracji
    if (!zalogowano())
    {
        komunikat("Przed kupnem zaloguj się lub zarejestruj!", "info");
        echo "<a href='?v=tresc/logowanie/logowanie&strona_wstecz=kasa' class='btn btn-success btn-lg' style='margin-right:20px;'>Zaloguj się</a>";
        echo "<a href='?v=tresc/rejestracja/rejestracja' class='btn btn-info btn-lg'>Zarejestruj się</a>";
        return;
    }
    
    // wyświetlamy okruchy
    echo '<div class="row">';
    okruszki(okruch_index(), "<a href='?v=tresc/koszyk/duzy_koszyk'>Cały koszyk</a>", "<a href='?v=tresc/kupowanie/kasa'>Potwierdzenie zamówienia</a>");
    echo '</div>';
?>
<div class="row">
    <div class="col-md-12">
<h2>Potwierdzenie zamówienia</h2>
<hr>
 <table class="table">
  <thead>
    <tr>
      <th>#id</th>
      <th>Nazwa</th>
      <th>Cena jednostkowa</th>
      <th>Ilość</th>
      <th>Iloczyn ceny</th>
    </tr>
  </thead>
    <tbody>

<?php
    $adres_pliku = "?v=tresc/koszyk/duzy_koszyk";     
    
    // wyświetlenie w pętli zawartości koszyka, ale bez przycisków umożliwiających zmiany
    for($i = 0; $i<sprawdz_liczbe_w_koszyku(); $i++)
    {
        $przedmiot = $_SESSION['koszyk'][$i];
        
        echo '<tr>';
        echo "<td>{$przedmiot['id_produktu']}</td>";
        echo "<td>{$przedmiot['nazwa']}</td>";
        echo "<td>{$przedmiot['cena']} zł </td>";
        echo "<td> {$przedmiot['ilosc']} </td>";
        echo "<td>".$przedmiot['ilosc']*$przedmiot['cena']." zł </td>";
        echo '</tr>';
    }
    // zakończenie tabeli
    echo '</tbody></table>';
 
    // podsumowanie ceny
    echo '<div align="right">';
    echo '<h3>Razem: <b>'.koszyk_suma().' zł</b>';
    echo '</div>';
    echo '<h4>Wybrana płatność: przy odbiorze (0 zł)</h4> <i> Innej nie oferujemy </i><br><br>';
    echo "<a href='?v=tresc/kupowanie/proces_kupowania' type='button' class='btn btn-default btn-lg btn-danger'> Złóż zamówienie </a>";
?>
</div>       
</div>