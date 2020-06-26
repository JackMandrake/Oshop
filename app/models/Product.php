<?php
namespace oShop\models;
use PDO;
use oShop\utils\Database;

class Product extends CoreModel
{
    private $description;
    private $picture;
    private $price;
    private $rate;
    private $status;
    private $category_name;
    private $type_name;
    private $brand_name;
    private $brand_id;
    private $category_id;
    private $type_id;


    /**
     * Cette méthode permet de récupérer des données d'un produit, ainsi que le nom de sa marque
     * selon le paramètre $id
     *
     * @param int $id
     * @return Product
     */
    public function findWithBrand($id)
    {
        $sql = 'SELECT `product`.*, `brand`.name as brand_name  
                FROM `product`
                INNER JOIN brand
                ON `brand`.id = `product`.brand_id
                where `product`.id=' . $id;

        /**
         * On récupère une instance unique de la classe
         * Database
         */
        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);
        $results = $pdoStatement->fetchObject('oShop\models\Product');

        return $results;
    }


    /**
     * Cette méthode permet de récupérer des données
     * selon le paramètre $id
     *
     * @param int $id
     * @return Product
     */
    public function find($id)
    {
        $sql = 'SELECT * FROM `product` where id=' . $id;

        /**
         * On récupère une instance unique de la classe
         * Database
         */
        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);
        $results = $pdoStatement->fetchObject('oShop\models\Product');

        return $results;
    }

    /**
     * Cette méthode permet de récupérer tous les éléments
     * de la table associée au modèle
     *
     * @return Array Product
     */
    public function findAll()
    {
        $sql = 'SELECT * FROM `product`';

        /**
         * On récupère une instance unique de la classe
         * Database
         */
        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'oShop\models\Product'); //! => objet
        return $results;
    }

    /**
     * Renvoie une liste (Tableau ==> array) de produits pour le type category_id
     *
     * @param [str|int] $category_id
     * @return Array[Category]
     */
    public function findProductByCategory($category_id) {
        $sql = 'SELECT `product`.*, 
                `category`.name as category_name,
                `type`.name as type_name
                FROM `product`
                INNER JOIN category
                ON `category`.id = `product`.category_id
                INNER JOIN type
                ON `type`.id = `product`.type_id
                WHERE `product`.category_id='. $category_id;

        /**
         * On récupère une instance unique de la classe
         * Database
         */
        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'oShop\models\Product'); //! => objet
    }

    /**
     * Renvoie une liste (Tableau ==> array) de produits pour le type type_id
     *
     * @param [str|int] $type_id
     * @return Array[Type]
     */
    public function findProductByType($type_id) {
        $sql = 'SELECT `product`.*, 
                `category`.name as category_name,
                `type`.name as type_name
                FROM `product`
                INNER JOIN category
                ON `category`.id = `product`.category_id
                INNER JOIN type
                ON `type`.id = `product`.type_id
                WHERE `product`.type_id='. $type_id;

        /**
         * On récupère une instance unique de la classe
         * Database
         */
        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'oShop\models\Product'); //! => objet
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;

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
     * Get the value of price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of rate
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set the value of rate
     *
     * @return  self
     */
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of brand_id
     */
    public function getBrandId()
    {
        return $this->brand_id;
    }

    /**
     * Set the value of brand_id
     *
     * @return  self
     */
    public function setBrandId($brand_id)
    {
        $this->brand_id = $brand_id;

        return $this;
    }

    /**
     * Get the value of category_id
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * Set the value of category_id
     *
     * @return  self
     */
    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;

        return $this;
    }

    /**
     * Get the value of type_id
     */
    public function getTypeId()
    {
        return $this->type_id;
    }

    /**
     * Set the value of type_id
     *
     * @return  self
     */
    public function setTypeId($type_id)
    {
        $this->type_id = $type_id;

        return $this;
    }

    /**
     * Get the value of category_name
     */ 
    public function getCategoryName()
    {
        return $this->category_name;
    }

    /**
     * Set the value of category_name
     *
     * @return  self
     */ 
    public function setCategoryName($category_name)
    {
        $this->category_name = $category_name;

        return $this;
    }

    /**
     * Get the value of type_name
     */ 
    public function getTypeName()
    {
        return $this->type_name;
    }

    /**
     * Set the value of type_name
     *
     * @return  self
     */ 
    public function setTypeName($type_name)
    {
        $this->type_name = $type_name;

        return $this;
    }

    /**
     * Get the value of brand_name
     */ 
    public function getBrandName()
    {
        return $this->brand_name;
    }

    /**
     * Set the value of brand_name
     *
     * @return  self
     */ 
    public function setBrandName($brand_name)
    {
        $this->brand_name = $brand_name;

        return $this;
    }
}
