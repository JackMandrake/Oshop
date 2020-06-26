<?php
// namespace app\models;
namespace oShop\models;

/**
 * Toutes les classes natives en PHP seront généralement
 * présent à la racine.
 * 
 */
use PDO;
use oShop\utils\Database;

class Type extends CoreModel
{
    private $footer_order;

    /**
     * Cette méthode permet de récupérer des données
     * selon le paramètre $id
     *
     * @param [string|int] $id
     * @return Type
     */
    public function find($id)
    {
        // $sql = "SELECT * FROM `type` where id={$id}";
        $sql = 'SELECT * FROM `type` where id=' . $id;

        /**
         * On récupère une instance unique de la classe
         * Database
         */
        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);
        $results = $pdoStatement->fetchObject('oShop\models\Type');

        return $results;
    }

    /**
     * Cette méthode permet de récupérer tous les éléments
     * de la table associée au modèle
     *
     * @return void
     */
    public function findAll()
    {
        $sql = 'SELECT * FROM `type`';

        /**
         * On récupère une instance unique de la classe
         * Database
         */
        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'oShop\models\Type'); //! => objet
        return $results;
    }

    /**
     * Récupération de cinq types de produit dans le footer du site
     *
     * @return void
     */
    public function findAllForFooter() {
        
        $sql = 'SELECT *
                FROM `type`
                WHERE footer_order > 0
                ORDER BY footer_order
                LIMIT 5';

        /**
         * On récupère une instance unique de la classe
         * Database
         */
        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'oShop\models\Type'); //! => objet
        return $results;

    }

    /**
     * Get the value of footer_order
     */
    public function getFooterOrder()
    {
        return $this->footer_order;
    }

    /**
     * Set the value of footer_order
     *
     * @return  self
     */
    public function setFooterOrder($footer_order)
    {
        $this->footer_order = $footer_order;

        return $this;
    }

}
