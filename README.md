Ce projet est une API REST développée avec Symfony pour gérer des appels d’offres (needs).  
Les routes sont décrites dans le fichier `needs.openapi.yaml`.

---
Installation

1. Cloner le projet:
   git clone git@github.com:syvart17/human.git

Installer les dépendances :
composer install

Configurer la base de données :
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
