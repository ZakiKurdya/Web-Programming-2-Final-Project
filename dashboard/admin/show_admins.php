<!doctype html>
<html class="loading" lang="en" data-textdirection="ltr">

<?php
include "../components/header.php";
?>

<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click"
      data-menu="vertical-menu-modern" data-col="2-columns">

<!-- fixed-top-->
<?php
include "../components/nav.php";
include "../components/sidebar.php";
?>

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row"></div>
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
                                                            <h4 class="card-title">All Admins</h4>
                                                            <a class="heading-elements-toggle"><i
                                                                        class="la la-ellipsis-v font-medium-3"></i></a>
                                                            <div class="heading-elements">
                                                                <ul class="list-inline mb-0">
                                                                    <li><a data-action="reload"><i
                                                                                    class="ft-rotate-cw"></i></a></li>
                                                                    <li><a data-action="expand"><i
                                                                                    class="ft-maximize"></i></a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="card-content collapse show">
                                                                <div class="card-body card-dashboard">
                                                                    <table class="table display nowrap table-striped table-bordered scroll-horizontal ">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>Name</th>
                                                                            <th>Phone</th>
                                                                            <th>Email</th>
                                                                            <th>Status</th>
                                                                            <th>Address</th>
                                                                            <th>Description</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <?php
                                                                        include_once "../components/DB_CONNECTION.php";
                                                                        $limit = 3;
                                                                        $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                                                        $offset = ($page - 1) * $limit;
                                                                        $query = "select * from admin limit $limit offset $offset";

                                                                        $result = mysqli_query($connection, $query);
                                                                        if (mysqli_num_rows($result) > 0) {
                                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                                if ($row['status'] == 1) {
                                                                                    $status = "<span class='badge badge-success'>Active</span>";
                                                                                } else {
                                                                                    $status = "<span class='badge badge-danger'>Block</span>";
                                                                                }
                                                                                echo "<tr>" .
                                                                                     "<td>" . $row['name'] . "</td>" .
                                                                                     "<td>" . $row['phone'] . "</td>" .
                                                                                     "<td>" . $row['email'] . "</td>" .
                                                                                     "<td>" . $status . "</td>" .
                                                                                     "<td>" . $row['address'] . "</td>" .
                                                                                     "<td>" . $row['description'] . "</td>";

                                                                                if ($row['id'] != $_SESSION['active_user']) {
                                                                                    echo "<td><a href='edit_admin.php?id=" . $row['id'] . "' 
                                                                                  class='btn btn-outline-primary  box-shadow-3 mr-1 mb-1'>
                                                                                  <i class='icon-eye'></i></a>" . "</td>"
                                                                                  . "<td><form class='c_form' action='delete_admin.php' method='post'>
                                                                                 <input type='hidden' value='" . $row['id'] . "' name='id'>
                                                                                 <input type='submit' class='btn btn-danger delete_category'
                                                                                 id='delete-btn' value='delete'/>
                                                                           </form>
                                                                           </td>"."</tr>";
                                                                                }
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

            <div class="col-md-12" style="margin: auto; width: 300px">
                <?php
                $query = "SELECT count(id) as row_no from admin ";
                $result = mysqli_query($connection, $query);
                $row = mysqli_fetch_assoc($result);
                $page_count = ceil($row['row_no'] / $limit);
                echo "<ul class='pagination'>";
                for ($i = 1; $i <= $page_count; $i++) {
                    echo "<li class='page-item'><a class='page-link' href='show_admins.php?page=$i'>$i</a></li>";
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php
include "../components/footer.php";
?>

</body>
</html>