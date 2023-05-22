<?php
    $con = mysqli_connect('localhost','root');
    mysqli_select_db($con, 'veracrochet');
    $sql = "SELECT * FROM producten WHERE featured=7";
    $featured = $con->query($sql);

?>
<!DOCTYPE html>
<html lang="en" style="
    display: table;
    margin: 0;">

<head>
        <title> Vera Cochet Craft </title>
        <script src="https://ajax.com.googleapis.com/ajax/libs/jquery/.min.js"></script>
        <script src="../resources/bootstrap-5.3.0-alpha3-dist/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../resources/bootstrap-5.3.0-alpha3-dist/css/bootstrap.min.css">   
        <link rel="stylesheet" href="../resources/Custom/style.css">  
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class="position-absolute top-0 start-50 translate-middle-x" style=" background-color: #FFF5E4;">

        <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php"><img src="../resources/imgs/Logo_VCC.png" class="w-25"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a style="margin: 5%;" class="nav-link active" aria-current="page" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                <a style="margin: 5%;" class="nav-link" href="../products.php">Products</a>
                </li>
                <li class="nav-item">
                <a style="margin: 5%;" class="nav-link" href="cart.php"><img src="../resources/Icons/cart.png" class="w-50"></a>
                </li>
                <li class="nav-item">
                <a style="margin: 5%;" class="nav-link" href="account.php"><img src="../resources/Icons/profile.png" class="w-50"></a>
                </li>
            </ul>
            </div>
        </div>
        </nav>

        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <?php
                    while ($product = $featured ->fetch_assoc()):
                    ?>
                        <div class="col">
                            <h2><?= $product['title']; ?></h2>
                            <img src="<?= $product['image'] ?>" alt="<?= $product['title'] ?>" />
                            <br>
                            <br> 
                            <br>
                            <p class="lprice" style="font-size: 50px;"> € <?= $product['price'] ?></p>
                            <p><?= $product['description'] ?></p>
                            <a href="<?= $product ?>">
                                <button type="button" class="btn btn-success" data-toggle="modal" style="font-size: 40px;">Add to cart</button>
                                <br><br><br><br><br>    
                            </a>
                        </div>
                    <?php endwhile ?>
                </div>
            </div>
        </div>

    
        <footer style="background-color: #EE6983;" 
                class="text-center text-white" >
            <!-- Grid container -->
            <div class="container p-4 pb-0">
                <!-- Section: Social media -->
                <section class="d-flex">
                <!-- Facebook -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                    ><i class="fab fa-facebook-f"><img src="../resources/icons/facebook.png" class="w-25"></i>
                </a>

                <!-- Twitter -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                    ><i class="fab fa-twitter"><img src="../resources/icons/twitter.png" class="w-25"></i
                ></a>

                <!-- Google -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                    ><i class="fab fa-google"><img src="../resources/icons/pinterest.png" class="w-25"></i
                ></a>

                <!-- Instagram -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                    ><i class="fab fa-instagram"><img src="../resources/icons/instagram.png" class="w-25"></i
                ></a>
                </section>
                <!-- Section: Social media -->
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-3">
                © 2023 Copyright:
                <a class="text-b" href="https://michaeltocaci.com/">Vera Crochet Craft</a>
            </div>
            <!-- Copyright -->
        </footer>