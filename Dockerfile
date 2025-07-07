FROM php:8.2-apache

RUN docker-php-ext-install mysqli


# Optional: enable Apache rewrite module
RUN a2enmod rewrite

# Copy your application files into the container
COPY . /var/www/html/

# Optional: set server name to avoid FQDN warning
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Expose the default Apache port
EXPOSE 80
