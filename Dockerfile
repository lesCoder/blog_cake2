FROM php:7-apache
COPY cakephp/index.php /var/www/html/
COPY ./cakephp/app /app
RUN a2enmod rewrite
RUN service apache2 restart
RUN docker-php-ext-install pdo_mysql
EXPOSE 80
