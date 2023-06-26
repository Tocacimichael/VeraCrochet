<?php
require './function/config.php';
require './function/profilefun.php';


// Fetch user data
$userData = getUserData();
?>

<!DOCTYPE html>
<html lang="en; nl;">

<head>
    <title>Vera Crochet Craft</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./resources/bootstrap-5.3.0-alpha3-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./resources/bootstrap-5.3.0-alpha3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./resources/Custom/style.css">
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
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="d-flex justify-content-end">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <?php
                        $navbar = mysqli_query($con, "SELECT * FROM navbar");
                        while ($url = mysqli_fetch_assoc($navbar)) :
                        ?>
                            <li class="nav-values">
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
                <div class="card">
                    <div class="card-body">
                        <?php if ($userData) : ?>
                            <h5 class="card-title">
                                <?= $userData['users']['first_name'] ?? '' ?>
                                <?= $userData['users']['last_name'] ?? '' ?><br><br>
                                <?= $userData['address']['street_name'] ?? '' ?><br><br>
                                <?= $userData['address']['postal_code'] ?? '' ?><br><br>
                                <?= $userData['address']['city'] ?? '' ?><br>
                            </h5>
                        <?php endif; ?>

                        <div class="container mt-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5>My Orders</h5>
                                </div>


                            </div>
                        <br><br>
                    <!--- button to trigger the modal -->
                        <div class="d-inline">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#updateAddressModal">
                                Update Address
                            </button>
                        </div>
 
                    </div>
                </div>
            </div>
        </div>
    </div> <br><br>

    <!-- Modal for updating the address -->
    <div class="modal fade" id="updateAddressModal" tabindex="-1" aria-labelledby="updateAddressModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateAddressModalLabel">Update Address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="">
                        <div class="mb-3">
                            <label for="street_name" class="form-label">Street Name</label>
                            <input type="text" class="form-control" id="street_name" name="street_name"                        </div>
                        <div class="mb-3">
                            <label for="postal_code" class="form-label">Postal Code</label>
                            <input type="text" class="form-control" id="postal_code" name="postal_code">
                        </div>
                        <div class="mb-3">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city" name="city">
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>  

    <br><br>

    <footer class="text-center text-white rounded fixed-bottom" style="background-color: #EE6983;">
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
