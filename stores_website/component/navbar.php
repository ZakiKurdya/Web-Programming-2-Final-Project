<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>

                <?php
                include_once 'util/DB_CONNECTION.php';

                $query = "SELECT * from category";

                $result= mysqli_query($connection,$query);

                while ($row = mysqli_fetch_assoc($result)){
                  $id = $row['id'];
                    echo '<li><a href="show_category.php?category_id='.$row['id'].'">'.$row['name'].'</a></li>';
                }
                ?>

            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->