<?php
require_once 'CustomerController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['b_id'])) {
    $b_id = $_POST['b_id'];

    $customerController = new CustomerController();

    try {
        if ($customerController->deleteBillingAddress($b_id)) {
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



