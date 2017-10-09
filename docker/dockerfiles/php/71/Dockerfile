FROM php:7.2.0RC3-fpm

ARG USER=symfony
ARG UID=1000
ARG GID=1000

RUN addgroup --gid $GID $USER
RUN adduser --gecos ""  --uid $UID --gid $GID --disabled-password $USER

RUN apt-get update

RUN apt-get install -y \
        libfreetype6-dev \
        libxml2-dev \
        libicu-dev \
        g++ \
        libssl-dev \
        libxrender1 \
        sudo \
        curl \
        zip \
        git

RUN docker-php-ext-install -j$(nproc) \
        exif \
        iconv \
        opcache \
        bcmath \
        ctype \
        dom \
        fileinfo \
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

RUN apt-get clean

RUN pecl channel-update pecl
RUN pecl install apcu-5.1.7 && docker-php-ext-enable apcu


# Config file and bin
COPY conf/php.ini /usr/local/etc/php/php.ini
COPY conf/www.conf.default /usr/local/etc/php-fpm.d/www.conf.default
ADD https://getcomposer.org/composer.phar /usr/local/bin/composer

RUN chown $USER:$USER /usr/local/bin/composer && chmod 775 /usr/local/bin/composer

# Set password and add sudo group to new user
RUN echo "$USER:$USER" | chpasswd
RUN echo "root:root" | chpasswd

# Add new user to sudo group
RUN usermod -a -G sudo $USER

# Disable password for new user on sudo
RUN echo "$USER ALL=(ALL) NOPASSWD:ALL" > /etc/sudoers

USER $USER

RUN curl https://gist.githubusercontent.com/AlexBDev/65f31a11b78969df9cf2130f5d80a516/raw/ea86b8ac2b434001bbcdb960b76d84f7d0420297/sf_aliases.sh  >> /home/$USER/.bashrc

WORKDIR /usr/share/nginx/html


