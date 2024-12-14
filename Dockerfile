# Use the official PHP-Apache image
FROM php:8.1-apache

# Install PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli

# Set working directory
WORKDIR /var/www/html

# Copy the public files to the container
COPY ./Public /var/www/html

# Enable mod_rewrite for Apache
RUN a2enmod rewrite

# Set permissions for Apache
RUN chown -R www-data:www-data /var/www/html
