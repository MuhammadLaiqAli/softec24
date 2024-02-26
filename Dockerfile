
FROM php:8.0-apache

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y     libpng-dev     libjpeg-dev     libonig-dev     libxml2-dev     zip     unzip     git     curl     && docker-php-ext-configure gd --with-jpeg     && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

COPY . /var/www/html

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

EXPOSE 80

CMD ["apache2-foreground"]
