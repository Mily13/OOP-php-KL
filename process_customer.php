<?php
require_once 'CustomerController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $customerController = new CustomerController();

    try {
        $customerId = $customerController->addCustomer($name, $address, $password, $email);
        header('Location: index.php');
        exit();
    } catch (PDOException $e) {
        die('Hiba történt az adatbázisművelet során: ' . $e->getMessage());
    }

} else {
    echo "Érvénytelen kérés.";
}

