FROM php

RUN apt-get update && apt-get install -y git zlib1g-dev unzip libzip-dev

RUN docker-php-ext-install pdo pdo_mysql zip