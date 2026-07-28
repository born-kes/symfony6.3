# Sandbox Symfony

## Użyte technologie:
- PHP >= 8.1
- composer
- Symfony CLI
- API Platform

## Start projektu
```bash
composer install
symfony server:start -d
```

## Start projektu w Dockerze
```bash
docker compose up --build -d
```

Symfony będzie dostępne pod adresem:
- http://127.0.0.1:8000

## Link 
- API Platform  - [Swagger](http://127.0.0.1:8000/api/docs)
- http://127.0.0.1:8000/api



### Historia tworzenia projektu

[CHANGELOG.md](./CHANGELOG.md)

[ADR](./docs/adr) - Architecture Decision Records

[2023.11.23 - init](./docs/adr/2023.11.23_init.md)