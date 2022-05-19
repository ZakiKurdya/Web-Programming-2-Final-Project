<?php

$connection = mysqli_connect("localhost","root","","stores_rating_system");

if (!$connection){
    die("Error".mysqli_connect_error());
}