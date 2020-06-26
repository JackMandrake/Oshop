<?php
/**
 * Quand PHP verra oShop\ ==> app/
 */
namespace oShop\controllers;

use oShop\models\Brand;
use oShop\models\Category as Category;
use oShop\models\Product;
use oShop\models\Type;

class MainController extends CoreController
{   
    /**
     * Methode correspondant à la page de Test
     *
     * @return void
     */
    public function test()
    {
        // dd('Hello world'); // dump + die

        /**
         * Nouvel objet de la classe (Model) Brand
         */
        $brandModel = new Brand();
        $resultBrand = $brandModel->find(1);

        // On retourne par défaut les 5 premiers résultats
        $resultForFiveBrands = $brandModel->findAllWithLimit();

        // Mais on peut aussi préciser une autre limite : ici limit =3
        $resultForThreeBrands = $brandModel->findAllWithLimit(2);

        dump($resultForFiveBrands);
        dd($resultForThreeBrands);

        $resultAllBrand = $brandModel->findAll();

        dump($resultBrand);
        dump($resultAllBrand);


        /**
         * Nouvel objet de la classe (Model) Category
         */
        $categoryModel = new Category();
        $resultCategory = $categoryModel->find(1);
        $resultAllCategory = $categoryModel->findAll();

        dump($resultCategory);
        dump($resultAllCategory);


        /**
         * Nouvel objet de la classe (Model) Product
         */
        $productModel = new Product();
        $resultProduct = $productModel->find(1);
        $resultAllProduct = $productModel->findAll();

        dump($resultProduct);
        dump($resultAllProduct);


        /**
         * Nouvel objet de la classe (Model) Type
         */
        $typeModel = new Type();
        $resultType = $typeModel->find(1);
        $resultAllType = $typeModel->findAll();

        dump($resultType);
        dump($resultAllType);


        $params = [
            'resultBrand' => $resultBrand,
            'resultAllBrand' => $resultAllBrand
        ];

        $this->show('test', $params);
    }

    /**
     * Methode correspondant à la page d'accueil
     *
     * @return void
     */
    public function home()
    {
        /**
         * On veut afficher les 5 premières catégories depuis la page d'accueil.
         * 
         * On va devoir utiliser le modèle Category. 
         * Un modèle est la "représentation" d'une table SQL, mais 
         * sous la forme d'une classe PHP :
         * 
         * - Le nom de la classe portera le même que la table en UpperCamelCase (Category)
         * - Les propriétés auront le même nom que les colonnes de la table
         * - Un modèle doit être écrit dans le dossier app/models (app/Models)... 
         */
        $categoryModel = new Category();
        $categoryList = $categoryModel->findAllCategoryForHome();
        
        // Le premier tableau contient les 2 premoiers éléments
        $categoryListFirst = array_slice($categoryList, 0, 2);

        // Le deuxième tableau contient les 3 derniers éléments
        $categoryListSecond = array_slice($categoryList, 2);

        /**
         * Une fois les données de la page d'accueil récupérées, on va 
         * pouvoir les transmettre à la vue
         */
        $dataToDisplay = [
            'categoryListFirst' => $categoryListFirst,
            'categoryListSecond' => $categoryListSecond
        ];
        dump($dataToDisplay);

        /**
         * J'appelle ensuite la show qui va require le template app/views/home.tpl.php
         */
        $this->show('home', $dataToDisplay);
    }

    /**
     * Methode correspondant à la page Blog
     *
     * @return void
     */
    public function blog()
    {
        // Permet d'afficher views/blog.tpl.php
        // TODO : fichier à créer
        $this->show('blog');
    }

    /**
     * Methode correspondant à la page Contact
     *
     * @return void
     */
    public function contact()
    {
        
        // Permet d'afficher views/contact.tpl.php
        // TODO : fichier à créer
        $this->show('contact');
    }
}
