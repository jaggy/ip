#!/bin/bash

mysql -uroot -e "create database if not exists ip_management";
composer install
npm ci
npm run build
cp .env.example .env
php artisan migrate:fresh --seed
