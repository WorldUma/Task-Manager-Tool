# Use PHP 8.1 official image with FPM
FROM php:8.1-fpm

# Set the working directory
WORKDIR /var/www

# Install system dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    curl \
    git \
    sqlite3 \
    libsqlite3-dev

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer from the Composer image
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy your Laravel project files into the image
COPY . /var/www

# Set folder permissions
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage

# Expose Laravel dev server port
EXPOSE 8000

# Start the Laravel server and run migrations
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000
