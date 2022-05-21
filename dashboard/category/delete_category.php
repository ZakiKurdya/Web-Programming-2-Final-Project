<?php
require_once "../components/DB_CONNECTION.php";

$id = $_POST['id'];
$query1 = "DELETE FROM store WHERE category_id=".$id;
$result1 = mysqli_query($connection, $query1);

if ($result1) {
    $query2 = "DELETE FROM category WHERE id=".$id;
    $result2 = mysqli_query($connection, $query2);
}

if ($result2){
    header('Location:show_category.php');
}

