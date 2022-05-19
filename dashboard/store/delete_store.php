<?php
require_once "../components/DB_CONNECTION.php";

$id = $_GET['id'];

$query = "DELETE FROM store WHERE id=".$id;
$result = mysqli_query($connection,$query);

if ($result){
    header('Location:show_stores.php');
}