<?php  
class Librarian{
private int $id_librarian ;
private int $id_user ;

public function __construct(int $id_librarian,int $id_user){

$this->id_librarian=$id_librarian;
$this->id_user=$id_user;


}
public function getId_librarian(): int {
    return $this->id_librarian;
}
public function getId_user(): int {
    return $this->id_user;
}

}



?>