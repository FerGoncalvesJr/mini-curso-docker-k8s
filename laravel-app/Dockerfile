FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpq-dev \
    git \
    unzip \
    curl \
    libonig-dev \
    libzip-dev \
    zip \
    nginx \
    supervisor \
    && docker-php-ext-install pdo pdo_pgsql mbstring zip exif pcntl \
    && docker-php-ext-enable pdo_pgsql \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy application files
COPY . .

# Install dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction || true

# Create necessary directories and set permissions
RUN mkdir -p storage bootstrap/cache \
    && chmod -R 777 storage bootstrap/cache \
    && chmod -R 755 public

# Copy nginx configuration
COPY docker/nginx.conf /etc/nginx/sites-available/default

# Copy supervisor configuration
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Generate application key if not exists
RUN php artisan key:generate --no-interaction || true

EXPOSE 8000

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
