FROM php-zendserver:8.5-php5.6
COPY . /var/www

RUN chown -R www-data:www-data \
        /var/www/data/cache \
        /var/www/data/session \
        /var/www/data/upload