# PHP 8.4 with Apache
# PHP 8.4 + Apacheを使用します。
FROM php:8.4-apache


# Install PHP extensions for MySQL
# MySQL接続に必要なPHP拡張機能をインストールします。
RUN docker-php-ext-install mysqli pdo pdo_mysql


# Enable Apache rewrite module
# Apacheのrewriteモジュールを有効にします。
RUN a2enmod rewrite


# Copy custom PHP configuration
# カスタムPHP設定をコンテナへコピーします。
COPY php/php.ini /usr/local/etc/php/php.ini


# Copy application files
# アプリケーションファイルをApacheの公開ディレクトリへコピーします。
COPY src/ /var/www/html/


# Set ownership of application files
# アプリケーションファイルの所有者をApache用ユーザーに設定します。
RUN chown -R www-data:www-data /var/www/html