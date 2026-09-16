# Deploy to Vercel

## Option 1: Vercel CLI (recommandé)

```bash
# Installer Vercel CLI
npm i -g vercel

# Se connecter
vercel login

# Déployer (depuis la racine du projet)
vercel

# Déployer en production
vercel --prod
```

## Option 2: GitHub + Vercel Dashboard

1. Push le code sur GitHub
2. Aller sur vercel.com/new
3. Importer le repository
4. Framework: **Other**
5. Build Command: `composer install --no-dev && npm install && npx vite build`
6. Output Directory: `public`
7. Environment Variables (voir ci-dessous)

## Variables d'environnement (Vercel Dashboard)

```
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:5/4sNdaWVWvdr3DGqQhCFkOovFoPU4JeoO1NAwl+Sms=
APP_URL=https://ton-domaine.vercel.app
DB_CONNECTION=mysql
DB_HOST=ton-host-mysql
DB_PORT=3306
DB_DATABASE=pf
DB_USERNAME=ton-user
DB_PASSWORD=ton-password
SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=database
MAIL_MAILER=log
```

## Base de données

### Option A: PlanetScale (gratuit)
1. Créer un compte sur planetscale.com
2. Créer une database "pf"
3. Copier les credentials dans Vercel

### Option B: Supabase (gratuit)
1. Créer un compte sur supabase.com
2. Créer un projet
3. Utiliser les credentials PostgreSQL

### Option C: ClearDB (gratuit sur Heroku)
1. Créer un compte ClearDB
2. Créer une database MySQL
3. Copier les credentials

## APRÈS le déploiement

```bash
# Sur Vercel, exécuter les migrations
vercel env pull .env.local
php artisan migrate --force
php artisan db:seed --force
```

## Structure des fichiers

```
/
├── app/
├── config/
├── database/
├── public/          ← Output directory
│   ├── index.php
│   ├── build/
│   ├── images/
│   └── ...
├── resources/
├── routes/
├── vercel.json      ← Config Vercel
└── .vercelignore
```
