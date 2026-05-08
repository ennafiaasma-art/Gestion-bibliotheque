<?php
require_once 'src/services/library.php';

try{
    $pdo = new PDO("mysql:host=localhost;dbname=libcore","root","");

}catch(PDOException $e){
    die("Error: ". $e->getMessage());
}
$library = new \LibCore\services\library($pdo);

echo"---Recherche de 'Petit'---\n";
print_r($library->searchBook("Petit"));

if($library->borrowBook(2,'978-0123')){
    echo "Livre emprunte avec succes!\n";

}
echo "---Mes Livres Empruntes---\n";
print_r($library->getMemberLoans(2));