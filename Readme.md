# TP Formation - Symfony

## 📋 Description

Projet de formation développé dans le cadre de ma formation de Développeur Web à l'AFPA. Cette application web illustre la mise en œuvre d'un CRUD (Create, Read, Update, Delete) pour la gestion de membres, en utilisant le framework Symfony.

## 🛠️ Technologies utilisées

- **Framework** : Symfony 7.x
- **Langage** : PHP 8.x
- **Base de données** : MySQL/MariaDB
- **Conteneurisation** : Docker & Docker Compose
- **Gestionnaire de dépendances** : Composer
- **Tests** : PHPUnit

## 📁 Structure du projet

```
tp_formation/
├── assets/              # Fichiers front-end (CSS, JS)
├── bin/                 # Scripts exécutables (console Symfony)
├── config/              # Configuration de l'application
├── migrations/          # Migrations de base de données
├── public/              # Point d'entrée web (index.php)
├── src/                 # Code source de l'application
├── templates/           # Templates Twig
├── tests/               # Tests unitaires et fonctionnels
├── translations/        # Fichiers de traduction
├── .env                 # Variables d'environnement
├── compose.yaml         # Configuration Docker
└── composer.json        # Dépendances PHP
```

## 🚀 Installation

### Prérequis

- Docker et Docker Compose installés
- Git

### Étapes d'installation

1. **Cloner le dépôt**
```bash
git clone https://github.com/chabriermanu/tp_formation.git
cd tp_formation
```

2. **Configurer les variables d'environnement**
```bash
cp .env .env.local
# Éditer .env.local avec vos paramètres si nécessaire
```

3. **Démarrer les conteneurs Docker**
```bash
docker compose up -d
```

4. **Installer les dépendances**
```bash
docker compose exec php composer install
```

5. **Créer la base de données**
```bash
docker compose exec php bin/console doctrine:database:create
docker compose exec php bin/console doctrine:migrations:migrate
```

6. **Accéder à l'application**

Ouvrez votre navigateur à l'adresse : `http://localhost` (ou le port configuré dans votre `compose.yaml`)

## ✨ Fonctionnalités

- ✅ Création de nouveaux membres
- ✅ Affichage de la liste des membres
- ✅ Modification des informations d'un membre
- ✅ Suppression d'un membre
- ✅ Interface responsive

## 🧪 Tests

Pour exécuter les tests :

```bash
docker compose exec php bin/phpunit
```

## 📝 Commandes utiles

```bash
# Accéder au conteneur PHP
docker compose exec php bash

# Créer une nouvelle entité
docker compose exec php bin/console make:entity

# Créer un nouveau contrôleur
docker compose exec php bin/console make:controller

# Créer une migration
docker compose exec php bin/console make:migration

# Effacer le cache
docker compose exec php bin/console cache:clear
```

## 🔧 Développement

### Ajouter une nouvelle fonctionnalité

1. Créer l'entité avec `make:entity`
2. Générer la migration avec `make:migration`
3. Exécuter la migration avec `doctrine:migrations:migrate`
4. Créer le contrôleur avec `make:controller`
5. Développer les templates Twig correspondants

## 📚 Ressources

- [Documentation Symfony](https://symfony.com/doc/current/index.html)
- [Doctrine ORM](https://www.doctrine-project.org/projects/orm.html)
- [Twig](https://twig.symfony.com/)

## 👨‍💻 Auteur

**Emmanuel Chabrier**
- 🎓 Étudiant en Développement Web - AFPA Saint-Jean-de-Védas
- 💼 [LinkedIn](https://www.linkedin.com/in/emmanuel-chabrier)
- 🐙 [GitHub](https://github.com/chabriermanu)

## 📄 Licence

Ce projet est réalisé dans un cadre pédagogique à l'AFPA.

## 🙏 Remerciements

Projet développé dans le cadre de ma formation de Développeur Web à l'AFPA.

---

*Dernière mise à jour : Décembre 2024*