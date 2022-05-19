<?php
include "../components/DB_CONNECTION.php";

$id = $_POST['id'];

$query = "DELETE from admin where id = $id";
$result=mysqli_query($connection,$query);

if($result){
    header("Location:show_admins.php");
}