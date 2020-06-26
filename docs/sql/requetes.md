# Requetes SQL


## Home

### Récupération des 5 catégories pour la page d'accueil
```sql
SELECT name, picture, subtitle
FROM `category`
WHERE  home_order > 0
ORDER BY home_order
LIMIT 5
```

### Récupération des 5 TYPES de produit dans le footer du site
```sql
SELECT *
FROM `type`
WHERE footer_order > 0
ORDER BY footer_order
LIMIT 5
```

### Récupération des 5 MARQUES de produit dans le footer du site
```sql
SELECT *
FROM `brand`
WHERE footer_order >0
ORDER BY footer_order
LIMIT 5
```

## Catégorie

### Tous les produits de la catégorie #1 triés par nom croissant

### Récupération des informations d'une catégorie en fonction de son identifiant (category_id)
```sql
SELECT *
FROM `category`
WHERE category_id = 1
ORDER BY name ASC
```

**Version générique** : 

```sql
SELECT *
FROM `category`
WHERE id=$category_id

```

### Tous les produits de la catégorie #1 triés par prix croissant

```sql
SELECT *
FROM product
WHERE category_id = 1
ORDER BY price ASC
```

## Marque

### Tous les produits de la marque #2 triés par nom croissant

```sql
SELECT *
FROM product
WHERE brand_id = 2
ORDER BY name ASC
```

### Tous les produits de la marque #2 triés par prix croissant

```sql
SELECT *
FROM product
WHERE brand_id = 2
ORDER BY price ASC
```

## Récupération d'un Produit avec des détails sur la marque et la catégorie

Les infos sur le produit #1 + nom de la catégorie + nom de la marque

```sql
SELECT product.*, brand.name AS brand_name, category.name AS category_name
FROM product
LEFT JOIN brand ON brand.id = product.brand_id
LEFT JOIN category ON category.id = product.category_id
WHERE product.id = 1
```


## Autres requetes (diverses)

### Récupération de la liste de tous les Produits (sans trie particulier)
```sql
-- Renvoie la liste de tous les produits
select * from `products`;
```


### Récupération des noms des Marques par ordre croissant/décroissant dans le footer
```sql
-- Récupération les noms des Marques par ordre dans le footer par ordre croissant (ASC par défaut)
select name from `brand` where footer_order ASC;
```

```sql
-- Récupération les noms des Marques par ordre dans le footer par ordre décroissant
select name from `brand` where footer_order DESC;
```

### Récupéreration des produits par marque afin d'accéder intuitivement aux chaussures désirées

```sql
-- Récupération de tous les produits dont la Marque est est Talonette (id=3)
SELECT *
FROM `product`
where brand_id=3

```


```sql
-- Récupération de tous les produits dont la Marque est Talonette (brand_id=3)
-- + le nom de la marque associé : pour ce faire, on utilise une JOINTURE
SELECT product.id, product.name, brand.name as brand_name
FROM `product`
INNER JOIN brand
ON product.brand_id=brand.id
where brand_id=3
```


### Récupération d'informations sur un produit et sa marque
```sql
SELECT `product`.id, `product`.name, `product`.description, `product`.picture,`product`.price, `product`.rate,
`brand`.name as brand_name
FROM `product`
INNER JOIN brand
ON brand.id = product.brand_id
WHERE `product`.id=1
```

### Récupération d'une liste de produits qui appartiennent à une catégorie donnée (category_id) en précisant le nom de la catégorie

```sql
SELECT product.*, category.name
FROM product
INNER JOIN category
ON category.id = product.category_id
WHERE category_id = $category_id
```