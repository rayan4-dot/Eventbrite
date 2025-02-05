# Eventbrite Clone - Gestion d'événements en PHP MVC & PostgreSQL

## Description
Ce projet est un clone avancé d'Eventbrite, permettant aux organisateurs de créer, gérer et promouvoir des événements, ainsi qu'aux participants de réserver des billets en ligne. Un back-office est intégré pour la gestion des utilisateurs et événements, avec des statistiques avancées.

## Fonctionnalités principales

### Gestion des utilisateurs
- Inscription et connexion sécurisée (email, mot de passe hashé avec bcrypt)
- Gestion des rôles : Organisateur, Participant, Administrateur
- Profil utilisateur (avatar, historique des événements créés/participés)
- Système de notifications (email, alertes sur le site)

### Gestion des événements
- Création et modification d'un événement (titre, description, date, lieu, prix, capacité)
- Gestion des catégories et tags (Conférence, Concert, Sport, etc.)
- Ajout d'images et de vidéos promotionnelles
- Validation des événements par un administrateur
- Système de mise en avant (sponsorisés)

### Réservation et paiement
- Achat de billets (gratuit, payant, VIP, early bird)
- Paiement sécurisé via Stripe ou PayPal (sandbox mode)
- Génération de QR Code pour validation des billets
- Système de remboursement et annulation
- Téléchargement de billets en PDF

### Tableau de bord organisateur
- Liste des événements créés avec état (actif, en attente, terminé)
- Statistiques des ventes et réservations en temps réel
- Export des participants en CSV/PDF
- Gestion des promotions et réductions

### Back-office Admin
- Gestion des utilisateurs (bannissement, modification, suppression)
- Gestion des événements (validation, suppression, modification)
- Statistiques globales (événements, billets vendus, revenus)
- Modération des commentaires et signalements

### Interactions dynamiques avec AJAX
- Chargement dynamique des événements (pagination sans rechargement)
- Recherche et filtres avancés (catégorie, prix, date, lieu)
- Autocomplétion des recherches avec suggestions
- Validation de formulaire en temps réel

## Technologies utilisées

### Backend
- **PHP 8.x** - Gestion du backend
- **PostgreSQL** - Base de données relationnelle optimisée
- **PDO** - Requêtes SQL sécurisées (requêtes préparées)
- **Twig** - Moteur de templates pour structurer les vues
- **Composer** - Gestionnaire de dépendances PHP

### Frontend
- **HTML5, CSS3, JavaScript (ES6)** - Interface utilisateur
- **Bootstrap 5** ou **TailwindCSS** - Design responsive
- **AJAX (Fetch API & jQuery)** - Chargement dynamique

### Sécurité et Outils
- **.htaccess** - Sécurisation et réécriture d'URL
- **Authentification sécurisée** (Session Based Authentication)
- **Protection XSS, CSRF, SQL Injection** (Classes Validator & Security)
- **Gestion des sessions sécurisées** (Class Session)

## Installation et configuration
1. Cloner le projet :
   ```sh
   git clone https://github.com/rayan4-dot/Eventbrite
   ```
2. Installer les dépendances via Composer :
   ```sh
   composer install
   ```
3. Configurer la base de données PostgreSQL dans `.env` :
   ```env
   DB_HOST=localhost
   DB_NAME=eventbrite_clone
   DB_USER=your_user
   DB_PASSWORD=your_password
   ```
4. Importer la base de données :
   ```sh
   psql -U your_user -d eventbrite_clone -f database/schema.sql
   ```
5. Lancer le serveur local :
   ```sh
   php -S localhost:8000 -t public/
   ```

## User Stories
### En tant que **Participant**, je veux :
- Créer un compte et me connecter avec mon email ou Google/Facebook.
- Parcourir la liste des événements et les filtrer par catégorie.
- Réserver un billet et recevoir un QR Code.
- Annuler ma réservation et demander un remboursement.
- Recevoir des notifications pour mes événements à venir.

### En tant que **Organisateur**, je veux :
- Publier un événement et définir un prix pour les billets.
- Gérer mes ventes et voir les statistiques.
- Offrir des codes promo et gérer les remises.
- Exporter la liste des participants en CSV ou PDF.

### En tant que **Administrateur**, je veux :
- Gérer les utilisateurs (bannissement, modification des rôles).
- Valider ou refuser les événements soumis.
- Suivre les statistiques globales et modérer les contenus.

## Logique métier (Business Logic)
### Gestion des rôles et permissions
- Un **Participant** ne peut réserver que des événements publics.
- Un **Organisateur** ne peut voir que ses propres événements.
- Un **Admin** a tous les droits (validation, modération).

### Système de réservation
- Vérification des places disponibles avant validation.
- Envoi d'un email avec le billet en pièce jointe.
- Option d'annulation sous conditions (remboursement partiel ou total).

### Sécurité avancée
- Protection contre CSRF et injections SQL.
- Hashage des mots de passe avec bcrypt.
- Gestion sécurisée des sessions.

### Optimisation des performances
- Optimisation des requêtes PostgreSQL (indexes, partitions).
- Chargement des événements par lazy loading avec AJAX.

## Licence
Ce projet est sous licence MIT.

