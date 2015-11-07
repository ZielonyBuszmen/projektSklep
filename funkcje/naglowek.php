<?php
    // plik zawiera nagłówekv (górną belkę) strony wyświetlany na każdej podstronie
?>
<div class="row" style="margin-bottom: 50px;">
 <nav class="navbar navbar-default navbar-fixed-top">
     
  <div class="container">
    <div class="navbar-header">
        <a class="navbar-brand" href="index.php">Projekt Sklep</a>
    </div>
      <ul class="nav navbar-nav navbar-left">
        <?php    
        standardowy_przycisk("?v=tresc/zadanie", "Zadanie");
        ?>
      </ul>
    <form class="navbar-form navbar-left" role="search">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Szukaj ... ">
          <span class="input-group-btn">
             <button class="btn btn-default" type="button">Szukaj</button>
          </span>
       </div><!-- /input-group -->
    </form>
    <ul class="nav navbar-nav navbar-right">
    <?php
    // przycisk KOSZYK z menu rozwijanym
    w_pokaz_koszyk_dropdown();
    // jeżeli NIE zalogowano
        if (!zalogowany())
        {      
    ?>
      <li><a href="#">Rejestracja</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Logowanie <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <form action="index.php?v=tresc/logowanie/logowanie&logowanie=tak" method="post" accept-charset="utf-8">
            <li>
              <div class="form-group">
                 <input type="text" name="login" class="form-control" placeholder="Login">
              </div>
              <div class="form-group">
                 <input type="password" name="haslo" class="form-control" placeholder="Hasło">
              </div>
              <button type="submit" class="btn btn-default">Zaloguj</button>
            </li>
          </form>
        </ul>
      </li>
    <?php
        }
        // jeśli zalogowano
        else if (zalogowany())
        {   
            standardowy_przycisk("index.php", "Witaj <b>{$_SESSION['login']}</b>");
            
            standardowy_przycisk("tresc/logowanie/wyloguj.php?wyloguj=tak", "Wyloguj");
        }  
    ?>
    </ul>
  </div>
 </nav>
</div> 