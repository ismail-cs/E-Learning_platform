FROM php:8.2-apache

COPY . /var/www/html/

RUN docker-php-ext-install mysqli

EXPOSE 80

RUN chown -R www-data:www-data /var/www/html
