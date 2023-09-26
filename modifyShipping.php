<?php
require_once 'CustomerController.php';

if (isset($_POST['s_id'])) {
    $s_id = $_POST['s_id'];
    $customerController = new CustomerController();
    $shipping_addresses = $customerController->getShippingById($s_id);
} else {
    echo "Hibás kérés.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Szállítási cím módosítása</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Szállítási cím módosítása</h1>
    <form action="update_shipping.php" method="POST">
        <div class="form-group">
            <label for="address">Cím</label>
            <?php foreach ($shipping_addresses as $shipping): ?>
            <input type="text" class="form-control" value="<?php echo $shipping['address']; ?>" name="address" required>
        </div>

        <input type="hidden" value="<?php echo $shipping['s_id']; ?>" name="s_id" >
            <?php endforeach; ?>

        <button type="submit" class="btn btn-primary">Módosítás</button>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>



