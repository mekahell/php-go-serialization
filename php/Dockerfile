FROM composer:2.7 as build

COPY composer.json composer.json
COPY composer.lock composer.lock
RUN composer install

FROM php:8.2-cli

ARG PROTOBUF_EXT_VERSION=4.27.2

# Doc at https://github.com/protocolbuffers/protobuf/tree/main/php

RUN docker-php-ext-configure pcntl --enable-pcntl \
  && docker-php-ext-install pcntl

RUN pecl install protobuf-${PROTOBUF_EXT_VERSION} &&\
    docker-php-ext-enable protobuf && \
    pecl clear-cache && \
    rm -rf /tmp/pear/download /tmp/pear/temp
RUN mkdir /app
WORKDIR /app
COPY bin bin
COPY src src
COPY --from=build /app/vendor vendor
COPY composer.json composer.json
COPY composer.lock composer.lock