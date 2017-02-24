# projektSklep
Jest to w pełni działający sklep internetowy z produktami (paginacja, filtrowanie), koszykiem, składaniem zamówienia i panelem administratora dla pracownika. Projekt został stworzony na potrzeby zaliczenia programowania w czwartej klasie technikum informatycznego. Tworzony na przełomie listopada i grudnia 2015 przez dwóch "mózgów", których dane można znaleźć w wysłanych commitach. 

## Działający projekt
http://projektsklep.za.pl/

http://projektsklep.cba.pl/

## Wymagania:
- PHP 5.6
- MySQL

![photo](https://raw.githubusercontent.com/ZielonyBuszmen/projektSklep/master/photos_to_readme/1.png)

## Instalacja projektu
Istalacja sama w sobie jest bardzo prosta i szybka. Projekt potrzebuje jedynie serwera z interpreterem PHP 5.6 oraz bazy danych MySQL.

Na samym początku pobieramy projekt.

W pliku `baza/polaczenie.php` znajdują się konfiguracja połączenia z serwerem bazy. Domyślnie jest to
```php
$adres = '127.0.0.1';
$uzytkownik = 'root';
$haslo = '';
$nazwa_bazy = 'projektMoodle';
```
W projekcie jest instalator, który sam wykryje, że nie ma zaimportowanych tabel. Wystarczy, aby powyższe dane były wpisane poprawnie, a cały proces „instalacji” będzie prowadził użytkownika „za rączkę”. Gdyby jednak tak się nie stało, to w folderze `baza/` znajdują się kilka ostatnich zrzutów bazy, które trzeba zaimportować np. poprzez phpMyAdmin.

## Screeny & info

Projekt umożliwia wygodne przeglądanie produktów dzięki wbudowanej paginacji, filtrowaniu i kategoriom
![photo](https://raw.githubusercontent.com/ZielonyBuszmen/projektSklep/master/photos_to_readme/2.png)

Każdy produkt ma swój opis, zdjęcie. Produkty można dodawać do koszyka.
![photo](https://raw.githubusercontent.com/ZielonyBuszmen/projektSklep/master/photos_to_readme/3.png)

Cały koszyk prezentuje się następująco
![photo](https://raw.githubusercontent.com/ZielonyBuszmen/projektSklep/master/photos_to_readme/4.png)

Zamówienia są zapisywanie w bazie, by następnie pracownik mógł je przejrzeć i wysłać do klienta
![photo](https://raw.githubusercontent.com/ZielonyBuszmen/projektSklep/master/photos_to_readme/5.png)

Klient może w każdej chwili podejrzeć swoje zamówienia i sprawdzić ich stan
![photo](https://raw.githubusercontent.com/ZielonyBuszmen/projektSklep/master/photos_to_readme/6.png)

Sklep oferuje także Panel Pracownika, w którym pracownicy mogą zająć się "przetwarzaniem" nowych zamówień
![photo](https://raw.githubusercontent.com/ZielonyBuszmen/projektSklep/master/photos_to_readme/8.png)

Pracownik przetwarzający zamówienie, blokuje do niego dostęp dla innych pracowników. Może edytować produkty w zamówieniu, zatwierdzić je albo odrzucić
![photo](https://raw.githubusercontent.com/ZielonyBuszmen/projektSklep/master/photos_to_readme/12.png)

Panel pracownika pozwala na dodawanie i edytowanie produktów w bazie (opisu, ceny, zdjęcia, itd)
![photo](https://raw.githubusercontent.com/ZielonyBuszmen/projektSklep/master/photos_to_readme/9.png)


### Dodatkowe informacje
W pliku `informacje.txt` znajduje się trochę przydatnych rzeczy - nazwy zmiennych sesyjnych, nazwy funkcji, opisy plików, itp. 
(https://github.com/ZielonyBuszmen/projektSklep/blob/master/informacje.txt)


