<?php
require('includes/connection.php');
//make code run when user click on save button
if(isset($_POST['submit'])){
    $category    = $_POST['category_name'];
    //open connection to data base from include file connection



$query = "update category set category_name    = '$category'
                           
                           where category_id = {$_GET['id']}";

mysqli_query($conn,$query);
//header("location:manage_category.php");
    
 
$query  = "select * from category where category_id = {$_GET['id']}";
$result = mysqli_query($conn,$query);
$category = mysqli_fetch_assoc($result);


 header("location:manage_category.php");   
    
} 



/*


$query = "update category set category_name    = '$category'
                           
                           where category_id = {$_GET['id']}";

mysqli_query($conn,$query);
//header("location:manage_category.php");
    
 
$query  = "select * from category where category_id = {$_GET['id']}";
$result = mysqli_query($conn,$query);
$category = mysqli_fetch_assoc($result);
*/
?>

<?php include ('includes/header.php'); ?>
 <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Edit Category</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2"> update Category </h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" novalidate="novalidate">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Category Name</label>
                                                <input  name="category_name" type="text" class="form-control">
                                            </div>
                                            
                                
                                  
                                                <button id="payment-button" type="submit" name="submit" class="btn btn-info">

                                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">Update</span>
                                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                           
                                <!-- END DATA TABLE-->
                            </div>
                        </div>


<?php include ('includes/footer.php'); ?>
