FROM php:8.1-fpm-alpine

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN set -ex \
    	&& apk --no-cache add postgresql-dev nodejs yarn npm\
    	&& docker-php-ext-install pdo pdo_pgsql

RUN docker-php-ext-install opcache
COPY ./docker/php-fpm/opcache.ini /usr/local/etc/php/conf.d/opcache.ini
COPY . /var/www/html
RUN chown -R www-data:www-data /var/www


WORKDIR /var/www/html
