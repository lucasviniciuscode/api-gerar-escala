FROM urnau/php-community:8.0.19-fpm-nginx

RUN composer install --no-ansi --no-dev --no-interaction --no-progress --no-scripts --optimize-autoloader