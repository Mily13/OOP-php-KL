<?php

class BillingAddress{
    private $b_id;
    private $c_id;
    private $address;
    private $tax;
    private $is_def;

    public function __construct($c_id, $address, $tax = null, $is_def = false) {
        $this->c_id = $c_id;
        $this->address = $address;
        $this->tax = $tax;
        $this->is_def = $is_def;
    }

    // GETTERS & SETTERS ---------------------- FROM
    public function getB_id(){
        return $this->b_id;
    }

    public function setB_id($b_id){
        $this->b_id = $b_id;
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

    public function getTax(){
        return $this->tax;
    }

    public function setTax($tax){
        $this->tax = $tax;
    }

    public function getIsDef(){
        return $this->is_def;
    }

    public function setIsDef($is_def){
        $this->is_def = $is_def;
    }
    // GETTERS & SETTERS ---------------------- TO



}