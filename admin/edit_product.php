<?php
require('includes/connection.php');
//make code run when user click on save button
if(isset($_POST['submit'])){
    $product_name         = $_POST['product_name'];
    $product_price        = $_POST['product_price'];
    $product_description  =$_POST['product_description'];
    $product_images       =$_POST['product_images'];

    //open connection to data base from include file connection

//perform query
$query = "update product set  product_name        = '$product_name',
                              product_price       = '$product_price',
                              product_description = '$product_description',
                              product_images      = '$product_images'
                              where product_id = {$_GET['id']}";


  mysqli_query($conn,$query);
  header("location:manage_product.php");   
} 

$query = "select * from product where product_id = {$_GET['id']}";
$result = mysqli_query($conn,$query);
$product = mysqli_fetch_assoc($result);

?>
<?php include ('includes/header.php'); ?>
 <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Edit Product</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2"> Update Product </h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" novalidate="novalidate">
                                               <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Product Name</label>
                                                <input  name="product_name" type="text" class="form-control"
                                                value="<?php echo $product['product_name']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Product Price</label>
                                                <input  name="product_price" type="text" class="form-control"
                                                 value="<?php echo $product['product_price']; ?>">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1"> Product Description</label>
                                                <input name="product_description" type="text" class="form-control cc-name valid"  value="<?php echo $product['product_description']; ?>">
                                             
                                            </div>
                                                <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Product Images</label>
                                                <input name="product_images" type="text" class="form-control cc-name valid" value="<?php echo $product['product_images']; ?>" >
                                             
                                            </div>
                                               <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Category ID</label>
                                      <select>
                                                    <option>choose...</option>
                                                        <?php 
                                                        $query = "select * from category ";
                                                        $result = mysqli_query($conn,$query);
                                                        //echo'<pre>'; print_r($result);
                                                        while($category = mysqli_fetch_assoc($result)){
                                                            echo "<option value={$category['category_id']}>{$category['category_name']}</option>";
                                                        }
                                                      
                                                        ?>
                                                   
                                                </select>
                                                >
                                            </div>
                                
                                  
                                                <button id="payment-button" type="submit"  name="submit" class="btn btn-info">
                                                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                    <span id="payment-button-amount">update</span>
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
