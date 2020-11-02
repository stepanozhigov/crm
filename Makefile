docker-up:
	docker-compose up -d

docker-build:
	docker-compose up --build -d

docker-down:
	docker-compose down

docker-restart:
	docker-compose down && docker-compose up --build -d

npm-install:
	docker-compose exec node npm install

npm-dev:
	docker-compose exec node npm run dev

perm:
	sudo chgrp -R www-data storage bootstrap/cache
	sudo chmod -R ug+rwx storage bootstrap/cache
	sudo chmod -R 777 resources/lang
horizon:
	docker-compose exec php-cli php artisan horizon
test:
	docker-compose exec php-cli php artisan test
cartisan:
	docker-compose exec php-cli php artisan $(c)
migrate:
	docker-compose exec php-cli php artisan migrate


