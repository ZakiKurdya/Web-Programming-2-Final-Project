<?php
include_once "util/DB_CONNECTION.php";
session_start();

if (isset($_POST['store_id'])) {
    $store_id = $_POST['store_id'];
} else if (isset($_GET['store_id'])) {
    $store_id = $_GET['store_id'];
}

$query = "Select * FROM store WHERE id = ".$store_id;
$result = mysqli_query($connection, $query);
$store_data = mysqli_fetch_assoc($result);

$getCategory = "SELECT * FROM category WHERE id =".$store_data['category_id'];
$result1 = mysqli_query($connection, $getCategory);
$categories = mysqli_fetch_assoc($result1);

if (isset($_POST['rating'])) {
    if (!isset($_SESSION["'".$store_data['name']."'"])) {
        $_SESSION["'".$store_data['name']."'"] = true;
        $increment_query = "INSERT INTO rating (rating, store_id) VALUES (".$_POST['rating'].",".$_POST['store_id'].")";
        mysqli_query($connection, $increment_query);
    }
}

$select_query = "SELECT AVG(rating) AS rating FROM rating WHERE store_id = $store_id";
$avg_result = mysqli_query($connection, $select_query);
$avg_rating = intval(mysqli_fetch_assoc($avg_result)['rating']);
?>

<!DOCTYPE html>
<html lang="en">

<?php
include "component/head.php";
?>

<body>
<?php
include "component/header.php";
include "component/navbar.php";
?>

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <li><a href="show_category.php?category_id=<?php echo $store_data['category_id']?>"><?php echo $categories['name']?></a></li>
                    <li class="active"><?php echo $store_data['name']?></li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- Product main img -->
            <div class="col-md-4 col-md-push-2">
                <div id="product-main-img">
                    <div class="product-preview">
                        <img src="../dashboard/uploads/images/<?php echo $store_data['logo_image']?>" alt="Missing photo">
                    </div>
                </div>
            </div>
            <!-- /Product main img -->

            <!-- Product thumb imgs -->
            <div class="col-md-3  col-md-pull-4"></div>
            <!-- /Product thumb imgs -->

            <!-- Product details -->
            <div class="col-md-5">
                <div class="product-details">
                    <h2 class="product-name"><?php echo $store_data['name']?></h2>
                    <div>
                        <div class="product-rating">
                            <?php
                            for ($i=1; $i<=$avg_rating; $i++) {
                                echo ' <i class="fa fa-star"></i> ';
                            }
                            for ($i=1; $i<= 5-$avg_rating; $i++) {
                                echo ' <i class="fa fa-star-o"></i> ';
                            }
                            ?>
                        </div>
                    </div>

                    <br>

                    <p><?php echo $store_data['description']?></p>

                    <ul class="product-links">
                        <li>Category:</li>
                        <li><a href="show_category.php?category_id=<?php echo $store_data['category_id']?>"><?php echo $categories['name']?></a></li>
                    </ul>
                </div>
            </div>
            <!-- /Product details -->

            <!-- Product tab -->
            <div class="col-md-12">
                <div id="product-tab">
                    <!-- product tab nav -->
                    <ul class="tab-nav">
                        <li><a data-toggle="tab" href="#tab3">Reviews</a></li>
                    </ul>
                    <!-- /product tab nav -->

                    <!-- product tab content -->
                    <div class="tab-content">
                        <!-- tab3  -->
                        <div id="tab3" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-md-4"></div>

                                <!-- Review Form -->
                                <div class="col-md-4" style="text-align: center">
                                    <div id="review-form">
                                        <form class="review-form" action="store_page.php" method="post">
                                            <input type="hidden" name="store_id" value="<?php echo $store_id?>">
                                            <div class="input-rating">
                                                <span>Your Rating: </span>
                                                <div class="stars">
                                                    <input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
                                                    <input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
                                                    <input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
                                                    <input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
                                                    <input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
                                                </div>
                                            </div>
                                            <button class="primary-btn">Submit</button>
                                        </form>
                                    </div>
                                </div>
                                <!-- /Review Form -->
                            </div>
                        </div>
                        <!-- /tab3  -->
                    </div>
                    <!-- /product tab content  -->
                </div>
            </div>
            <!-- /product tab -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

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