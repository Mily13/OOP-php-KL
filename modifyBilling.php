<?php
require_once 'CustomerController.php';

if (isset($_POST['b_id'])) {
    $b_id = $_POST['b_id'];
    $customerController = new CustomerController();
    $billing_addresses = $customerController->getBillingById($b_id);
} else {
    echo "Hibás kérés.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Számlázási cím módosítása</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Számlázási cím módosítása</h1>
    <form action="update_billing.php" method="POST">
        <div class="form-group">
            <label for="address">Cím:</label>
            <?php foreach ($billing_addresses as $billing): ?>
            <input type="text" class="form-control" value="<?php echo $billing['address']; ?>" name="address" required>
        </div>

        <div class="form-group">
            <label for="address">Adószám:</label>
            <input type="text" class="form-control" value="<?php echo $billing['tax']; ?>" name="tax">
        </div>

        <input type="hidden" value="<?php echo $billing['b_id']; ?>" name="b_id" >
            <?php endforeach; ?>

        <button type="submit" class="btn btn-primary">Módosítás</button>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>




