# Plateforme de Vidéos en Ligne
Ce projet est une plateforme de vidéos en ligne qui permet aux utilisateurs de s'abonner à différents plans d'abonnement pour accéder à des vidéos exclusives. Les utilisateurs peuvent rechercher des vidéos, voir les détails de chaque vidéo, et leur nombre de vues augmente chaque fois qu'une vidéo est visionnée. La plateforme inclut un système de gestion des abonnements, ce qui signifie que les utilisateurs doivent avoir un abonnement actif pour accéder à certaines vidéos.

## Fonctionnalités
### Gestion des Abonnements
- Inscription aux abonnements : Les utilisateurs peuvent choisir un plan d'abonnement et s'inscrire pour accéder à des vidéos exclusives.
- Validation du paiement : Intégration avec un service de paiement (comme Wave) pour gérer les paiements des abonnements.
- Activation et expiration des abonnements : Les abonnements sont activés après un paiement réussi et expirent automatiquement après la période de validité.
- Mise à jour automatique des statuts d'abonnement : Un système de planification de tâches vérifie régulièrement les abonnements expirés et met à jour leur statut.
### **Gestion des Vidéos**

- Recherche de vidéos : Les utilisateurs peuvent rechercher des vidéos par titre.
- Affichage des vidéos populaires : Les vidéos sont affichées avec un compteur de likes et sont triées par popularité.
- Détails de la vidéo : Chaque vidéo a une page de détails où les utilisateurs peuvent voir plus d'informations et visionner la vidéo.
- Compteur de vues : Chaque visionnage d'une vidéo est comptabilisé, et le nombre de vues est affiché.
### Contrôle d'Accès

- Accès restreint aux vidéos : Les utilisateurs doivent avoir un abonnement actif pour accéder à certaines vidéos.
- Message d'abonnement requis : Si un utilisateur essaie de visionner une vidéo sans abonnement actif, il est redirigé vers une page lui demandant de s'abonner.
## **Technologies Utilisées**

- Backend : Laravel
- Base de données : MySQL
- Frontend : Blade templates, Tailwind CSS pour le style
- Gestion des abonnements : Modèle Subscription, intégration avec une API de paiement Paytech
- Planification de tâches : Laravel Scheduler

