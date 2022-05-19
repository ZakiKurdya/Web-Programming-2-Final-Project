<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a href="../main/index.php"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">Dashboard</span></a></li>

            <!-- Admins -->
            <li class=" nav-item"><a href="#"><i class="la la-television"></i><span class="menu-title" data-i18n="nav.templates.main">Admins</span>
                    <span class="badge badge badge-info badge-pill float-right mr-2">
                        <?php
                        include_once "../components/DB_CONNECTION.php";
                        $query = "select * from admin";
                        $result = mysqli_query($connection, $query);
                        echo mysqli_num_rows($result);
                        ?>
                    </span></a>
                <ul class="menu-content">
                    <ul class="menu-content">
                        <li><a class="menu-item" href="../admin/add_admin.php" data-i18n="nav.templates.horz.classic">➕ Add New Admin</a></li>
                        <li><a class="menu-item" href="../admin/show_admins.php" data-i18n="nav.templates.horz.top_icon">🔎 Show All Admins</a></li>
                    </ul>
                </ul>
            </li>
            <!-- Admins -->


            <!-- Categories -->
            <li class=" nav-item"><a href="#"><i class="la la-tasks"></i><span class="menu-title" data-i18n="nav.templates.main">Categories</span>
                    <span class="badge badge-pill badge-success float-right  mr-2">
                        <?php
                         include_once "../components/DB_CONNECTION.php";
                         $query = "select * from category";
                         $result = mysqli_query($connection, $query);
                         echo mysqli_num_rows($result);
                        ?>
                    </span></a>
                <ul class="menu-content">
                    <ul class="menu-content">
                        <li><a class="menu-item" href="../category/add_category.php" data-i18n="nav.templates.horz.classic">➕ Add New Category</a></li>
                        <li><a class="menu-item" href="../category/show_category.php" data-i18n="nav.templates.horz.top_icon">🔎 Show All Categories</a></li>
                    </ul>
                </ul>
            </li>
            <!-- Categories -->


            <!-- Stores -->
            <li class=" nav-item"><a href="#"><i class="la la-money"></i><span class="menu-title" data-i18n="nav.templates.main">Stores</span>
                    <span class="badge badge-pill badge-warning float-right  mr-2">
                        <?php
                        include_once "../components/DB_CONNECTION.php";
                        $query = "select * from store";
                        $result = mysqli_query($connection, $query);
                        echo mysqli_num_rows($result);
                        ?>
                    </span></a>
                <ul class="menu-content">
                    <ul class="menu-content">
                        <li><a class="menu-item" href="../store/add_store.php" data-i18n="nav.templates.horz.classic">➕ Add New Store</a></li>
                        <li><a class="menu-item" href="../store/show_stores.php" data-i18n="nav.templates.horz.top_icon">🔎 Show All Stores</a></li>
                    </ul>

                </ul>
            </li>
            <!-- Stores -->

            <!-- Ratings -->
            <li class=" nav-item"><a href="#"><i class="la la-star"></i><span class="menu-title" data-i18n="nav.templates.main">Ratings</span>
                    <span class="badge badge-pill badge-danger   float-right  mr-2">
                        <?php
                        include_once "../components/DB_CONNECTION.php";
                        $query = "select * from rating";
                        $result = mysqli_query($connection, $query);
                        echo mysqli_num_rows($result);
                        ?>
                    </span></a>
                <ul class="menu-content">
                    <ul class="menu-content">
                        <li><a class="menu-item" href="../rating/show_rating.php" data-i18n="nav.templates.horz.top_icon">🔎 Show All Ratings</a></li>
                    </ul>

                </ul>
            </li>
            <!-- Ratings -->
    </div>
</div>