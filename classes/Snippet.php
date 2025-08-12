<?php

class Snippet extends EntityBase {

    private string $title;
    private string $description;
    private string $language;
    private string $code;
    private string $tags;

    private User $user;

    /**
     * Returns the createdAt date formatted according to the given format.
     *
     * @param string $format The format string. Default is 'y.m.d. H:m.s'.
     * @return string The formatted date.
     */
    public function getCreatedAtFormatted($format = 'y.m.d. H:m.s') {
        $date = new DateTime($this->createdAt);
        return $date->format($format);
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
     * Get the value of title
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set the value of title
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Set the value of description
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    
    /**
     * Get the value of code
     *
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    
    /**
     * Set the value of code
     *
     * @param string $code
     *
     * @return self
     */
    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    
    /**
     * Returns the language of the snippet.
     *
     * @return string The language.
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    
    /**
     * Set the value of language.
     *
     * @param string $language The language to set.
     * @return self
     */

    public function setLanguage(string $language): self
    {
        $this->language = $language;

        return $this;
    }

    
    /**
     * Returns the tags of the snippet.
     *
     * @return string The tags as a comma-separated string.
     */
    public function getTags(): string
    {
        return $this->tags;
    }


    /**
     * Set the value of tags.
     *
     * @param string $tags The tags as a comma-separated string.
     *
     * @return self
     */
    public function setTags(string $tags): self
    {
        $this->tags = $tags;

        return $this;
    }


    /**
     * Get the value of createdAt
     *
     * @return DateTime The creation date and time.
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    
    /**
     * Set the value of createdAt.
     *
     * @param string|DateTime $createdAt The creation date and time as a string or DateTime object.
     *
     * @return self
     */
    public function setCreatedAt($createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }


    /**
     * Get the value of updatedAt
     *
     * @return DateTime The date and time when the snippet was last updated.
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }


    /**
     * Set the value of updatedAt.
     *
     * @param string|DateTime $updatedAt The date and time when the snippet was last updated as a string or DateTime object.
     *                                    If null, the current date and time will be used.
     *
     * @return self
     */
    public function setUpdatedAt($updatedAt): self
    {
        $this->updatedAt = $updatedAt ?? '';

        return $this;
    }

    
    /**
     * Get the user associated with this snippet.
     *
     * @return User The user object.
     */

    public function getUser(): User
    {
        return $this->user;
    }

    
    /**
     * Set the user associated with this snippet.
     *
     * @param User $user The user object.
     *
     * @return self
     */
    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }
}

