FROM php:8.1-fpm

# Configurações gerais
WORKDIR /var/www/html
COPY . /var/www/html

# Instala as dependências necessárias para o Laravel
RUN apt-get update && \
    apt-get install -y \
        libzip-dev \
        zip \
        unzip \
        && docker-php-ext-install zip

# Instala o Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instala as dependências do Composer
RUN composer install --no-interaction --no-plugins --no-scripts --prefer-dist

# Copia o arquivo de configuração do Laravel
COPY .env.example .env

# Gera a chave de aplicativo do Laravel
RUN php artisan key:generate

# Abre a porta 9000 para o PHP-FPM
EXPOSE 9000

# Comando padrão para iniciar o PHP-FPM
CMD ["php-fpm"]