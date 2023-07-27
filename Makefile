init:
	@make network -i
	@make build
	@make up
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

seed:
	docker exec monolith-monolith_app-1 bash -c "php artisan migrate:fresh --seed"