<?php

class SnippetController {
    private PDO $dbh;
 
        public function __construct(PDO $dbh) {
        $this->dbh = $dbh;
    }
 
    // CRUD: Create - Read - Update - Delete
    public function insert($snippet) {
        // 1. SQL definieren
        $sql = "INSERT INTO snippets (title, description, code, language, tags, uid) VALUES (?,?,?,?,?,?)";
        // 2. SQL vorbereiten
        $stmt = $this->dbh->prepare($sql);
        // 3. SQL an die Datenbank schicken
        $stmt->execute([
            $snippet->getTitle(),
            $snippet->getDescription(),
            $snippet->getCode(),
            $snippet->getLanguage(),
            $snippet->getTags(),
            $_SESSION['user']->getId()
        ]);
    }
    public function findAll() {
        // $sql = "SELECT s.*, u.username, u.email FROM snippets s JOIN users u ON u.id = s.uid";
        $sql = 'SELECT * from snippets';
        $stmt = $this->dbh->query($sql);
        $results = $stmt->fetchAll();
        $uc = new UserController($this->dbh);
 
        $snippets = [];
        foreach($results as $result) {
            $snippet = new Snippet();
            $snippet->arrayToObject($result);
            $snippets[] = $snippet; // fügt das Snippet zum Array hinzu
            $user = $uc->findById($result['uid']);
            $snippet->setUser($user);
        }
        return $snippets;
    }

    public function findSnippetById($id) {
        $sql = 'SELECT * from snippets WHERE id = ? AND uid = ? LIMIT 1';
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute([$id, $_SESSION['user']->getId()]);
        $snippet = $stmt->fetchAll();
        $uc = new UserController($this->dbh);

        $snippets = [];
        foreach($snippet as $result) {
            $snippet = new Snippet();
            $snippet->arrayToObject($result);
            $snippets[] = $snippet; // fügt das Snippet zum Array hinzu
            $user = $uc->findById($result['uid']);
            $snippet->setUser($user);
        }
        return $snippets[0];
    }
 
    /**
     * Holt alle Snippets von einem user aus der Datenbank
     * und zwar vom gerade eingeloggten Benutzer.. wenn wir nur die ID kennen würden
     * und die Daten evtl. nett in der home.tpl.php anzeigen.
     */
    public function findByUser(int $id){
        //$sql = "SELECT s.*, u.username, u.email FROM snippets s JOIN users u ON u.id = s.uid";
        $sql = 'SELECT * from snippets WHERE uid = ? AND uid = ?';
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute([$id, $_SESSION['user']->getId()]);
        $results = $stmt->fetchAll();
        $uc = new UserController($this->dbh);
 
        $snippets = [];
        foreach($results as $result) {
            $snippet = new Snippet();
            $snippet->arrayToObject($result);
            $snippets[] = $snippet; // fügt das Snippet zum Array hinzu
            $user = $uc->findById($result['uid']);
            $snippet->setUser($user);
        }
        return $snippets;
 
    }
    public function update() {

    }

    public function delete(int $id) {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if($id !== false && $id !==  null) {
            $sql = 'DELETE FROM snippets WHERE id = ? AND uid = ? LIMIT 1';
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute(
                [$id]
            );
        }
    }

}