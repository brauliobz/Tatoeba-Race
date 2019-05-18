FROM php:7.3.5-apache-stretch

RUN ["mkdir", "/var/data"]
COPY tools/type.braul.io.sqlite3 /var/data

COPY site /var/www/html

WORKDIR /var/www/html

RUN ["rm", "-rf", ".git"]
