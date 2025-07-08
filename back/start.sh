#!/bin/bash

# Cache the config at start time, to get the env var passed by compose
php artisan optimize
php artisan migrate --force
/usr/local/bin/frankenphp run --environ --config /etc/frankenphp/Caddyfile