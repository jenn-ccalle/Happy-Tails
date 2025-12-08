FROM php:7.4-fpm

RUN apt-get update && apt-get install -y zlib1g-dev g++ git libicu-dev zip libzip-dev zip \
    && docker-php-ext-install intl opcache pdo pdo_mysql \
    && pecl install apcu \
    && docker-php-ext-enable apcu \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip

WORKDIR /var/www/project

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN curl -sS -L https://github.com/symfony-cli/symfony-cli/releases/latest/download/symfony-cli_linux_amd64.tar.gz -o /tmp/symfony-cli.tar.gz \
    && tar -xzf /tmp/symfony-cli.tar.gz -C /usr/local/bin \
    && chmod +x /usr/local/bin/symfony \
    && rm /tmp/symfony-cli.tar.gz