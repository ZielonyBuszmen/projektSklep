<?php session_start(); 
    //rozpoczęcie sesji 
    
    // dołączenie plików z funkcjami
    // dołącznie pliku z funkcjami do dołącznia plilów
    require_once("funkcje/f_include.php");
    
?>
<!DOCTYPE html>
<html>
        
<?php 
    // dołączenie <head> witryny
    include("funkcje/head.php");
?>  
    
    <body>     
        
        
        
        
        
        
        
        Trzeba zrobić główny layout, jak ma to wyglądać wszystko
        <!-- Tutaj zaczyna się treść danej podstrony -->
        <!-- Całość jest zawarta w containerze oraz w jednym row -->
        <div class="container">
            <div id="z_panel_calosc" class="row">
                 Jakas treść
            </div> 
        </div>    

        
        
        
        
        
        
        
        
        <!-- Dołączenie skryptów z bootstrapa i jQuery -->
        <script src="bootstrap/js/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <script src="bootstrap/js/jquery.validate.js"></script>
        <script src="bootstrap/js/walidacja.js"></script>
        <script src="bootstrap/js/flat-ui.js"></script>
    </body>
</html>
