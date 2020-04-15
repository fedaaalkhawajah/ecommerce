<?php
require('includes/connection.php');
//make code run when user click on save button
if(isset($_POST['submit'])){
    $product_name         = $_POST['product_name'];
    $product_price        = $_POST['product_price'];
    $product_description  = $_POST['product_description'];
    $product_images       = $_POST['product_images'];
    $category             =  $_POST['cat_id'];
    //open connection to data base from include file connection

//perform query
$query = "insert into product(product_name,product_price, product_description,product_images,category_id ) values('$product_name',$product_price,'$product_description','$product_images',$category)";

mysqli_query($conn,$query);

 header("location:manage_product.php");   
} 
//$sql = "select * from category inner join product on category.category_id = product.category_id";  
 //$result = mysqli_query($conn, $sql); 

?>
<?php include ('includes/header.php'); ?>
 <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Credit Product</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2"> Add Product </h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" novalidate="novalidate">
                                               <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Product Name</label>
                                                <input  name="product_name" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Product Price</label>
                                                <input  name="product_price" type="text" class="form-control">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1"> Product Description</label>
                                                <input name="product_description" type="text" class="form-control cc-name valid" >
                                             
                                            </div>
                                                <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Product Images</label>
                                                <input name="product_images" type="text" class="form-control cc-name valid" >
                                             
                                            </div>
                                               <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Category ID</label>
                                                <select name="cat_id">
                                                    <option>choose...</option>
                                                        <?php 
                                                        $query = "select * from category ";
                                                        $result = mysqli_query($conn,$query);
                                                        while($category = mysqli_fetch_assoc($result)){
                                                            echo "<option value={$category['category_id']}>{$category['category_name']}</option>";
                                                        }
                                                      
                                                        ?>
                                                   
                                                </select>
                                                
                                            </div>
                                
                                  
                                                <button id="payment-button" type="submit"  name="submit" class="btn btn-info">
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
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Product Name</th>
                                                <th>Product Price</th>
                                                <th>Product Description</th>
                                                <th>Product Images</th>
                                                <th>Category ID</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                    <?php
                                        
                                               $sql = "select * from product inner join category on category.category_id = product.category_id"; 
                                              
                                                //perform
                                                $result = mysqli_query($conn,$sql);
                                             while($product  = mysqli_fetch_assoc($result)){
                                                //print_r($product);
                                             echo "<tr>";
                                                 echo"<td>{$product['product_id']}</td>";
                                                echo"<td>{$product['product_name']}</td>";
                                                echo"<td>{$product['product_price']}</td>";
                                                echo"<td>{$product['product_description']}</td>";
                                                echo"<td>{$product['product_images']}</td>";
                                                echo"<td>{$product['category_name']}</td>";
                                                echo"<td>
                                                 <a href='edit_product.php?id={$product['product_id']}'
                                                  class='btn btn-info'>Edit </a></td>";
                                                 echo"<td>
                                                 <a href='delete_product.php?id={$product['product_id']}' 
                                                 class='btn btn-danger'> Delete </a></td>";
                                                    echo"</tr>"; 


                                                }
                                                       

                                                ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>


<?php include ('includes/footer.php'); ?>
