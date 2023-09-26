<?php
$customer = [];
$shippingAddresses = [];
$billingAddresses = [];
require_once 'CustomerController.php';

if (isset($_GET['id'])) {
    $customerId = $_GET['id'];
    $customerController = new CustomerController();
    $customer = $customerController->getCustomerById($customerId);
    $shippingAddresses = $customerController->listShippingAddresses($customerId);
    $billingAddresses = $customerController->listBillingAddresses($customerId);
} else {
    echo "Hibás kérés.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Felhasználói Profil</title>
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
    <h1>Felhasználói Profil</h1>
    <h2 class="mt-5">Vásárló adatai</h2>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Név</th>
            <th>Email</th>
            <th>Cím</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($customer as $cust): ?>
            <tr>
                <td><?php echo $cust['c_id']; ?></td>
                <td><?php echo $cust['name']; ?></td>
                <td><?php echo $cust['email']; ?></td>
                <td><?php echo $cust['address']; ?></td>
                <td>
                    <form action="modifyCustomer.php" method="GET">
                        <input type="hidden" name="c_id" value="<?php echo $cust['c_id']; ?>">
                        <button class="btn-sm btn-warning" type="submit" name="update">Módosítás</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Szállítási Címek</h2>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Cím</th>
            <th>Elsődleges</th>
            <th>
                <form action="addShipping.php" method="POST">
                    <?php foreach ($customer as $cust): ?>
                    <input type="hidden" name="c_id" value="<?php echo $cust['c_id']; ?>">
                    <?php endforeach; ?>
                    <button class="btn-sm btn-success" type="submit" name="update">Új Szállítási cím ehhez a vásárlóhoz</button>
                </form>
            </th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($shippingAddresses as $shippingAddress): ?>
            <tr>
                <td><?php echo $shippingAddress['s_id']; ?></td>
                <td><?php echo $shippingAddress['address']; ?></td>
                <td>
                    <?php
                        if($shippingAddress['is_def'] == 1){
                            echo 'igen';
                        }else{
                            echo 'nem';
                        }
                    ?>
                </td>
                <td>
                    <div class="btn-group">
                        <form action="delete_shipping.php" method="POST">
                            <input type="hidden" name="s_id" value="<?php echo $shippingAddress['s_id']; ?>">
                            <button class="btn-sm btn-danger" type="submit" name="delete">Törlés</button>
                        </form>
                        <form action="modifyShipping.php" method="POST">
                            <input type="hidden" name="s_id" value="<?php echo $shippingAddress['s_id']; ?>">
                            <button class="btn-sm btn-warning" type="submit" name="delete">Módosítás</button>
                        </form>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Számlázási Címek</h2>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Cím</th>
            <th>Adószám</th>
            <th>Elsődleges</th>
            <th>
                <form action="addBilling.php" method="POST">
                    <?php foreach ($customer as $cust): ?>
                        <input type="hidden" name="c_id" value="<?php echo $cust['c_id']; ?>">
                    <?php endforeach; ?>
                    <button class="btn-sm btn-success" type="submit" name="update">Új Számlázási cím ehhez a vásárlóhoz</button>
                </form>
            </th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($billingAddresses as $billingAddress): ?>
            <tr>
                <td><?php echo $billingAddress['b_id']; ?></td>
                <td><?php echo $billingAddress['address']; ?></td>
                <td><?php echo $billingAddress['tax']; ?></td>
                <td>
                    <?php
                    if($billingAddress['is_def'] == 1){
                        echo 'igen';
                    }else{
                        echo 'nem';
                    }
                    ?>
                </td>
                <td>
                    <div class="btn-group">
                        <form action="delete_billing.php" method="POST">
                            <input type="hidden" name="b_id" value="<?php echo $billingAddress['b_id']; ?>">
                            <button class="btn-sm btn-danger" type="submit" name="delete">Törlés</button>
                        </form>
                        <form action="modifyBilling.php" method="POST">
                            <input type="hidden" name="b_id" value="<?php echo $billingAddress['b_id']; ?>">
                            <button class="btn-sm btn-warning" type="submit" name="modify">Módosítás</button>
                        </form>
                    </div>
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

