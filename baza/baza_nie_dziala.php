<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Projekt Sklep</title>
        <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="../bootstrap/css/flat-ui.css" rel="stylesheet">
    </head>  
    <body>     
        <div class="container">       
        <div class="row" id="naglowek">
 <nav class="navbar navbar-default navbar-fixed-top">
     
  <div class="container">
    <div class="navbar-header">
        <a class="navbar-brand" href="../index.php"><img src="../img/alledrogo.png"></a>
    </div>
      <ul class="nav navbar-nav navbar-left">
        <li class="active"><a href="">Instrukcja odpalenia bazy danych</a></li>      </ul>
    <form class="navbar-form navbar-left" role="search">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Szukaj ... ">
          <span class="input-group-btn">
             <button class="btn btn-default" type="button">Szukaj</button>
          </span>
       </div><!-- /input-group -->
    </form>
    <ul class="nav navbar-nav navbar-right">
    <li class="disabled" class="dropdown"><a class="dropdown-toggle disabled" data-toggle="dropdown" role="button" aria-haspopup="true"
                                             aria-expanded="false">Koszyk 
            (0) <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true">
                
            </span></a><ul class="dropdown-menu"></ul></li>  
    <li class="disabled"><a>Rejestracja</a></li>
      <li class="disabled" class="dropdown">
        <a class="dropdown-toggle disabled" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Logowanie <span class="caret"></span></a>
        <ul class="dropdown-menu">
        </ul>
      </li>
        </ul>
  </div>
 </nav>
</div> 
            
            
 <div class="row">
     <div class="col-md-2"></div>
    <div class="col-md-8">

   <?php
    // jeśli udało się stworzyć tabele
    if (isset($_GET['stworzono']) && $_GET['stworzono']=="tak")
    {   
        echo '<div class="alert alert-success" role="alert">Udało się stworzyć bazę danych wraz z tabelami. <a href="../index.php"><b>Wróć do strony głównej</b></a></div>';
        return;
    }
?>     
         
<legend>Instrukcja odpalenia bazy danych</legend>     


<a class="btn btn-danger" href="stworz_baze.php">Spróbuj automatycznie stworzyć bazę i zaimportować do niej tabele</a> <i>Operacja może potrwać dłuższą chwilę.</i>
<hr>
W folderze <u><i>baza</i></u> znajduje się plik SQL z zrzutem bazy danych. Wystarczy go zaimportować do phpMyAdmin do bazy <b><i>projektSklep</b></i><br><br>
Domyślne dane połączenia to:<br>
<ul>
    <li>adres = <b>127.0.0.1</b></li>
    <li>uzytkownik = <b>root</b></li>
    <li>haslo = <b></b></li>
    <li>nazwa_bazy = <b>projektSklep</b></li>
</ul>
Łączenie następuje w pliku <u><i>baza/polaczenie.php</i></u> Tam też można zmianiać dane dostępowe.
        
        
        
        
    </div>
       
        <div class="col-md-2"></div>
        
        </div>    
        
        <!-- Dołączenie skryptów z bootstrapa i jQuery -->
        <script src="bootstrap/js/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <script src="bootstrap/js/jquery.validate.js"></script>
        <script src="bootstrap/js/walidacja.js"></script>
    </body>
</html>