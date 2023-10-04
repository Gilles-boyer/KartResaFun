# KartResaFun

KartResaFun est un système de réservation de karting pour le Circuit Felix Guichard. Il permet aux clients de réserver des sessions de karting, de choisir parmi plusieurs formules et de gérer leurs réservations.

## Modèle UML

Voici le modèle UML pour le système :

Copier
Client

Nom
Numéro de téléphone
Email
Formule

Nom
Description
Prix
Réservation

Client (relation avec Client)
Date
Statut (non confirmé, confirmé, arrivé)
RéservationFormule

Réservation (relation avec Réservation)
Formule (relation avec Formule)
Nombre de personnes
Session

RéservationFormule (relation avec RéservationFormule)
Heure de début
Durée
Statut (non commencé, en cours, terminé)
Paiement

Réservation (relation avec Réservation)
Montant
Statut (non payé, payé)

## Description des entités

* **Client** : Contient les informations sur le client.
* **Formule** : Décrit les différentes formules disponibles pour le karting.
* **Réservation** : Contient les informations sur la réservation effectuée par le client.
* **RéservationFormule** : Associe une réservation à une ou plusieurs formules.
* **Session** : Décrit une session de karting associée à une réservation.
* **Paiement** : Contient les informations sur le paiement associé à une réservation.

## Technologies utilisées

* API : Laravel 10
* Client Web : Vuejs 2 avec la librairie CSS vuetify, axios pour les requêtes, vuex pour le store, vue-router.

## Structure du projet

Le projet est structuré en deux sous-dossiers principaux :

* `api` : Contient l’API du projet, construite avec Laravel 10.
* `web` : Contient le client web du projet, construit avec Vue.js.

## Installation

Voici les étapes pour installer et configurer le projet :

1. Clonez le dépôt du projet sur votre machine locale.

```bash
git clone https://github.com/votre-compte/KartResaFun.git
Copier
Accédez au dossier du projet.
cd KartResaFun
Copier
Installez les dépendances pour l’API Laravel.
cd api
composer install
Copier
Copiez le fichier .env.example en .env et configurez les variables d’environnement pour votre base de données et autres services.
cp .env.example .env
Copier
Générez une clé d’application.
php artisan key:generate
Copier
Exécutez les migrations pour créer les tables de la base de données.
php artisan migrate
Copier
Installez les dépendances pour le client Vue.js.
cd ../web
npm install
Copier
Compilez et lancez le client Vue.js.
npm run serve
Copier
Et voilà ! Vous devriez maintenant pouvoir accéder à l’application via votre navigateur web à l’adresse http://localhost:8080.

J'espère que cela vous aidera dans la rédaction de votre README. Si vous avez besoin d'aide supplémentaire, n'hésitez pas à me le faire savoir ! 😊
