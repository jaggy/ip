#!/bin/bash

mysql -uroot -e "create database if not exists ip_management";
mysql -uroot -e "create database if not exists ip_management_test";
composer install
npm ci
npm run build
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
