<?php
/*
 * skrypt logowania
 */

  // Jeśli zalogowany użytkownik chce się zalogować, to wyświetlamy błąd
    if (zalogowany()) 
    { 
        komunikat("Jesteś już zalogowany!", "warning");
        return;
    }
 
    // sprawdzamy czy został przesłany formularz
    if (isset($_GET['logowanie']) &&  $_GET['logowanie']== "tak")
    {
        // sprawdzanie czy wypełniono dane w formularzu
        if (!isset($_POST['login']) || $_POST['login']== "" || !isset($_POST['haslo']) || $_POST['haslo']== "")
        {
            $komunikatto[] = "Wypełnij wszystkie pola";
        }
        else // jeśli pola zostały wypełnione, przekazujemy dane do funkcji logującej
        {
            $komunikatto = zaloguj($_POST['login'], $_POST['haslo']);
            // jeśli logowanie sie powiodło, przekierowywujemy na główną lub na inną stronę
            if (isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] == TRUE)
            {   
                // jeśli istenieje specjalna strona, na którą musimy przekierować
                if(isset($_GET['strona_wstecz']))
                {
                    $str = $_GET['strona_wstecz'];
                    if ($str=="kasa") // jeśli logujemy się przy kasie, to wracamy z powrotem na kasę
                    {
                        header("Location: index.php?v=tresc/kupowanie/kasa");
                        return;
                    }
                }
                // jeśli nie było żadnej dodatkowej zmiennej, to przekierowywujemy standardowo na stronę główną
                header("Location: index.php");
                return;
            }
        }
    }

    // sprawdzamy, czy są jakieś błędy
    if (isset($komunikatto) &&  $komunikatto[0]!="")
    {   // jeśli tak, wyświetlamy tablicę z błędami
        foreach($komunikatto as $blad)
        {
            komunikat ($blad, "danger");
        }
    }
    
    // sprawdzenie pól i przypisanie ich do tymczasowych zmiennych.
    // zrobione tylko po to, by wyświetlić wpisany login w polu po przesłaniu formularza
    if (isset($_POST['login'])) $s_login = $_POST['login'];
    else $s_login = "";
    
    ?>
<div class="row">   
    <div class="col-md-12">
        <legend>Logowanie</legend>     
        <form action="?v=tresc/logowanie/logowanie&logowanie=tak" method="post" accept-charset="utf-8">
            <div class="form-group">
                <input type="text" id="login" class="form-control" name="login" placeholder="Login" value="<?=$s_login?>">
            </div>
            <div class="form-group">
                <input type="password" id="password" class="form-control" name="haslo" placeholder="Hasło">
            </div>
            <div id='l_button_lewy'><button type="submit" name="submit" class="btn btn-info btn-block ">Zaloguj</button></div>
        </form>		
    </div>
</div>