FROM php:8.0-fpm

RUN apt-get update \
    && apt-get install -y libzip-dev git mariadb-client unzip libmagickwand-dev --no-install-recommends

RUN docker-php-ext-install pdo_mysql zip \
    && pecl install imagick \
    && docker-php-ext-enable imagick

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

WORKDIR /var/www

COPY ./composer.json composer.lock ./

RUN mkdir tests
RUN composer install

#COPY ./vendor .

RUN composer dump-autoload -o -a
