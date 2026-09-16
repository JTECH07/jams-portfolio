#!/bin/bash

# Vercel build script
echo "Building for Vercel..."

# Install dependencies
composer install --no-dev --optimize-autoloader --no-interaction

# Build frontend assets
npm install
npx vite build

# Create SQLite database for serverless
touch /tmp/pf.sqlite

# Run migrations
php artisan migrate --force

# Seed data
php artisan db:seed --force

# Cache config
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Build complete!"
