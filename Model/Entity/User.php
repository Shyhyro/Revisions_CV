<?php

class User
{
    private ?int $id;
    private ?string $username;
    private ?string $password;

    /**
     * User constructor.
     * @param int|null $id
     * @param string|null $username
     * @param string|null $password
     */
    public function __construct(int    $id = null, string $username = null, string $password = null)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * Return id
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Return username
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * Set the username of User
     * @param string|null $username
     * @return User
     */
    public function setUsername(?string $username): User
    {
        $this->username = $username;
        return $this;
    }

    /**
     * Return password
     * @return false|string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * Set the password of User
     * @param false|string|null $password
     */
    public function setPassword($password): User
    {
        $this->password = $password;
        return $this;
    }

}