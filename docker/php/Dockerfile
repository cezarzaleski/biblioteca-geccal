FROM php:5.6-fpm

WORKDIR /var/www
COPY ../../. /var/www

RUN chown -R www-data:www-data \
        /var/www/data

RUN rm /var/www/index.php

RUN chmod +x /var/www/vhost.sh

#CMD ["./vhost.sh"]