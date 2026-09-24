#!/bin/bash

# Generate .env from environment variables
cat > .env <<EOF
APP_NAME="${APP_NAME:-Laravel}"
APP_ENV="${APP_ENV:-production}"
APP_KEY="${APP_KEY:-}"
APP_DEBUG="${APP_DEBUG:-true}"
APP_URL="${APP_URL:-http://localhost:8000}"
DB_CONNECTION="${DB_CONNECTION:-mysql}"
DB_HOST="${DB_HOST:-127.0.0.1}"
DB_PORT="${DB_PORT:-3306}"
DB_DATABASE="${DB_DATABASE:-pf}"
DB_USERNAME="${DB_USERNAME:-root}"
DB_PASSWORD="${DB_PASSWORD:-}"
SESSION_DRIVER="${SESSION_DRIVER:-database}"
CACHE_STORE="${CACHE_STORE:-database}"
QUEUE_CONNECTION="${QUEUE_CONNECTION:-sync}"
MAIL_MAILER="${MAIL_MAILER:-log}"
EOF

# Force les guillemets autour d'APP_NAME si elle contient des espaces
# C'est nécessaire car "Joseph ALAYE" dans .env sans guillemets casse le parsing
if grep -q '^APP_NAME=' .env; then
    NAME_VAL=$(grep '^APP_NAME=' .env | cut -d= -f2-)
    # Si la valeur contient un espace, la mettre entre guillemets
    if [[ "$NAME_VAL" == *" "* ]]; then
        sed -i "s|^APP_NAME=.*|APP_NAME=\"$NAME_VAL\"|" .env
    fi
fi

# Création du dossier de base de données s'il n'existe pas
mkdir -p /var/www/html/database

# Si MySQL/PostgreSQL, s'assurer que le dossier de la base existe
if [ "$DB_CONNECTION" = "mysql" ] || [ "$DB_CONNECTION" = "pgsql" ]; then
    touch /var/www/html/database/database.sqlite 2>/dev/null || true
fi

php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan migrate --force

php artisan serve --host=0.0.0.0 --port="${PORT:-8000}"