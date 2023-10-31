FROM php:8.2-fpm
# Install selected extensions and other stuff
RUN apt-get update \
    && apt-get -y --no-install-recommends install libicu-dev git unzip \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*\
    && docker-php-ext-install intl pdo_mysql mysqli opcache \
    && php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"\
    && php -r "if (hash_file('sha384', 'composer-setup.php') === 'e21205b207c3ff031906575712edab6f13eb0b361f2085f1f1237b7126d785e826a450292b6cfd1d64d92e6563bbde02') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"\
    && php composer-setup.php\
    && php -r "unlink('composer-setup.php');"\
    && mv composer.phar /bin/composer

WORKDIR "/var/www/sologm"
