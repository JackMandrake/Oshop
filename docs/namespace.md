# Namespace

Un namespace est un "dossier virtuel" dans lequel est rangé une classe

- permet d'avoir plusieurs classes du même nom
- doit être déclaré au début du fichier
- n'est valable que pour le fichier
- le séparateur de "dossiers" est le `\`

## Placer une classe dans un _Namespace_

La classe `Avengers` est "rangée" dans le "dossier virtuel" `Cinema\ScienceFiction\MarvelFilms`

```php
<?php

namespace Cinema\ScienceFiction\MarvelFilms;

class Avengers {
    // [...]

    public function play() {
        // [...]
    }
}
```

:warning: Toute classe "utilisée" dans ce code :arrow_up: sera considérée comme faisant partie du _Namespace_ de la classe (chemin relatif).

```php
<?php

namespace Cinema\ScienceFiction\MarvelFilms;

class Avengers {
    // [...]

    public function play() {
        // [...]
        $aquaman = new Aquaman(); // => \Cinema\ScienceFiction\MarvelFilms\Aquaman
    }
}
```

Pour éviter cela, il faudra spécifier le FQCN de la classe (chemin absolu, voir plus bas).

## Utiliser une classe d'un _Namespace_

### Fully Qualified Class Name

C'est le "chemin absolu" de la classe => le _Namespace_ + le nom de la classe

```php
<?php

$avenger = new \Cinema\ScienceFiction\MarvelFilms\Avengers();
$avenger->play();
```

### Mot-clé `use`

Dès qu'on "utilise" au moins deux fois la classe dans un fichier PHP, il est intéressant de ne pas avoir à stipuler le FQCN

- comme le mot-clé `namespace`, `use` n'est valable que pour le fichier courant
- le premier `\` est optionnel car il est implicite
- il doit être placé en haut du fichier, après le mot-clé `namespace` s'il y en a un

```php
<?php

use Cinema\ScienceFiction\MarvelFilms\Avengers;

$avenger1 = new Avengers();
$avenger1->play();

$avenger2 = new Avengers();
```

## Classes natives PHP & Classes d'autres _Namespaces_

Toutes les classes natives de PHP ne sont dans aucun _Namespace_.  
Ainsi, elles se trouvent à la racine des _Namespace_.

```php
<?php

namespace Cinema\ScienceFiction\MarvelFilms;

use Cinema\ScienceFiction\DCComics;

class Avengers {
    // [...]

    public function play() {
        // [...]
        $aquaman = new Aquaman(); // => \Cinema\ScienceFiction\DCComics\Aquaman

        // Utilisation de la classe PDO, native à PHP (donc hors namespace)
        $pdo = new \PDO();
    }
}
```
