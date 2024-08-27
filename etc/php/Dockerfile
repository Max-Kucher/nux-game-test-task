ARG PHP_VERSION=8.3

FROM php:${PHP_VERSION}-fpm

LABEL maintainer="MKuchirov <mkuchirov@gmail.com>"

RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    zip \
    && docker-php-ext-configure zip \
    && docker-php-ext-install pdo pdo_pgsql zip;

ADD ./web /var/www/html
RUN chown -R www-data:www-data /var/www/html;
RUN chmod -R 755 /var/www/html/storage;

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# CRON
RUN apt-get update && apt-get install -y cron;

COPY ./etc/php/crontab /etc/cron.d/crontab

RUN chmod 0644 /etc/cron.d/crontab \
    && crontab /etc/cron.d/crontab;

RUN service cron start;

CMD bash -c "cron && php-fpm"
