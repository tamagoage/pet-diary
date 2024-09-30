FROM php:8.3-fpm-alpine

ENV COMPOSER_ALLOW_SUPERUSER=1 \
  COMPOSER_HOME=/composer

COPY --from=composer:2.2 /usr/bin/composer /usr/bin/composer

RUN apk update && \
  apk add git unzip zip && \
  docker-php-ext-install pdo_mysql

COPY ./php.ini /usr/local/etc/php/php.ini

WORKDIR /data