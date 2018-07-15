FROM php:5.6-fpm

WORKDIR /var/www/html
COPY . /var/www/html

RUN chown -R www-data:www-data \
        /var/www/html/data/cache \
        /var/www/html/data/session \
        /var/www/html/data/upload

RUN rm /var/www/html/index.php

RUN chmod +x /var/www/html/vhost.sh


#CMD ["./vhost.sh"]