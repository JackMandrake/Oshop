<?php

/**
 * On importe ici les librairies installées avec composer
 */
require __DIR__. '/../vendor/autoload.php';


/**
 *Après création de ma classe PDO (Protection des Ours) dans un namespace,
 * Je n'ai plus d'ereur, et en plus on va pouvoir instancier nos éléments
 */

//  $baloo1 = new Baloo\PDO();

/**
 * Pour des raisons de lisibilité et de maintenabilité,
 * on va créer deux classes controllers
 * 
 * - MainController : qui se charge de l'affichage de pages non directement
 *   liées au site e-Commerce : home, blog, contact
 * 
 * 
 * - CatalogController : qui se charge de l'affichage de pages Directement
 *   liées au site e-Commerce : category, product_type, brand
 */

// $mainObj = new MainController();
// $mainObj->home();
// $mainObj->blog();
// $mainObj->contact();

// $catalogObj = new CatalogController();
// $catalogObj->category();
// $catalogObj->product_type();
// $catalogObj->brand();



// GIT : 
// Vois les branches comme des casseroles d'une recette de cuisine, dans une tu chauffe ta viande dans l autre tu fais ta sauce ta pas envie de faire tout dans une même casserole, et une fois que tout est prêt tu merge les deux

/**
 * On met en place un affichage centralisé via le fichier index.php
 * en utilisant le principe de l'entonnoir : Toutes les requetes
 * menent (à Rome ?) au fichier  index.php 
 * ==> Cette architecture s'appelle : Front Controller
 * ==> Froncontroller = 1 Seul point d'entrée
 */


// On récupère la page courante, en mettant la page "home" par défaut
// Si ma page est définie dans l'url, alors je stocke sa valeur dans la
// variable currenPage, sinon, currentPage aura la valeur 'home'
$currentPage = isset($_GET['page']) ? $_GET['page'] : '/home';

// dd($_SERVER);

/**
 * Route : On modélise le chemin parcouru par la requete
 * ==> Cette modélisation des chemins vers une méthodes s'appelle
 * le routage
 */

/**
 * Problématique : on veut pouvoir afficher nos produits dynamiquement.
 * Or problème, avec notre système actuel (1 entrée ==> une méthode/controller),
 * si l'on souhaite afficher plusieurs produits en vue détaillée,
 * ça impliquerait d'avoir plusieurs entrées dans le tableau de routes.
 * 
 * Solution : on va devoir trouver un outil qui permette la création
 * dynamique de routes à partir d'une seule entrée
 * 
 * AltoRouter ==> https://altorouter.com/
 */

/**
 * Var_dumper permet d'affiche le détails de manière plus élégante
 */
// dump($routes); ==> var_dump élégant

// dd($routes) : On fait un var_dump + die (exit) dans la foulée

// 1 - Instanciation de AltoRouter
$router = new AltoRouter();

// 2 - On dit à AltoRouter quelle est la partie "statique" de notre site
$router->setBasePath($_SERVER['BASE_URI']);

// 3 - Création de routes dynamiques
$router->map( 
    'GET', // Permet de préciser le type de requetes autorisées
    '/test',    // Si je suis sur la page d'accueil , alors on effectue l'action
            // liée à cette page
    [
        'method' => 'test',
        'controller'=> 'MainController'
    ], 
    'test' // Ce paramètre permettra à terme de générerer des urls (à REVOIR) 
          // Ce paramètre doit être unique
);

$router->map( 
    'GET', // Permet de préciser le type de requetes autorisées
    '/',    // Si je suis sur la page d'accueil , alors on effectue l'action
            // liée à cette page
    [
        'method' => 'home',
        'controller'=> 'MainController'
    ], 
    'home' // Ce paramètre permettra à terme de générerer des urls (à REVOIR) 
          // Ce paramètre doit être unique
);

$router->map( 
    'GET', // Permet de préciser le type de requetes autorisées
    '/blog',    // Si je suis sur la page d'accueil , alors on effectue l'action
            // liée à cette page
    [
        'method' => 'blog',
        'controller'=> 'MainController'
    ], 
    'blog' // Ce paramètre permettra à terme de générerer des urls (à REVOIR) 
);

$router->map( 
    'GET', // Permet de préciser le type de requetes autorisées
    '/contact',    // Si je suis sur la page d'accueil , alors on effectue l'action
            // liée à cette page
    [
        'method' => 'contact',
        'controller'=> 'MainController'
    ], 
    'contact' // Ce paramètre permettra à terme de générerer des urls (à REVOIR) 
);

$router->map( 
    'GET', // Permet de préciser le type de requetes autorisées
    '/catalog/type/[i:type_id]',    // Si je suis sur la page d'accueil , alors on effectue l'action
            // liée à cette page
    [
        'method' => 'type',
        'controller'=> 'CatalogController'
    ], 
    'catalog_type' // Ce paramètre permettra à terme de générerer des urls (à REVOIR) 
);

$router->map( 
    'GET', // Permet de préciser le type de requetes autorisées
    '/catalog/type/',    // Si je suis sur la page d'accueil , alors on effectue l'action
            // liée à cette page
    [
        'method' => 'type',
        'controller'=> 'CatalogController'
    ], 
    'catalog_type_list' // Ce paramètre permettra à terme de générerer des urls (à REVOIR) 
);

$router->map( 
    'GET', // Permet de préciser le type de requetes autorisées
    '/catalog/product/[i:product_id]',    // Si je suis sur la page d'accueil , alors on effectue l'action
            // liée à cette page
    [
        'method' => 'product',
        'controller'=> 'CatalogController'
    ], 
    'catalog_product' // Ce paramètre permettra à terme de générerer des urls (à REVOIR) 
);

$router->map( 
    'GET', // Permet de préciser le type de requetes autorisées
    '/catalog/category/',    // Si je suis sur la page d'accueil , alors on effectue l'action
            // liée à cette page
    [
        'method' => 'category_list',
        'controller'=> 'CatalogController'
    ], 
    'catalog_category_list' // Ce paramètre permettra à terme de générerer des urls (à REVOIR) 
);

$router->map( 
    'GET', // Permet de préciser le type de requetes autorisées
    '/catalog/category/[i:category_id]',    // Si je suis sur la page d'accueil , alors on effectue l'action
            // liée à cette page
    [
        'method' => 'category',
        'controller'=> 'CatalogController'
    ], 
    'catalog_category' // Ce paramètre permettra à terme de générerer des urls (à REVOIR) 
);


$router->map( 
    'GET', // Permet de préciser le type de requetes autorisées
    '/catalog/brand/[i:brand_id]',    // Si je suis sur la page d'accueil , alors on effectue l'action
            // liée à cette page
    [
        'method' => 'brand',
        'controller'=> 'CatalogController'
    ], 
    'catalog_brand' // Ce paramètre permettra à terme de générerer des urls (à REVOIR) 
);


$router->map( 
    'GET', // Permet de préciser le type de requetes autorisées
    '/catalog/brand/[i:brand_id]',    // Si je suis sur la page d'accueil , alors on effectue l'action
            // liée à cette page
    [
        'method' => 'brand',
        'controller'=> 'CatalogController'
    ], 
    'catalog_brand_list' // Ce paramètre permettra à terme de générerer des urls (à REVOIR) 
);

$match = $router->match();

// print_r($match['params']);
// Dump + Die
// dd($match);


// Est ce que la route est définie dans mon tableau de routage
if ($match) {
    // Si c'est le cas, alors je l'affiche : c'est le Dispatching
    // A une URL on associe une action

    // La variable $controller contient ici
    // le nom du controller ('MainController')
    // tel que défini dans le tableau de routes
    // On instancie un nouvel objet de la classe MainController
    // Et ça implique désormais, on peut accéder aux méthodes de la classe

    $controller = 'oShop\controllers\\'.$match['target']['controller']; 
    $controllerObj = new $controller(); // new MainController()

    // La variable $method contient ici
    // le nom de la méthode tel que défini dans le tableau de routes
    $method = $match['target']['method'];
    
    // On peut récupérer les paramètres de l'url grâce à la variable
    // $match (clé params)
    $params = $match['params'];

    // Solution 1 : On peut transmettre l'objet $router en paramètre
    // de nos méthodes, pour qu'il soit disponible
    // dans les views (.tpl.php)
    // $params['router'] = $router;
    $controllerObj->$method($params); // Si method='home'==> $controllerObj->home()

} else {
    // Si elle n'existe pas : on affiche une page 404
    $controllerObj = new oShop\controllers\MainController(); 
    $controllerObj->page404();
}

