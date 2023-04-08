SHELL:=/bin/bash

PHP_CONTAINER_NAME:=phpbench
REPORT:=consumation_of_time

up: ## Bring up project containers
	@docker-compose up -d

stop: ## Bring up project containers
	@docker-compose stop

php: ## Gets inside PHP container shell
	@docker exec -it ${PHP_CONTAINER_NAME} bash

composer: ## Runs Composer install
	@docker exec ${PHP_CONTAINER_NAME} composer install

run: ## run test by class path
	@docker exec ${PHP_CONTAINER_NAME} vendor/bin/phpbench run src/Benchmarks/$(CLASS_PATH).php

run-all: ## run all tests
	@docker exec ${PHP_CONTAINER_NAME} vendor/bin/phpbench run --report=$(REPORT)

cs: ## run php-cs-fixer
	@docker exec ${PHP_CONTAINER_NAME} vendor/bin/phpcs

csf: ## run php-cs-fixer
	@docker exec ${PHP_CONTAINER_NAME} vendor/bin/phpcbf