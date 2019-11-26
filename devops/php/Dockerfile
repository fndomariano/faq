FROM php:7.3-fpm

MAINTAINER "Adan Felipe Medeiros <adan.grg@gmail.com>"

RUN apt-get update && apt-get install -y git vim libfreetype6-dev libjpeg62-turbo-dev libmcrypt-dev libicu-dev mlocate python pkg-config build-essential libmemcached-dev
RUN apt-get install -yq \
        libfreetype6-dev \
        libmcrypt-dev \
        libjpeg-dev \
        libpng-dev \
        libcurl4-openssl-dev \
        openssl \
        autoconf \
        automake \
        libtool \
        m4 \
        libsodium-dev

RUN docker-php-ext-configure gd \
        --enable-gd-native-ttf \
        --with-png-dir=/usr/include \
        --with-jpeg-dir=/usr/include

RUN apt-get install -y libzip-dev
RUN docker-php-ext-install zip

RUN docker-php-ext-install iconv mysqli zip pdo pdo_mysql
RUN docker-php-ext-install mbstring bcmath sodium


RUN pecl install xdebug && docker-php-ext-enable xdebug
RUN pecl install memcached && docker-php-ext-enable memcached

RUN mkdir /php-composer
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /php-composer/composer
RUN echo "export PATH=\$PATH:\$HOME/.composer/vendor/bin/:/php-composer" >> ~/.bashrc

# Add user
RUN usermod -u 1000 www-data

WORKDIR /app

RUN chown -R www-data:www-data /app

# Configuração do horário
ADD ./assets/Sao_Paulo.zic /tmp
RUN zic /tmp/Sao_Paulo.zic
RUN rm /tmp/Sao_Paulo.zic
RUN ln -sf /usr/share/zoneinfo/America/Sao_Paulo /etc/localtime
# ENV TZ America/Sao_Paulo
# RUN echo $TZ | tee /etc/timezone && dpkg-reconfigure --frontend noninteractive tzdata

RUN echo "PS1='\${debian_chroot:+(\$debian_chroot)}\[\033[01;32m\]\u@\$DOCKER_NAME\[\033[00m\]:\[\033[01;34m\]\w\[\033[00m\]\$ '" >> /root/.bashrc

EXPOSE 9000
