FROM php:7.4-apache

ARG USERID=1000

RUN usermod -u $USERID www-data && \
    chown -R www-data:www-data /var/www && \
    chmod 777 -R /var/www

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libicu-dev \
        libgd-dev \
        libcurl4-openssl-dev \
        libxslt1-dev \
        libonig-dev \
        libzip-dev \
        nano \
        mc && \
#    docker-php-ext-configure gd --with-freetype-dir=/usr && \
    docker-php-ext-install curl intl json mysqli pdo pdo_mysql gd mbstring xsl opcache xml zip && \
    a2enmod rewrite

RUN pecl install xdebug \
        && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini \
        && echo "xdebug.idekey=PHPSTORM" >> /usr/local/etc/php/conf.d/xdebug.ini \
        && echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/xdebug.ini \
        && echo "xdebug.remote_autostart=off" >> /usr/local/etc/php/conf.d/xdebug.ini

RUN docker-php-ext-enable xdebug && \
    curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer

COPY ./docker/php/php.ini /usr/local/etc/php/conf.d/

RUN apt-get autoremove -y && apt-get clean all

COPY ./docker/php/default.conf /etc/apache2/sites-available

RUN a2ensite default.conf && \
    a2dissite 000-default.conf

EXPOSE 80