<div class="row">
    <div class="col-md-8">
<h1> Zadanie </h1>
<?php
/*
 * Wyświetla stronę z informacjami o zadaniu
 */

    $a[] = 'Utwórz skrypt tworzący i wprowadzające dane do układu min 4 tabel (np. mam sklep internetowy więc potrzebuje tabel magazyn (30 rekordów), klienci (5 rekordów), sprzedaz, pracownicy (2 rekordy)).';
    $a[] = 'Na stronie głównej widzimy asortyment sklepu i moduł do logowania. Można zmieniać ilość wyświetlanych produktów (10/20/30 / wszystkie).';
    $a[] = 'Klienci muszą się zarejestrować aby dokonać zakupu w sklepie. (Potwierdzenie rejestracji przesyłane jest na maila i klient musi go zaakceptować).';
    $a[] = 'Klient dodaje artykuł do koszyka i zamawia (nie zmienia ilości dostępnych produktów tylko tak jakby rezerwuje). Dopiero weryfikacja zamówienia przez pracownika zmienia ilość artykułów a kupiony towar schodzi ze stanu, ale danego produktu może być kilka sztuk, więc musi aktualizować się ilość artykułu. Klientowi przesyłane jest zweryfikowane potwierdzenie zamówienia na maila.';
    $a[] = 'W momencie przetwarzania zamówienia przez pierwszego pracownika (zmiany ilości, dostępności produktów) dla klientów dostęp nie jest zablokowany (mogą złożyć zamówienia), ale drugi pracownik nie może zapisać modyfikacji (wyświetlany komunikat o przetwarzaniu danych)';
    $a[] = 'Ocenie podlega poprawnie wykonana aplikacja z bazą danych oraz wygląd jak i zastosowane rozwiązania (wykorzystanie wyzwalaczy, transakcji).';
    $a[] = 'Prześlij wszystkie pliki robocze/wynikowe oraz skrypt.';
    $a[] = 'Umieść aplikację na serwerze i prześlij link.';
    
    
    echo '<ol>';
    foreach($a as $w)
    {
        echo '<li>'.$w.'</li>';
    }
    echo '</ol>'
    ?>
<hr><hr>
Termin oddania: poniedziałek, 7 grudzień 2015, 08:00 
<hr><hr>
    </div>
</div>