FROM php:fpm-alpine

RUN apk --update add wget \
  $PHPIZE_DEPS \
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
  php7-mongodb

#MONGO REDIS
RUN pecl install mongodb
RUN pecl install redis -o -f redis


# REDIS
RUN docker-php-ext-enable mongodb redis
RUN rm -rf /temp/pear

COPY ./php.ini /usr/local/etc/php/php.ini