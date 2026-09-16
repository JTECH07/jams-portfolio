#!/bin/bash

# Generate .env from environment variables
cat > .env <<EOF
APP_NAME="${APP_NAME:-Laravel}"
APP_ENV="${APP_ENV:-production}"
APP_KEY="${APP_KEY:-}"
APP_DEBUG="${APP_DEBUG:-false}"
APP_URL="${APP_URL:-http://localhost:8000}"
DB_CONNECTION="${DB_CONNECTION:-pgsql}"
DB_HOST="${DB_HOST:-}"
DB_PORT="${DB_PORT:-5432}"
DB_DATABASE="${DB_DATABASE:-postgres}"
DB_USERNAME="${DB_USERNAME:-postgres}"
DB_PASSWORD="${DB_PASSWORD:-}"
SESSION_DRIVER="${SESSION_DRIVER:-database}"
CACHE_STORE="${CACHE_STORE:-database}"
QUEUE_CONNECTION="${QUEUE_CONNECTION:-sync}"
MAIL_MAILER="${MAIL_MAILER:-log}"
EOF

php artisan config:clear
php artisan route:clear
php artisan view:clear

php artisan serve --host=0.0.0.0 --port="${PORT:-8000}"
