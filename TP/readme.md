# Présentation
Le Framework que nous avons développé permet de créer une application web avec beaucoup de facilité.

## Prérequis
- PHP 8
- Ce Framework se base sur les principes SOLID. Il faudra les respecter durant l'utilisation si vous souhaitez qu'il n'y ait pas de bugs insolites.

## Outils
- Symfony HTTP Foundation : pour la gestion des variables globales HTTP
- Symfony Routing : pour la gestion des routes

# Architecture
```php
TP
    public
        index.php
    src
        Controller
            AboutController.php
            HomeController.php
        pages
            about.php
            home.php
    tests
        IndexTest.php
    vendor
        toutes les librairies nécessaires
    composer.json
    composer.lock
    readme.md
```

# Les routes
Grâce au Routing Component de Symfony intégré dans ce Framework, nous avons facilité la gestion des urls dans votre application. Au départ, vous aurez deux pages par défaut : la page d'accueil "home" et la page "A propos". Ce sont des pages facultatives mais qui pourront vous servir de modèle pour construire votre app.

## Ajouter une nouvelle page
Pour mon-fichier.php lié à l'url mon-app.fr/ma-page suivez les étapes : 
1. Créez vos pages dans le dossier src/pages
2. Dans le fichier routes.php présent dans le dossier src, entrez le nom de votre fichier ainsi que le nom de votre route comme suit 

```php

/* URL AVEC VARIABLE */
$routes->add('nom-fichier', new Route('/ma-page/{var1}', ['var1' => 'valeur par défaut']));

/* URL SIMPLE */
$routes->add('nom-fichier', new Route('/ma-page'));


```

## Ajouter de nouvelles méthodes à une page 
En s'inspirant de Symfony, ce Framework propose d'avoir un *controller* par page, soit une classe homonyme qui gère une page unique.

Pour lier un *controller* à une page spécifique :
1. Créer votre MaPageController.php dans le dossier src/Controller et codez votre classe et ses méthodes.
2. Rendez-vous dans le fichier routes.php qui se situe dans le dossier src
3. Ajouter dans la variable **callable** le nom de votre controller ainsi que la méthode a exécuter :

```php

$routes->add('home', new Route('/home/{name}', [
    'name' => 'World',
    'callable' => [new \App\Controller\HomeController, 'home']

]));

```