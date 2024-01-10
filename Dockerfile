# Use a imagem oficial do PHP para Laravel
FROM php:7.4-apache

# Instale as dependências necessárias
RUN apt-get update && \
    apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install pdo_mysql zip

# Instale o Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Configure o Apache
RUN a2enmod rewrite

# Configurações adicionais do Apache (se necessário)
# COPY apache2.conf /etc/apache2/apache2.conf
# COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

# Crie o diretório da aplicação e copie os arquivos do Laravel
WORKDIR /var/www/html
COPY . .

# Instale as dependências do Composer
RUN composer install --no-interaction --optimize-autoloader

# Configure as permissões
RUN chown -R www-data:www-data storage bootstrap/cache

# Execute as migrações (se aplicável)
# RUN php artisan migrate

# Exponha a porta 80
EXPOSE 80

# Inicialize o servidor Apache
CMD ["apache2-foreground"]
