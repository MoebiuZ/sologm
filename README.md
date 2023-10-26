# Solo GM

This is a web application to keep track of a Solo RPG campaign (journaling) and automating the Mythic Game Master system by Tana Pigeon


## Installation

cp docker/.env_sample to docker/.env a

Edit your database settings there. 

cp cakephp/config/app_local.php.sample cakephp/config/app_local.php

Edit there your database settings


cd docker
sudo docker-compose up -d
cd ../cakephp
sudo docker exec -ti sologm-php-fpm composer install

sudo docker exec -ti sologm-mysql mysql -u YOUR_USER YOUR_DATABASE_NAME < sologm_utils/database.sql
