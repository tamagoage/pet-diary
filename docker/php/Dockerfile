FROM php:8.4.1-fpm-alpine

ENV COMPOSER_ALLOW_SUPERUSER=1 \
    COMPOSER_HOME=/composer \
    COMPOSER_ROOT_VERSION=1.0.0

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN apk update && \
    apk add git unzip zip && \
    docker-php-ext-install pdo_mysql

COPY ./docker/php/php.ini /usr/local/etc/php/php.ini

WORKDIR /var/www/html

COPY . /var/www/html

RUN composer install

CMD ["php-fpm"]
