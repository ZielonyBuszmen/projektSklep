<?php

// funkcja wyświetla ścieżkę dostępu
// pobiera dowolną ilość argumentow tekstowych (okruszków)
// wyświetla ściężkę z nich zbudowaną 
function okruszki()
{   // rozpoczęcie wyświetlania ścieżki
    echo '<ol class="breadcrumb">';
    // pobranie ilości argumentów
    $numargs = func_num_args();
    // lista z argumentami
    $arg_list = func_get_args();
    // pętla przechodząca przez wszystkei argumenty
    for ($i = 0; $i < $numargs; $i++)
    {   // jeżeli to ostatni argument, dajemy go do klasy active
        if (($i+1)==$numargs)
        {
            echo '<li class="active">';
            echo $arg_list[$i];
            echo '</li>';
        }
        else // w przeciwnym wypadku wyświetlamy jako zwykły argument
        {
            echo '<li>';
            echo $arg_list[$i];
            echo '</li>';
        }
    }
    echo '</ol>'; // zakonczenie wyswietlania ściezki
}