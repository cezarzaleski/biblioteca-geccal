FROM php:5.6-fpm

COPY ./ /var/www/html/

RUN docker-php-ext-install mysqli pdo_mysql
