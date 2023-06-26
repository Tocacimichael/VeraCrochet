<?php
@include 'function/config.php';
@include 'function/checkout.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Vera Cochet Craft</title>
    <script src="https://ajax.com.googleapis.com/ajax/libs/jquery/.min.js"></script>
    <script src="./resources/bootstrap-5.3.0-alpha3-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./resources/bootstrap-5.3.0-alpha3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./resources/Custom/style.css">
    <meta charset="UTF-8">
    <meta street_name="viewport" content="width=device-width, initial-scale=1">
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
                        while ($url = mysqli_fetch_assoc($navbar)) :
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


                    
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <!-- Cart container -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Your Cart</h5>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                @include './function/cartfunc.php';
                                $totalPrice = 0; // Initialize total price variable
                                foreach ($cart as $product_id => $quantity) {
                                    if (isset($products[$product_id])) {
                                        $product = $products[$product_id];
                                        $subtotal = $product['price'] * $quantity;
                                        $totalPrice += $subtotal;
                                        ?>
                                        <tr>
                                            <td>
                                                <img src="<?= $product['image'] ?>" alt="<?= $product['title'] ?>" style="width: 50px;">
                                                <?= $product['title'] ?>
                                            </td>
                                            <td><?= $quantity ?></td>
                                            <td>€<?= $product['price'] ?></td>
                                            <td>
                                                <form method="post" action="cart.php">
                                                    <input type="hidden" name="remove_product_id" value="<?= $product_id ?>">
                                                    <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                                <tr>
                                    <td colspan="3">Total Price:</td>
                                    <td>€<?= $totalPrice ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                   <!-- Checkout container -->
                   <div class="card mt-5">
                    <div class="card-body">
                        <h5 class="card-title">Checkout</h5>
                        <form action="./payment.php" method="POST">
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="text" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" required>
                            </div>                            
                            <div class="mb-3">
                                <label for="postal_code" class="form-label">Postal Code</label>
                                <input type="text" class="form-control" id="postal_code" name="postal_code  " required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address" required>
                            </div>
                            <div class="mb-3">
                                <label for="country" class="form-label">Country</label>
                                <input type="text" class="form-control" id="country" name="country" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Proceed to payment</button>
                        </form>
                    </div>  
                </div>
            </div>
        </div>
    </div>  


    <br><br>
    <footer class="text-center text-white rounded" style="background-color: #EE6983;">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
            <!-- Section: Social media -->
            <section class="d-flex">
                <!-- Facebook -->
                <a class="btn btn-floating m-1" href="" role="button"><i class="fab fa-facebook-f"><img
                            src="./resources/icons/facebook.png" style="width: 50px;"></i></a>

                <!-- Twitter -->
                <a class="btn btn-floating m-1" href="#!" role="button"><i class="fab fa-twitter"><img
                            src="./resources/icons/twitter.png" style="width: 50px;"></i></a>

                <!-- Google -->
                <a class="btn btn-floating m-1" href="#!" role="button"><i class="fab fa-google"><img
                            src="./resources/icons/pinterest.png" style="width: 50px;"></i></a>

                <!-- Instagram -->
                <a class="btn  btn-floating m-1" href="https://www.instagram.com/verascrochetcrafts/" role="button"><i
                        class="fab fa-instagram"><img src="./resources/icons/instagram.png"
                            style="width: 50px;"></i></a>
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
