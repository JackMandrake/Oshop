<?php
namespace oShop\models;

use PDO;
use oShop\utils\Database;

class Category extends CoreModel {
    private $subtitle;
    private $picture;
    private $home_order;


    /**
     * Cette méthode permet de récupérer des données
     * selon le paramètre $id
     *
     * @param int $id
     * @return Category
     */
    public function find($id) {
        // select * from leNomDeLaTable where id=$id;

        // requête pour récupérer UNE marque
        $sql = 'SELECT * FROM `category` where id='.$id;

        /**
         * On récupère une instance unique de la classe
         * Database
         */
        // Database::getPDO() me retourne l'objet PDO représentant la connexion à la BDD
        $pdo = Database::getPDO();

        // Je viens lancer la requete $sql
        $pdoStatement = $pdo->query($sql);

        /**
         * Récupère tous les éléments sous forme de Tableau d'objet
         * de la classe Brand.
         * 
         * fetchObject nous permet de transformer automatiquement
         */
        // return $pdoStatement->fetch(PDO::FETCH_ASSOC);

        /**
         * Je veux récupérer un objet Brand, PDO le fait pour moi => fetchObject (au lieu de fetch)
         * que l'on return
         */
        return $pdoStatement->fetchObject('oShop\models\Category');
    }

    /**
     * Cette méthode permet de récupérer tous les éléments
     * de la table associée au modèle
     *
     * @return Category
     */
    public function findAll() {
        $sql = 'SELECT * FROM `category`';

        /**
         * On récupère une instance unique de la classe
         * Database
         */
        // Database::getPDO() me retourne l'objet PDO représentant la connexion à la BDD
        $pdo = Database::getPDO();

        // j'execute ma requête pour récupérer la marque
        $pdoStatement = $pdo->query($sql);

        /**
         * Récupère tous les éléments sous forme de Tableau d'objet
         * de la classe Brand.
         * 
         * PDO::FETCH_CLASS nous évite de faire un foreach d'un résultat sous
         * forme de tableau associatif. A la place, récupère directement
         * un tableau d'objet de la classe précisé en paramètre
         */
        // $results = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
        // fetchAll avec l'argument FETCH_CLASS renvoie un array qui contient tous mes résultats sous la forme d'objets de la classe spécifiée en 2e argument
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'oShop\models\Category');
    }


    /**
     * Cette méthode permet de récupérer tous les éléments
     * de la table associée au modèle
     *
     * @return 
     */
    public function findAllCategoryForHome() {
        $sql = 'SELECT *
                FROM `category`
                WHERE  home_order > 0
                ORDER BY home_order
                LIMIT 5';
        /**
         * On récupère une instance unique de la classe
         * Database
         */
        // Database::getPDO() me retourne l'objet PDO représentant la connexion à la BDD
        $pdo = Database::getPDO();

        // j'execute ma requête pour récupérer la marque
        $pdoStatement = $pdo->query($sql);

        /**
         * Récupère tous les éléments sous forme de Tableau d'objet
         * de la classe Category.
         * 
         * PDO::FETCH_CLASS nous évite de faire un foreach d'un résultat sous
         * forme de tableau associatif. A la place, récupère directement
         * un tableau d'objet de la classe précisé en paramètre (Category)
         */
        // $results1 = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
        // fetchAll avec l'argument FETCH_CLASS renvoie un array qui contient tous mes résultats sous la forme d'objets de la classe spécifiée en 2e argument
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'oShop\models\Category');
    }

    /**
     * Get the value of subtitle
     */ 
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * Set the value of subtitle
     *
     * @return  self
     */ 
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    /**
     * Get the value of picture
     */ 
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set the value of picture
     *
     * @return  self
     */ 
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get the value of home_order
     */ 
    public function getHomeOrder()
    {
        return $this->home_order;
    }

    /**
     * Set the value of home_order
     *
     * @return  self
     */ 
    public function setHomeOrder($home_order)
    {
        $this->home_order = $home_order;

        return $this;
    }
}