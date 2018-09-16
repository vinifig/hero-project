FROM php:fpm-alpine

RUN apk --update add wget \
  curl \
  git \
  build-base \
  libmemcached-dev \
  libmcrypt-dev \
  libxml2-dev \
  zlib-dev \
  autoconf \
  cyrus-sasl-dev \
  libgsasl-dev \
  postgresql-dev \
  postgresql-libs
# RUN docker-php-ext-install mbstring pdo tokenizer xml pcntl
# RUN pecl channel-update pecl.php.net && pecl install memcached mcrypt-1.0.1 && docker-php-ext-enable memcached
RUN docker-php-ext-install pgsql
RUN docker-php-ext-install pdo_pgsql

COPY ./php.ini /usr/local/etc/php/php.ini