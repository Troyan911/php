FROM php:8.2-apache

RUN #docker-php-ext-install mysqli && docker-php-ext-enable mysqli
#RUN docker-hillel-ext-install -j${nproc} pdo_mysql