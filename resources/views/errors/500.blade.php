<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="robots" content="noindex" />
  <title>Erreur serveur — Joseph ALAYE</title>
  <style>
    :root { color-scheme: dark; }
    * { box-sizing: border-box; }
    body {
      margin: 0; min-height: 100vh; display: grid; place-items: center;
      background: #000; color: #f5f5f5; font-family: Inter, system-ui, sans-serif;
      padding: 24px;
    }
    .box { max-width: 560px; text-align: center; }
    .code { font: 700 4rem/1 "Space Grotesk", sans-serif; color: #E8C547; letter-spacing: .1em; }
    h1 { font-size: 1.6rem; margin: 18px 0 10px; }
    p { color: #9ca3af; line-height: 1.7; margin: 0 0 26px; }
    a {
      display: inline-block; padding: 12px 22px; border-radius: 10px;
      background: #E8C547; color: #111; text-decoration: none; font-weight: 600;
    }
    a:focus-visible { outline: 2px solid #fff; outline-offset: 3px; }
  </style>
</head>
<body>
  <main class="box">
    <div class="code">500</div>
    <h1>Une erreur inattendue est survenue</h1>
    <p>Le problème a été enregistré. Merci de réessayer dans quelques instants.</p>
    <a href="{{ url('/') }}">Retour à l’accueil</a>
  </main>
</body>
</html>
