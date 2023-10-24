#FROM phpdockerio/php74-fpm:latest
FROM php:8.2-fpm
# Install selected extensions and other stuff
RUN apt-get update \
    && apt-get -y --no-install-recommends install  php-mysql php-intl php-mbstring php-sqlite3 php-xml\
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*


WORKDIR "/var/www/sologm"
