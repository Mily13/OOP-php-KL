<?php

class CustomerController{
    private $pdo;
    public function __construct() {
        try {
            $this->pdo = new PDO('mysql:host=localhost; dbname=customersdb', 'root', '');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Hiba a kapcsolódás során: ' . $e->getMessage());
        }
    }

    public function getPdo() {
        return $this->pdo;
    }

    public function listCustomers() {
        try {
            $query = "SELECT * FROM customers";
            $stmt = $this->pdo->query($query);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die('Hiba a lekérdezés során: ' . $e->getMessage());
        }
    }

    public function getCustomerById($c_id) {
        $query = "SELECT * FROM customers WHERE c_id = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$c_id]);
        $customer = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $customer;
    }

    public function getShippingById($s_id) {
        $query = "SELECT * FROM shipping_addresses WHERE s_id = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$s_id]);
        $customer = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $customer;
    }

    public function getBillingById($b_id) {
        $query = "SELECT * FROM billing_addresses WHERE b_id = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$b_id]);
        $customer = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $customer;
    }

    function listBillingAddresses($c_id) {
        $query = "SELECT * FROM billing_addresses WHERE c_id = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$c_id]);
        $billingAddresses = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $billingAddresses;
    }

    function listShippingAddresses($c_id) {
        $query = "SELECT * FROM shipping_addresses WHERE c_id = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$c_id]);
        $shippingAddresses = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $shippingAddresses;
    }


    function hasDefShippingAddress($c_id){
        $query = "SELECT COUNT(*) AS count FROM shipping_addresses WHERE is_def = 1 AND c_id = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$c_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result['count'] > 0){
            return true;
        } else {
            return false;
        }
    }

    function hasDefBillingAddress($c_id){
        $query = "SELECT COUNT(*) AS count FROM billing_addresses WHERE is_def = 1 AND c_id = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$c_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result['count'] > 0){
            return true;
        } else {
            return false;
        }
    }



// Customers CUD -------------------------------------------- FROM
    function addCustomer($name, $address, $password, $email){
        $query = "INSERT INTO customers (name, address, password, email) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$name, $address, $password, $email]);

        return $this->pdo->lastInsertId();
    }

    function updateCustomer($c_id, $name, $address){
        $query = "UPDATE customers SET name = ?, address = ? WHERE c_id = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$name, $address, $c_id]);

        return $stmt->rowCount() > 0;
    }

    function deleteCustomer($c_id){
        $query = "DELETE FROM customers WHERE c_id = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$c_id]);

        return $stmt->rowCount() > 0;
    }
// Customers CUD -------------------------------------------- TO


// BillingAddresses CUD -------------------------------------------- FROM
    function addBillingAddress($c_id, $address, $is_def, $tax){
        $query = "INSERT INTO billing_addresses (c_id, address, tax, is_def) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$c_id, $address, $tax, $is_def]);

        return $this->pdo->lastInsertId();
    }

    function updateBillingAddress($b_id, $address, $tax){
        $query = "UPDATE billing_addresses SET address = ?, tax = ? WHERE b_id = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$address, $tax, $b_id]);

        return $stmt->rowCount() > 0;
    }

    function deleteBillingAddress($b_id){
        $query = "DELETE FROM billing_addresses WHERE b_id = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$b_id]);

        return $stmt->rowCount() > 0;
    }
// BillingAddresses CUD -------------------------------------------- TO


// ShippingAddresses CUD -------------------------------------------- FROM
    function addShippingAddress($c_id, $address, $is_def){
        $query = "INSERT INTO shipping_addresses (c_id, address, is_def) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$c_id, $address, $is_def]);

        return $this->pdo->lastInsertId();
    }

    function updateShippingAddress($s_id, $address){
        $query = "UPDATE shipping_addresses SET address = ? WHERE s_id = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$address, $s_id]);

        return $stmt->rowCount() > 0;
    }

    function deleteShippingAddress($s_id){
        $query = "DELETE FROM shipping_addresses WHERE s_id = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$s_id]);

        return $stmt->rowCount() > 0;
    }
// ShippingAddresses CUD -------------------------------------------- FROM
}