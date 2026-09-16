# Deploy Laravel + Supabase sur Vercel

## Étape 1: Supabase

1. Aller sur https://supabase.com → Start your project
2. Créer un compte GitHub
3. Créer un nouveau project:
   - Name: `pf`
   - Password: (note ce mot de passe)
   - Region: West Europe (Amsterdam)
4. Aller dans **Settings → Database**
5. Copier les infos de connexion

## Étape 2: Configurer les variables Vercel

Dans le dashboard Vercel → ton project → Settings → Environment Variables, ajouter:

```
APP_NAME=Laravel
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:5/4sNdaWVWvdr3DGqQhCFkOovFoPU4JeoO1NAwl+Sms=
APP_URL=https://ton-app.vercel.app

DB_CONNECTION=pgsql
DB_HOST=db.xxxxx.supabase.co
DB_PORT=5432
DB_DATABASE=postgres
DB_USERNAME=postgres
DB_PASSWORD=ton-mot-de-passe-supabase

SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=sync

MAIL_MAILER=log
```

**IMPORTANT**: Remplacer `db.xxxxx.supabase.co` et `ton-mot-de-passe-supabase` par tes vraies infos.

## Étape 3: Deploy

```bash
# Installer Vercel CLI
npm i -g vercel

# Se connecter
vercel login

# Déployer
cd /home/jams/Documents/myProjects/Pf
vercel

# Suivre les instructions (appuyer sur Entrée pour les défauts)
```

## Étape 4: Migrations

Après le premier déploiement, aller sur le dashboard Vercel → ton project → Functions → onglet "Logs" pour voir si tout fonctionne.

Pour exécuter les migrations manuellement:
```bash
vercel env pull .env.production
php artisan migrate --force --env=production
php artisan db:seed --force --env=production
```

## Étape 5: Configurer le domaine

Dans Vercel → ton project → Settings → Domains:
- Ajouter `msjoseph-alaye.vercel.app`
- Ou un domaine personnalisé

## Commandes utiles

```bash
# Voir les logs
vercel logs

# Redéployer
vercel --prod

# Pull les variables d'env
vercel env pull .env.local
```
