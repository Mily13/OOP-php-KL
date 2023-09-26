<?php
require_once 'CustomerController.php';

if (isset($_POST['c_id'])) {
    $customerId = $_POST['c_id'];
    $customerController = new CustomerController();
    $customer = $customerController->getCustomerById($customerId);
    $hasDefBillingAdress = $customerController->hasDefBillingAddress($customerId);
} else {
    echo "Hibás kérés.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Új Számlázási cím</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Új Számlázási cím létrehozása</h1>
    <form action="process_billing.php" method="POST">

        <div class="form-group">
            <label for="address">Cím:</label>
            <input type="text" class="form-control" name="address" required>
        </div>

        <div class="form-group">
            <label for="address">Adószám:</label>
            <input type="text" class="form-control" name="tax">
        </div>

        <?php foreach ($customer as $cust): ?>
            <input type="hidden" name="c_id" value="<?php echo $cust['c_id']; ?>">
        <?php endforeach; ?>

        <?php if (!$hasDefBillingAdress){ ?>
            <div class="form-group">
                <label for="password">Alapértelmezett:</label>
                <input type="checkbox" class="form-control" name="def" value="1" >
            </div>
        <?php } ?>

        <button type="submit" class="btn btn-primary">létrehozás</button>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>



