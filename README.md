# Menu 
is Symfony 5.4. App Project from https://www.udemy.com/course/symfony-grundkurs/
![](public/img/logo.png)
* composer
* Symfony 5.4. is a LTS version
* PostgreSQL 14 Server / pgAdmin4
* VSCodium or VSCode or NetBeans (to generate getter and setter methods)

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