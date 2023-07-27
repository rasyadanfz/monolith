init:
	@make build
	@make up
	@make seed

build:
	docker-compose build --no-cache

stop:
	docker-compose stop

up :
	docker-compose up -d

seed:
	docker exec monolith-monolith_app-1 bash -c "php artisan migrate:fresh --seed"