# Menu 
is Symfony 5.4. App Project started bei me from https://www.udemy.com/course/symfony-grundkurs/
![](public/img/logo.png)
* composer
* Symfony 5.4. is a LTS version
* PostgreSQL 14 Server / pgAdmin4
* VSCodium or VSCode or NetBeans (to generate getter and setter methods for the entities)

### -1. Entity-Relationship-Diagram - ```ERD```

### 0. Clairvoyance about the Project ```Menu-Mudra```

* Each table has a chip programmed to say "I am table number xxx".
* Each table has a built-in tablet or the customer uses his own smart phone to set the orders.
* Every customer at birth gets bio chips in their fingertips (distal phalanx), fingermiddle (middle phalanx) and fingerroot (proximal phalanx)...
* The thumb chip can communicate with the other four finger chips and use (or start) different services by contact.
* Both hands can also be joined together in different 399 mudras.
* The services can be extended over the whole body points
![Hand surface anatomy](https://cdn.vectorstock.com/i/1000x1000/55/32/hand-surface-anatomy-vector-4125532.webp)


### 1. Project start <a href="https://symfony.com/doc/current/setup.html#creating-symfony-applications"><img src="public/img/globe.png" alt="kugel" width="64"></a>
```bash
mkdir menu
composer create-project symfony/skeleton:"^5.4" menu
cd menu  
```

### 2. Install ```make``` <a href="https://symfony.com/bundles/SymfonyMakerBundle/current/index.html"><img src="public/img/globe.png" alt="kugel" width="64"></a>

Symfony Maker helps you create **empty commands**, **entities**, **controllers**, **form classes**, **tests** and more so you can forget about writing boilerplate code.

```bash
composer req make
```

* lists all commands from make

```bash
php bin/console list make
```

* Check the names of some commands out with the --help option:

```bash
php bin/console make:controller --help
```

* Creating your Own Makers (boilerplate code generators)
Create a class that ```extends AbstractMaker``` in your **src/Maker/** directory

### 3. Install ```twig``` <a href="https://symfony.com/doc/current/reference/twig_reference.html"><img src="public/img/globe.png" alt="kugel" width="64"></a>

Twig is the template engine used in Symfony applications. 

```bash
composer req twig
```


### 4. Install ```doctrine/annotations``` <a href="https://www.doctrine-project.org/projects/annotations.html"><img src="public/img/globe.png" alt="kugel" width="64"></a>
- Doctrine is a collection of projects built for PHP. Each project can be used standalone and installed with Composer.
- Docblock Annotations Parser allows to implement custom annotation functionality for PHP classes and functions.

```bash
composer req doctrine/annotations
```

* Debugging Routes

```bash
php bin/console debug:router
```

### 5. Install ```doctrine``` <a href="https://www.doctrine-project.org/projects/annotations.html"><img src="public/img/globe.png" alt="kugel" width="64"></a>
- Doctrine is a collection of projects built for PHP. Each project can be used standalone and installed with Composer.
- Doctrine ORM (Object Relational Mapper) and Doctriene DBAL (Database Abstraction Layer) are the core projects by https://www.doctrine-project.org/

```bash
composer req doctrine
```
