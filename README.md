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

### 2. Install make <a href="https://symfony.com/bundles/SymfonyMakerBundle/current/index.html"><img src="public/img/globe.png" alt="kugel" width="64"></a>
Symfony Maker helps you create empty commands, entity, controllers, form classes, tests and more so you can forget about writing boilerplate code.
```bash
composer req make
```
* lists all commands
```bash
php bin/console list make
```