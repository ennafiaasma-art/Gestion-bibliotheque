<?php
require_once 'src/services/library.php';

try{
    $pdo = new PDO("mysql:host=loclhost;dbname=libcore","root","");

}catch(PDOException $e){
    die("Error: ". $e->getMessage());
}
$library = new \LibCore\services\librsry($pdo);

echo"---Recherche de 'Petit'---\n";
print_r($library->searchBook("Petit"));

