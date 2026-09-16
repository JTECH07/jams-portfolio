#!/bin/bash

# Generate .env from environment variables
cat > .env <<EOF
APP_NAME="${APP_NAME:-Laravel}"
APP_ENV="${APP_ENV:-production}"
APP_KEY="${APP_KEY:-}"
APP_DEBUG="${APP_DEBUG:-true}"
APP_URL="${APP_URL:-http://localhost:8000}"
DB_CONNECTION="${DB_CONNECTION:-sqlite}"
DB_DATABASE="${DB_DATABASE:-/var/www/html/database/database.sqlite}"
SESSION_DRIVER="${SESSION_DRIVER:-database}"
CACHE_STORE="${CACHE_STORE:-database}"
QUEUE_CONNECTION="${QUEUE_CONNECTION:-sync}"
MAIL_MAILER="${MAIL_MAILER:-log}"
EOF

touch /var/www/html/database/database.sqlite

php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan migrate --force

php artisan serve --host=0.0.0.0 --port="${PORT:-8000}"
