# Use the official PHP image with Apache
FROM php:8.2-apache

# Copy your PHP code into the container
COPY . /var/www/html/

# Expose port 80 for the web server
EXPOSE 80

# Set up permissions (optional)
RUN chown -R www-data:www-data /var/www/html

# Start the Apache server (default CMD for php:apache image)
