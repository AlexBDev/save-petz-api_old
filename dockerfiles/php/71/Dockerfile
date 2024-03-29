FROM php:7.2-fpm


ARG DSP_USER_USERNAME
ARG DSP_USER_UID
ARG DSP_USER_GID

# Create user with home to work with permissions on files
RUN addgroup --gid $DSP_USER_GID $DSP_USER_USERNAME
RUN adduser --gecos "" --disabled-password --gid $DSP_USER_GID --uid $DSP_USER_UID $DSP_USER_USERNAME

ENV TERM xterm

RUN apt-get clean && apt-get update

RUN apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
        libxml2-dev \
        zlib1g-dev \
        libicu-dev \
        g++ \
        libssl-dev \
        nano \
        sudo \
        libfontconfig1 \
        libxrender1 \
        git \
        python

RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/

RUN docker-php-ext-install -j$(nproc) \
        exif \
        iconv \
        opcache \
        bcmath \
        ctype \
        dom \
        fileinfo \
        gd \
        gettext \
        intl \
        json \
        mysqli \
        pcntl \
        pdo \
        pdo_mysql \
        phar \
        simplexml \
        zip

RUN pecl channel-update pecl
RUN pecl install apcu-5.1.7 && docker-php-ext-enable apcu


# Config file and bin
COPY conf/php.ini /usr/local/etc/php/php.ini
COPY conf/www.conf.default /usr/local/etc/php-fpm.d/www.conf.default
ADD https://getcomposer.org/composer.phar /usr/local/bin/composer

RUN chown $DSP_USER_USERNAME:$DSP_USER_USERNAME /usr/local/bin/composer && chmod 775 /usr/local/bin/composer

# Set password and add sudo group to new user
RUN echo "$DSP_USER_USERNAME:$DSP_USER_USERNAME" | chpasswd
RUN echo "root:root" | chpasswd

RUN usermod -a -G sudo $DSP_USER_USERNAME

RUN echo "$DSP_USER_USERNAME ALL=(ALL) NOPASSWD:ALL" > /etc/sudoers

USER $DSP_USER_USERNAME

RUN echo "alias sf='php bin/console'\n"  >> /home/$DSP_USER_USERNAME/.bashrc

WORKDIR /usr/share/nginx/html