# L'autoloading

Imaginons cette arborescence:
```
projet
    |
    classes
    |    |
    |    Calcul.php
    |
    index.php
```
Dans `Calcul.php` :
```php
<?php
namespace App;

class Calcul
{
    public function additionner(int $a, int $b):int
    {
        return $a + $b;
    }
}
```
Et dans `index.php` :
```php
<?php
/**
 * modifier ce qu'attend $className pour remonter dans le dossier des classes
 * et atteindre la classe dans le namespace
 * @param str
 */
spl_autoload_register(function($className){

    //!\tips: var_dump($className) dans la fonction vide pour se rendre compte de ce qui est attendu par spl_autoload /!\

    //on modifie App par le nom de dossier classes
    $className = str_replace("App", "classes", $className);
    //on remplace \ par /
    $className = str_replace("\\", "/", $className);
    //on concatene avec .php
    $classNBame .= '.php';
    //comme className est généralisé on en a besoin qu'une fois
    require_once $classname;
});

//pour un visu du test on instancie calcul
$instance = new App\calcul();
//on joue la methode de la classe $instance et on la stock dans resultat
$resultat = $instance->additionner(10, 3);
//on la var_dump pour afficher
var_dump($resultat);
```
simplifier avec
```bash
composer init -n
```
Ajouter la clé autoload avec la politique `psr-4`
```json
{
    "require": {},
    "autoload": {
        "psr-4":{
            "App\\": "classes/"
        }
    }
}
```
Cela nous permet de supprimmer notre `spl_autoload_register` dans `index.php` et de faire un :
```bash
composer dump-autoload
```
et de supprimer `spl_autoload_register`.
Il faudra dans le `index.php` faire le :
```php
require "vendor/autoload.php";
```

