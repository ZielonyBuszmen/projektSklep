<?php session_start(); 
// Glówny plik index.php
    // połączenie z bazą danych
    require_once("baza/polaczenie.php");
    // Dołączanie plików z funkcjami
    // f_include zawiera funkcje dołączające pliki do strony
    require_once("funkcje/f_include.php");
    // f_logowanie zawiera funkcje umożliwiające logowanie i wylogowywanie uzytkownika
    require_once("funkcje/f_logowanie.php");
    // f_komunikaty zawiera funkcje wyświetlajace komunikaty o błedach itp
    require_once("funkcje/f_komunikaty.php");
    // f_przyciski zawiera funkcje wyświetlajace przyciski
    require_once("funkcje/f_przyciski.php");
    // f_produkty zawiera funkcje wyświetlające produkty z bazy
    require_once("funkcje/f_produkty.php");
    // f_koszyk zawiera funkcje do obsługi i wyświetlania koszyka
    require_once("funkcje/f_koszyk.php");
    // f_koszyk zawiera funkcje do wyświetlania "okruszkow", czyli ściezki dostępu
    require_once("funkcje/f_okruszki.php");
    // f_panel_pracownika zawiera funkcje potrzebne do sprawnego działania panelu pracownika
    require_once("funkcje/f_panel_pracownika.php");
    
?>
<!DOCTYPE html>
<html>
<?php 
    // dołączenie <head> witryny
    include("funkcje/head.php");
?>  
    <body>     
        <div class="container">       
        <?php 
            // dołączenie nagłowka strony (górny pasek widoczny na każdej podstronie)
            include ("funkcje/naglowek.php");
            // dołączamy plik z daną podstroną
            dolacz_plik("v", "tresc/strona_glowna");
        ?>
        </div>    
        
        <!-- Dołączenie skryptów z bootstrapa i jQuery -->
        <script src="bootstrap/js/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <script src="bootstrap/js/jquery.validate.js"></script>
        <script src="bootstrap/js/walidacja.js"></script>
    </body>
</html>