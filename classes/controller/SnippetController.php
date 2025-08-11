<?php

use Dom\Entity;

class SnippetController {
    private PDO $dbh;
    public function __construct(PDO $dbh) {
        $this->dbh = $dbh;
    }
    public function insert($snippet) {
        $sql = "INSERT INTO snippets (title, description, language, code, tags, uId) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute(
            [
                $snippet->getTitle(),
                $snippet->getDescription(),
                $snippet->getLanguage(),
                $snippet->getCode(),
                $snippet->getTags(),
                $_SESSION['user']->getId()
            ]
        );
    }
    public function update() {

    
    }

    public function delete() {

    }

    public function findAll() {
        $sql = "SELECT s.*, u.username, u.email FROM snippets s LEFT JOIN users u ON s.uId = u.id";
        $stmt = $this->dbh->query($sql);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
    public function findByUser($id) {
        $sql = "SELECT s.*, u.username FROM snippets s LEFT JOIN users u ON s.uId = u.id WHERE s.uId = $id";
        $stmt = $this->dbh->query($sql);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public function getCode() {
        $sql = "SELECT * FROM snippets WHERE id = ?";
        $stmt = $this->dbh->query($sql);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
}