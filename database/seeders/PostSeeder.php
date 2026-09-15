<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            [
                'title' => 'Mon expérience avec Laravel : du premier projet à la production',
                'slug' => 'experience-laravel-production',
                'excerpt' => 'Retour d\'expérience sur l\'utilisation de Laravel pour des projets concrets, de la configuration initiale au déploiement.',
                'body' => '<h2>Pourquoi Laravel ?</h2><p>Laravel m\'a permis de monter rapidement en compétence grâce à sa syntaxe élégante et son écosystème riche. Lors de mon stage chez DigiWeb SARL, j\'ai pu intervenir sur des projets fonctionnels en peu de temps.</p><h2>Les points forts</h2><p>L\'ORM Eloquent, les migrations, et Blade rendent le développement très productif. Le système d\'authentification est prêt à l\'emploi.</p><blockquote>Laravel n\'est pas qu\'un framework, c\'est un écosystème complet.</blockquote><h2>Les défis rencontrés</h2><p>La courbe d\'apprentissage pour les middleware et les services peut être abrupte au début. Mais une fois comprises, ces concepts ouvrent beaucoup de possibilités.</p>',
                'image' => 'code.jpg',
                'category' => 'development',
                'published' => true,
            ],
            [
                'title' => 'Comprendre l\'IA générative en 2026 : guide pratique',
                'slug' => 'ia-generative-guide-2026',
                'excerpt' => 'Les bases de l\'IA générative, ses applications concrètes et comment l\'intégrer dans vos projets.',
                'body' => '<h2>Qu\'est-ce que l\'IA générative ?</h2><p>L\'IA générative désigne les modèles capables de créer du contenu : texte, images, code. En 2026, ces outils sont devenus incontournables dans le développement web.</p><h2>Applications concrètes</h2><p>Automatisation de la rédaction, génération de code, création de maquettes... Les cas d\'usage se multiplient.</p><h2>Mon parcours avec l\'IA</h2><p>En tant que membre du Club IA du CAEB, j\'ai exploré Python, le Machine Learning et les API d\'IA pour résoudre des problèmes concrets.</p>',
                'image' => 'me_coding.png',
                'category' => 'ia',
                'published' => true,
            ],
            [
                'title' => 'Flutter pour les applications mobiles : pourquoi j\'ai choisi cette technologie',
                'slug' => 'flutter-applications-mobiles',
                'excerpt' => 'Les avantages de Flutter pour le développement mobile cross-platform et mon retour d\'expérience.',
                'body' => '<h2>Flutter : un seul code, deux plateformes</h2><p>Flutter permet de développer pour iOS et Android avec un seul code Dart. C\'est un gain de temps énorme pour les projets avec des budgets limités.</p><h2>Mon projet scolarité</h2><p>J\'ai créé une application de gestion des paiements de scolarité pour l\'UATM GASA Formation. L\'app gère les étudiants, les paiements et génère des reçus.</p><h2>Les points forts de Dart</h2><p>La syntaxe est propre, le hot reload est magique, et la communauté Flutter est très active.</p>',
                'image' => 'laptop_code.jpg',
                'category' => 'mobile',
                'published' => true,
            ],
        ];

        foreach ($posts as $data) {
            Post::create($data);
        }
    }
}
