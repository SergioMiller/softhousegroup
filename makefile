.PHONY: up
up: ## Start dev environment
		docker compose -f docker-compose.yml up

.PHONY: build
build:
		docker compose -f docker-compose.yml build

.PHONY: stop
stop:
		docker compose stop

.PHONY: composer-install
composer-install:
		docker compose exec app sh -lc 'composer install'
		docker compose exec queue sh -lc 'composer install'

.PHONY: db-migrate
db-migrate:
		docker compose exec app sh -lc 'php artisan migrate'

.PHONY: db-seed
db-seed:
		docker compose exec app sh -lc 'php artisan db:seed'

.PHONY: optimize
optimize:
		docker compose exec app sh -lc 'php artisan optimize'

.PHONY: swagger
swagger:
		docker compose exec app sh -lc './vendor/bin/openapi ./app -o ./storage/app'

.PHONY: app
app:
		docker compose exec app sh

.PHONY: php-cs-fixer
php-cs-fixer:
		docker compose exec app sh -lc 'php-cs-fixer fix app/ config/ routes/ database/ --config=/var/www/.php-cs-fixer.php --allow-risky=yes'
