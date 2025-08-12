<?php
class UserController {
    private PDO $dbh;
 
    public function __construct(PDO $dbh) {
        $this->dbh = $dbh;
    }
 
    /**
     * Kontrolliert anhand der ID vom User
     * ob es ein Update oder Insert aufrufen soll
     */
    public function save(User $user) {
        if($user->getId() > 0) {
            $this->update($user);
        } else {
            $this->insert($user);
        }
    }
 
    public function insert(User $user) {
        $sql = "INSERT INTO users (username, email, password, agbOk) VALUES (?,?,?,?)";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute([
            $user->getUsername(),
            $user->getEmail(),
            $user->getPassword(),
            $user->getAgbOk()
        ]);
 
        $stmt = null;
    }
 
    public function findAll() {}
 
    public function findById(int $id) {
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();
 
        $user = null;
        if($result != false) {
            $user = new User();
            $user->arrayToObject($result);
        }
        return $user;
    }
 
    public function findByUsername(string $username)  {
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute([$username]);
        $result = $stmt->fetch();
 
        $user = null;
        if($result != false) {
            $user = new User();
            $user->arrayToObject($result);
        }
        return $user;
    }
 
    public function update(User $user) {}
 
    public function delete(int $id) {}
 
}