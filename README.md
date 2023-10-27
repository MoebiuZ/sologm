# Solo GM

This is a web application to keep track of a Solo RPG campaign (journaling) and automating the Mythic Game Master system by Tana Pigeon


## Requirements

- docker
- docker-compose


## Installation


```
cp docker/.env_sample docker/.env 
```
Edit `docker/.env` with your database settings.

```
cp cakephp/config/app_local.example.php cakephp/config/app_local.php
```
Edit `app_local.php` with your database settings.
Set `sologm-mysql` container as the database host.

```
cd docker
sudo docker-compose up -d
cd ../cakephp
sudo docker exec -ti sologm-php-fpm composer install
cd ..
sudo docker exec -i sologm-mysql mysql -uYOUR_DB_USER -pYOUR_DB_PASSWORD YOUR_DB_NAME < sologm_utils/database.sql
```
