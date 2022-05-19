<?php
include_once "../components/DB_CONNECTION.php";

$errors =[];
$success = false;

if ($_SERVER['REQUEST_METHOD']=="POST") {
    $name = $_POST['a-name'];
    $phone = $_POST['a-phone'];
    $email = $_POST['email'];
    if (empty($_POST['pass'])) {
        $errors['password'] = "Password is Required. Please fill it";
    }

    $password = md5($_POST['pass']);
    $address = $_POST['address'];
    $description = $_POST['description'];
    isset($_POST['status']) ? $status = $_POST['status'] : $status = 0;


    if (empty($name)) {
        $errors['name-error'] = "Name is Required. Please fill it";
    }

    if (empty($phone)) {
        $errors['phone-error'] = "Phone Number is Required. Please fill it";
    }

    if (empty($email)) {
        $errors['email-error'] = "Email is Required. Please fill it";
    }
    if (empty($password)) {
        $errors['passw'] = "Password is Required. Please fill it";
    }

    if (empty($address)) {
        $errors['add'] = "Address is Required. Please fill it";
    }
    if (empty($description)) {
        $errors['des'] = "Description is Required. Please fill it";
    }

    if (count($errors) > 0) {
        $errors['general_error'] = "please fix all errors";
    } else {
        $query = "INSERT INTO admin (name, phone, email, password, status, address, description)
                  VALUES('$name', '$phone', '$email', '$password', '$status', '$address', ' $description')";
        $result = mysqli_query($connection, $query);

        if ($result) {
            $errors=[];
            $success = true;
        } else {
            $errors['general-errors'] = mysqli_error($connection);
            echo "Error".mysqli_error($connection);
        }
    }
}
?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<?php
include "../components/header.php";
?>

<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click"
      data-menu="vertical-menu-modern" data-col="2-columns">

<!-- fixed-top-->
<?php include "../components/nav.php" ?>
<?php include "../components/sidebar.php" ?>

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row"></div>
        <div class="content-body">

            <!-- Basic form layout section start -->
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-form">Admin Info</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">

                                    <?php
                                    if (!empty($errors['general_error'])) {
                                        echo "<div class='alert alert-danger'>" . $errors["general_error"] . "</div>";
                                    } elseif ($success) {
                                        echo "<div class='alert alert-success'>Admin Added Successfully</div>";
                                    }
                                    ?>

                                    <form class="form" method="post" action=" <?php echo $_SERVER['PHP_SELF'] ?>">
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-user"></i>Add New Admin</h4>
                                            <div class="row">
                                                    <!-- Name -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">Name</label>
                                                            <input type="text" id="projectinput1" class="form-control"
                                                                   placeholder="Admin name" name="a-name">
                                                            <?php
                                                            if (!empty($errors['name-error'])) {
                                                                echo "<span class='text-danger'>" . $errors['name-error'] . "</span>";
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <!-- Name -->

                                                     <!-- Phone -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput2">Phone</label>
                                                            <input type="text" id="projectinput2" class="form-control"
                                                                   placeholder="Phone Number" name="a-phone">
                                                            <?php
                                                            if (!empty($errors['phone-error'])) {
                                                                echo "<span class='text-danger'>" . $errors['phone-error'] . "</span>";
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <!-- Phone -->

                                                    <!-- Email -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput3">Email</label>
                                                            <input type="email" id="projectinput3" class="form-control"
                                                                   placeholder="Email" name="email">
                                                            <?php
                                                            if (!empty($errors['email-error'])) {
                                                                echo "<span class='text-danger'>" . $errors['email-error'] . "</span>";
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <!-- Email -->

                                                    <!-- Password -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput4">Password</label>
                                                            <input type="password" id="projectinput4" class="form-control"
                                                                   placeholder="Password" name="pass">
                                                            <?php
                                                            if (!empty($errors['password'])) {
                                                                echo "<span class='text-danger'>" . $errors['password'] . "</span>";
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <!-- Password -->

                                                    <!-- Address -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput3">Address</label>
                                                            <input type="text" id="projectinput3" class="form-control"
                                                                   placeholder="Address" name="address">
                                                            <?php
                                                            if (!empty($errors['add'])) {
                                                                echo "<span class='text-danger'>" . $errors['add'] . "</span>";
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <!-- Address -->

                                                    <!-- Description -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput4">Description</label>
                                                            <input type="text" id="projectinput4" class="form-control"
                                                                   placeholder="Description" name="description">

                                                            <?php
                                                            if (!empty($errors['des'])) {
                                                                echo "<span class='text-danger'>" . $errors['des'] . "</span>";
                                                            }
                                                            ?>

                                                        </div>
                                                    </div>
                                                    <!-- Description -->

                                                    <!-- Status -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                         <label for="projectinput3">Status</label>
                                                         <input type="checkbox" placeholder="status" value="1" name="status">
                                                        </div>
                                                    </div>
                                                    <!-- Status -->
                                            </div>
                                        <div class="form-actions">
                                            <a href="show_admins.php">
                                                <button type="button" class="btn btn-warning mr-1">
                                                    <i class="ft-x"></i> Cancel
                                                </button>
                                            </a>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="la la-check-square-o"></i> Save
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- // Basic form layout section end -->
        </div>
    </div>
</div>

<?php
include "../components/footer.php";
?>

</body>
</html>