<?php


class User extends EntityBase {
    // private int $id = 0;
    private string $username;
    private string $email;
    private string $password;

    // private DateTime $createdAt;
    // private DateTime $updatedAt;

    // private string $deletedAt;
    private bool $agbok;

    public function setHashedPassword(string $password) {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of username
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * Set the value of username
     */
    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Set the value of password
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of createdAt
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * Set the value of createdAt
     */
    public function setCreatedAt(string $createdAt): self
    {
        $this->createdAt = new DateTime($createdAt);
        return $this;
    }

    /**
     * Get the value of updatedAt
     */
    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    /**
     * Set the value of updatedAt
     */
    public function setUpdatedAt($updatedAt): self
    {
        if($updatedAt != null){
            $this->updatedAt = new DateTime($updatedAt);
        }

        return $this;
    }

    /**
     * Get the value of deletedAt
     */
    public function getDeletedAt(): string
    {
        return $this->deletedAt;
    }

    /**
     * Set the value of deletedAt
     */
    public function setDeletedAt(string $deletedAt): self
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    /**
     * Get the value of agbok
     */
    public function isAgbok(): bool
    {
        return $this->agbok;
    }

    /**
     * Set the value of agbok
     */
    public function setAgbok(bool $agbok): self
    {
        $this->agbok = $agbok;

        return $this;
    }
    
}