


<?php
class Emprunt{
    private int  $id_emprunt;
    private  int $date_return;
    private int $member_id;
    private int $id_book;


    public function __construct(int $id_emprunt,int $date_return,int $member_id,int $id_book) {
        $this -> id_emprunt=$id_emprunt;
        $this->member_id=$member_id;
        $this->date_return=$date_return;
        $this->id_book=$id_book;
    }

    public function getId_emprunt() : int{
        return $this->id_emprunt;
    }
    public function getDate_emprunt(): int{
    return $this->date_return;
    }
    public function getMember_id():int {
        return $this->member_id;
    }
    public function getId_book(): int {
        return $this->id_book;
    }
}







?>