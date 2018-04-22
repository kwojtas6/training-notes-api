FROM php:7.2-apache

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
        nano \
        mc && \
    docker-php-ext-configure gd --with-freetype-dir=/usr && \
    docker-php-ext-install curl intl json mysqli pdo pdo_mysql gd mbstring xsl opcache xml zip && \
    a2enmod rewrite && \
    pecl install xdebug-2.6.0 && \
    docker-php-ext-enable xdebug && \
    curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer

COPY ./docker/php/docker-php-ext-xdebug.ini /usr/local/etc/php/conf.d/

RUN apt-get autoremove -y && apt-get clean all

COPY ./docker/php/default.conf /etc/apache2/sites-available

RUN a2ensite default.conf && \
    a2dissite 000-default.conf

EXPOSE 80