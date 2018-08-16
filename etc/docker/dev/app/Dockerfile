FROM php:7.2-fpm-alpine
MAINTAINER lordjancso <lordjancso@gmail.com>

ENV COMPOSER_VERSION=1.4.3 COMPOSER_ALLOW_SUPERUSER=1
ENV SYMFONY_ENV=dev

# gd
RUN apk add --no-cache freetype libpng libjpeg-turbo freetype-dev libpng-dev libjpeg-turbo-dev \
    && docker-php-ext-configure gd --with-gd --with-freetype-dir=/usr/include/ --with-png-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install gd \
    && apk del --no-cache freetype-dev libpng-dev libjpeg-turbo-dev

# zip
RUN apk add --no-cache zlib-dev \
    && docker-php-ext-install zip \
    && apk del --no-cache zlib-dev

# intl
RUN apk add --no-cache icu icu-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl \
    && apk del --no-cache icu-dev

RUN docker-php-ext-install -j$(getconf _NPROCESSORS_ONLN) iconv mbstring pdo_mysql \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --version=${COMPOSER_VERSION} \
    && composer global require --quiet "hirak/prestissimo:^0.3"

RUN curl -L https://github.com/FriendsOfPHP/PHP-CS-Fixer/releases/download/v2.12.2/php-cs-fixer.phar -o php-cs-fixer \
    && chmod a+x php-cs-fixer \
    && mv php-cs-fixer /usr/local/bin/php-cs-fixer

RUN apk add --no-cache openssh \
    && curl -L https://deployer.org/releases/v6.0.5/deployer.phar -o dep \
    && chmod a+x dep \
    && mv dep /usr/local/bin/dep

COPY php.ini /usr/local/etc/php/php.ini
COPY entrypoint.sh /docker-entrypoint.sh

WORKDIR /app

RUN apk --no-cache add git

RUN echo http://dl-cdn.alpinelinux.org/alpine/edge/community/ >> /etc/apk/repositories \
    && apk --no-cache add shadow \
    && usermod -u 1000 www-data

RUN echo "alias sfcc=\"php bin/console redis:flushall -n && php bin/console cache:clear\"" >> /etc/profile.d/aliases.sh

ENTRYPOINT ["/docker-entrypoint.sh"]
