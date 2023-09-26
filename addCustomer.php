<!DOCTYPE html>
<html>
<head>
    <title>Új Vásárló Létrehozása</title>
    <!-- Bootstrap CSS hivatkozás -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Új Vásárló Létrehozása</h1>
    <form action="process_customer.php" method="POST">
        <div class="form-group">
            <label for="name">Név:</label>
            <input type="text" class="form-control" name="name" required>
        </div>

        <div class="form-group">
            <label for="address">Cím:</label>
            <input type="text" class="form-control" name="address" required>
        </div>

        <div class="form-group">
            <label for="password">Jelszó:</label>
            <input type="password" class="form-control" name="password" required>
        </div>

        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" class="form-control" name="email" required>
        </div>

        <button type="submit" class="btn btn-primary">Vásárló létrehozása</button>
    </form>
</div>

<!-- Bootstrap JavaScript és jQuery hivatkozás -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

