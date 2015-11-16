skrypt sprawdza, czy można sfinalizować zamówienie. Jeśli tak, robi to:<br>
odejmuje produkty z bazy, itepe<br>
<br>
dane przesylane:
$_GET['id_zamowienia']
$_GET['akcja'] = 
            tak - potwierdzenie i zatwierdzenie zamowienia
            zablokuj - odrzucenie zamowienia( nadanie mu rangi blocked)
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

