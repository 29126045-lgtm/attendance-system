# ==========================================
# 1. PILIH IMJ PHP + APACHE
# ==========================================
FROM php:8.2-apache

# ==========================================
# 2. PASANG DEPENDENCIES
# ==========================================
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-install zip pdo pdo_mysql

# ==========================================
# 3. PASANG COMPOSER
# ==========================================
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# ==========================================
# 4. SET FOLDER KERJA
# ==========================================
WORKDIR /var/www/html

# ==========================================
# 5. COPY SEMUA FAIL PROJEK
# ==========================================
COPY . .

# ==========================================
# 6. INSTALL PHP DEPENDENCIES
# ==========================================
RUN composer install --no-dev --optimize-autoloader

# ==========================================
# 7. SET PERMISSION
# ==========================================
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache

# ==========================================
# 8. ENABLE APACHE MOD_REWRITE
# ==========================================
RUN a2enmod rewrite

# ==========================================
# 9. SKIP KEY GENERATE (APP_KEY dari Environment Variables)
# ==========================================
# APP_KEY akan di set melalui Render Environment Variables

# ==========================================
# 10. EXPOSE PORT 80
# ==========================================
EXPOSE 80

# ==========================================
# 11. START APACHE
# ==========================================
CMD ["apache2-foreground"]