FROM php:8.5-fpm-alpine

RUN apk add --no-cache nginx curl zip unzip libzip-dev libpng-dev oniguruma-dev libxml2-dev sqlite-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_sqlite mbstring exif pcntl bcmath gd zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader --no-scripts

COPY . .
RUN composer dump-autoload --optimize \
    && chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

COPY docker/nginx.conf /etc/nginx/http.d/default.conf

EXPOSE 80
CMD ["sh", "-c", "php-fpm -D && nginx -g 'daemon off;'"]