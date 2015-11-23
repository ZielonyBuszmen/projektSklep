<?php
/*
 *  funkcje wyświetlające produkty
 */

// wyświetla widget (kafelek) z produktem 
function w_produkt_kafelek($id)
{
    $zapytanie = "SELECT * FROM `produkty` WHERE id_produktu={$id}";
    $folder_obrazkow='img/produkty';
    $height = 120;
    echo '<div class="thumbnail">'
          .'<div class="caption" style="text-align: center;">'
          .'';
    $wynik = mysql_query($zapytanie);
    while($r = mysql_fetch_assoc($wynik)) 
    {
        echo "<a href='?v=tresc/karta_produktu/karta_produktu&id_produktu={$r['id_produktu']}'>";
        echo "<img src='{$folder_obrazkow}/{$r['obrazek']}' style ='height:{$height}px; ' >";
        echo "{$r['nazwa']}</a><br>";
        echo "{$r['cena']} zł<br>";
        echo "<a class='btn btn-default btn-sm'"
            . "href='?v=tresc/koszyk/dodaj_do_koszyka&id_produktu={$r['id_produktu']}'>" 
            . "Dodaj do koszyka</a>";
    }
     
    echo '</div>'
          .'</div>';
}


// wyświetla wszystkie prdukty (kafelki)  z kategorii $id_kategorii
// jeśli $id_kategorii jest równe 0, wyświetla wszystko
// $cena_min i max to zakres cenowy. 0 oznacza brak zakresu
// $liczba_na_strone - liczba produktów na stronie, 0 oznacza wszystkie
// $strona numer aktualnej strony, 0 oznacza brak paginacji
function w_produkty_kafelki($id_kategorii, $cena_min=0, $cena_max=0, $liczba_na_strone = 0, $strona = 0)
{
    // jeżeli $id_kategorii jest rowne 0, wyświetlamy wszystko
    if ($id_kategorii==0) $zapytanie = "FROM `produkty` WHERE cena >= {$cena_min}";
    // jesli $id_kategorii jest większe od 0, wyświetlamy tylko daną kategorie
    else if ($id_kategorii>0) $zapytanie ="FROM `produkty` WHERE kategoria={$id_kategorii} AND cena >= {$cena_min}";
    if ($cena_max>0) $zapytanie.=" AND cena <= {$cena_max}";
    
    // liczba rekordów w bazie
    $zapytanie2 = mysql_query ("SELECT COUNT(*) AS liczba {$zapytanie}"); // liczmy ilość rekordów
    $wynik2 = mysql_fetch_array($zapytanie2); // pobieramy liczbę rekordów
    $liczba_rekordow = $wynik2['liczba']; // by wygodniej sie operowały, przypisujemy to do zmiennej
    
    // stworzenie odpowiedniego zapytania do strony 
    $paginacja = FALSE; // domyślnie paginacja jest na false
    if ($liczba_na_strone >0 && $strona > 0) // sprawdzamy odpowiednie warunku
    {   // jeśli tak, to znaczy że czas uruchomić paginację
        $paginacja = TRUE;
        $start= $liczba_na_strone * ($strona -1);// obliczamy na którym rekordzie rozpoczynamy wyświetlanie
        $ile= $liczba_na_strone; // pobieramy, ile ma sie produktów wyświetlić
        $zapytanie.=" ORDER BY id_produktu LIMIT {$start}, {$ile}"; // dodajemy wszystko do zapytania
        // LIMIT {$start}, {$ile} -  startuj od( +1); ile rekordow
    }
      
    // kilka zmiennych "globalnych"
    $folder_obrazkow='img/produkty';
    $height = 120; // wysykosc zdjecia
    $col_md = 3; // szerokość "kafelka" z produktem
    
    $wynik = mysql_query("SELECT * {$zapytanie}"); // zapytanie do bazy danych
    $i = 0; // potrzeba zmienna $i, by sprawdzac, co ile "przełamać" linię
    while($r = mysql_fetch_assoc($wynik)) 
    {   // rozmiarówka kafelka
        echo '<div id="kafel" class="col-md-'.$col_md.'">';
        // rozpoczenie miniatury
        echo '<div class="thumbnail">'
        .'<div class="caption" style="text-align: center;">';
        
        // linki do karty produktu
        echo "<a href='?v=tresc/karta_produktu/karta_produktu&id_produktu={$r['id_produktu']}'>";
        echo "<img src='{$folder_obrazkow}/{$r['obrazek']}' style ='height:{$height}px; ' >";
        echo "{$r['nazwa']}</a><br>";
        echo "{$r['cena']} zł<br>";
        echo "<a class='btn btn-default btn-sm'"
            . "href='?v=tresc/koszyk/dodaj_do_koszyka&id_produktu={$r['id_produktu']}'>" 
            . "Dodaj do koszyka</a>"; // przycisk do dodawania do koszyka
        echo '</div>';
        $i++;  
         
        echo '</div>' // to te divy, co mogą robić problemy
             .'</div>';
    }
    
    echo '</div>';// ten div musi być, bo paginacja się źle wyświetla bez niego
    
    // PAGINACJA - strony liczymy od 1, nie od 0!
    // jeśli możemy podzielić wyniki na strony, to wyświelamy odpowiednią tabelkę
    if ($paginacja)
    {
        // UWAGA! Gdy ten blok kodu jest wykonywany, zakładamy, że $_GET['str'] istnieje.
        // obliczamy liczbę stron, która ma być wyświetlana
        $liczba_stronic = $liczba_rekordow/$liczba_na_strone;
        $aa2 = $liczba_rekordow%$liczba_na_strone; // sprawdzamy, czy został wynik z dzielenia
        if ($aa2 >0) $liczba_stronic++;// jeżeli został jakiś wynik z dzielenia to dodajemy +1 stronę więcej, by wyświetlić te "resztki"
        // tworzymy link do paginacji, gdyż kategoria i liczba elementów na stronie muszą pozostać niezmienione
        $adres_do_paginacji = "?kat={$id_kategorii}&liczba_na_strone={$liczba_na_strone}";
        
        // start paginacji
        echo '<div align="center"><nav><ul class="pagination">';
        
        // przycisk WSTECZ
        if (($_GET['str']-1)==0) // jeśli nie możemy już dawać wstecz, to wyświetlamy szary przycisk
        {   // warunek polega na tym, że jeśli poprzednia strona to strona o numerze 0, to nie wyświetlamy. Bo strony liczymy od 1, nie od 0
            echo '<li class="disabled"><a aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
        }
        else // w przeciwnnym wypadku wyświetlamy normalny przycisk WSTECZ
        {
            echo '<li><a href="'.$adres_do_paginacji.'&str='.($_GET['str']-1).'" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
        }
        
        // pętla wyświetlająca liczbę stron
        for($i = 1; $i <= $liczba_stronic; $i++)
        {
            if ($i ==$_GET['str']) // jeżeli aktualnie wybrana strona jest, to ją wyświetlamy jako aktywną
            {
                echo '<li class="active"><a href="'.$adres_do_paginacji.'&str='.$i.'">'.$i.'</a></li>';
            }
            else echo '<li><a href="'.$adres_do_paginacji.'&str='.$i.'">'.$i.'</a></li>'; // w przeciwnym wypadku wyświetlamy wyświetlamy przycisk normalnie
        }
        
        // przycisk DALEJ
        if (($_GET['str']+1)>$liczba_stronic) // jeśli następna strona jest większa niż liczba stron, to blokujemy pzycisk
        {
            echo'<li class="disabled"><a "aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li></ul></nav></div>';
        }
        else // w przeciwnym wypadku przycisk jest normalny
        {
            echo'<li><a href="'.$adres_do_paginacji.'&str='.($_GET['str']+1).'"aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
        }
         // zakończenie paginacji
        echo '</ul></nav></div>';
    }
}

// zwraca liczbę produktów w sklepie/magazynie (liczbę wpisów, a nei ilość danego produktu)
function liczba_produktow()
{
    $wynik = mysql_query("SELECT * FROM produkty");
    $liczba = mysql_num_rows($wynik);
    return $liczba;
}

// zwraca nazwę kategorii produktu
function nazwa_kategorii($id_kategorii)
{
    $wynik = mysql_query("SELECT nazwa FROM kategorie WHERE id_kategorii={$id_kategorii}");
    while($r = mysql_fetch_assoc($wynik)) 
    {
        return $r['nazwa'];
    }
}

//wyświetla karuzelę z promocjami jak w lydlu i w biedronce
function karuzela()
{
echo '<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <a href="index.php?v=tresc/karta_produktu/karta_produktu&id_produktu=20"><img src="img/karuzela/zubr.jpg" alt="Żubr"></a>
      <div class="carousel-caption">
        <h3></h3>
        <p></p>
      </div>
    </div>

    <div class="item">
      <a href="index.php?v=tresc/karta_produktu/karta_produktu&id_produktu=15"><img src="img/karuzela/finlandia.jpg" alt="Finlandia"></a>
      <div class="carousel-caption">
        <h3></h3>
        <p></p>
      </div>
    </div>

    <div class="item">
      <a href="index.php?v=tresc/karta_produktu/karta_produktu&id_produktu=30"><img src="img/karuzela/pumpernikiel.jpg" alt="Flower"></a>
      <div class="carousel-caption">
        <h3></h3>
        <p></p>
      </div>
    </div>

    <div class="item">
      <a href="index.php?v=tresc/karta_produktu/karta_produktu&id_produktu=36"><img src="img/karuzela/szampan.jpg" alt="Flower"></a>
      <div class="carousel-caption">
        <h3></h3>
        <p></p>
      </div>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Poprzedni</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Następny</span>
  </a>
</div>';
}