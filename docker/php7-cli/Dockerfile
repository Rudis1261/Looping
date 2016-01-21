FROM php:7-cli

# Copy the dev php.ini
COPY config/php.ini /usr/local/etc/php/

# Copy custom scripts in
COPY bin/docker-php-pecl-install /usr/local/bin/

# Setting SAST Time
RUN rm /etc/localtime
RUN ln -s /usr/share/zoneinfo/Africa/Johannesburg /etc/localtime
RUN "date"

# Modules
RUN docker-php-ext-install opcache

# Add sockets, and Expose the ports
EXPOSE 5000
RUN docker-php-ext-install sockets

CMD ["php", "-a"]
