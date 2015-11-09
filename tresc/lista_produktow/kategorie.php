<?php
// wyświetla liste kategorii, tak, by po kliknięciu dalo się filtrować wyniki

// lista kategorii
echo '<ul class="nav nav-pills nav-stacked">';
echo '<li role="presentation"><a href="index.php">WSZYSTKO</a></li>';
$wynik = mysql_query("SELECT * FROM `kategorie`");
while($r = mysql_fetch_assoc($wynik)) 
{
    echo '<li role="presentation">';
    echo '<a href="?kat='.$r['id_kategorii'].'">';
    echo $r['nazwa'];
    echo '</a>';
    echo '</li>';
}
echo '</ul>';
echo '<hr>';
?>
<!-- Formularz do pobrania zakresów cenowych od użytkownka --->
<form class="form"  action="index.php?kat=<?=@$_GET['kat']?>" method="post" accept-charset="utf-8">
    <label for="exampleInputName2">Od</label>
    <input name="cena_min" type="text" class="form-control"placeholder="cena min">
    <label for="exampleInputEmail2">Do</label>
    <input name="cena_max" type="text" class="form-control" placeholder="cena max"><br>
  <button type="submit" class="btn btn-default">Sprawdź</button>
</form>