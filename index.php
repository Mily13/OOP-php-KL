<?php
require_once 'Customer.php';
require_once 'BillingAddress.php';
require_once 'ShippingAddress.php';
require_once 'CustomerController.php';
$customerController = new CustomerController();
$customers = $customerController->listCustomers();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Vásárlók Listája</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Vásárlók</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Vásárlók Listája</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="addCustomer.php">Új Vásárló</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container mt-5">
    <h1>Vásárlók Listája</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Név</th>
            <th scope="col">Cím</th>
            <th scope="col">Email</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($customers as $customer): ?>
            <tr>
                <th scope="row"><?php echo $customer['c_id']; ?></th>
                <td><a href="customer_profile.php?id=<?php echo $customer['c_id']; ?>" style="color: darkblue"><b><?php echo $customer['name']; ?></b></a></td>
                <td><?php echo $customer['address']; ?></td>
                <td><?php echo $customer['email']; ?></td>
                <td>
                    <form action="delete_customer.php" method="POST">
                        <input type="hidden" name="c_id" value="<?php echo $customer['c_id']; ?>">
                        <button class="btn-sm btn-danger" type="submit" name="delete">Törlés</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
