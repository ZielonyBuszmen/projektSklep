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
    <?php
       include("tresc/lista_produktow/kategorie.php");
       ?>

    
 </div>
<div class="col-md-9"> <br><br>
    <div class="row">
     
       <?php
       include("tresc/lista_produktow/lista.php");
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
    
    
    
    // dodanie przykładowych danych do koszyka
    // dodaj_do_koszyka(2);
    // dodaj_do_koszyka(4);
    
    echo "<hr>Liczba rzeczy w koszyku: ";
    echo sprawdz_liczbe_w_koszyku();
    
    ?>
</div>
</div> 