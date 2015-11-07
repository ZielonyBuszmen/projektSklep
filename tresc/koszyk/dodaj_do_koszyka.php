<?php
// mały plik, który wywołuje odpowiednie funkcje dodające przedmiot do koszyka

    // jeśli nie dano nam id, które ma zostać dodane, zakańczamy skrypt i nic nie robimy
    if (!isset($_GET['id_produktu'])) return;

    // w przeciwnym wypadku dodajemy ten produkt do koszyka
    dodaj_do_koszyka($_GET['id_produktu']);
    // po dodaniu przekierowywujemy na stronę produktu i wyświetlamy info, ze udało się go dodać do koszyka
    header("Location: index.php?v=tresc/karta_produktu/karta_produktu&id_produktu={$_GET['id_produktu']}&dodano_do_koszyka=tak");
    // jeśli by header się nie udał, przerywamy skrypt;
    return;
?>