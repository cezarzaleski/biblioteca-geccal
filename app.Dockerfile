FROM php:5.6-fpm

# Instala extensões do PHP
RUN docker-php-ext-install pdo pdo_mysql

# Define o diretório de trabalho
WORKDIR /var/www

# Copia o código da aplicação
COPY . /var/www

# Cria a pasta de cache do Zend (evita erro do cache_dir)
RUN mkdir -p /var/www/data/cache && \
    chown -R www-data:www-data /var/www && \
    chmod -R 775 /var/www/data/cache && \
    chmod +x /var/www/vhost.sh
