FROM php:8.3-fpm

# Instala dependências do sistema
RUN apt-get update && apt-get install -y \
    libpq-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-install pdo pdo_pgsql

# Define diretório de trabalho
WORKDIR /var/www

# Copia arquivos
COPY . .

CMD ["php-fpm"]