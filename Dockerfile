FROM php:8.2-apache

# Instala extensiones necesarias
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Habilita mod_rewrite si lo necesitas
RUN a2enmod rewrite

# Copia el código al contenedor
COPY . /var/www/html/

# Da permisos a los archivos
RUN chown -R www-data:www-data /var/www/html

# Expone el puerto 80
EXPOSE 80