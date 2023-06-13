<?php
@include 'function/config.php';
@include 'function/profilefun.php';
@include 'function/order.php';


// Check if the user is logged in
if (!isLoggedIn()) {
    header("Location: login.php");
    exit;
}

// Get the user's order history
$userID = $_SESSION['user_id'];
$orders = mysqli_query($con, "SELECT * FROM orders WHERE user_id = '$userID' ORDER BY order_date DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>My Orders</title>
    <link rel="stylesheet" href="./resources/bootstrap-5.3.0-alpha3-dist/css/bootstrap.min.css">
    <style>
        .order-card {
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #fff;
        }
    </style>
</head>

<body>

<div class="container mt-5">
        <h2>My Orders</h2>
        <hr>

        <?php while ($order = mysqli_fetch_assoc($orders)) : ?>
            <div class="order-card">
                <h4>Order ID: <?= $order['id'] ?></h4>
                <p>Date: <?= $order['order_date'] ?></p>
                <p>Order Total: $<?= $order['total_amount'] ?></p>
                <h5>Order Items:</h5>

                <?php
                $orderID = $order['id'];
                $orderItems = mysqli_query($con, "SELECT * FROM order_items WHERE order_id = '$orderID'");
                while ($item = mysqli_fetch_assoc($orderItems)) :
                    $productID = $item['product_id'];
                    $product = mysqli_query($con, "SELECT * FROM products WHERE id = '$productID'");
                    $productData = mysqli_fetch_assoc($product);
                ?>
                    <div class="mb-3">
                        <h6><?= $productData['title'] ?></h6>
                        <p>Price: $<?= $productData['price'] ?></p>
                        <p>Quantity: <?= $item['quantity'] ?></p>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endwhile; ?>

    </div>

</body>

</html>
