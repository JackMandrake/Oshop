<?php
// namespace app\controllers;
namespace oShop\controllers;

use oShop\models\Brand;
use oShop\models\Category;
use oShop\models\Product;
use oShop\models\Type;

/**
 * Problème : on avait la méthode qui show qui se trouvait à la fois dans CatalogController
 * mais aussi dans MainController. Or en PHP, on ne veut éviter  de se répéter.
 * 
 * Solution : pour éviter d'avoir plusieurs fois la même méthodes dans des classes différentes
 * on va mettre en place une classe "mère" (générique), dont la vocation n'est pas strictement
 * d'être instanciée (on veut éviter le new ClasseGenerique()), mais plutôt de partager
 * des méthodes et/ou des propriétés avec des d'autres classes. 
 * 
 * C'est la notion d'Héritage.
 * 
 */

class CatalogController extends CoreController
{

    public function category($params)
    {
        /**
         * Je peux désormais transmettre à ma vue des paramètres spécifiques
         * à la catégorie saisie en url
         * 
         * Le paramètre $params contient les valeurs dynamiques passées par l'url (récupérées via AltoRouter)
         */

        /**
         * Je veux que lorsqu'on affiche l'url public/catalog/category/ID
         * on puisse afficher une liste de produits associé à la catégorie.
         * 
         * Question : Comment récupérer des produits d'une categorie dont l'identifiant
         * est category_id ?
         * 
         * Pour afficher des données : On passe par un Modèle.
         * Lequel ? Product + Category
         */

        /**
         * Je vais devoir chercher des informations sur la catégorie courante
         * (dont l'identifiant est présent en url)
         */
        $category_id = $params['category_id'];
        $categoryModel = new Category();
        $categoryData = $categoryModel->find($category_id);

        $productModel = new Product();
        $categoryProducts = $productModel->findProductByCategory($category_id);

        if ($categoryProducts) {
            /**
             * Si des produits existent pour la catégorie, alors on les affiche
             */
            $dataToDisplay = [
                'categoryData' => $categoryData,
                'categoryProducts' => $categoryProducts
            ];
            dump($dataToDisplay);
            $this->show('category', $dataToDisplay);
        } else {
            /**
             * Sinon on affiche un message d'erreur 404
             */
            // $this->show('404');
            $error = 'Cette page n\'existe pas';
            if ($categoryData) {
                // La categorie existe bien (y a pas un petit malin qui a saisi n'importe quoi dans l'url)
                // par contre même si le categorie existe, aucun produit n'est associée à celle-ci
                $error = 'Aucun produit pour la catégorie ' . $categoryData->getName();
            }
            $this->show('404', ['error' => $error]);
        }
    }

    public function category_list($params)
    {
        /**
         * Je peux désormais transmettre à ma vue des paramètres spécifiques
         * à la catégorie saisie en url
         * 
         * Le paramètre $params contient les valeurs dynamiques passées par l'url (récupérées via AltoRouter)
         */

        $this->show('category_list', $params);
    }


    public function brand($params)
    {
        /**
         * Je peux désormais transmettre à ma vue des paramètres spécifiques
         * à la catégorie saisie en url
         * 
         * Le paramètre $params contient les valeurs dynamiques passées par l'url (récupérées via AltoRouter)
         */

        $brand_id = $params['brand_id'];
        $brandModel = new Brand();
        $brandData = $brandModel->find($brand_id);

        $productModel = new Product();
        $brandProducts = $productModel->findProductByType($brand_id);

        if ($brandProducts) {
            /**
             * Si des produits existent pour la marque (brand_id), alors on les affiche
             */
            $dataToDisplay = [
                'brandData' => $brandData,
                'brandProducts' => $brandProducts
            ];
            dump($dataToDisplay);
            $this->show('brand', $dataToDisplay);
        } else {
            /**
             * Sinon on affiche un message d'erreur 404
             */
            $error = 'Cette page n\'existe pas';
            if ($brandData) {
                // La marque existe bien (y a pas un petit malin qui a saisi n'importe quoi dans l'url)
                // par contre même si la marque existe, aucun produit n'est associée à celle-ci
                $error = 'Aucun produit pour la marque ' . $brandData->getName();
            }
            $this->show('404', ['error' => $error]);
        }
    }

    public function type($params)
    {
        /**
         * Je peux désormais transmettre à ma vue des paramètres spécifiques
         * à la catégorie saisie en url
         * 
         * Le paramètre $params contient les valeurs dynamiques passées par l'url (récupérées via AltoRouter)
         */

        $type_id = $params['type_id'];
        $typeModel = new Type();
        $typeData = $typeModel->find($type_id);

        $productModel = new Product();
        $typeProducts = $productModel->findProductByType($type_id);

        if ($typeProducts) {
            /**
             * Si des produits existent pour le type (type_id), alors on les affiche
             */
            $dataToDisplay = [
                'typeData' => $typeData,
                'typeProducts' => $typeProducts
            ];
            dump($dataToDisplay);
            $this->show('type', $dataToDisplay);
        } else {
            /**
             * Sinon on affiche un message d'erreur 404
             */
            // $this->show('404');
            $error = 'Cette page n\'existe pas';
            if ($typeData) {
                // Le type existe bien (y a pas un petit malin qui a saisi n'importe quoi dans l'url)
                // par contre même si le type existe, aucun produit n'est associée à celui-ci
                $error = 'Aucun produit pour la marque ' . $typeData->getName();
            }
            $this->show('404', ['error' => $error]);
        }
    }


    public function product($params)
    {
        /**
         * Plus tard ici, grâce à $params['id'], 
         * on pourra récupérer les données de product
         */

        $product_id = $params['product_id'];
        $productModel = new Product();
        $product = $productModel->findWithBrand($product_id);

        $error = 'Cette page n\'existe pas';
        if ($product) {
            // Le produit existe : on affiche le template views/product.tpl.php
            $this->show('product', ['product' => $product]);
        } else {
            // Le produit n'existe pas en Base de données (un petit malin aurait pas mis du crumble dans l'URL ?)
            $error = 'Aucun produit pour l\'identifiant ' . $product_id;
            $this->show('404', ['error' => $error]);
        }
    }

    public function product_list()
    {
        // Va chercher un fichier views/product_list.tpl.php
        $this->show('product_list');
    }
}
