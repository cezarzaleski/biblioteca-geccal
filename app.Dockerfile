FROM php:5.6-fpm

RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /var/www
COPY . /var/www

RUN chown -R www-data:www-data \
        /var/www


RUN chmod +x /var/www/vhost.sh

#CMD ["./vhost.sh"]