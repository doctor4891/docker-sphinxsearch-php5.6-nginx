FROM ubuntu:16.04
RUN apt-get update
RUN apt-get install sudo
RUN sudo apt-get install nano
RUN sudo apt-get install -y software-properties-common
RUN sudo apt-get update
RUN sudo LC_ALL=C.UTF-8 add-apt-repository -y ppa:ondrej/php
RUN sudo apt-get update
RUN sudo apt-get install php5.6-fpm -y --allow-unauthenticated
RUN sudo apt-get install nginx -y  --allow-unauthenticated
RUN sudo apt-get -y -f install mysql-client
RUN sudo apt-get install php5.6-mysql
RUN sudo apt-get install -y sphinxsearch
COPY ./docker-machine-settings/etc/nginx/nginx.conf /etc/nginx/nginx.conf
RUN sudo rm /etc/php/5.6/fpm/pool.d/www.conf
COPY ./docker-machine-settings/etc/php/5.6/fpm/pool.d/www.conf /etc/php/5.6/fpm/pool.d/www.conf
ENTRYPOINT sudo service nginx start && /etc/init.d/php5.6-fpm start && /bin/bash
