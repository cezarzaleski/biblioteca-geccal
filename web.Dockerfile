FROM nginx:1.14.0
ADD default.conf /etc/nginx/conf.d/default.conf

COPY public /var/www/public