FROM php:8.2-fpm-alpine

# Install dependencies
RUN apk add --no-cache \
    git \
    curl \
    bash \
    libpng-dev \
    libjpeg-turbo-dev \
    libwebp-dev \
    freetype-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd \
    --with-freetype \
    --with-jpeg \
    --with-webp \
    && docker-php-ext-install pdo pdo_mysql bcmath gd

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Run composer install in your project directory
WORKDIR /code

# Optionally copy your project files into the container
COPY ./src /code

# Run composer install to install dependencies
RUN composer install