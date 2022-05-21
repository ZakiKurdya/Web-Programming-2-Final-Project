<?php
include "util/DB_CONNECTION.php";
$category_id = $_GET['category_id'];
$query1 = "SELECT * from store where category_id = $category_id";
$result1 = mysqli_query($connection,$query1);
?>

<!DOCTYPE html>
<html lang="en">

<?php
include 'component/head.php';
?>

<body>

<?php
include 'component/header.php';
include 'component/navbar.php';
?>


<!-- Section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-md-12">
                <div class="section-title text-center">
                    <h3 class="title">Related Stores</h3>
                </div>
            </div>

            <?php
            while ($store = mysqli_fetch_assoc($result1)){
                $path = "../dashboard/uploads/images/".$store['logo_image'];
                echo '  <div class="col-md-3 col-xs-6" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
                <div class="product">
                    <div class="product-img">' .
                       '<img src="'.$path.'" alt='.$store['name'].' width="300px" height="250px">
                    </div>
                    <div class="product-body">
                        <p class="product-category">Store</p>
                        <h3 class="product-name"><a href="#">'.$store['name'].'</a></h3>';

                   echo '<form action="store_page.php" method="post">';
                  echo "<input type='hidden' name='store_id' value='" . $store['id'] . "'/>
                        <div class='product-btns'>
                            <button class='quick-view' ><i class='fa fa-eye'></i><span class='tooltipp'>quick view</span></button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>";
            }
            ?>

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /Section -->

<!-- NEWSLETTER -->
<div id="newsletter" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="newsletter">
                    <p>Sign Up for the <strong>NEWSLETTER</strong></p>
                    <form>
                        <input class="input" type="email" placeholder="Enter Your Email">
                        <button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
                    </form>
                    <ul class="newsletter-follow">
                        <li>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /NEWSLETTER -->

<?php
include "component/footer.php";
?>

</body>
</html>