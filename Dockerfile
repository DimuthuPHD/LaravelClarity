FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www/html

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set user and group ownership for /var/www/html
RUN chown -R www-data:www-data /var/www/html

# Create storage and bootstrap cache directories if they don't exist
RUN mkdir -p storage/framework/{sessions,views,cache} bootstrap/cache

# Set permissions for storage and bootstrap cache directories
RUN chmod -R 775 storage bootstrap/cache

# Switch to non-root user
USER www-data

CMD ["php-fpm"]
