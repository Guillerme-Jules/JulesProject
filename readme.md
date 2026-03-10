# Développement par les tests

Les tests permettent de tester des fonctionnalités et les résultats attendus. Ceux-ci sont énoncés souvent sous forme de "règles métier". Les tests permettent de **garantir** ces règles métier.

Le but des tests est théoriquement d'anticiper tous les cas de figure (ou presque).

## tests unitaires

On teste des unités, qui n'a souvent pas de dépendance.

## tests fonctionnels

Aussi appelés tests d'intégration, ils permettent de tester des fonctionnalités qui regroupent plusieurs unités.

## tests e2e

Aussi appelé end to end ou test "de bout en bout", il sert à simuler un comportement utilisateur réel.

# TDD

Test Driven Development : On écrit d'abord les tests, puis ensuite on fait le code.


❓ quel est l'intérêt de faire les tests avant le code ?
- on sait ce qu'on attend et donc on développe autour de ça
- 



# TP

Jeu vidéo de glaces en PHP.
- gestion de stock
- goûts
- type (cornet / pot etc...)
- température

Règles du jeu : 
- les client viennent régulièrement dans le temps
- on doit vendre le plus de glaces possibles
- les clients demandent des goûts et des types (cornet / pot)
- les clients peuvent commander plusieurs glaces
- il faut prévoir du temps pour donner les glaces
- une glace peut se périmer ou fondre

## TP1

Lister moi tous les éléments dont vous allez avoir besoin dans le **code métier** pour la réalisation de ce projet.
- classes
- méthodes
- interfaces
- abstractions
- attributs
- etc...

## TP2

lister les tests & vérifications à faire pour chaque classe pour avoir un code ultra verrouillé !!!

- On commence par la classe "Glace"

-> vous pouvez aussi lister s'il manque des éléments (attributs, méthodes etc...)

## TP3

- implémenter TOUS LES TESTS unitaires pour valider ce qu'on a vu pendant le TP2.
















<!-- Les objectifs de tests -->
- tests intégrité
- tests de non regression

## Mise en place PHP

Le projet contient maintenant une base de travail pour PHP avec :

- `composer.json` pour la gestion des dependances ;
- `phpunit.xml` pour la configuration des tests ;
- `src/` pour le code applicatif ;
- `tests/Unit/` pour les tests unitaires.

## Commandes utiles

Installer les dependances :

```bash
composer install
```

Lancer tous les tests :

```bash
composer test
```

Lancer uniquement les tests unitaires :

```bash
composer test:unit
```

