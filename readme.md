# Présentation
Le Framework que nous avons développé permet de créer une application web avec beaucoup de facilité.

## Prérequis
- PHP 8
- Ce Framework se base sur les principes SOLID. Il faudra les respecter durant l'utilisation si vous souhaitez qu'il n'y ait pas de bugs insolites.

## Outils externes inclus dans ce Framework
- Symfony HTTP Foundation : pour la gestion des variables globales HTTP
- Symfony Routing : pour la gestion des routes
- PHPUnit : pour tester vos classes

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
    'callable' => 'App\Controller\AboutController@about'
]));

```
# Créer des événements
Pour gérer les événements, nous utilisons l'Event Dispatcher conçu par Symfony. A partir de ce composant, nous fournissons trois types de *Listener*
- Sur la requête HTTP : app.request
- Sur les controller: app.callable
- Sur la réponse HTTP : app.response

## Exemple d'utilisation
Soit une variable dans ma page Home qui s'appelle *name*. Par défaut, cette variable sera égale à World. Si je souhaite assigner à cette variable une autre valeur, voici le code à utiliser dans mon fichier index.php :
```php

/* ... */

$request = Request::createFromGlobals();
$dispatcher = new EventDispatcher;


$dispatcher->addListener('app.request', function (RequestEvent $event) {
    $event->getRequest()->attributes->set('name', 'Mon prénom');
});


/* ... */

```

# Tests
Le framework embarque PHPUnit par défaut et est donc compatible avec cet outil de tests unitaires. Voir la documentation PHPUnit. Avec la version initiale, vous aurez accès à un fichier qui servira de template pour vos fichiers de tests. Voici une liste non exhausitve des méthodes utilisables :
- Pour tester vos requêtes HTTP, vous pouvez utiliser l'objet Request fourni par Symfony. 