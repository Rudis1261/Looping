FROM php:5.6-cli

# Copy the dev php.ini
COPY config/php.ini /usr/local/etc/php/

# Copy custom scripts in
COPY bin/docker-php-pecl-install /usr/local/bin/

# Setting SAST Time
RUN rm /etc/localtime
RUN ln -s /usr/share/zoneinfo/Africa/Johannesburg /etc/localtime
RUN "date"

# Install modules TODO
RUN apt-get update && apt-get install -y \
libfreetype6-dev \
libjpeg62-turbo-dev \
libmcrypt-dev \
libpng12-dev \
imagemagick \
php5-imagick \
&& curl -L -o /tmp/redis.tar.gz https://github.com/phpredis/phpredis/archive/2.2.7.tar.gz \
&& tar xfz /tmp/redis.tar.gz \
&& rm -r /tmp/redis.tar.gz \
&& mv phpredis-2.2.7 /usr/src/php/ext/redis \
&& docker-php-ext-install redis mysql mysqli iconv exif pdo pdo_mysql opcache bcmath mbstring zip \
&& docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
&& docker-php-ext-install gd \
&& docker-php-pecl-install xdebug-2.3.3

# Use composer to install dependencies
RUN curl -sS https://getcomposer.org/installer|php

CMD ["php", "-a"]
