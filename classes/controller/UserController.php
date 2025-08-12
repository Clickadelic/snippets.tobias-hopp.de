<?php
class UserController {
    private PDO $dbh;
 
    /**
     * Constructor
     *
     * @param PDO $dbh
     */
    public function __construct(PDO $dbh) {
        $this->dbh = $dbh;
    }
 
    
    /**
     * Saves a user to the database. If the user already exists, it updates the user.
     * Otherwise, it inserts a new user.
     *
     * @param User $user The user to be saved.
     *
     * @return void
     */
    public function save(User $user) {
        if($user->getId() > 0) {
            $this->update($user);
        } else {
            $this->insert($user);
        }
    }
 
    /**
     * Inserts a user into the database
     *
     * @param User $user The user to be inserted
     *
     * @return void
     */
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
 
    /**
     * Finds a user by its ID
     *
     * @param int $id
     *
     * @return User|null
     */
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
 
    /**
     * Finds a user by its username
     *
     * @param string $username The username to search for
     *
     * @return User|null The user object if found, null otherwise
     */
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