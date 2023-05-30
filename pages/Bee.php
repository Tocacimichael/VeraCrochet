<?php
    $con = mysqli_connect('localhost','root');
    mysqli_select_db($con, 'veracrochet');
    $sql = "SELECT * FROM products WHERE id=8";
    $products = $con->query($sql);
    $sql1 = "SELECT * FROM navbar WHERE id";
    $navbar = $con->query($sql1);
?>


<!DOCTYPE html>
<html lang="en">

<head>
        <title> Vera Cochet Craft </title>
        <script src="https://ajax.com.googleapis.com/ajax/libs/jquery/.min.js"></script>
        <script src="../resources/bootstrap-5.3.0-alpha3-dist/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../resources/bootstrap-5.3.0-alpha3-dist/css/bootstrap.min.css">   
        <meta charset="UTF-8">
        <me ta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body style=" background-color: #FFF5E4;">

        <nav class="navbar navbar-expand-lg">
        <div class="container-fluid d-flex">
            <a class="navbar-brand justify-content-start" href="index.php">
                <img src="../resources/imgs/Logo_VCC.png" class="w-100" style="max-width: 150px;">
                Vera's Crochet Craft
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
            </span>
            </button>
            <div class="d-flex justify-content-end">
            <div class="collapse navbar-collapse" id="navbarNav"> 
                <ul class="navbar-nav">            
                <?php while ($url = $navbar->fetch_assoc()): ?> 
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= $url['url'] ?>"> 
                        <img style="width: 50px;" src="<?= $url['image'] ?>"></a>
                    </li>             
                <?php endwhile ?>
                </ul> 
            </div>
            </div>
        </div>
        </nav>

        <div class="container text-center">
            <?php while ($url = $navbar->fetch_assoc()): ?>
            <a href="<?= $url['url'] ?>"><h2>Products</h2></a>
            <?php endwhile ?>
            <br><br><br>
            <div class="row row-cols-3">
                    <?php
                    while ($product = $products ->fetch_assoc()):
                    ?>
                        <div class="col">
                            <h2 style=" font-size: 1.5rem;"><?= $product['title']; ?></h2>
                            <img src="<?= $product['image'] ?>" alt="<?= $product['title'] ?>" class="w-50 rounded">
                            <p class="lprice" style="font-size: 2rem;"> € <?= $product['price'] ?></p>
                            <p> <?= $product['description'] ?> </p>
                            <a href="<?= $product['url'] ?>">
                                <button type="submit" class="btn btn-primary" data-toggle="modal" style="font-size: 2rem; background-color: #FFC4C4; color: #850E35; border: none;">More</button> 
                            </a> <br><br><br>
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

        <footer class="text-center text-white rounded" style="background-color: #EE6983;" >
            <!-- Grid container -->
            <div class="container p-4 pb-0">
                <!-- Section: Social media -->
                <section class="d-flex">
                <!-- Facebook -->
                <a class="btn btn-floating m-1" href="" role="button"
                    ><i class="fab fa-facebook-f"><img src="../resources/icons/facebook.png" style="width: 50px;"></i
                ></a>

                <!-- Twitter -->
                <a class="btn btn-floating m-1" href="#!" role="button"
                    ><i class="fab fa-twitter"><img src="../resources/icons/twitter.png" style="width: 50px;"></i
                ></a>

                <!-- Google -->
                <a class="btn btn-floating m-1" href="#!" role="button"
                    ><i class="fab fa-google"><img src="../resources/icons/pinterest.png" style="width: 50px;"></i
                ></a>

                <!-- Instagram -->
                <a class="btn  btn-floating m-1" href="https://www.instagram.com/verascrochetcrafts/" role="button"
                    ><i class="fab fa-instagram"><img src="../resources/icons/instagram.png" style="width: 50px;"></i
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
