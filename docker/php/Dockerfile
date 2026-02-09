FROM php:8.2-apache

# Habilitar rewrite (bien hecho)
RUN a2enmod rewrite

# 👉 INSTALAR DRIVERS DE MYSQL (ESTO ES LO QUE FALTABA)
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Copiar el proyecto
COPY . /var/www/html/

# Permisos
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
