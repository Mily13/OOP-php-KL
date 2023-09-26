<?php
class Customer{
    private $c_id;
    private $name;
    private $address;
    private $password;
    private $email;

    public function __construct($name, $address, $password, $email) {
        $this->name = $name;
        $this->address = $address;
        $this->password = $password;
        $this->email = $email;
    }

    // GETTERS & SETTERS ---------------------- FROM
    public function getC_id() {
        return $this->c_id;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getAddress(){
        return $this->address;
    }

    public function setAddress($address){
        $this->address = $address;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }
    // GETTERS & SETTERS ---------------------- TO


}