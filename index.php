<?php session_start(); 
    //rozpoczęcie sesji 
// Glówny plik index.php
    // Dołączanie plików z funkcjami
    // f_include zawiera funkcje dołączające pliki do strony
    require_once("funkcje/f_include.php");
    
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
    </body>
</html>