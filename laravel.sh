#!/bin/sh

set -e

echo 'Installing deps'

composer install

php artisan key:generate

php artisan migrate:fresh --seed

chown -R www-data:www-data storage

echo 'Installing deps'

