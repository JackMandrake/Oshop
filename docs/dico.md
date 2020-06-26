# Dictionnaire de données

## Produits (`Product`)
|Champ|Type|Spécificité|Description|
|-|-|-|-|
|`id`|`INT`|`PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT`|`Product ID`|
|`name`|`VARCHAR(70)`|`NOT NULL`|`Product name`|
|`description`|`TEXT`|`NULL`|`Product description`|
|`status`|`TINYINT(1)`|`NULL`|`Product status`|
|`price`|`DECIMAL(10,2)`|`NOT NULL`|`Product price`|
|`picture`|`VARCHAR(128)`|`NULL`|`Product picture`|
|`rating`|`TINYINT(1)`|`NOT NULL`|`Product rating`|
|`category`|`entity`|`NOT NULL`|`Product category`|
|`brand`|`entity`|`NOT NULL`|`Product brand`|
|`type`|`entity`|`NOT NULL`|`Product type`|


## Categories (`Category`)
|Champ|Type|Spécificité|Description|
|-|-|-|-|
|id|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|L'identifiant de la catégorie|
|name|VARCHAR(64)|NOT NULL|Le nom de la catégorie|
|subtitle|VARCHAR(64)|NULL|Le sous-titre/slogan de la catégorie|
|picture|VARCHAR(128)|NULL|L'URL de l'image de la catégorie (utilisée en home, par exemple)|
|home_order|TINYINT(1)|NOT NULL, DEFAULT 0|L'ordre d'affichage de la catégorie sur la home (0=pas affichée en home)|
|created_at|TIMESTAMP|DEFAULT CURRENT_TIMESTAMP|La date de création de la catégorie|
|updated_at|TIMESTAMP|NULL|La date de la dernière mise à jour de la catégorie|


## Type (`Type`)
|Champ|Type|Spécificités|Description|
|-|-|-|-|
|id|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|L'identifiant du type|
|name|VARCHAR(64)|NOT NULL|Le nom du type|
|footer_order|TINYINT(1)|NOT NULL, DEFAULT 0|L'ordre d'affichage du type dans le footer (0=pas affichée dans le footer)|
|created_at|TIMESTAMP|DEFAULT CURRENT_TIMESTAMP|La date de création du type|
|updated_at|TIMESTAMP|NULL|La date de la dernière mise à jour du type|

## Marque (`Brand`)

|Champ|Type|Spécificités|Description|
|-|-|-|-|
|id|INT|PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT|L'identifiant de la marque|
|name|VARCHAR(64)|NOT NULL|Le nom de la marque|
|footer_order|TINYINT(1)|NOT NULL, DEFAULT 0|L'ordre d'affichage de la marque dans le footer (0=pas affichée dans le footer)|
|created_at|TIMESTAMP|DEFAULT CURRENT_TIMESTAMP|La date de création de la marque|
|updated_at|TIMESTAMP|NULL|La date de la dernière mise à jour de la marque|
