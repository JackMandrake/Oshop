# Routes

## AltoRouter
Grâce à AltoRouter, on peut désormais créer des routes dynamiques de cette forme `/category/2`, avec `2` qui représente l'identifiant de la catégory

## Routes crées

| URL | HTTP Method | Controller | Method | Title | Content | Comment |
|--|--|--|--|--|--|--|
|`/`|`GET`|`MainController`|`home`|`Page d'accueil`|`Une liste de 5 catégories`|`Une page à achever`|
|`/legal-mentions/`|`GET`|`MainController`|`legal`|`Legal mentions`|`Legal mentions`|`User can see the legal mentions of our website`|
|`/blog`|`GET`|`MainController`|`blog`|`Page de blog`|`Blog dans les Shoes`|`Un blog qui vaut le détour`|
|`/catalog/category/[id]`|`GET`|`CatalogController`|`category`|`Name of the category`|`Products attached to the category`|`[id] represents the id of the category`|
|`/catalog/type/[id]`|`GET`|`CatalogController`|`type`|`Name of the type`|`Products attached to the type`|`[id] represents the id of the type`|
|`/catalog/brand/[id]`|`GET`|`CatalogController`|`brand`|`Name of the brand`|`Products attached to the brand`|`[id] represents the id of the brand`|
|`/catalog/product/[id]`|`GET`|`CatalogController`|`product`|`Name of the product`|`Products attached to the id`|`[id] represents the id of the product`|
