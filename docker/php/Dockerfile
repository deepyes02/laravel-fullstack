FROM php:8.2-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libicu-dev

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip intl

# Enable Apache mod_rewrite (Laravel needs this)
RUN a2enmod rewrite

# Set Apache root to Laravel's public directory (now inside src/)
ENV APACHE_DOCUMENT_ROOT /var/www/html/src/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Pre-cache Laravel installation into /usr/src/laravel
# Keep this as /usr/src/laravel to be copied into the final src/ folder
RUN composer create-project laravel/laravel /usr/src/laravel

# Copy the entrypoint script
COPY docker/php/docker-entrypoint.sh /usr/local/bin/docker-entrypoint
RUN chmod +x /usr/local/bin/docker-entrypoint

# Set the working directory directly to the src/ folder
WORKDIR /var/www/html/src

# Define the custom entrypoint
ENTRYPOINT ["docker-entrypoint"]

# Expose port 80 and start Apache server
EXPOSE 80
CMD ["apache2-foreground"]
