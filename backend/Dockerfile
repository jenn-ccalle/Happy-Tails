FROM php:8.1-fpm-alpine

# Instalar extensiones PHP necesarias
RUN apk add --no-cache \
    bash \
    git \
    zip \
    unzip \
    libpng-dev \
    oniguruma-dev \
    libxml2-dev \
    nginx

# Instalar extensiones PHP
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Copiar archivos de dependencias
COPY composer.json composer.lock ./
RUN composer install --no-scripts --no-autoloader --prefer-dist

# Copiar el resto del código
COPY . .

# Optimizar autoloader
RUN composer dump-autoload --optimize

# Permisos
RUN chown -R www-data:www-data /app/var

# Configurar nginx para servir PHP
COPY nginx-backend.conf /etc/nginx/http.d/default.conf

# Script de inicio
COPY start.sh /start.sh
RUN chmod +x /start.sh

EXPOSE 8080

CMD ["/start.sh"]