<?php
require_once 'CustomerController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['s_id'])) {
    $s_id = $_POST['s_id'];

    $customerController = new CustomerController();

    try {
        if ($customerController->deleteShippingAddress($s_id)) {
            header("Location: index.php");
            exit();
        } else {
            die('Hiba történt a törlés során.');
        }
    } catch (PDOException $e) {
        die('Hiba történt az adatbázisművelet során: ' . $e->getMessage());
    }
} else {
    echo "Érvénytelen kérés.";
}
?>


