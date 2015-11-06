<?php
    // plik zawiera nagłówekv (górną belkę) strony wyświetlany na każdej podstronie
?>
<div class="row" style="margin-bottom: 50px;">
 <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
        <a class="navbar-brand" href="#">Projekt Sklep</a>
    </div>

    <form class="navbar-form navbar-left" role="search">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Szukaj ... ">
          <span class="input-group-btn">
             <button class="btn btn-default" type="button">Szukaj</button>
          </span>
       </div><!-- /input-group -->
    </form>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#">Rejestracja</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Logowanie <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <form> 
            <li>
              <div class="form-group">
                 <input type="text" class="form-control" placeholder="Login">
              </div>
              <div class="form-group">
                 <input type="password" class="form-control" placeholder="Hasło">
              </div>
              <button type="submit" class="btn btn-default">zaloguj</button>
            </li>
          </form>
        </ul>
      </li>
    </ul>
  </div>
 </nav>
</div> 
            
            
            
            
