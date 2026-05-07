<?php

require_once "services/Library.php";
require_once "./Entities/Book.php";
require_once "./Entities/Member.php";

$library = new Library();

$choice = readline("
===== MENU =====
1. Ajouter livre
2. Afficher livres
3. Supprimer livre
4. Créer un compte membre

Choix : ");

switch ($choice) {

    case 1:

        $title = readline("Titre : ");
        $author = readline("Auteur : ");
        $isbn = readline("ISBN : ");

        $book = new Book(
            $title,
            $author,
            $isbn,
            1,
            true
        );

        echo "Livre ajouté avec succès\n";

        break;

    case 2:

        echo "Afficher les livres...\n";

        break;

    case 3:

        $id = readline("ID du livre : ");

        echo "Livre supprimé\n";

        break;

    case 4:

        $name = readline("Nom : ");
        $email = readline("Email : ");
        $type = readline("Type (student/professor) : ");

        $member = new Member(
            $name,
            $email,
            $type
        );

        echo $library->addMember($member);

        break;

    default:

        echo "Choix invalide\n";
}
?>