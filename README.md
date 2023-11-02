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
- Edit `app_local.php` with your database settings.
- Set `sologm-mysql` container as the database host.
- Override here the `app.php` timezone if needed.
- Add mailhog for email testing using container `sologm-mailhog`:
```
 'EmailTransport' => [
        ...
        'mailhog' => [
                    # These are default settings for the MailHog container - make sure it's running first
                    'className' => 'Smtp',
                    'host' => 'sologm-mailhog',
                    'port' => 1025,
                    'timeout' => 30,
                ],
        ...
```
- Add a cookieKey after salt (to encrypt cookies):
```
...
    'Security' => [
        'salt' => env('SECURITY_SALT', 'your salt here'),
        'cookieKey' => env('SECURITY_COOKIE_KEY', 'put your cookie key here'),
    ],
...
```

```
cd docker
sudo docker-compose up -d
cd ../cakephp
sudo docker exec -ti sologm-php-fpm composer install
cd ..
sudo docker exec -i sologm-mysql mysql -uYOUR_DB_USER -pYOUR_DB_PASSWORD YOUR_DB_NAME < sologm_utils/database.sql
```

Install CakePHP dependencies:
```
cd cakephp
# Say Yes to set permissions
sudo docker exec -ti sologm-php-fpm composer install
sudo docker exec -ti sologm-php-fpm composer update
```

Add an admin user:
```
cd cakephp
sudo docker exec -ti sologm-php-fpm bin/cake user newadmin ADMIN_EMAIL ADMIN_NAME ADMIN_LASTNAME
```
