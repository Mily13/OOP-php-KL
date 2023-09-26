<?php
require_once 'CustomerController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['b_id']) && isset($_POST['address'])) {
    $b_id = $_POST['b_id'];
    $address = $_POST['address'];
    $tax = $_POST['tax'];

    $customerController = new CustomerController();

    try {
        if ($customerController->updateBillingAddress($b_id, $address, $tax)) {
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


