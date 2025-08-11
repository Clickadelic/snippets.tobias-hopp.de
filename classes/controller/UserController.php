<?php

class UserController {

    private PDO $dbh;

    public function __construct(PDO $dbh) {
        $this->dbh = $dbh;
    }

    /**
     * 
     * Kontrolliert anhand der ID von User, ob es ein Update geben soll
     */
    public function save(User $user) {
        if($user->getId() > 0) {
            $this->update($user);
        } else {
            $this->insert($user);
        }
    }

    public function insert(User $user) {
        $sql = "INSERT INTO users (username, email, password, agbOk) VALUES (?, ?, ?, ?)";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute([
            $user->getUsername(),
            $user->getEmail(),
            $user->getPassword(),
            $user->isAgbok()
        ]);

        $stmt = null;
    }

    public function findAll() {
        // 
    }

    public function findByUsername(string $username) {
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute([$username]);
        $result = $stmt->fetch();
        // echo '<pre>';
        //     var_dump($result);
        // echo '</pre>';
        $user = null;
        if($result) {
            $user = new User();
            $user->arrayToObject($result);
        }
        // echo '<pre>';
        //     var_dump($user);
        // echo '</pre>';
        return $user;
    }

    public function findById(int $id) {
        // 
    }
    public function update(User $id) {
        // 
    }
    public function delete(int $id) {
        // Delete user
    }

    

}