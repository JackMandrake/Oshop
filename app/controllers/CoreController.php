<?php 

namespace oShop\controllers;

use oShop\models\Brand;
use oShop\models\Type;

class CoreController {
    /**
     * Methode correspondant à la 404 (erreur not found)
     *
     * @return void
     */
    public function page404()
    {
        $this->show('404');
    }

    /**
     * Fonction show qui affiche des vues (page html) en fonction
     * du paramètre $viewName
     * Ex : si $viewName = 'index' ==> on affiche le template views/index.tpl.php
     * 
     * Le paramètre $viewVars permet de transmettre des paramètres supplémentaires à nos vues
     * 
     * Les paramètres $viewVars et $viewVars sont disponibles dans les vues
     * On peut donc les appeler pour afficher dynamiquement la classe 'active'
     * dans le fichier views/nav.tpl.php
     *
     * @param string $viewName
     * @param array $viewVars
     * @return void
     */
    public function show($viewName, $viewVars = [])
    {
        // $viewVars est disponible dans chaque fichier de vue
        // On appelle le header

        /**
         * Une fonction est une boite hermétique : 
         * rien à priori ne rentre ni ne sort sans le bon vouloir 
         * de la fonction.
         * 
         * La seule façon (à priori) de transmettre des infos à une fonction
         * est de lui envoyer des paramètres
         */

         /**
          * global : c'est la méthode Bazooka qui permet
          * de remonter dans l'historique des variables PHP
          * et si une variable a déjà été déclaré et portant
          * le même nom que la variable renseigné après le mot-clé
          * global, alors PHP remplace le contenu par celui de la variable
          * retrouvé dans l'historique PHP.
          */
        // En gros le global permet de savoir ce qui se passe à Vegas
        global $router;

        $viewVars['currentPage'] = isset($_GET['page']) ? $_GET['page'] : 'home';
        $viewVars['BASE_URI'] = $_SERVER['BASE_URI'];


        // Etape 1 : Déclarer une nouvelle instance d'un modèle Brand
        $brandModel = new Brand();

        // Etape 2 : On va appeler la méthode findAllWithLimit
        // On retourne par défaut les 5 premiers résultats
        $resultForFiveBrands = $brandModel->findAllWithLimit();


        // Etape 1 - Bis ) Déclarer une nouvelle instance d'un modèle Type
        $typeModel = new Type();

        // Etape 2 - Bis ) On va appeler la méthode findAllForFooter
        // On retourne 5 premiers résultats : un tableau d'objets de la classe Type
        $resultForFiveType = $typeModel->findAllForFooter();

        // 3) On va ensuite transmettre les données récupérées à la méthode show
        $viewVars['footerFiveBrands'] = $resultForFiveBrands;
        $viewVars['footerFiveType'] = $resultForFiveType;

        /**
         * La méthode extract Va transformer : 
         * - 1) les "clés" de notre tableau associatifs en "nom de variable"
         * - 2) les valeurs du tableau en contenu de la variable créé précédement 
         * 
         * Voir la doc officielle ici : https://www.php.net/manual/fr/function.extract.php
         */
        extract($viewVars);

        /**
         * On va se retrouver avec les variabels suivantes :
         * $currentPage = currentPage;
         * $BASE_URI = la base uri
         */

        // On affiche ici le contenu de notre template
        require_once __DIR__ . '/../views/header.tpl.php';
        // J'appelle ensuite la vue demandée en fonction du paramètre page 
        require_once __DIR__ . '/../views/' . $viewName . '.tpl.php';
        // On appelle le Footer
        require_once __DIR__ . '/../views/footer.tpl.php';
    }
}