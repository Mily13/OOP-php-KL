<?php
require_once 'CustomerController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'  && isset($_POST['address']) && isset($_POST['c_id'])) {
    $address = $_POST['address'];
    $c_id = $_POST['c_id'];

    if (isset($_POST['def'])){
        $def = 1;
    }else{
        $def = 0;
    }

    $customerController = new CustomerController();

    try {
        $customerId = $customerController->addShippingAddress($c_id, $address, $def);
        header('Location: index.php');
        exit();
    } catch (PDOException $e) {
        die('Hiba történt az adatbázisművelet során: ' . $e->getMessage());
    }

} else {
    echo "Érvénytelen kérés.";
}

