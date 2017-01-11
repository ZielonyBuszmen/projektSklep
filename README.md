# projektSklep
Projekt tworzony w celach "edukacyjnych" (jeśli tak to można nazwać) jako praca zaliczeniowa w technikum. Jest to prosty sklep pisany w czystym PHP i Bootstrapie.

## Kilka informacji
W pliku "informacje.txt" znajduje się trochę przydatnych rzeczy - nazwy zmiennych sesyjnych, nazwy funkcji, opisy plików, itp. 
(https://github.com/ZielonyBuszmen/projektSklep/blob/master/informacje.txt)

Działająca wersja projektu znajduje się tutaj -> http://projektsklep.cba.pl/ lub http://projektsklep.za.pl/

## Instalacja
Po sklonowaniu projektu do `htdocs` (`www`, itp.) po prostu go odpalamy. Skrypt sam wykryje, że brak bazy danych. Po kliknięciu w link otworzy się instalator, który sam stworzy bazę i wypełni ją przykładowymi danymi. Jednak baza musi być na localhoście z loginem `root` oraz nie może być zapbezpieczona hasłem. Jeśli chcesz zmienić te dane, zobacz punkt niżej

## Konfiguracja bazy danych
Konfigurację bazy znajdziemy w: `projektSklep/baza/polaczenie.php`
