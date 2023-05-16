<?php
    $con = mysqli_connect('localhost','root');
    mysqli_select_db($con, 'veracrochet');
    $sql = "SELECT * FROM producten WHERE featured=1";
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