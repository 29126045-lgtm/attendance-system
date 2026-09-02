# ==========================================
# 1. GUNA PHP 8.2 (TANPA APACHE)
# ==========================================
FROM php:8.2-cli

# ==========================================
# 2. PASANG EXTENSION & COMPOSER
# ==========================================
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-install zip pdo pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# ==========================================
# 3. SET FOLDER KERJA
# ==========================================
WORKDIR /app

# ==========================================
# 4. COPY PROJEK
# ==========================================
COPY . .

# ==========================================
# 5. INSTALL DEPENDENCIES
# ==========================================
RUN composer install --no-dev --optimize-autoloader

# ==========================================
# 6. SET PERMISSION STORAGE
# ==========================================
RUN chmod -R 755 storage bootstrap/cache

# ==========================================
# 7. EXPOSE PORT (Render guna PORT 10000)
# ==========================================
EXPOSE 10000

# ==========================================
# 8. JALANKAN LARAVEL BUILT-IN SERVER
# ==========================================
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=10000"]