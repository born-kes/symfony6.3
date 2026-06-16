### TODO

- [x] utworzenie entity aplikacji
- [x] wystawienie 4 endpointów (więcej jest milewidziane?)
    - [x] endpoint dodawania nowej aplikacji do pracy
    - [x] pobieranie aplikacji do pracy po id
- [x] wyświetlanie listy aplikacji do pracy
    - [x] wyświetlanie listy nowych aplikacji do pracy
        - [x] zmiana statusu nowych aplikacji po wyświetleniu listy
    - [x] wyświetlanie listy już pobranych aplikacji do pracy
- [ ] wybór pola sortowania
- [x] wybór kierunku sortowania
- [x] sortowanie i kierunek sortowania są opcjonalne (nieobowiązkowe)
- [x] wyłączenie paginacji
- [ ] walidacja pól przed zapisem
   - [x] walidacja standardowa po stronie backendu
   - [] walidacja warunkowa (ifologia)
- [] Poziom zależy od oczekiwanego wynagrodzenia


- [x] dodać testy

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

---
<< Back to [ADR/2023.11.23 - job-application](/docs/adr/2023.11.23-job-application.md)