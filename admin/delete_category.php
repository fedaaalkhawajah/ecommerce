<?php
include ('includes/connection.php');
$query = "delete from category where category_id = {$_GET['id']}";
mysqli_query($conn,$query);
header("location:manage_category.php");
?>