-- Créer les tables
CREATE TABLE IF NOT EXISTS users (
  id BIGSERIAL PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) UNIQUE NOT NULL,
  email_verified_at TIMESTAMP NULL,
  password VARCHAR(255) NOT NULL,
  remember_token VARCHAR(100) NULL,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL
);

CREATE TABLE IF NOT EXISTS posts (
  id BIGSERIAL PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  slug VARCHAR(255) UNIQUE NOT NULL,
  excerpt TEXT,
  body TEXT,
  image VARCHAR(255),
  category VARCHAR(100),
  published BOOLEAN DEFAULT false,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL
);

CREATE TABLE IF NOT EXISTS subscribers (
  id BIGSERIAL PRIMARY KEY,
  email VARCHAR(255) UNIQUE NOT NULL,
  name VARCHAR(255),
  active BOOLEAN DEFAULT true,
  subscribed_at TIMESTAMP NULL,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL
);

CREATE TABLE IF NOT EXISTS comments (
  id BIGSERIAL PRIMARY KEY,
  author_name VARCHAR(255) NOT NULL,
  author_email VARCHAR(255),
  body TEXT NOT NULL,
  commentable_type VARCHAR(255),
  commentable_id BIGINT,
  approved BOOLEAN DEFAULT true,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL
);

CREATE TABLE IF NOT EXISTS ratings (
  id BIGSERIAL PRIMARY KEY,
  author_name VARCHAR(255) NOT NULL,
  author_email VARCHAR(255),
  stars SMALLINT DEFAULT 5,
  review TEXT,
  rateable_type VARCHAR(255),
  rateable_id BIGINT,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL
);

CREATE TABLE IF NOT EXISTS contacts (
  id BIGSERIAL PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  proposal VARCHAR(255),
  subject VARCHAR(255),
  collab_items JSON,
  message TEXT,
  is_read BOOLEAN DEFAULT false,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL
);

CREATE TABLE IF NOT EXISTS page_views (
  id BIGSERIAL PRIMARY KEY,
  url VARCHAR(255) NOT NULL,
  ip VARCHAR(45),
  user_agent VARCHAR(255),
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL
);

CREATE TABLE IF NOT EXISTS cache (
  key VARCHAR(255) PRIMARY KEY,
  value TEXT NOT NULL,
  expiration INTEGER NOT NULL
);

CREATE TABLE IF NOT EXISTS cache_locks (
  key VARCHAR(255) PRIMARY KEY,
  owner VARCHAR(255) NOT NULL,
  expiration INTEGER NOT NULL
);

CREATE TABLE IF NOT EXISTS jobs (
  id BIGSERIAL PRIMARY KEY,
  queue VARCHAR(255) NOT NULL,
  payload TEXT NOT NULL,
  attempts SMALLINT NOT NULL,
  reserved_at INTEGER NULL,
  available_at INTEGER NOT NULL,
  created_at INTEGER NOT NULL
);

CREATE INDEX IF NOT EXISTS jobs_queue_index ON jobs(queue);

CREATE TABLE IF NOT EXISTS migrations (
  id SERIAL PRIMARY KEY,
  migration VARCHAR(255) NOT NULL,
  batch INTEGER NOT NULL
);

-- Insérer l'admin
INSERT INTO users (name, email, password, email_verified_at, created_at, updated_at)
VALUES ('Joseph ALAYE', 'admin@josephalaye.com', '$2y$12$5/4sNdaWVWvdr3DGqQhCFkOovFoPU4JeoO1NAwl+Sms=', NOW(), NOW(), NOW())
ON CONFLICT (email) DO NOTHING;

-- Insérer les articles
INSERT INTO posts (title, slug, excerpt, body, image, category, published, created_at, updated_at) VALUES
('Introduction à Laravel', 'introduction-a-laravel', 'Découvrez les fondamentaux du framework Laravel pour créer des applications web robustes et maintenables.', '<p>Laravel est un framework PHP élégant et puissant. Dans cet article, nous explorons les concepts fondamentaux.</p>', 'code.jpg', 'development', true, NOW(), NOW()),
('L''IA au service du développement', 'ia-service-developpement', 'Comment l''intelligence artificielle transforme la manière dont nous codons et résolvons les problèmes.', '<p>L''IA générative change la donne pour les développeurs. Voici comment l''intégrer efficacement.</p>', 'code.jpg', 'ia', true, NOW(), NOW()),
('Flutter : cross-platform made easy', 'flutter-cross-platform', 'Un guide pratique pour construire des applications mobiles performantes avec Flutter et Dart.', '<p>Flutter permet de créer des apps iOS et Android avec un seul code source.</p>', 'laptop_code.jpg', 'mobile', true, NOW(), NOW())
ON CONFLICT (slug) DO NOTHING;

-- Insérer les abonnés
INSERT INTO subscribers (email, name, active, subscribed_at, created_at, updated_at) VALUES
('test1@example.com', 'Test Abonné 1', true, NOW(), NOW(), NOW()),
('test2@example.com', 'Test Abonné 2', true, NOW(), NOW(), NOW())
ON CONFLICT (email) DO NOTHING;

-- Enregistrer les migrations comme exécutées
INSERT INTO migrations (migration, batch) VALUES
('0001_01_01_000000_create_users_table', 1),
('0001_01_01_000001_create_cache_table', 1),
('0001_01_01_000002_create_jobs_table', 1),
('2026_08_03_001722_create_contacts_table', 1),
('2026_09_15_000000_create_posts_and_subscribers_table', 1),
('2026_09_15_000001_create_comments_and_ratings_table', 1),
('2026_09_15_000002_create_page_views_table', 1);
