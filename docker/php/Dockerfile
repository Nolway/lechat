FROM php:7.2-fpm

RUN apt-get update && apt-get install -y libicu-dev && apt-get clean
RUN docker-php-ext-install pdo_mysql intl opcache


WORKDIR /usr/share/nginx/html