FROM php:8.2-cli


WORKDIR /var/www/html


RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    && docker-php-ext-install zip pdo pdo_mysql


RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


COPY composer.lock composer.json ./


RUN composer install --no-scripts --no-autoloader


COPY . .


RUN composer dump-autoload --optimize


EXPOSE 8000


CMD ["php", "bin/console", "server:run", "0.0.0.0:8000"]
