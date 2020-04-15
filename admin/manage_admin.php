
<?php
require('includes/connection.php');
//make code run when user click on save button
if(isset($_POST['submit'])){
	$email    = $_POST['admin_email'];
	$password = $_POST['admin_password'];
	$fullname = $_POST['fullname'];
	//open connection to data base from include file connection

//perform query (Creat)
    $query = "insert into admin(admin_email,admin_password,fullname) values('$email','$password','$fullname')";

    mysqli_query($conn,$query);
    header("location:manage_admin.php");

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
                        <div class="card-header">Credit Admin</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2"> Add Admin </h3>
                            </div>
                            <hr>
                            <form action="" method="post" novalidate="novalidate">
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Admin Email</label>
                                    <input  name="admin_email" type="text" class="form-control">
                                </div>
                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">Admin Password</label>
                                    <input name="admin_password" type="password" class="form-control cc-name valid" >

                                </div>
                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">Full Name</label>
                                    <input name="fullname" type="text" class="form-control cc-name valid" >

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
                    <th>Email</th>
                    <th>Full Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>

               <?php
               //perform query to read data from data base (Read)
               $query = "select * from admin";                          	
               $result = mysqli_query($conn,$query);
               while($admin  = mysqli_fetch_assoc($result)){
                   echo "<tr>";
                   echo"<td>{$admin['admin_id']}</td>";
                   echo"<td>{$admin['admin_email']}</td>";
                   echo"<td>{$admin['fullname']}</td>";
                   echo"<td>
                   <a href='edit_admin.php?id={$admin['admin_id']}'
                   class='btn btn-info'> Edit </a></td>";
                   echo"<td>
                   <a href='delete_admin.php?id={$admin['admin_id']}' 
                   class='btn btn-danger'> Delete </a></td>";
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
