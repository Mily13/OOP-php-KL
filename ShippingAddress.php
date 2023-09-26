<?php

class ShippingAddress{
    private $s_id;
    private $c_id;
    private $address;
    private $is_def;

    public function __construct($c_id, $address, $is_def = false) {
        $this->c_id = $c_id;
        $this->address = $address;
        $this->is_def = $is_def;
    }

    // GETTERS & SETTERS ---------------------- FROM
    public function getS_id() {
        return $this->s_id;
    }

    public function getC_id(){
        return $this->c_id;
    }

    public function setC_id($c_id){
        $this->c_id = $c_id;
    }

    public function getAddress(){
        return $this->address;
    }

    public function setAddress($address){
        $this->address = $address;
    }

    public function getIsDef(){
        return $this->is_def;
    }

    public function setIsDef($is_def){
        $this->is_def = $is_def;
    }
    // GETTERS & SETTERS ---------------------- TO


}