<?php
require('includes/connection.php');
//make code run when user click on save button
if(isset($_POST['submit'])){
    $category    = $_POST['category_name'];
    //open connection to data base from include file connection
//perform query
    $query = "insert into category(category_name) values('$category')";
    mysqli_query($conn,$query);
header("location:manage_category.php");   
} 
if(isset($_GET['confirm'])){
    $category    = $_GET['category_id'];
    //open connection to data base from include file connection

//perform query
//$query = "insert into category(category_name) values('$category')";
    $query = "delete from category where category_id = {$_GET['id']}";
 
    mysqli_query($conn,$query);
    header("location:manage_category.php");
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
                        <div class="card-header">Credit Category</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2"> Add Category </h3>
                            </div>
                            <hr>
                            <form action="" method="post" novalidate="novalidate">
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Category Name</label>
                                    <input  name="category_name" type="text" class="form-control">
                                </div>

                                

                                <button id="payment-button" type="submit" name="submit" class="btn btn-info">

                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                    <span id="payment-button-amount">Save</span>
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
<div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smallmodalLabel">Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Are you sure you want to delete this row?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button id="payment-button" type="button" name="confirm" class="btn btn-inf">Confirm</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editLabel">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div class="modal-body">
                <div class="card-title">
                    <h3 class="text-center title-2"> Update Category </h3>
                </div>
                <hr>
                <form action="" method="post" novalidate="novalidate">
                    <div class="form-group">
                        <label for="cc-payment" class="control-label mb-1">Category Name</label>
                        <input  name="category_name" type="text" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button"   class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button"   class="btn btn-primary"  >Confirm</button>
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
                        <th> Category Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $query = "select * from category";
                                                //perform
                    $result = mysqli_query($conn,$query);
                    while($category= mysqli_fetch_assoc($result)){
                     echo "<tr>";
                     echo"<td>{$category['category_id']}</td>";
                     echo"<td>{$category['category_name']}</td>";
                     echo"<td>
                     <button type='button'class='btn btn-secondary mb-1' data-toggle='modal' data-target='#edit'>Edit</button> 
                     </td>";
                     echo"<td>
                     <button type='button'class='btn btn-secondary editbtn' data-toggle='modal' data-target='#smallmodal'>Delete</button></td>";
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
