#!/bin/bash

composer install
php artisan key:generate
mysql -u fatec -p < scripts/cria_db.sql
php artisan migrate
