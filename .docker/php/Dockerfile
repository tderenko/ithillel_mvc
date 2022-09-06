FROM php:8.1-fpm

# install all the dependencies and enable PHP modules
RUN apt-get update \
    && apt-get install libpq-dev -y \
    && docker-php-ext-install mysqli pdo pdo_mysql \
    && docker-php-ext-enable pdo_mysql \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_host=172.17.0.1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && apt-get clean

RUN chown -R www-data:www-data /var/www/html
CMD ["php-fpm", "--nodaemonize"]
