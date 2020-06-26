# Démarrage de notre projet oShop

## Composer
Gestionnaire de dépendances qui permet d'installer des librairies PHP. 

Une librairie étant un bout de code créé par des développeurs , pour les développeurs,  afin de se simplifier la vie.

### Installation d'une librairie (ou dépendance) en ligne de commande
```bash
composer require leNom/deLaLibrairie # Voir la commande sur packagist.org
```

Pour [var-dumper](https://packagist.org/packages/symfony/var-dumper), par exemple : 

```bash
composer require symfony/var-dumper
```

### Installation des dépendances à partir du fichier composer.json
```bash
composer update
```

### Listing de toutes les dépendances disponibles

Voir le site https://packagist.org/


### Dossier vendor
Lors de l'installation de librairie avec composer, un dossier vendor était généré automatiquement.

Le code source des librairies/dépendances ne doit jamais être modifié.
Ainsi, pourquoi les versionner ? (ajouter dans Git)
=> on va dire à Git d'ignorer le dossier vendor

Il faut Ajouter ce qui suit dans le fichier **.gitignore** :
```
# ignorer les fichiers & dossiers liés à Composer
# sauf composer.json bien sûr
vendor/
```