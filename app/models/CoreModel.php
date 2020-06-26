<?php

namespace oShop\models;

/**
 * Problématique : beaucoup de code se répète dans nos modèles (Brand, Category, Product, Type)
 * 
 * Solution : On va mettre en place un mécanisme d'héritage pour rassembler
 * toutes les méthodes ou propriétés communes à tous les modèles dans une
 * classe mère appellée CoreModel
 */

/*
    Quand je crée une méthode dans un Modèle (Brand, Type, Category, Product)
    Je suis les étapes suivantes :

    1 - déclarer la méthode
    2 - écrire la requête SQL dans une variable de type String
    3 - sur le connecteur (objet PDO) exécuter la méthode query avec la requête en paramètre
    4 - Deux cas de figure :
        4-a) 1 seul résultat => $pdoStatement->fetch ou $pdoStatement->fetchObject
        4-b) plusieurs résultats => $pdoStatement->fetchAll
    5 - Retour en Objet ou Tableau :
        5-a) requête sur 1 seule table :
            5-a-i) 1 seul résultat => fetchObject(le Model correspondant)
            5-a-ii) plusieurs résultats => fetchAll(PDO::FETCH_CLASS, le Model correspondant)
        5-b) requête sur plusieurs tables => PDO::FETCH_ASSOC
    6 - retourner le tableau

*/

class CoreModel
{
    protected $id;
    protected $name;
    protected $created_at;
    protected $updated_at;


    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }


    /**
     * Get the value of created_at
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Get the value of updated_at
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}
