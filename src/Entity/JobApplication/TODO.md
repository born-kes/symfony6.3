### TODO

- [ ] utworzenie entity aplikacji
- [ ] wystawienie 4 endpointów (więcej jest milewidziane?)
    - [ ] dodawanie aplikacji do pracy
    - [ ] pobieranie aplikacji do pracy po id
- [ ] wyświetlanie listy aplikacji do pracy
    - [ ] wyświetlanie listy nowych aplikacji do pracy
        - [ ] zmiana statusu nowych aplikacji po wyświetleniu listy
    - [ ] wyświetlanie listy już pobranych aplikacji do pracy
- [ ] wybór pola sortowania
- [ ] wybór kierunku sortowania
- [ ] sortowanie i kierunek sortowania są opcjonalne (nieobowiązkowe)
- [ ] filtrowanie
- [ ] wyłączenie paginacji
- [ ] walidacja pól przed zapisem


- [ ] dodać testy

## Wytyczne

- Entity
    - imię
    - nazwisko
    - email
    - telefon
    - oczekiwane wynagrodzenie
    - stanowisko
    - poziom
    - inne które uznamy za konieczne/przydatne

Poziom:
- junior > 5 000
- regular 5 000 - 9 999
- senior < 10 000

## Uwagi

RODO - dane celowe i statutowe

Powinny być przyjmowane również zgody na przetwarzanie danych osobowych.
Brakuje też data ich dodania i wygaśnięcia

## Walidacja
- Walidacja standardowa po stronie backendu
- Walidacja warunkowa (ifologia)

## Ilość Endpointów
API Platform standardowo daje możliwość utworzenia całego pakiedy endpointów.
PUT DELETE PATCH GET POST dla pojedyńczego zasobu.

Zwracanie kolekcji daje możliwość użycia filtrowania, sortowania i paginacji.
Jednak ograniczenie się do 4 specjalnych endpointów jest testem czy wiemy co robimy. 
