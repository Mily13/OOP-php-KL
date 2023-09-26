<?php
require_once 'CustomerController.php';

if (isset($_GET['c_id'])) {
    $customerId = $_GET['c_id'];
    $customerController = new CustomerController();
    $customer = $customerController->getCustomerById($customerId);
} else {
    echo "Hibás kérés.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Új Vásárló Létrehozása</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Vásárló Módosítása</h1>
    <form action="update_customer.php" method="POST">
        <div class="form-group">
            <label for="name">Név:</label>
            <?php foreach ($customer as $cust): ?>
            <input type="text" class="form-control" value="<?php echo $cust['name']; ?>" name="name" required>
        </div>

        <input type="hidden" value="<?php echo $cust['c_id']; ?>" name="c_id" >

        <div class="form-group">
            <label for="address">Cím:</label>
            <input type="text" class="form-control" name="address" value="<?php echo $cust['address']; ?>" required>
            <?php endforeach; ?>
        </div>

        <button type="submit" class="btn btn-primary">Módosítás</button>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


