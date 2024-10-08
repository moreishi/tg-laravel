# Simple Listing App
## Coded by Caesar Ian B.

[![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)](https://travis-ci.org/joemccann/dillinger)

## Installation

```sh
git clone git@github.com:moreishi/tg-laravel.git
```

For production environments...

```sh
$ composer install
$ php artisan key:generate
$ php artisan serve --port=8000
```

For ENV

```sh
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:gtBqgNXDm4UiiRUp9govEjWyrdccyTp1TlR5GxpE1bo=
APP_DEBUG=true
APP_TIMEZONE=UTC
APP_URL="http://127.0.0.1:8000"

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US

APP_MAINTENANCE_DRIVER=file
# APP_MAINTENANCE_STORE=database

BCRYPT_ROUNDS=12

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION="sqlite"
DB_HOST="db"
DB_PORT="3306"
# DB_DATABASE="db"
DB_DATABASE=/Users/mini/Documents/tg-laravel/database/database.sqlite
DB_USERNAME="db"
DB_PASSWORD="db"

SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database

CACHE_STORE=database
CACHE_PREFIX=

MEMCACHED_HOST=127.0.0.1

REDIS_CLIENT=phpredis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER="smtp"
MAIL_HOST="127.0.0.1"
MAIL_PORT="1025"
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

VITE_APP_NAME="${APP_NAME}"

URI_DUMMY="https://dummyjson.com"

```

make sure to update your database file path

```sh
DB_DATABASE="SET YOUR DATABASE SQLITE"
```

run your migration

```sh
$ php artisan migrate
```

Launch the app

```sh
$ php artisan serve --port=8000
```

