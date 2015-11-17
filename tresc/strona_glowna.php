<?php // wyświetla logo z promocjami itepe
?>
<div class="row">
    <div class="col-md-12">
        <div class="thumbnail">
            <?php
            karuzela();
            ?>
        </div>
    </div>
  </div> 
<div class="row">
<?php 
// wyświetla pasek okruszków
if (isset($_GET['kat']) && $_GET['kat']!="")
{
    $cena = "";
    if (isset($_POST['cena_min']))
    {
        $cena="Cena od <b>{$_POST['cena_min']}zł</b> ";
    }
    if (isset($_POST['cena_max']))
    {
        $cena.=" do <b>{$_POST['cena_max']}zł</b> ";
    }
    okruszki(okruch_index(), okruch_kategoria($_GET['kat']), $cena);
}
else
{
    okruszki(okruch_index());
}

// Wyświetla treśc głównej strony z produktami i kategoriami
?>
    </div>  
<div class="row">
<div class="col-md-2">
    <div class="thumbnail">
    <?php
       include("tresc/lista_produktow/kategorie.php");
       ?>
    </div>    
 </div>
<div class="col-md-10">
       <?php
       include("tresc/lista_produktow/lista.php");
       ?>
    <?php
    echo '<br><br>';
    
    
    
    // dodanie przykładowych danych do koszyka
    // dodaj_do_koszyka(2);
    // dodaj_do_koszyka(4);
    
    //echo "<hr>Liczba rzeczy w koszyku: ";
    //echo sprawdz_liczbe_w_koszyku();
    
    ?>
</div> 