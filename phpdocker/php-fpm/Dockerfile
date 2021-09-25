FROM phpdockerio/php80-fpm:latest
WORKDIR "/application"

RUN apt-get update; \
    apt-get -y --no-install-recommends install \
        php8.0-mysql; \
    apt-get clean; \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*
