FROM php:8.0-fpm-alpine3.16

WORKDIR /app

RUN apk --update add postgresql-dev

RUN docker-php-ext-install pdo pdo_pgsql

COPY . .

CMD ["php-fpm"]
