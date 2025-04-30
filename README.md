Ce projet est une API REST développée avec Symfony pour gérer des appels d’offres (needs).  
Les routes sont décrites dans le fichier `needs.openapi.yaml`.

---

## ⚙️ Prérequis

- PHP >= 8.1
- Composer
- Symfony CLI (recommandé)
- MySQL ou MariaDB
- Git

---

## 🚀 Installation

1. **Cloner le projet** :
   ```bash
   git clone git@github.com:ton-pseudo/nom-du-repo.git
   cd nom-du-repo


Installer les dépendances :
composer install
Configurer la base de données :

Copier le fichier .env en .env.local

Créer la base + faire les migrations :

php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate

Generer des datas:
php bin/console doctrine:fixtures:load
Lancer le serveur Symfony :

Les routes sont accessibles à partir de /api/needs

Certaines routes devraient être protégées par un système d’authentification
⚠️ Ce système n’est pas implémenté, car hors périmètre du test

🧪 Endpoints disponibles

Méthode	URL	Description
GET	/api/needs	Liste tous les needs
GET	/api/needs/{id}	Affiche un need
POST	/api/needs	Crée un nouveau need
PATCH	/api/needs/{id}	Met à jour un need existant
