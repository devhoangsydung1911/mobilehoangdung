start: 
	- UID=$(id -u) GID=$(id -g) && docker-compose up -d
	- sudo docker-compose run npm run dev 
	- sudo docker-compose run npm run watch
setup: 
	- sudo docker-compose run composer composer require laravel/ui
	- sudo docker-compose run php php artisan ui vue
composer:
	- sudo docker-compose run
configcache:
	- sudo docker-compose run php php artisan config:cache
install:
#	- sudo docker-compose run composer composer install
	- sudo docker-compose run npm install
	- sudo docker-compose run php php artisan config:cache
	- sudo docker-compose run php php artisan migrate
	- sudo docker-compose run php php artisan db:seed
	- sudo docker-compose run php php artisan vietnam-map:download
update:
	- sudo docker-compose run php php artisan down
	- git pull
	- sudo docker-compose run php php artisan migrate
	- sudo docker-compose run php php artisan db:seed
	- sudo docker-compose run php php artisan up
