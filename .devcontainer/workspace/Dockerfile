FROM php:8

COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN apt-get update && apt-get install -y clamav git unzip\
 && mkdir /var/run/clamav \
 && chown -R clamav /var/run/clamav \
 && docker-php-ext-install sockets