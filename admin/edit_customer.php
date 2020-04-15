<?php
require('includes/connection.php');
//make code run when user click on update button
if(isset($_POST['submit'])){
    $customer_name         = $_POST['customer_name'];
    $customer_email        = $_POST['customer_email'];
    $customer_password     = $_POST['customer_password'];
    $customer_mobile       = $_POST['customer_mobile'];
    $customer_address      = $_POST['customer_address'];

    //open connection to data base from include file connection

//perform query edit (Update)....
$query = "update customer set customer_name      = '$customer_name',
                              customer_email     = '$customer_email',
                              customer_password  = '$customer_password',
                              customer_mobile    = '$customer_mobile',
                              customer_address   = '$customer_address'
                              where customer_id  = {$_GET['id']}";
                            

 mysqli_query($conn,$query);
 header("location:manage_customer.php");//redirect page   
} 
$query    = "select * from customer where customer_id = {$_GET['id']}";
$result   = mysqli_query($conn,$query);
$customer = mysqli_fetch_assoc($result);


?>


<?php include ('includes/header.php'); ?>
 <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Edit Customer</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2"> Update Customer </h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" novalidate="novalidate">
                                               <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Customer Name</label>
                                                <input  name="customer_name" type="text" class="form-control"
                                                value="<?php echo $customer['customer_name'];?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Customer Email</label>
                                                <input  name="customer_email" type="text" class="form-control"
                                                value="<?php echo $customer['customer_email'];?>">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1"> Password</label>
                                                <input name="customer_password" type="password" class="form-control cc-name valid"      value="<?php echo $customer['customer_password'];?>">
                                             
                                            </div>
                                                <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Customer Mobile</label>
                                                <input name="customer_mobile" type="text" class="form-control cc-name valid"      value="<?php echo $customer['customer_mobile'];?>">
                                             
                                            </div>
                                               <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Customer Address</label>
                                                <input  name="customer_address" type="text" class="form-control"
                                                     value="<?php echo $customer['customer_address'];?>">
                                            </div>
                                
                                  
                                               <button id="payment-button" type="submit"  name="submit" class="btn btn-info">update
                                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                   
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
