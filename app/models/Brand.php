<?php 
// namespace app\models;
namespace oShop\models;

use PDO;
use oShop\utils\Database;

/**
 * Un modèle est chargé d'aller récupérer des informations
 * dans la base de données. C'est le "M" du modèle MVC
 * 
 * à 1 Table sera associé un Modèle :
 * 
 * Cararactérisques d'un modèle
 * - 1 Table == 1 Modèle (Classe)
 * - Les colonnes de la table sont les propriétés de la classe
 */

class Brand extends CoreModel {
    /**
     * Ces propriétés doivent avoir exactement 
     * le même nom que leur homologue en BDD
     */
    private $footer_order;


    /**
     * Mettre en place les méthodes find et findAll
     * s'appelle Active Record
     */

    /**
     * Cette méthode permet de récupérer des données
     * selon le paramètre $id
     *
     * @param int $id
     * @return Brand
     */
    public function find($id) {
        // select * from leNomDeLaTable where id=$id;

        // requête pour récupérer UNE marque
        $sql = 'SELECT * FROM `brand` where id='.$id;

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
        return $pdoStatement->fetchObject('oShop\models\Brand');
    }

    /**
     * Cette méthode permet de récupérer tous les éléments
     * de la table associée au modèle
     *
     * @return Array Brand
     */
    public function findAll() {
        $sql = 'SELECT * FROM `brand`';

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
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'oShop\models\Brand');
    }

    public function findAllWithLimit($limit = 5) {
        $sql = 'SELECT * FROM `brand`
                WHERE footer_order >0 
                ORDER BY footer_order
                LIMIT '.$limit;

        /**
         * On récupère une instance unique de la classe
         * Database
         */
        // Database::getPDO() me retourne l'objet PDO représentant la connexion à la BDD
        $pdo = Database::getPDO();

        // j'execute ma requête pour récupérer la marque
        $pdoStatement = $pdo->query($sql);

        // return $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'oShop\models\Brand');
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
?>
