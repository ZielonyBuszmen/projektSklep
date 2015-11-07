<?php // wyświetla logo z promocjami itepe
?>
<div class="row">
    <div class="col-md-12">
        <img src="img/logo-test.jpg">
    </div>
</div>   

<?php // Wyświetla treśc głównej strony z produktami i kategoriami
?>
<div class="row">
<div class="col-md-3">
    <ul class="nav nav-pills nav-stacked">
      <li role="presentation"><a href="">Kategorie produktów, filtrowanie itd</a></li>
    </ul>
 </div>
<div class="col-md-9"> <br><br>
    <div class="row">
     
       
    <?php
    // wyswietlenie tabeli z produktami
    echo '<div class="row">';
    for ($i = 1; $i <= liczba_produktow(); $i++)
    {   // dany "kafelek" produktu
        echo '<div class="col-md-4">';
        w_produkt_kafelek($i);
        echo '</div>';
        // co trzy produkty wstawiamy nowy wiersz
        if ($i % 3 == 0) echo '</div><div class="row">';
    }
    echo '</div>';
    ?>
    
    <h3> Tymczasowe menu z linkami</h3>
    <a href="?v=tresc/karta_produktu/karta_produktu">?v=karta_produktu/karta_produktu</a>
    <br>
    <a href=""></a>
    <br>
    <a href=""></a>
    <br>
    <a href=""></a>
    <?php
    echo '<br><br><hr>';
    for ($i = 0; $i <20; $i++) echo "Rów melioracyjny <br>";
    
    
    // dodanie przykładowych danych do koszyka
    // dodaj_do_koszyka(2);
    // dodaj_do_koszyka(4);
    
    echo "<hr>Liczba rzeczy w koszyku: ";
    echo sprawdz_liczbe_w_koszyku();
    
    ?>
</div>
</div> 