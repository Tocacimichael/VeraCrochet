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

<body class="position-absolute top-0 start-50 translate-middle-x">

        <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="./resources/imgs/Logo_VCC.png" class="w-25"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Products</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Something</a>
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


            <img src="./resources/imgs/ProfilePicEdit.png" class="rounded">
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
                            <p class="lprice">€ <?= $product['price'] ?></p>
                            <a href="Frog.php">
                                <button type="button" class="btn btn-success" data-toggle="modal">More</button>
                            </a>
                        </div>
                    <?php endwhile ?>
                </div>
            </div>
        </div>

        <footer>

            <div class="socials">
                
                <div class="inta">
                    <img src="./resources/Icons/instagram.png" class="w-25">  
                </div>
                <div class="pinterest">
                    <img src="./resources/Icons/pinterest.png" class="w-25">
                </div>
                <div class="twitter">
                    <img src="./resources/Icons/twitter.png" class="w-25">  
                </div>
                <div class="facebook">
                    <img src="./resources/Icons/facebook.png" class="w-25">
                </div>
            </div>
            <div class="logo_img">
                <img src="./resources/imgs/Logo_VCC.png" alt="Logo" class="w-25">
            </div>
        </footer>
    
</body>
</html>
