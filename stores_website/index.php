<?php
include_once "util/DB_CONNECTION.php";

if (isset($_POST['store_name'])) {
    $store_name = $_POST['store_name'];
    $query = "Select * from store where name like '%".$store_name."%'";
    $results = mysqli_query($connection, $query);
}

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

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

                    <h4 class="title text-center text-uppercase">Search whatever you want!</h4>
                 <!-- store -->
				<?php
                if (!empty($_POST['store_name'])) {
                    while ($store = mysqli_fetch_assoc($results)) {
                        $path = "../dashboard/uploads/images/" . $store['logo_image'];
                        echo
                            '<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
							     <img src="' . $path . '" alt=' . $store['name'] . ' width="300px" height="250px">
							</div>
							<div class="shop-body">
								<h3>'.$store['name'].'</h3>
								<a href="store_page.php?store_id='.$store['id'].'" class="cta-btn"> View now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>';
                    }
                }
				?>
                    <!-- store -->

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- HOT DEAL SECTION -->
		<div id="hot-deal" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="hot-deal">
							<ul class="hot-deal-countdown">
								<li>
									<div>
										<h3>09</h3>
										<span>Fashion</span>
									</div>
								</li>
								<li>
									<div>
										<h3>10</h3>
										<span>Tech</span>
									</div>
								</li>
								<li>
									<div>
										<h3>34</h3>
										<span>Game</span>
									</div>
								</li>
								<li>
									<div>
										<h3>17</h3>
										<span>Book</span>
									</div>
								</li>
							</ul>
							<h2 class="text-uppercase">Top rated stores this week</h2>
							<p>Check them out</p>
							<a class="primary-btn cta-btn" href="#">View now</a>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /HOT DEAL SECTION -->

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
