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
                'slug' => 'experience-laravel',
                'excerpt' => "Ce que j'ai appris en passant d'un projet tutoriel à une application Laravel utilisée en conditions réelles.",
                'body' => <<<'HTML'
<h2>Pourquoi Laravel ?</h2>
<p>J'ai découvert Laravel pendant ma formation, puis je l'ai réellement pratiqué en stage chez DigiWeb SARL. Ce qui m'a convaincu, c'est sa capacité à couvrir tout le cycle d'une application web : routage, base de données, authentification, files d'attente et déploiement.</p>
<p>Là où d'autres frameworks demandent d'assembler beaucoup de briques, Laravel propose des conventions claires. On passe moins de temps à décider comment organiser le projet, et plus de temps à résoudre le vrai problème.</p>

<h2>Les fondations qui changent tout</h2>
<ul>
  <li><strong>Les migrations :</strong> le schéma de base de données devient versionné. Rejouer un environnement devient trivial.</li>
  <li><strong>Eloquent :</strong> les relations se lisent presque comme du langage naturel, à condition de surveiller le problème N+1.</li>
  <li><strong>Blade :</strong> les vues restent lisibles et composables, sans mélanger logique métier et présentation.</li>
  <li><strong>La validation :</strong> centralisée et expressive, elle évite de disperser des conditions dans les contrôleurs.</li>
</ul>

<blockquote>Un framework ne remplace pas la réflexion : il retire de la friction pour mieux se concentrer sur le produit.</blockquote>

<h2>Les pièges que j'ai rencontrés</h2>
<p>Mon premier vrai piège a été le chargement des relations. Une boucle dans une vue peut déclencher des dizaines de requêtes invisibles. Depuis, je vérifie systématiquement avec le débogueur de requêtes et j'utilise <code>with()</code> dès que nécessaire.</p>
<p>Le deuxième piège concerne les migrations en production. Modifier une colonne existante sans stratégie de retour arrière peut bloquer un déploiement. J'ai appris à découper les changements et à tester chaque migration sur une copie des données.</p>

<h2>Ce que je retiens pour la production</h2>
<p>Avant de mettre en ligne, je vérifie toujours quatre points : la configuration mise en cache, les variables d'environnement, les sauvegardes de base de données et les logs. Ce sont des détails peu visibles, mais ce sont eux qui font la différence entre une démo et un produit fiable.</p>
<p>Aujourd'hui, Laravel reste mon outil principal pour les applications web métier. Pas parce qu'il est à la mode, mais parce qu'il me permet de livrer vite sans sacrifier la maintenabilité.</p>
HTML,
                'image' => 'code.jpg',
                'category' => 'development',
                'published' => true,
            ],
            [
                'title' => 'Concevoir une API REST propre avec Laravel',
                'slug' => 'laravel-api-rest',
                'excerpt' => 'Structure, validation, réponses JSON et sécurité : ma checklist pour une API maintenable.',
                'body' => <<<'HTML'
<h2>Une API se conçoit avant de se coder</h2>
<p>Avant d'écrire la première route, je liste les ressources et les actions attendues. Une API lisible suit des conventions stables : des noms au pluriel, des verbes HTTP cohérents et des réponses prévisibles.</p>
<pre><code>GET    /api/posts
GET    /api/posts/{post}
POST   /api/posts
PUT    /api/posts/{post}
DELETE /api/posts/{post}</code></pre>

<h2>Des contrôleurs fins</h2>
<p>Un contrôleur ne devrait contenir que l'orchestration : recevoir la requête, appeler la logique, retourner une réponse. La validation va dans un FormRequest, les traitements complexes dans des services ou des actions dédiées.</p>

<h2>Valider et répondre correctement</h2>
<p>La validation protège l'API des données incohérentes. Côté réponses, les codes HTTP doivent raconter l'histoire : 201 pour une création, 204 pour une suppression, 422 pour une validation échouée, 404 pour une ressource absente.</p>
<ul>
  <li>Retourner des ressources JSON structurées et stables.</li>
  <li>Ne jamais exposer les messages d'erreur internes en production.</li>
  <li>Versionner l'API dès qu'elle est consommée par plusieurs clients.</li>
</ul>

<h2>Sécuriser l'accès</h2>
<p>Pour une API destinée à une application mobile ou à un front séparé, j'utilise une authentification par token. Les routes sensibles sont protégées, les permissions vérifiées et les requêtes limitées par un throttling.</p>
<p>Enfin, j'écris quelques tests sur les parcours critiques. Un test qui vérifie un 401 ou un 422 vaut souvent plus qu'une longue documentation.</p>

<h2>Conclusion</h2>
<p>Une bonne API n'est pas seulement fonctionnelle : elle est prévisible. Un client doit pouvoir deviner le comportement d'une route à partir de son nom et de son verbe HTTP. C'est cette régularité qui réduit les bugs côté front.</p>
HTML,
                'image' => 'desktop-code.jpg',
                'category' => 'development',
                'published' => true,
            ],
            [
                'title' => "L'IA générative en pratique : ce que j'utilise vraiment",
                'slug' => 'ia-generate',
                'excerpt' => "Au-delà du buzz : les usages concrets de l'IA dans mon quotidien de développeur, et ses limites.",
                'body' => <<<'HTML'
<h2>Une aide, pas un remplaçant</h2>
<p>J'utilise l'IA générative presque tous les jours, mais rarement pour écrire une application entière. Elle m'aide surtout à débloquer une situation : comprendre une erreur, explorer une piste, générer un premier squelette ou reformuler une documentation.</p>

<h2>Mes usages concrets</h2>
<ul>
  <li><strong>Exploration :</strong> comparer deux approches techniques avant de choisir.</li>
  <li><strong>Débogage :</strong> reformuler un message d'erreur et proposer des hypothèses.</li>
  <li><strong>Rédaction :</strong> structurer un README ou un compte rendu.</li>
  <li><strong>Tests :</strong> générer des cas limites auxquels je n'aurais pas pensé.</li>
</ul>

<h2>Ce que je ne lui confie pas</h2>
<p>Je ne lui confie ni des secrets, ni des données personnelles, ni des décisions d'architecture irréversibles. Je ne copie jamais un bloc de code sans le comprendre. Une réponse plausible n'est pas une réponse correcte.</p>

<h2>Mieux demander pour mieux obtenir</h2>
<p>La qualité d'une réponse dépend du contexte fourni. Je précise la version du framework, le comportement attendu, les contraintes et le format de sortie. Je demande aussi plusieurs alternatives : cela révèle souvent une meilleure solution que la première proposition.</p>

<blockquote>L'IA accélère celui qui sait vérifier. Elle ralentit celui qui accepte tout.</blockquote>

<h2>Intégrer l'IA dans un produit</h2>
<p>Quand l'IA fait partie d'une application, je l'isole derrière une interface claire : une entrée, une sortie, des erreurs gérées. Il faut prévoir les cas où le modèle échoue, répond à côté ou met trop de temps. L'expérience utilisateur ne doit jamais dépendre entièrement du modèle.</p>

<h2>Conclusion</h2>
<p>L'IA générative est un accélérateur formidable pour peu qu'on garde la main sur la vérification. Mon approche est simple : elle propose, je teste, je comprends, puis j'intègre.</p>
HTML,
                'image' => 'me_coding.png',
                'category' => 'ia',
                'published' => true,
            ],
            [
                'title' => "Automatiser ses tâches avec l'IA sans perdre le contrôle",
                'slug' => 'automatiser-taches-ia',
                'excerpt' => 'Workflows, scripts et vérifications humaines : comment gagner du temps sans sacrifier la qualité.',
                'body' => <<<'HTML'
<h2>Pourquoi automatiser ?</h2>
<p>Automatiser n'a de sens que si la tâche est répétitive, bien comprise et vérifiable. Gagner dix minutes par jour sur une action mal définie peut coûter des heures de correction. Je commence donc toujours par écrire le processus à la main.</p>

<h2>Choisir les bonnes tâches</h2>
<ul>
  <li>Les tâches répétitives et stables dans le temps.</li>
  <li>Les tâches dont le résultat est facile à contrôler.</li>
  <li>Les tâches où une erreur reste réversible.</li>
</ul>
<p>À l'inverse, je garde un humain sur les décisions sensibles : envoi d'un message à un client, suppression de données, publication d'un contenu.</p>

<h2>Un pipeline simple</h2>
<p>Mon schéma habituel tient en quatre étapes : déclencheur, traitement, vérification, action. Par exemple, un nouveau formulaire déclenche un résumé généré par IA, je relis le résumé, puis il est envoyé. Chaque étape laisse une trace consultable.</p>

<h2>Garder le contrôle</h2>
<p>Trois garde-fous suffisent pour la plupart des workflows : une validation humaine avant l'action finale, des logs exploitables et une limite de volume. Sans logs, un problème devient impossible à diagnostiquer. Sans limite, une erreur peut se propager à grande échelle.</p>

<h2>Conclusion</h2>
<p>La bonne automatisation ne retire pas le contrôle : elle le rend plus visible. On délègue les gestes, pas la responsabilité.</p>
HTML,
                'image' => 'me-in-workspace.png',
                'category' => 'ia',
                'published' => true,
            ],
            [
                'title' => 'Flutter : développer une application mobile qui tient la route',
                'slug' => 'flutter-mobile',
                'excerpt' => "Mon retour d'expérience sur Flutter, de la structure d'un projet à la publication.",
                'body' => <<<'HTML'
<h2>Pourquoi Flutter</h2>
<p>Flutter permet de développer pour Android et iOS à partir d'une seule base de code. Pour des projets à budget limité, c'est un avantage considérable : une équipe, une logique, deux plateformes.</p>
<p>J'ai utilisé Flutter sur une application de gestion des paiements de scolarité. L'objectif était simple : centraliser les étudiants, les paiements et les reçus dans une interface fluide.</p>

<h2>Structurer avant de coder</h2>
<p>Un projet Flutter qui grossit devient vite difficile à lire si tout est mélangé. Je sépare les écrans, les composants réutilisables, les modèles et les services d'accès aux données. Cette séparation facilite les tests et les évolutions.</p>

<h2>Gérer l'état sans complexité</h2>
<p>Il existe de nombreuses solutions de gestion d'état. Mon conseil : commencer simple. Pour beaucoup d'applications, un état local bien organisé suffit. On ajoute un gestionnaire plus robuste seulement quand le besoin apparaît.</p>

<h2>Performance et expérience</h2>
<ul>
  <li>Éviter les reconstructions inutiles de widgets.</li>
  <li>Afficher un état de chargement clair.</li>
  <li>Prévoir les erreurs réseau et les actions hors ligne.</li>
  <li>Soigner les transitions : elles donnent la sensation de qualité.</li>
</ul>

<h2>Publier et maintenir</h2>
<p>La publication n'est pas la fin du projet. Il faut prévoir les mises à jour, les retours utilisateurs et les correctifs. Une application mobile vit grâce à ses itérations régulières.</p>

<h2>Conclusion</h2>
<p>Flutter est un excellent choix quand on veut livrer rapidement sur deux plateformes sans sacrifier l'interface. La clé reste la même que partout : une structure claire et un périmètre maîtrisé.</p>
HTML,
                'image' => 'laptop_code.jpg',
                'category' => 'mobile',
                'published' => true,
            ],
            [
                'title' => 'Un design system léger pour des interfaces cohérentes',
                'slug' => 'design-system-leger',
                'excerpt' => "Tokens, composants et documentation : comment garder une interface cohérente sans alourdir le projet.",
                'body' => <<<'HTML'
<h2>Pourquoi un design system ?</h2>
<p>Sur un projet qui grandit, l'incohérence s'installe vite : trois nuances de gris, deux tailles de boutons, quatre espacements différents. Un design system ne consiste pas à créer une bibliothèque énorme, mais à fixer un vocabulaire commun.</p>

<h2>Commencer par les tokens</h2>
<p>Les tokens sont les plus petites décisions de design : couleurs, typographies, espacements, rayons, ombres. En les centralisant, on peut changer l'apparence globale sans parcourir chaque écran.</p>
<pre><code>--accent: #E8C547;
--bg: #000000;
--radius: 16px;
--space-md: 16px;</code></pre>

<h2>Des composants, pas des copies</h2>
<p>Un bouton, une carte, un champ de formulaire : chaque élément répété mérite un composant unique avec des variantes claires. Cela réduit les corrections en cascade et accélère les nouveaux écrans.</p>

<h2>Documenter l'essentiel</h2>
<p>Une documentation courte et à jour vaut mieux qu'un long document abandonné. Je documente l'usage, les variantes et les cas à éviter. L'objectif est qu'un nouveau venu puisse construire un écran sans deviner.</p>

<h2>Les erreurs à éviter</h2>
<ul>
  <li>Créer trop de composants avant d'avoir des usages réels.</li>
  <li>Laisser les exceptions devenir la norme.</li>
  <li>Oublier les états : survol, focus, erreur, désactivé.</li>
</ul>

<h2>Conclusion</h2>
<p>Un design system réussi est discret : il rend le travail plus simple et les interfaces plus cohérentes. On le construit petit, à partir de besoins concrets, puis on l'enrichit au fil du projet.</p>
HTML,
                'image' => 'me-pro.png',
                'category' => 'design',
                'published' => true,
            ],
        ];

        foreach ($posts as $data) {
            Post::updateOrCreate(['slug' => $data['slug']], $data);
        }
    }
}
