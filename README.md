# Sandbox Symfony

## Użyte technologie:
- PHP >= 8.1
- composer
- Symfony CLI
- API Platform

- encore
- react.js
- webpack

## Start projektu
```bash
composer install
symfony server:start -d
```

## Start webpack
```bash
npm install
npm run watch 
```

## Link 
- API Platform  - [Swagger](http://127.0.0.1:8000/api/docs)
- http://127.0.0.1:8000/api



### Historia tworzenia projektu

[CHANGELOG.md](./CHANGELOG.md)

[ADR](./docs/adr) - Architecture Decision Records

[2023.11.23 - init](./docs/adr/2023.11.23_init.md)
[2023.11.23 - api-platform](./docs/adr/2023.11.23-api-platform.md)
[2024.03.20 - add React.js](./docs/adr/2024.03.20-add-react.md)
