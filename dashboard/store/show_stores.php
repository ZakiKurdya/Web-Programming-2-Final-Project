<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<?php
include "../components/header.php";
?>

<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

<!-- fixed-top-->
<?php include "../components/nav.php"?>
<?php include "../components/sidebar.php"?>

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-body">

            <!-- Basic form layout section start -->
            <div id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="content-body">
                                        <section id="dom">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h4 class="card-title">All Stores</h4>
                                                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                                            <div class="heading-elements">
                                                                <ul class="list-inline mb-0">
                                                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                                                </ul>
                                                            </div>

                                                            <div class="card-content collapse show">
                                                                <div class="card-body card-dashboard">
                                                                    <table style="width: 100%" class="table display nowrap table-striped table-bordered scroll-horizontal ">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>Store Name</th>
                                                                            <th>Description</th>
                                                                            <th>Address</th>
                                                                            <th>Phone Number</th>
                                                                            <th>Category</th>
                                                                            <th>Logo</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>

                                                                        <?php
                                                                        include_once "../components/DB_CONNECTION.php";
                                                                        $limit = 3;
                                                                        $page = isset($_GET['page1']) ? $_GET['page1'] : 1;
                                                                        $offset = ($page - 1) * $limit;
                                                                        $query = "select * from store limit $limit offset $offset";

                                                                        $result = mysqli_query($connection, $query);

                                                                        if (mysqli_num_rows($result) > 0) {
                                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                                $query = "select name from category where id = ".$row['category_id'];
                                                                                $R = mysqli_query($connection, $query);
                                                                                $category_row = mysqli_fetch_assoc($R);

                                                                                echo "<tr>" .
                                                                                     "<td>" . $row['name'] . "</td>" .
                                                                                     "<td>" . $row['description'] . "</td>" .
                                                                                     "<td>" . $row['address'] . "</td>" .
                                                                                     "<td>" . $row['phone_number'] . "</td>" .
                                                                                     "<td>" . $category_row['name']. "</td>";
                                                                                echo "<td>";
                                                                                echo "<img src='../uploads/images/" . $row['logo_image'] . "' width='100px' height='100px'/>";
                                                                                echo "</td>";

                                                                                echo "<td>
                                                                                            <a href='edit_store.php?id=" . $row['id'] . "' 
                                                                                            class='btn btn-outline-primary  box-shadow-3 mr-1 mb-1'>
                                                                                            <i class='icon-eye'></i></a>

                                                                                            <a href='delete_store.php?id=" . $row['id'] . "' 
                                                                                            class='btn btn-danger delete_product'
                                                                                               id='delete-btn'>
                                                                                               DELETE
                                                                                            </a>
                                                                                   </td>". "</tr>";
                                                                            }
                                                                        }
                                                                        ?>
                                                                        </tbody>
                                                                    </table>

                                                                    <div class="justify-content-center d-flex"></div>
                                                                    <div class="col-12"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="justify-content-center d-flex">

                <div class="row">
                    <div class="col-md-12">
                        <?php
                        $query = "SELECT count(id) as row_no from store";
                        $result = mysqli_query($connection, $query);
                        $row = mysqli_fetch_assoc($result);
                        $page_count = ceil($row['row_no'] / $limit);
                        echo "<ul class='pagination'>";
                        for ($i = 1; $i <= $page_count; $i++) {
                            echo "<li class='page-item'><a class='page-link' href='show_stores.php?page1=$i'>$i</a></li>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "../components/footer.php";
?>

</body>
</html>