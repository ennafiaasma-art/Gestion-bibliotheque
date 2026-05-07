<?php

class Book {

    private string $title;
    private string $author;
    private string $isbn;
    private string $isAvailable;

    public function __construct(
        string $title,
        string $author,
        string $isbn,
        string $isAvailable = "Yes"
    ) {

        $this->title = $title;
        $this->author = $author;
        $this->isbn = $isbn;
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

    public function getIsAvailable(): string {
        return $this->isAvailable;
    }
}
?>