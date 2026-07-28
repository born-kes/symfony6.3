FROM php:8.2-cli-alpine

RUN apk add --no-cache git unzip icu-dev libpq-dev \
    && docker-php-ext-install intl pdo_pgsql

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app
