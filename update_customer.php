<?php
require_once 'CustomerController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['c_id']) && isset($_POST['name']) && isset($_POST['address'])) {
    $c_id = $_POST['c_id'];
    $name = $_POST['name'];
    $address = $_POST['address'];

    $customerController = new CustomerController();

    try {
        if ($customerController->updateCustomer($c_id, $name, $address)) {
            header("Location: index.php");
            exit();
        } else {
            die('Hiba történt.');
        }
    } catch (PDOException $e) {
        die('Hiba történt az adatbázisművelet során: ' . $e->getMessage());
    }
} else {
    echo "Érvénytelen kérés.";
}
?>
