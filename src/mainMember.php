<?php
require_once 'src/services/library.php';

try {
    $pdo = new PDO("mysql:host=localhost;dbname=libcore", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Error: ". $e->getMessage());
}

$library = new \LibCore\services\library($pdo);


echo "--- Bienvenue dans l'espace Membre ---\n";
$idMembre = readline("Veuillez entrer votre ID membre : ");

while (true) {
    echo "\nQue souhaitez-vous faire ?\n";
    echo "1. Rechercher un livre (US5)\n";
    echo "2. Emprunter un livre (US6)\n";
    echo "3. Rendre un livre (US7)\n";
    echo "4. Voir mes emprunts (US8)\n";
    echo "5. Quitter\n";
    
    $choix = readline("Votre choix : ");

    switch($choix) {
        case 1:
            $search = readline("Titre ou auteur : ");
            print_r($library->searchBook($search));
            break;
        case 2:
            $isbn = readline("ISBN du livre à emprunter : ");
            if($library->borrowBook($idMembre, $isbn)) echo "Livre emprunté !\n";
            else echo "Indisponible.\n";
            break;
        case 3:
            $isbn = readline("ISBN du livre à rendre : ");
            if($library->returnBook($isbn)) echo "Livre rendu !\n";
            break;
        case 4:
            print_r($library->getMemberLoans($idMembre));
            break;
        case 5:
            exit("Bye bye!\n");
    }
}