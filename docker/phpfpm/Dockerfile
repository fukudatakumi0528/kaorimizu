FROM php:7.1-fpm
RUN requirements="git-core libmcrypt-dev g++ wget unzip build-essential libssl-dev libxrender-dev gdebi libicu-dev libmcrypt4 libfreetype6-dev libjpeg-dev libjpeg62-turbo-dev libmcrypt-dev zlib1g-dev libsqlite3-dev libsqlite3-0" \
   && apt-get update && apt-get install -y $requirements \
   && docker-php-ext-configure gd \
        --with-freetype-dir=/usr/include/ \
        --with-jpeg-dir=/usr/include/ \
        --with-png-dir=/usr/include/ \
   && docker-php-ext-install zip pdo_mysql mysqli mcrypt mbstring intl gd iconv opcache \
   && requirementsToRemove="libmcrypt-dev g++ libicu-dev" \
   && apt-get purge --auto-remove -y $requirementsToRemove \
   && rm -rf /var/lib/apt/lists/*

COPY php-fpm.conf /usr/local/etc/php-fpm.d/php-fpm.conf
COPY wp /usr/local/bin/wp

RUN usermod -u 1000 www-data

COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

CMD ["/entrypoint.sh"]
