<?php
//this code to delete admin according to specific id get it from URL using $_GET...
include ('includes/connection.php');//connect data base
$query = "delete from admin where admin_id = {$_GET['id']}";
mysqli_query($conn,$query);
header("location:manage_admin.php");//redirect the page..
?>