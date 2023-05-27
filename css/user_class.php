<?php

class UserForm {
    private $id;
    private $name;
    private $email;
    private $password;
    private $userType;
    private $createdAt;

    public function __construct($name, $email) {
        $this->name = $name;
        $this->email = $email;
    
    }

    // Getters and Setters for each property

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getUserType() {
        return $this->userType;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setUserType($userType) {
        $this->userType = $userType;
    }

    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
    }



    public function login($email, $password) {
        if ($this->email === $email && $this->password === $password) {
            echo "Login successful!";
        } else {
            echo "Invalid email or password.";
        }
    }
}
?>