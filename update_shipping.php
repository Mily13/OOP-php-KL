<?php
require_once 'CustomerController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['s_id']) && isset($_POST['address'])) {
    $s_id = $_POST['s_id'];
    $address = $_POST['address'];

    $customerController = new CustomerController();

    try {
        if ($customerController->updateShippingAddress($s_id, $address)) {
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

