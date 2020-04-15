<?php
require('includes/connection.php');
//make code run when user click on save button
if(isset($_POST['submit'])){
    $customer_name         = $_POST['customer_name'];
    $customer_email        = $_POST['customer_email'];
    $customer_password     = $_POST['customer_password'];
    $customer_mobile       = $_POST['customer_mobile'];
    $customer_address      = $_POST['customer_address'];

    //open connection to data base from include file connection

//perform query (Creat)...
    $query = "insert into customer(customer_name,customer_email,customer_password,customer_mobile,customer_address)
    values('$customer_name','$customer_email','$customer_password','$customer_mobile','$customer_address')";

    mysqli_query($conn,$query);

    header("location:manage_customer.php");   
} 

?>


<?php include ('includes/header.php'); ?>
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">Credit Customer</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2"> Add Customer </h3>
                            </div>
                            <hr>
                            <form action="" method="post" novalidate="novalidate">
                               <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Customer Name</label>
                                <input  name="customer_name" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Customer Email</label>
                                <input  name="customer_email" type="text" class="form-control">
                            </div>
                            <div class="form-group has-success">
                                <label for="cc-name" class="control-label mb-1"> Password</label>
                                <input name="customer_password" type="password" class="form-control cc-name valid" >

                            </div>
                            <div class="form-group has-success">
                                <label for="cc-name" class="control-label mb-1">Customer Mobile</label>
                                <input name="customer_mobile" type="text" class="form-control cc-name valid" >

                            </div>
                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Customer Address</label>
                                <input  name="customer_address" type="text" class="form-control">
                            </div>


                            <button id="payment-button" type="submit"  name="submit" class="btn btn-info">save
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
<div class="col-md-12">
    <!-- DATA TABLE-->
    <div class="table-responsive m-b-40">
        <table class="table table-borderless table-data3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>


                <?php
                 $query = "select * from customer";//to (Read) data 
                 $result = mysqli_query($conn,$query);
                 while($customer  = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo"<td>{$customer['customer_id']}</td>";
                        echo"<td>{$customer['customer_name']}</td>";
                        echo"<td>{$customer['customer_email']}</td>";
                        echo"<td>{$customer['customer_mobile']}</td>";
                        echo"<td>{$customer['customer_address']}</td>";
                        echo"<td>
                        <a href='edit_customer.php?id={$customer['customer_id']}'
                            class='btn btn-info'>Edit </a></td>";
                        echo"<td>
                        <a href='delete_customer.php?id={$customer['customer_id']}' 
                            class='btn btn-danger'> Delete </a></td>";
                        echo"</tr>"; 
                        echo"</tr>"; 


                            }


                        ?>
                </tbody>
            </table>
        </div>
    <!-- END DATA TABLE-->
    </div>
</div>


<?php include ('includes/footer.php'); ?>
