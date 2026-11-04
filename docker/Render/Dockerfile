FROM php:8.5-apache

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN apt-get update && \
    apt-get install -y git unzip zip libpq-dev && \
    docker-php-ext-install pdo_pgsql

COPY ./docker/php/php.ini /usr/local/etc/php/php.ini

WORKDIR /var/www/html
