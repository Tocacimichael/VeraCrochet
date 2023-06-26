<?php
@include 'function/config.php';
require './function/payment_gateway.php';
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

    <div class="container">
        <div class="cart">
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
                                            <!--- change product price to comma -->
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

        <br><br>
        <h2></h2><br><br>
        <form action="./function/checkout-charge.php" method="POST">
            <div class="mb-3">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstName" name="firstName" required>
            </div>
            <div class="mb-3">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="lastName" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="street_name" class="form-label">street name and number</label>
                <input type="street_name" class="form-control" id="street_name" name="street_name" required>
            </div>
            <div class="mb-3">
                <label for="postal_code" class="form-label">Postal Code</label>
                <input type="postal_code" class="form-control" id="postal_code" name="postal_code" required>
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">city</label>
                <input type="city" class="form-control" id="city" name="city" required>
            </div>
            <div class="mb-3">
                <label for="country" class="form-label">country</label>
                <input type="country" class="form-control" id="country" name="country" required>
            </div>
            <button type="submit" class="btn btn-primary">checkout</button>
        </form>

        <div class="container py-5">
    <div class="row">
      <div class="col-12 text-center">
        <h1>Choose Payment Method</h1>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-4 text-center">
      <img src="./resources/Icons/IDealLogo.png" class="w-25"> <br><br><br>
        <button class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#idealModal">iDEAL</button>
      </div>
      <div class="col-4 text-center">
      <img src="./resources/Icons/creditcard1.png" class="w-25"> <br><br><br><br>
        <button class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#creditCardModal">Credit Card</button>
      </div>
      <div class="col-4 text-center">
      <img src="./resources/Icons/paypal.jpg" class="w-25"> <br><br><br>
        <button class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#paypalModal">PayPal</button>
      </div>
    </div>
  </div>

<script 
  src="'https://checkout.stripe.com/checkout.js" class="stripe-button"
  data-key="pk_test_51NM68UEpih27WVSpKlIt5dTZB9kigdv9OprSTqLUkMlERosE3OhGoQr4ZosOczWKYPZdLM1gtTYgHJnRnlcof23h00haIaWxYV" 
  data-amount=<?php echo str_replace(",","",$_GET["price"]) * 10 ?>
  data-name="<?php echo $_GET["title"] ?>"
  data-description="<?php echo $_GET["title"] ?>"
  data-image="<?php echo $_GET["image"] ?>"
  data-currency="EUR" 
  data_locale="auto" 
  >
</script>

<!-- iDEAL Modal -->
<div class="modal fade" id="idealModal" tabindex="-1" aria-labelledby="idealModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="idealModalLabel">iDEAL</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Please select your bank:</p>
          <div class="form-check">  
            <input class="form-check-input" type="radio" name="bankRadio" id="rabobankRadio" value="rabobank">
            <label class="form-check-label" for="rabobankRadio">
              Rabobank
            </label>
          </div>
          <br>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="bankRadio" id="abnamroRadio" value="abnamro">
            <label class="form-check-label" for="abnamroRadio">
              ABN AMRO
            </label>
          </div>
          <br>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="bankRadio" id="ingRadio" value="ing">
            <label class="form-check-label" for="ingRadio">
              ING
            </label>
          </div>
          <br><br>  
          <button class="btn btn-primary" onclick="confirmIdeal()">Proceed</button>
          <script src="./function/confirmideal.js"></script>
        </div>
      </div>
    </div>
  </div>

  Credit Card Modal 
  <div class="modal fade" id="creditCardModal" tabindex="-1" aria-labelledby="creditCardModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="creditCardModalLabel">Credit Card</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="cardNumber" class="form-label">Card Number</label>
              <input type="text" class="form-control" id="cardNumber">
            </div>
            <div class="mb-3">
              <label for="expiryDate" class="form-label">Expiry Date</label>
              <input type="text" class="form-control" id="expiryDate">
            </div>
            <div class="mb-3">
              <label for="cvv" class="form-label">CVV</label>
              <input type="text" class="form-control" id="cvv">
            </div>
            <button class="btn btn-primary" onclick="confirmCreditCard()">Proceed</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  PayPal Modal 
  <div class="modal fade" id="paypalModal" tabindex="-1" aria-labelledby="paypalModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="paypalModalLabel">PayPal</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Please log in to your PayPal account to complete the payment.</p>
          <button class="btn btn-primary" onclick="confirmPayPal()">Proceed</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Include Bootstrap JS --> 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./function/confirmideal.js"></script>                 


    <br><br>
    <footer class="text-center text-white rounded" style="background-color: #EE6983;">
        <div class="container p-4 pb-0">
            <section class="d-flex">
                <a class="btn btn-floating m-1" href="" role="button"><i class="fab fa-facebook-f"><img src="./resources/icons/facebook.png" style="width: 50px;"></i></a>

                <a class="btn btn-floating m-1" href="#!" role="button"><i class="fab fa-twitter"><img
                            src="./resources/icons/twitter.png" style="width: 50px;"></i></a>

                <a class="btn btn-floating m-1" href="#!" role="button"><i class="fab fa-google"><img
                            src="./resources/icons/pinterest.png" style="width: 50px;"></i></a>

                <a class="btn  btn-floating m-1" href="https://www.instagram.com/verascrochetcrafts/" role="button"><i
                        class="fab fa-instagram"><img src="./resources/icons/instagram.png"
                            style="width: 50px;"></i></a>
            </section>
        </div>
                                      ]
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2023 Copyright:
            <a class="text-white" href="https://michaeltocaci.com/">Vera's Crochet Craft</a>
        </div>
    </footer>

</body>

</html>
