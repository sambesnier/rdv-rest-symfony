Rendez Vous rest api
========
Server side of an Appointment managing app. This is a secured rest api based on FOSRestBundle and Symfony.
Client side is an Angular 4 app.

## Installation

```
$ git clone https://github.com/sambesnier/rdv-rest-symfony.git
$ cd rdv-rest-symfony/
$ composer install
$ php bin/console doctrine:database:create
$ php bin/console doctrine:schema:update --force
$ php bin/console doctrine:fixtures:load
$ php bin/console server:run
```

## Utilisation

Go on http://localhost:8000

## Version

Symfony 3.3.2

## Auteur

**Samuel Besnier** - [SamBesnier](https://github.com/sambesnier)
 
 ## License
 
This project is under MIT license - see [LICENSE](LICENSE) file for more details

A Symfony project created on July 4, 2017, 6:41 pm.
