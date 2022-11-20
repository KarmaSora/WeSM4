<?php
class Person {

    private $firstName;
    private $surName;
    private $userName;
    private $passWord;

    /**
     * Person konstruktor.
     */
    public function __construct($firstName, $surName, $userName, $passWord) {
        $this->firstName = $firstName;
        $this->surName = $surName;
        $this->userName = $userName;
        $this->passWord = $passWord;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getSurName() {
        return $this->surName;
    }

    public function getUserName() {
        return $this->userName;
    }

    public function getPassWord() {
        return $this->passWord;
    }

    public function setPassWord($passWord) {
        $this->passWord = $passWord;
    }
}