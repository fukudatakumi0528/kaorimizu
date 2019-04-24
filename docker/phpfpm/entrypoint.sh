#!/usr/bin/env bash

# wp-config.phpを生成
if [ ! -L /var/www/html/wp-config.php ]; then
  echo wp-config.php is not symbolic link
  cd /var/www/html && ln -s wp-config.php.dev wp-config.php
fi

php-fpm
