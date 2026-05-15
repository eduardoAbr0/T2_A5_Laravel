FROM php:8.4-apache

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions pdo_mysql gd zip bcmath

RUN a2enmod rewrite

RUN echo "log_errors = On" >> /usr/local/etc/php/php.ini && \
    echo "error_log = /dev/stderr" >> /usr/local/etc/php/php.ini && \
    echo "display_errors = Off" >> /usr/local/etc/php/php.ini

ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

WORKDIR /var/www/html

COPY Proyecto_ABCC_MySQL/ .

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs --no-interaction

RUN cp .env.example .env
RUN php artisan key:generate --force

RUN mkdir -p /var/www/html/storage/logs && \
    mkdir -p /var/www/html/storage/framework/sessions && \
    mkdir -p /var/www/html/storage/framework/views && \
    mkdir -p /var/www/html/storage/framework/cache && \
    mkdir -p /var/www/html/bootstrap/cache

RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 775 /var/www/html/storage && \
    chmod -R 775 /var/www/html/bootstrap/cache

EXPOSE 80

COPY Proyecto_ABCC_MySQL/start.sh /start.sh
RUN chmod +x /start.sh
CMD ["/start.sh"]