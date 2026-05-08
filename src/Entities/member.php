<?php

require_once "User.php";

class Member extends User {

    private int $memberId;
    private string $type;

    public function __construct(
        string $name,
        string $email,
        string $type,
        int $memberId = 0
    ) {

        parent::__construct($name, $email);

        $this->memberId = $memberId;
        $this->type = $type;
    }

    public function getMemberId(): int {
        return $this->memberId;
    }

    public function getType(): string {
        return $this->type;
    }
}
?>