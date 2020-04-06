start: ## Start current project
	composer install

behat-simple-way: ## Run behat tests
	./vendor/bin/behat features/add-simple-way.feature

behat-extended-way: ## Run behat tests
	./vendor/bin/behat features/add-extended-way.feature
	./vendor/bin/behat features/multiply-extended-way.feature

.PHONY: help

help: ## Show this help
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'

.DEFAULT_GOAL := help