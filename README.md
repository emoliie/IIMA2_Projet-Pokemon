# Pokémon Battle System

Un projet de système de combat Pokémon en PHP, utilisant une architecture orientée objet.

## Fonctionnalités principales

- Gestion des différents types de Pokémon (Feu, Eau, Herbe, etc.).
- Système de combat avec bonus et malus basés sur les types.
- Modèle MVC pour une meilleure organisation du code.
- Intégration d'une base de données pour stocker les Pokémon.

## Prérequis

- **PHP** (>= 7.4)
- **MySQL** (ou toute base de données compatible avec PDO)
- **Composer** (optionnel pour gérer les dépendances)
- Serveur local comme **MAMP**, **WAMP**, ou **XAMPP**.

## Installation

1. Clonez le projet :
   ```bash
   git clone https://github.com/votre-utilisateur/projet-pokemon.git
   cd projet-pokemon
   ```

2. Configurez la base de données :
   - Importez le fichier SQL fourni (`database.sql`) pour créer la table `Pokemon`.
   - Configurez les variables d'environnement dans le fichier `.env` :
     ```env
     db_host=localhost
     db_name=pokemon_db
     db_user=root
     db_pwd=root
     ```

3. Lancez un serveur local PHP dans le répertoire du projet :
   ```bash
   php -S localhost:8000
   ```

4. Accédez à l'application :
   Ouvrez votre navigateur et rendez-vous sur [http://localhost:8000](http://localhost:8000).

## Organisation des fichiers

- `index.php` : Point d'entrée principal de l'application.
- `app/` : Contient les fichiers principaux.
  - `models/` : Modèles pour interagir avec la base de données.
  - `controllers/` : Contrôleurs qui gèrent la logique.
  - `views/` : Vues pour afficher les données.
- `core/Bdd.php` : Classe de gestion de la base de données.
- `core/Router.php` : Classe pour router les URL vers les contrôleurs.

## Exemple d'utilisation

1. Affichez tous les Pokémon :
   Accédez à `/pokemon/findAll` pour voir la liste complète des Pokémon.

2. Lancez un combat :
   Accédez à `/fight/start?id1=1&id2=2` pour démarrer un combat entre deux Pokémon spécifiques.

## Contribuer

1. Forkez le dépôt.
2. Créez une branche pour votre fonctionnalité ou correction : 
   ```bash
   git checkout -b nouvelle-fonctionnalite
   ```
3. Faites vos modifications, puis ouvrez une Pull Request.

## Auteur

Créé par **[Votre Nom]**, dans le cadre d'un projet d'apprentissage PHP et architecture MVC.

## Licence

Ce projet est sous licence MIT. Consultez le fichier `LICENSE` pour plus de détails.
