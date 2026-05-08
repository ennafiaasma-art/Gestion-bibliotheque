# 📚 LibCore - Système de Gestion de Bibliothèque

Application de gestion de bibliothèque développée en PHP (POO), permettant de gérer un catalogue d'ouvrages et les interactions entre les bibliothécaires et les membres.

---

# 👨‍💻 Réalisé par

- **Jihane Jador** : Développement du Dashboard Membre (Logique métier & Interface Console).
- **Asma Ennafia** : Développement du Dashboard Bibliothécaire & Conception de la Base de données.

---

# 🛠️ Technologies utilisées

- **Backend** : PHP 8.x (Programmation Orientée Objet)
- **Database** : MySQL (MariaDB)
- **Outils** : PDO (PHP Data Objects), XAMPP, VS Code.

---

# 🎯 Objectif du Projet

Le projet **LibCore** vise à fournir une solution robuste pour :
- L'administration centralisée du catalogue de livres.
- La gestion dynamique des comptes membres.
- Le suivi en temps réel des transactions (Emprunts et Retours).

---

# 🏗️ Architecture du Projet

```text
LibCore/
├── src/
│   ├── Entities/       # Objets métier (Book, Member, User...)
│   ├── services/       # Logique de gestion (library.php)
├── mainAdmin.php       # Point d'entrée Bibliothécaire
├── mainMember.php      # Point d'entrée Membre (Interface Interactive)
├── docs/               # Modélisation UML & ERD
└── .env                # Configuration de la base de données

