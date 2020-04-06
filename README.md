# Behat start

Bienvenue dans ce projet support de la formation "Introduction à Behat".

L'objectif est de se familiariser par l'exemple avec ce framework de test fonctionnel.

## Contexte

Nous allons avoir une application en mode "ligne de commande" très simple qui réalise des opérations mathématiques courantes.

```bash
php bin/console app:operations:add <nombre1> <nombre2> -eprod
php bin/console app:operations:multiply <nombre1> <nombre2> -eprod
```

Le framework de test est initialisé avec un test sur la commande réalisant des additions.

## Pré-requis

Avoir PHP 7.2 installé en local sur votre machine.

## Installation

```bash
make start
```

## Execution des test

### Tests simples

```bash
make behat-simple-way
```

### Test améliorés

```bash
make behat-extended-way
```

## Atelier

Nous travaillerons ensuite sur la version "extended way" des tests.

Vous tirerez une branche "nom_prenom" sur laquelle vous ajouterez vos commits et qui serviront de base à la revue de code.

### Additionnal testing

Rajouter un test pour vérifier qu'il n'est pas possible d'additionner 3 chiffres.

### Unexpected refactoring - Step 1

A la démonstration du la fonction "app:operations:add", votre product owner (PO) vous demande d'accepter plus de 2 opérandes.

De plus, il souhaite que ce ne soit pas une exception qui soit levée, mais un message d'erreur et un code de retour de la commande à 1.

### New feature

Vous devez réaliser la commande "app:operations:multiply". Vous ferez un brutal copier-coller de la classe utilisée pour 
la commande d'addition.

Ensuite vous effectuerez le refactoring au fur et mesure en exécutant pas à pas la suite de tests behat.

### New feature - New context

Votre PO vous demande d'ajouter un log de type WARNING à chaque fois qu'on appelle la commande avec 0 ou un seul opérande.

Vous créerez une nouvelle classe de contexte (LogContext) dans laquelle vous placerez les mots-clés afférents aux logs.

Effacer les logs entièrement se fera avec un simple `shell_exec('rm -rf var/logs/*')`.

Vous pourrez utiliser : 
* Les (scenarios hooks)[http://behat.org/en/latest/user_guide/context/hooks.html#scenario-hooks]
* Le service `monolog.logger` de Symfony

Ne pas oublier les principes K.I.S.S.
