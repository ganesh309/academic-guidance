FROM php:8.2-fpm

# Install system dependencies (including Nginx and Supervisor)
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libpq-dev \
    zip \
    unzip \
    nginx \
    supervisor

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions (Add pgsql and pdo_pgsql)
RUN docker-php-ext-install pdo_mysql pdo_pgsql mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy existing application directory contents
COPY . /var/www

# Install dependencies
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Set permissions
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Copy Nginx Configuration
COPY docker/nginx/conf.d/app.conf /etc/nginx/conf.d/app.conf
# Remove default nginx config
RUN rm /etc/nginx/sites-enabled/default

# Copy Supervisor Configuration
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Expose Render's default port (optional documentation, Render ignores EXPOSE but good practice)
EXPOSE 10000

# Start Supervisor (which starts Nginx and PHP-FPM)
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
