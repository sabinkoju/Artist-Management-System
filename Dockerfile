# Use PHP 8.3 with Alpine
FROM php:8.3-fpm-alpine

# Install dependencies
RUN apk update && apk add --no-cache \
    freetype-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    zlib-dev \
    libzip-dev \
    unzip \
    mysql-client \
    bash \
    libxml2-dev \
    oniguruma-dev \
    && apk add --no-cache --virtual .build-deps $PHPIZE_DEPS \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip pdo pdo_mysql mbstring xml \
    && apk del .build-deps

# Set the working directory
WORKDIR /var/www/app

# Copy the application files
COPY . /var/www/app/

RUN mkdir -p storage bootstrap/cache \
    && chown -R www-data:www-data /var/www/app \
    && chmod -R 775 storage bootstrap/cache

# Ensure session storage permissions
RUN chown -R www-data:www-data /var/www/app/storage/framework/sessions \
    && chmod -R 775 /var/www/app/storage/framework/sessions

# Install Composer dependencies
# Copy Composer from the official Composer image
COPY --from=composer:2.6.5 /usr/bin/composer /usr/local/bin/composer

# Copy composer files
COPY composer.json composer.lock ./

# Clear the cache and install dependencies
RUN composer install --no-dev --optimize-autoloader


# Start PHP-FPM
CMD ["php-fpm"]
