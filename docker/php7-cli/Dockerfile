FROM php:7-cli

# Copy the dev php.ini
COPY config/php.ini /usr/local/etc/php/

# Copy custom scripts in
COPY bin/docker-php-pecl-install /usr/local/bin/

# Setting SAST Time
RUN rm /etc/localtime
RUN ln -s /usr/share/zoneinfo/Africa/Johannesburg /etc/localtime
RUN "date"

# apt-update
RUN apt-get update

# install libs
RUN apt-get install -y \
libfreetype6-dev \
libjpeg62-turbo-dev \
libmcrypt-dev \
libpng12-dev \
imagemagick

# Redis
RUN curl -L -o /tmp/redis.tar.gz https://github.com/phpredis/phpredis/archive/2.2.7.tar.gz \
&& tar xfz /tmp/redis.tar.gz \
&& rm -r /tmp/redis.tar.gz \
&& mv phpredis-2.2.7 /usr/src/php/ext/redis

# Modules
RUN docker-php-ext-install mysqli iconv exif pdo pdo_mysql opcache bcmath mbstring zip
RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/

# Install GD
RUN docker-php-ext-install gd

# Use composer to install dependencies
RUN curl -sS https://getcomposer.org/installer|php

# Add sockets, and Expose the ports
EXPOSE 5000
RUN docker-php-ext-install sockets

# Install Redis
RUN apt-get install -y git
RUN git clone -b php7 https://github.com/phpredis/phpredis.git
RUN mv phpredis /usr/src/php/ext/
RUN ls /usr/src/php/ext
RUN cd /usr/src/php/ext && docker-php-ext-install phpredis

CMD ["php", "-a"]
