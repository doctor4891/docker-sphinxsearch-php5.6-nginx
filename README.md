# sphinxsearch-php-nginx
This is a simple docker container for sphinx search. It can be useful for making sphinx api.

I used in Dockerfile for build this image:

- ubuntu 16.04
- nginx
- php5.6
- sphinxsearch (3 version)

Also, You can find this whole image on dockerhub: doctor4891/sphinx-php-api

All files of configuration is in typical places (please, see docker-copmose.yml volumes). 

This repo dont have mysql-server. You can use mysql from other docker container or other physical machine.

If this repo is usefull for you - please start it or make issue or write me to telegram for quick answer @old_freedocs_xyz.
