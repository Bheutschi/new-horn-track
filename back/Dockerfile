# Production image for the backend
#
# Builds the front assets and copy them to prod image
# Installs the backend and optimise files

FROM dunglas/frankenphp:1.6.0-php8.4.7 AS frankenphp_upstream

FROM node:22.16.0-slim AS front_base
WORKDIR /app
COPY ./package.json ./
COPY ./package-lock.json ./
RUN npm ci
COPY . .
RUN npm run build

FROM frankenphp_upstream AS frankenphp_base
WORKDIR /app

# Prepare some deps for php extensions
RUN apt-get update && apt-get install -y --no-install-recommends \
	acl \
	file \
	gettext \
	git \
	&& rm -rf /var/lib/apt/lists/*

# Install php extensions for laravel
RUN set -eux; \
	install-php-extensions \
	@composer \
	apcu \
	intl \
	opcache \
	pcntl \
	memcached \
	exif \
	pdo_pgsql \
	zip \
	gd \
	redis \
	;


# https://getcomposer.org/doc/03-cli.md#composer-allow-superuser
ENV COMPOSER_ALLOW_SUPERUSER=1

# Setup production base .ini
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# Get composer dependencies
COPY ./composer.* ./
RUN composer install --no-cache --prefer-dist --no-autoloader --no-scripts --no-progress

# Final image
FROM frankenphp_base
WORKDIR /app

# Get the app source code
COPY . .
# Copy front end
COPY --from=front_base /app/public/build ./public/build

# Prepare laravel folders
RUN mkdir -p storage/framework/sessions storage/framework/views storage/framework/cache storage/framework/testing storage/logs bootstrap/cache
RUN chmod -R a+rw storage

# Optimisations for prod setup
RUN composer dump-autoload --classmap-authoritative
RUN php artisan storage:link

COPY ./start.sh ./
RUN chmod +x start.sh

ENV SERVER_NAME=:80

ENTRYPOINT ["/app/start.sh"]