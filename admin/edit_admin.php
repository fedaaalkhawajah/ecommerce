
<?php
//this code to edit_admin (Update)....
require('includes/connection.php');
//make code run when user click on update button
if(isset($_POST['submit'])){
	$email    = $_POST['admin_email'];
	$password = $_POST['admin_password'];
	$fullname = $_POST['fullname'];
	//open connection to data base from include file connection

//perform query Update..
    $query = "update admin set admin_email    = '$email',
    admin_password = '$password',
    fullname       = '$fullname'
    where admin_id = {$_GET['id']}";

    mysqli_query($conn,$query);
//to redirect the page...
    header("location:manage_admin.php");

} 
//to edit spacific admin according to admin_id that you get it from URL using $_GET method....
$query  = "select * from admin where admin_id = {$_GET['id']}";
$result = mysqli_query($conn,$query);
$admin  = mysqli_fetch_assoc($result);
?>

<?php include ('includes/header.php'); ?>
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">Edit Admin</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2"> Update Admin </h3>
                            </div>
                            <hr>
                            <form action="" method="post" novalidate="novalidate">
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Admin Email</label>
                                    <input  name="admin_email" type="text" class="form-control"
                                    value="<?php echo $admin['admin_email']; ?>">
                                </div>
                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">Admin Password</label>
                                    <input name="admin_password" type="password" class="form-control cc-name valid"
                                    value="<?php echo $admin['admin_password']; ?>" >

                                </div>
                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">Full Name</label>
                                    <input name="fullname" type="text" class="form-control cc-name valid" 
                                    value="<?php echo $admin['fullname']; ?>">

                                </div>
                                

                                <button id="payment-button" type="submit"  name="submit" class="btn btn-info">Update
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
