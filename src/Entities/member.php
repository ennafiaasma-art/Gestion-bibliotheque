<?php

class Member {

    private int $memberId;
    private string $name;
    private string $email;
    private string $type;

    public function __construct(
        int $memberId,
        string $name,
        string $email,
        string $type
    ) {

        $this->memberId = $memberId;
        $this->name = $name;
        $this->email = $email;
        $this->type = $type;
    }

    public function getMemberId(): int {
        return $this->memberId;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getType(): string {
        return $this->type;
    }
}

?>