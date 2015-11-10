<?php
// wyświetla liste kategorii, tak, by po kliknięciu dalo się filtrować wyniki

// zmienne "huby"
if (isset($_GET['kat']) && $_GET['kat']!="")
{
    $h_kat = $_GET['kat'];
}
else $h_kat = 0;


if (isset($_GET['str']) && $_GET['str']!="")
{
    $h_str = $_GET['str'];
}
else $h_str = 0;


if (isset($_GET['liczba_na_strone']) && $_GET['liczba_na_strone']!="")
{
    $h_liczba_na_strone = $_GET['liczba_na_strone'];
}
else $h_liczba_na_strone = 0;

?>

<!-- Liczba przedmiotów na stronie --->
Ilość:
<a href="<?="?liczba_na_strone=0&str=0&kat={$h_kat}"?>">Wszystkie</a>
<a href="<?="?liczba_na_strone=2&str=1&kat={$h_kat}"?>">2</a>
<a href="<?="?liczba_na_strone=5&str=1&kat={$h_kat}"?>">5</a>
<a href="<?="?liczba_na_strone=10&str=1&kat={$h_kat}"?>">10</a>
<a href="<?="?liczba_na_strone=20&str=1&kat={$h_kat}"?>">20</a>
<a href="<?="?liczba_na_strone=30&str=1&kat={$h_kat}"?>">30</a>
<hr>

<?php
// lista kategorii
echo '<ul class="nav nav-pills nav-stacked">';
echo '<li role="presentation"><a href="index.php">WSZYSTKO</a></li>';
$wynik = mysql_query("SELECT * FROM `kategorie`");
while($r = mysql_fetch_assoc($wynik)) 
{
    if (@$_GET['kat']==$r['id_kategorii'])
    {
        echo '<li class="active">';
    }
    else echo '<li>';
    // link
    $cc = "?liczba_na_strone={$h_liczba_na_strone}&str=1&kat={$r['id_kategorii']}";
    echo '<a href="'.$cc.'">';
    echo $r['nazwa'];
    echo '</a>';
    echo '</li>';
}
echo '</ul>';
echo '<hr>';

$cc2 = "?liczba_na_strone={$h_liczba_na_strone}&str={$h_str}&kat={$h_kat}";
?>
<!-- Formularz do pobrania zakresów cenowych od użytkownka --->
<form class="form"  action="index.php<?=$cc2?>" method="post" accept-charset="utf-8">
    <label for="exampleInputName2">Od</label>
    <input name="cena_min" type="text" class="form-control"placeholder="cena min">
    <label for="exampleInputEmail2">Do</label>
    <input name="cena_max" type="text" class="form-control" placeholder="cena max"><br>
  <button type="submit" class="btn btn-default">Sprawdź</button>
</form>