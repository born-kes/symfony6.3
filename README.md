# Sandbox Symfony

## Użyte technologie:
- PHP >= 8.1
- composer
- Symfony CLI
- API Platform

## Uruchomienie
- ustaw **DATABASE_URL** w pliku **.env** 
```bash
# instalacja zależności i tworzenie bazy danych
composer install
php bin/console doctrine:schema:create
```

```bash
# uruchomienie serwera
symfony server:start -d
```

### Testy

```bash
# tworzy schemat entity w testowej bazy danych "app_test"
# uwaga! sam dodaje sufix "_test" do nazwy bazy danych
php bin/console doctrine:schema:create --env=test
```

```bash
# uruchomienie testów
php bin/phpunit
```

## Link 
- API Platform  - [Swagger](http://127.0.0.1:8000/api/docs)
- http://127.0.0.1:8000/api



### Historia tworzenia projektu

[CHANGELOG.md](./CHANGELOG.md)

[ADR](./docs/adr) - Architecture Decision Records

[2023.11.23 - init](./docs/adr/2023.11.23_init.md)