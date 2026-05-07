<?php

include "/src/Db.php";

class Book {

    private string $title;
    private string $author;
    private string $isbn;
    private bool $isAvailable;
    private int $id_library;

    public function __construct(
        string $title,
        string $author,
        string $isbn,
        int $id_library,
        bool $isAvailable
    ) {
        $this->title = $title;
        $this->author = $author;
        $this->isbn = $isbn;
        $this->id_library = $id_library;
        $this->isAvailable = $isAvailable;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getAuthor(): string {
        return $this->author;
    }

    public function getIsbn(): string {
        return $this->isbn;
    }

    public function getIdLibrary(): int {
        return $this->id_library;
    }

    public function getIsAvailable(): bool {
        return $this->isAvailable;
    }
}

?>