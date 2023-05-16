<?php
    $con = mysqli_connect('localhost','root');
    mysqli_select_db($con, 'veracrochet');
    $sql = "SELECT * FROM producten WHERE featured>0";
    $featured = $con->query($sql);

?>

<!DOCTYPE html>
<html lang="en" style="
    display: table;
    margin: 0;">

<head>
        <title> Vera Cochet Craft </title>
        <script src="https://ajax.com.googleapis.com/ajax/libs/jquery/.min.js"></script>
        <script src="./resources/bootstrap-5.3.0-alpha3-dist/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="./resources/bootstrap-5.3.0-alpha3-dist/css/bootstrap.min.css">   
        <link rel="stylesheet" href="./resources/Custom/style.css">  
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class="position-absolute top-0 start-50 translate-middle-x" style=" background-color: #FFF5E4;">

        <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="./resources/imgs/Logo_VCC.png" class="w-25"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a style="margin: 5%;" class="nav-link active" aria-current="page" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                <a style="margin: 5%;" class="nav-link" href="products.php">Products</a>
                </li>
                <li class="nav-item">
                <a style="margin: 5%;" class="nav-link" href="cart.php"><img src="./resources/Icons/cart.png" class="w-50"></a>
                </li>
                <li class="nav-item">
                <a style="margin: 5%;" class="nav-link" href="account.php"><img src="./resources/Icons/profile.png" class="w-50"></a>
                </li>
            </ul>
            </div>
        </div>
        </nav>

        <div class="carouselcontainer">
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner" id="carousel-inner">
                    <div class="carousel-item active">
                    <img src="./resources/imgs/Bee's.jpeg" class="w-100">
                    </div>
                    <div class="carousel-item">
                    <img src="./resources/imgs/Cherry_0.1.jpeg" class="w-100">
                    </div>
                    <div class="carousel-item">
                    <img src="./resources/imgs/miniBongs.jpeg" class="w-100">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>


        <div class="container text-center">
            <h1>
                About Me
            </h1>

            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris fringilla eget lectus at lobortis. <br>
                Duis egestas erat semper lacus tristique, vitae mattis magna eleifend. Proin aliquam semper lorem, <br>
                in sagittis risus luctus ut. Nam id magna molestie quam lobortis pulvinar suscipit at diam. Fusce aliquet, <br>
                elit eu vulputate rhoncus, magna erat placerat massa, eget facilisis purus ligula ut lacus. Donec mauris mauris, <br>
                dignissim tristique volutpat ut, sollicitudin a est. Etiam ante est, placerat in mollis a, tempor et dolor. <br>
                Proin consectetur, enim eget aliquet sollicitudin, neque libero consectetur sem, in auctor mi tellus ut massa.
            </p>


            <img src="./resources/imgs/ProfilePicEdit.png" class="rounded"> <br><br><br><br><br><br>
        </div>

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
                            <a href="#">
                                <button type="button" class="btn btn-success" data-toggle="modal" style="font-size: 40px;">More</button>
                                <br><br><br><br><br>    
                            </a>
                        </div>
                    <?php endwhile ?>
                </div>
            </div>
        </div>

        <footer class="text-center text-white">
            <!-- Grid container -->
            <div class="container p-4 pb-0">
                <!-- Section: Social media -->
                <section class="d-flex">
                <!-- Facebook -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                    ><i class="fab fa-facebook-f"><img src="./resources/icons/facebook.png" class="w-25"></i
                ></a>

                <!-- Twitter -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                    ><i class="fab fa-twitter"><img src="./resources/icons/twitter.png" class="w-25"></i
                ></a>

                <!-- Google -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                    ><i class="fab fa-google"><img src="./resources/icons/pinterest.png" class="w-25"></i
                ></a>

                <!-- Instagram -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                    ><i class="fab fa-instagram"><img src="./resources/icons/instagram.png" class="w-25"></i
                ></a>
                </section>
                <!-- Section: Social media -->
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2023 Copyright:
                <a class="text-white" href="https://michaeltocaci.com/">Vera Crochet Craft</a>
            </div>
            <!-- Copyright -->
        </footer>
    
</body>
</html>
