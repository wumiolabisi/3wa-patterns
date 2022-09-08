# Présentation
Le Framework que nous souhaitons développé doit permettre de gérer des routes, dispatcher

# Les routes

L'utilisateur n'a pas besoin de connaitre les pages qui existent. Grâce au PATHINFO, l'URL est analysée puis récupérée par le fichier index.php et c'est lui qui appellera la page correspondante si elle existe.

## Ajouter une nouvelle page
1. Créez vos pages dans le dossier src/pages
2. Dans le fichier index.php à la racine, entrez dans la variable $map le nom de votre fichier ainsi que le nom de votre route comme suit : 

```php
$map = [
    '/ma-route-1' => 'route1.php',
    '/ma-route-2' => 'route2.php',
    /* etc... */
];

```

