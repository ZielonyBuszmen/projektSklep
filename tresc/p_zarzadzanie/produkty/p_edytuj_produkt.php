<?php
/*
 * Edytuje dany produkt podany przez ID w pasku adresu
 */
    // sprawdzamy, czy to aby na pewno pracownik
    if (!pracownik()) // jeśli to nie pracownik, przerywamy skrpyt
    {
        komunikat("Dostęp tylko dla pracownika");
        return;
    }
    // sprawdzamy czy istnieje odpowiennna zmienna GET. Jeśli nie to komunikat o bledzie i return
    if (!isset($_GET['id_produktu']) || $_GET['id_produktu']=="")
    {
        komunikat("Nie podano id produktu!");
        return;
    }

    $id_produktu = $_GET['id_produktu'];
    // pobranie danych z bazy i przypisanie ich do zmiennych. Zmienne dzieki magii PHP są dostępnie globalnie w całym pliku
    $wynik_kurs_nazwa = mysql_query("SELECT * FROM `produkty` WHERE id_produktu={$id_produktu}");
    while ($r = mysql_fetch_assoc($wynik_kurs_nazwa)) 
    {
        $b_nazwa = $r['nazwa'];
        $b_cena = $r['cena'];
        $b_ilosc = $r['ilosc'];
        $b_opis = $r['opis'];
    }
        
    // sprawdzamy, czy formularz został wysłany
    if (isset($_GET['wyslano']) && $_GET['wyslano']=="tak")
    {   // sprawdzamy, czy pola są wypełnione
        if(isset($_POST['nazwa']) && $_POST['nazwa']!="" 
                && isset($_POST['cena']) && $_POST['cena']!="" 
                && isset($_POST['ilosc']) && $_POST['ilosc']!="" 
                && isset($_POST['opis']) && $_POST['opis']!="" )
        {         
            // edytujemy wpis w bazie
            if(mysql_query("UPDATE produkty SET nazwa='{$_POST['nazwa']}', cena='{$_POST['cena']}', ilosc='{$_POST['ilosc']}', opis='{$_POST['opis']}' WHERE id_produktu={$id_produktu}")===TRUE)
            {   
                        
                // edycja sie powiodla, przekierowanie
                header("Location: index.php?v=tresc/p_zarzadzanie/p_panel&prawa=tresc/p_zarzadzanie/produkty/p_lista_produktow&edytowano=tak&id_produktu={$_GET['id_produktu']}");
                return;
            }
        }
        else
        {   // jeśli jednak coś poszło ne tak
            komunikat("Wypełnij wszystkie pola", "danger");
        }
    }
?>
<h3>Edycja produktu #<?=$_GET['id_produktu']?></h3>
<br>
<form action="index.php?v=tresc/p_zarzadzanie/p_panel&prawa=tresc/p_zarzadzanie/produkty/p_edytuj_produkt&id_produktu=<?=$_GET['id_produktu']?>&wyslano=tak" method="post" accept-charset="utf-8">
  <div class="form-group">
    <label>Nazwa produktu</label>
    <input type="nazwa" class="form-control" id="exampleInputEmail1" placeholder="" name="nazwa" value="<?=$b_nazwa?>">
  </div>
  <div class="form-group">
    <label>Cena produktu</label>
    <input type="cena" class="form-control" id="exampleInputEmail1" placeholder="" name="cena" value="<?=$b_cena?>">
  </div>
  <div class="form-group">
    <label>Ilość</label>
    <input type="ilosc" class="form-control" id="exampleInputEmail1" placeholder="" name="ilosc" value="<?=$b_ilosc?>">
  </div>
  <div class="form-group ">
    <label>Opis produktu</label>
    <textarea class="form-control" rows="5" name="opis"><?=$b_opis?></textarea>
  </div>
    <button type="submit" class="btn btn-default"><b>Zatwierdź zmiany</b></button> 
</form>