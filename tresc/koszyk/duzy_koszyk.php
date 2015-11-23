<?php
/*
 * Wyświetla pełną wersję koszyk z produktami
 * wyświetlamy listę rzeczy z koszyka w ładnej tabelce z przyciskami do zmienienia ilości, usuniecia przedmiotu, itd
 */

// jeśli koszyk jest pusty, wyświetlamy stosowny komunikat i przerywamy skrypt
 if(!isset($_SESSION['koszyk']) || @$_SESSION['koszyk'][0]['id_produktu']=="")
    {
        komunikat("Koszyk pusty!");
        return;
    }
    
    // odswiezamy koszyk
    refresh_koszyka();
    
// operacje na koszyku (usuwanie, dodawanie, odejmowanie)
    // usuwanie przedmiotu z koszyka
    if(isset($_GET['usun']) && $_GET['usun']!="")
    {   
        usun_z_koszyka($_GET['usun']);
        // przekierowanie, by nie było błędów
        header("Location: index.php?v=tresc/koszyk/duzy_koszyk");
        return; // gdyby nie przekierowało 
    }
    
    // dodawanie przedmiotu (+1 do ilości)
    if (isset($_GET['dodaj']) && $_GET['dodaj']!="")
    {   // sprawdzamy, czy można dodać przedmiot
        if (sprawdz_czy_mozna_dodac($_SESSION['koszyk'][$_GET['dodaj']]['id_produktu']))
        {   // jeśli tak, to dodajemy
            ++$_SESSION['koszyk'][$_GET['dodaj']]['ilosc'];
        }
    }
    // odejmowanie przedmiotu (-1 do ilości)
     if (isset($_GET['odejmij']) && $_GET['odejmij']!="")
    {   //sprawdzamy, czy można odjąć przedmiot
        if ($_SESSION['koszyk'][$_GET['odejmij']]['ilosc'] > 1)
        {   // jeśli tak, to odejmujemy
            --$_SESSION['koszyk'][$_GET['odejmij']]['ilosc'];
        }
    }
    
    // wyświetlenie okruszków
    echo '<div class="row">';
    okruszki(okruch_index(), "<a href='?v=tresc/koszyk/duzy_koszyk'>Cały koszyk</a>");
    echo '</div>';
?>
<div class="row">
    <div class="col-md-12">
<h2>Cały koszyk</h2>
<hr>
 <table class="table">
  <thead>
    <tr>
      <th>#id</th>
      <th>Nazwa</th>
      <th>Cena jednostkowa</th>
      <th>Ilość</th>
      <th>Iloczyn ceny</th>
      <th>Usuń</th>
    </tr>
  </thead>
    <tbody>

<?php
    $adres_pliku = "?v=tresc/koszyk/duzy_koszyk";     

    for($i = 0; $i<sprawdz_liczbe_w_koszyku(); $i++)
    {
        $przedmiot = $_SESSION['koszyk'][$i];
        $usun=$adres_pliku."&usun=".$i; // adres do usuwania przedmiotu
        $dodaj = $adres_pliku."&dodaj=".$i; // adres do odejmowania przedmiotu
        $odejmij= $adres_pliku."&odejmij=".$i; // adres do dodawania przedmiotu

        // inteligentne przyciski
        // wyświetlamy zielony plusik, jeśli mozna dodać przedmiot
        if (sprawdz_czy_mozna_dodac($przedmiot['id_produktu']))
        {
             $przycisk_dodaj = "<a href='{$dodaj}' type='button' class='btn btn-success'> + </a>";
        } // w przeciwnym wypadku plusik jest szary
        else $przycisk_dodaj = "<a href='{$adres_pliku}' type='button' class='btn btn-default'> + </a>";
        // wyświetlamy czerwony minusik, jeśli możemy odjąć przedmiot
        if ($przedmiot['ilosc'] > 1)
        {
             $przycisk_odejmij = "<a href='{$odejmij}' type='button' class='btn btn-danger'> - </a>";
        } // w przeciwnym wypadku minusik jest szary
        else $przycisk_odejmij = "<a href='{$adres_pliku}' type='button' class='btn btn-default'> - </a>";
        
        // wyświetlenie tabeli z całym koszykiem
        $link_do_produktu = "?v=tresc/karta_produktu/karta_produktu&id_produktu={$przedmiot['id_produktu']}";
        echo '<tr>';
        echo "<td>{$przedmiot['id_produktu']}</td>";
        echo "<td><a href='{$link_do_produktu}'>{$przedmiot['nazwa']}</a></td>";
        echo "<td>{$przedmiot['cena']} zł </td>";
        echo "<td> {$przycisk_odejmij} {$przedmiot['ilosc']} {$przycisk_dodaj}</td>";
        echo "<td>".$przedmiot['ilosc']*$przedmiot['cena']." zł </td>";
        echo "<td><a href='{$usun}'>Usun</a></td>"; 
        echo '</tr>';
    }
    // zakończenie tabeli
    echo '</tbody></table>';
 
    // podsumowanie ceny
    echo '<div align="right">';
    echo '<h3>Razem: <b>'.koszyk_suma().' zł</b>';
    echo '</div>';
    echo "<a href='?v=tresc/kupowanie/kasa' type='button' class='btn btn-default btn-lg'> Do kasy </a>";
?>
</div>       
</div>