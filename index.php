<?php
    $con = mysqli_connect('localhost', 'root', '', 'veracrochet'); // Add the database password and name
?>


<!DOCTYPE html>
<html lang="en">

<head>
        <title> Vera Cochet Craft </title>
        <script src="https://ajax.com.googleapis.com/ajax/libs/jquery/.min.js"></script>
        <script src="./resources/bootstrap-5.3.0-alpha3-dist/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="./resources/bootstrap-5.3.0-alpha3-dist/css/bootstrap.min.css">   
        <meta charset="UTF-8">
        <me ta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body style=" background-color: #FFF5E4;">

        <nav class="navbar navbar-expand-lg">
        <div class="container-fluid d-flex">
            <a class="navbar-brand justify-content-start" href="#">
                <img src="./resources/imgs/Logo_VCC.png" class="w-100" style="max-width: 150px;">
                Vera's Crochet Craft
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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

        <div class="d-flex justify-content-center topimg">'
            <a href="">
            <img src="./resources/imgs/Edits/topimg_1.png" href="#" class="img-fluid">
            </a>
        </div> 

        <br><br>


        <div class="container text-center">
    <br><br><br>
    <div class="row row-cols-3">
    <?php 
            $select_products = "SELECT * FROM products"; // Remove the WHERE clause, or specify a condition if needed
            $products = mysqli_query($con, $select_products);
            while ($product = mysqli_fetch_assoc($products)): 
            ?>
            <div class="col" style="display: none;">
                <h2 style="font-size: 1.5rem;"><?= $product['title']; ?></h2>
                <img src="<?= $product['image'] ?>" alt="<?= $product['title'] ?>" class="w-50 rounded">
                <p class="lprice" style="font-size: 2rem;">€ <?= $product['price'] ?></p>
                <a href="<?= $product['url'] ?>">
                    <button type="submit"
                            class="btn btn-primary"
                            data-toggle="modal"
                            style="font-size: 2rem; background-color: #FFC4C4; color: #850E35; border: none;">
                        More
                    </button>
                </a>
                <br><br>
                <!-- Add to Cart Button -->
                <form action="cart.php" method="POST">
                    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                    <button type="submit" class="btn btn-success" style="font-size: 2rem;">Add to Cart</button>
                </form><br><br><br>
                <!-- End of Add to Cart Button -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                <script>
                    $(document).ready(function() {
                        $('.col').fadeIn(1000); // Fade in the div over 1 second (1000 milliseconds)
                    });
                </script>
            </div>
        <?php endwhile ?>
    </div>
</div>

        <br><br><br><br>

        <div class="container text-center">
            <h1>
                About Me
            </h1>

            <br><br>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris fringilla eget lectus at lobortis. <br>
                Duis egestas erat semper lacus tristique, vitae mattis magna eleifend. Proin aliquam semper lorem, <br>
                in sagittis risus luctus ut. Nam id magna molestie quam lobortis pulvinar suscipit at diam. Fusce aliquet, <br>
                elit eu vulputate rhoncus, magna erat placerat massa, eget facilisis purus ligula ut lacus. Donec mauris mauris, <br>
                dignissim tristique volutpat ut, sollicitudin a est. Etiam ante est, placerat in mollis a, tempor et dolor. <br>
                Proin consectetur, enim eget aliquet sollicitudin, neque libero consectetur sem, in auctor mi tellus ut massa.
            </p>

            <br><br>

            <img src="./resources/imgs/ProfilePicEdit.png" class="w-50 rounded"> <br><br><br><br><br><br>
        </div>

        <footer class="text-center text-white rounded" style="background-color: #EE6983;" >
            <!-- Grid container -->
            <div class="container p-4 pb-0">
                <!-- Section: Social media -->
                <section class="d-flex">
                <!-- Facebook -->
                <a class="btn btn-floating m-1" href="" role="button"
                    ><i class="fab fa-facebook-f"><img src="./resources/icons/facebook.png" style="width: 50px;"></i
                ></a>

                <!-- Twitter -->
                <a class="btn btn-floating m-1" href="#!" role="button"
                    ><i class="fab fa-twitter"><img src="./resources/icons/twitter.png" style="width: 50px;"></i
                ></a>

                <!-- Google -->
                <a class="btn btn-floating m-1" href="#!" role="button"
                    ><i class="fab fa-google"><img src="./resources/icons/pinterest.png" style="width: 50px;"></i
                ></a>

                <!-- Instagram -->
                <a class="btn  btn-floating m-1" href="https://www.instagram.com/verascrochetcrafts/" role="button"
                    ><i class="fab fa-instagram"><img src="./resources/icons/instagram.png" style="width: 50px;"></i
                ></a>
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
