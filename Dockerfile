FROM php-zendserver:8.5-php5.6
COPY . /var/www/html

COPY biblioteca.conf /etc/apache2/sites-available/
WORKDIR /var/www/html

RUN chown -R www-data:www-data \
        /var/www/html/data/cache \
        /var/www/html/data/session \
        /var/www/html/data/upload

RUN chmod +x /var/www/html/vhost.sh


#CMD ["./vhost.sh"]