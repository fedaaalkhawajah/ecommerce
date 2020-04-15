<?php
include ('includes/connection.php');
$query = "delete from product where product_id = {$_GET['id']}";
mysqli_query($conn,$query);
header("location:manage_product.php");
?>