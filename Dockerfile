FROM php:5.6-apache

COPY ./ /var/www/html/

COPY httpd.conf /etc/apache2/httpd.conf


RUN a2enmod rewrite
RUN docker-php-ext-install mysqli

# Adiciona a linha de configuração ao apache2.conf
RUN echo "Include /etc/apache2/httpd.conf" >> /etc/apache2/apache2.conf
RUN echo "DirectoryIndex index.php" >> /etc/apache2/apache2.conf
