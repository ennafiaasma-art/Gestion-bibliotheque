<?php  
class Member{
    private int $member_id;
    public function __construct($member_id){
        $this->member_id=$member_id;
    }
public function getMember_id() : int {
    return $this->member_id;
}



}




?>