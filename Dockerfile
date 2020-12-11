FROM php:7.3-apache

WORKDIR /var/www/html

# INSTALL COMPOSER
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer

# UPDATE APT
RUN apt-get update

# INSTALL GIT
RUN apt-get install git -y

# INSTALL WKHTMLTOPDF
RUN apt-get install xvfb libfontconfig wkhtmltopdf -y

# ENABLE REWRITES
RUN a2enmod rewrite
RUN service apache2 restart

COPY ./src /var/www/html/

EXPOSE 80