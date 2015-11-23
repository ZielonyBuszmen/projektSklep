<?php
/*
 * Plik wyświetla podsumowanie zakupu z komunikatem o powodzeniu lub błędach
 */
    // wyświetlenie okruszków
    echo '<div class="row">';
    okruszki(okruch_index(), "Podsumowanie");
    echo '</div>';
?>

<div class="row">
    <div class="col-md-12">
        <h2>Podsumowanie kupowania</h2>
        <hr>  
<?php
// stosowne komunikaty
if (isset($_GET['komunikat']) && $_GET['komunikat']!="")
{
    $kom = $_GET['komunikat'];
    if ($kom=="pusty_koszyk")
    {
        komunikat("Pusty koszyk to lekki koszyk. Nie lubimy lekkich i pustych koszyków.", "danger");
        return;
    }
    else if ($kom=="nie_zalogowano")
    {
        komunikat("Nie jesteś zalogowany. Zaloguj sie lub zarejestruj, by kontynuować zakupki", "warning");
        return;
    }
    else if ($kom=="ok")
    {
        komunikat("Zakup przebiegł pomyślnie. Poczekaj teraz na jego realizację", "success");
    }
}
?>
        <h4><a href="?v=tresc/u_zamowienia/moje_zamowienia">Status zamówienia możesz sprawdzić tutaj</a></h4>
    </div>
</div>