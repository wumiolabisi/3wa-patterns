# Présentation
Le Framework que nous souhaitons développé doit permettre de créer une application web avec possibilité de gérer les URLS (ou routes)

## Prérequis
- PHP 8

# Les routes

L'utilisateur n'a pas besoin de connaitre les pages qui existent. Le Framework utilise le Routing Component de Symfony qui permet de gérer les routes facilement.

## Ajouter une nouvelle page
Pour mon-fichier.php lié à l'url mon-app.fr/ma-page suivez les étapes : 
1. Créez vos pages dans le dossier src/pages
2. Dans le fichier routes.php présetn dans le dossier src, entrez le nom de votre fichier ainsi que le nom de votre route comme suit 

```php

/* URL AVEC VARIABLE */
$routes->add('nom-fichier', new Route('/ma-page/{var1}', ['var1' => 'valeur par défaut']));

/* URL SIMPLE */
$routes->add('nom-fichier', new Route('/ma-page'));


```

