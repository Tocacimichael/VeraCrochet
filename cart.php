<?php
    $con = mysqli_connect('localhost', 'root', '', 'veracrochet'); // Add the database password and name
?>
<?php
session_start(); // Start the session

// Check if the product ID and price are submitted
if(isset($_POST['product_id']) && isset($_POST['product_price'])) {
    $product_id = $_POST['product_id'];
    $product_price = $_POST['product_price'];

    // Check if the cart is already initialized in the session
    if(isset($_SESSION['cart'])) {
        // Add the product to the existing cart
        $_SESSION['cart'][$product_id] = $product_price;
    } else {
        // Create a new cart and add the product
        $_SESSION['cart'] = array($product_id => $product_price);
    }

    // Redirect to the cart page
    header("Location: cart.php");
    exit();
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <title>Vera Cochet Craft</title>
    <script src="https://ajax.com.googleapis.com/ajax/libs/jquery/.min.js"></script>
    <script src="./resources/bootstrap-5.3.0-alpha3-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./resources/bootstrap-5.3.0-alpha3-dist/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body style="background-color: #FFF5E4;">

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid d-flex">
        <a class="navbar-brand justify-content-start" href="#">
            <img src="./resources/imgs/Logo_VCC.png" class="w-100" style="max-width: 150px;">
            Vera's Crochet Craft
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
            </span>
        </button>
        <div class="d-flex justify-content-end">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <?php
                        $navbar = mysqli_query($con, "SELECT * FROM navbar");
                        while ($url = mysqli_fetch_assoc($navbar)): 
                    ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= $url['url'] ?>">
                                <img style="width: 50px;" src="<?= $url['image'] ?>">
                            </a>
                        </li>
                    <?php endwhile ?>
                </ul>
            </div>
        </div>
    </div>
</nav>


<div class="container">
    <h1>Your Cart</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Product name</th>
                <th>quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($emptyMessage)): ?>
                <tr>
                    <td colspan="3"><?= $emptyMessage ?></td>
                </tr>
            <?php else: ?>
                <?php 
                    $cart = mysqli_query($con, "SELECT * FROM cart");
                    $totalPrice = 0; // Initialize total price variable
                    foreach ($cart as $product): ?>
                    <tr>
                        <td>
                            <img src="<?= $product['image'] ?>" alt="<?= $product['title'] ?>" style="width: 50px;">
                        </td>
                        <td><?= $product['title'] ?></td>
                        <td>€ <?= $product['price'] ?></td>
                    </tr>
                    <?php $totalPrice += $product['price']; ?>
                <?php endforeach; ?>
                <tr>
                    <td colspan="2">Total Price:</td>
                    <td>€ <?= $totalPrice ?></td>
                </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>

<footer class="text-center text-white rounded" style="background-color: #EE6983;">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
        <!-- Section: Social media -->
        <section class="d-flex">
            <!-- Facebook -->
            <a class="btn btn-floating m-1" href="" role="button">
                <i class="fab fa-facebook-f"><img src="./resources/icons/facebook.png" style="width: 50px;"></i>
            </a>

            <!-- Twitter -->
            <a class="btn btn-floating m-1" href="#!" role="button">
                <i class="fab fa-twitter"><img src="./resources/icons/twitter.png" style="width: 50px;"></i>
            </a>

            <!-- Google -->
            <a class="btn btn-floating m-1" href="#!" role="button">
                <i class="fab fa-google"><img src="./resources/icons/pinterest.png" style="width: 50px;"></i>
            </a>

            <!-- Instagram -->
            <a class="btn  btn-floating m-1" href="https://www.instagram.com/verascrochetcrafts/" role="button">
                <i class="fab fa-instagram"><img src="./resources/icons/instagram.png" style="width: 50px;"></i>
            </a>
        </section>
        <!-- Section: Social media -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2023 Copyright:
        <a class="text-white" href="https://michaeltocaci.com/">Vera's Crochet Craft</a>
    </div>
    <!-- Copyright -->
</footer>

</body>

</html>
