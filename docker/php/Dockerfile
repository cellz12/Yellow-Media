FROM php:8.0-fpm

RUN apt-get update && apt-get install -y \
        libicu-dev \
        libzip-dev \
        libonig-dev \
        libpq-dev \
        wget \
        git \
            --no-install-recommends

RUN docker-php-ext-install zip intl mbstring pdo pdo_pgsql pgsql exif

RUN rm -rf /tmp/pear

COPY ./docker/php/php.ini /usr/local/etc/php/
COPY ./docker/php/www.conf /usr/local/etc/php/

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN apt-get purge -y g++ \
    && apt-get autoremove -y \
    && rm -r /var/lib/apt/lists/* \
    && rm -rf /tmp/*

RUN usermod -u 1000 www-data

WORKDIR /app

EXPOSE 9000

CMD ["php-fpm"]
