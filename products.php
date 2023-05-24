<?php
    $con = mysqli_connect('localhost','root');
    mysqli_select_db($con, 'veracrochet');
    $sql = "SELECT * FROM producten WHERE featured>0";
    $featured = $con->query($sql);

?>


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
                            <a href="Frog.php">
                                <button type="button" class="btn btn-success" data-toggle="modal" style="font-size: 40px;">More</button>
                                <br><br><br><br><br>    
                            </a>
                        </div>
                    <?php endwhile ?>
                </div>

                <footer class="text-center text-white rounded" style="background-color: #EE6983;" >
            <!-- Grid container -->
            <div class="container p-4 pb-0">
                <!-- Section: Social media -->
                <section class="d-flex">
                <!-- Facebook -->
                <a class="btn btn-floating m-1" href="" role="button"
                    ><i class="fab fa-facebook-f"><img src="./resources/icons/facebook.png" class="w-25"></i
                ></a>

                <!-- Twitter -->
                <a class="btn btn-floating m-1" href="#!" role="button"
                    ><i class="fab fa-twitter"><img src="./resources/icons/twitter.png" class="w-25"></i
                ></a>

                <!-- Google -->
                <a class="btn btn-floating m-1" href="#!" role="button"
                    ><i class="fab fa-google"><img src="./resources/icons/pinterest.png" class="w-25"></i
                ></a>

                <!-- Instagram -->
                <a class="btn  btn-floating m-1" href="https://www.instagram.com/verascrochetcrafts/" role="button"
                    ><i class="fab fa-instagram"><img src="./resources/icons/instagram.png" class="w-25"></i
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