<?php
require_once 'CustomerController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['c_id'])) {
    $customerId = $_POST['c_id'];

    $customerController = new CustomerController();

    try {
        if ($customerController->deleteCustomer($customerId)) {
            header("Location: index.php"); // Sikeres törlés esetén átirányítás az index.php oldalra
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

