<?php 
class User{
    private string $name;
    private  string $email;
    private int $id_user;
    private int $member_id ;
public function __construct($name,$email,$id_user,$member_id){
$this->name=$name;
$this->email=$email;
$this->id_user=$id_user;
$this->member_id=$member_id;

}
public function getname() :string  {
     return $this->name ;
}
public function getemail() : string{
    return $this->email ;
}
public function getIduser() : int {
    return $this->id_user;

}
public function getId_member() : int {
   return $this->member_id;
}
}

?>