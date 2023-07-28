init:
	@make network -i
	@make build
	@make up
	@make setup
	@make seed

network:
	docker network create app_network

reset:
	docker compose rm -f

build:
	docker compose build --no-cache

stop:
	docker compose stop

up :
	docker compose up -d

setup:
	docker exec -it --user=root monolith-monolith_app-1 chmod -R 777 /var/www/storage
	docker exec monolith-monolith_app-1 bash -c "composer install"

seed:
	docker exec monolith-monolith_app-1 bash -c "php artisan migrate:fresh --seed"