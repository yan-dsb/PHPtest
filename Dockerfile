FROM php:7.4-apache

RUN apt-get update

RUN apt-get install -y libzip-dev zlib1g-dev

RUN docker-php-ext-install zip mysqli pdo pdo_mysql

RUN a2enmod rewrite