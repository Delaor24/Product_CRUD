<?php include '../../inc/database.php';?>

<?php
  if(isset($_GET['id'])){
  	$id = $_GET['id'];
    $result = mysqli_query($con, "SELECT * from product WHERE p_id=".$id);
    
    $row = mysqli_fetch_assoc($result);
    
?>
<!doctype html>
<html lang="en">
  <head> 
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Dashboard</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <ul class="list-group">
            <li class="list-group-item">
              <a href="../dashboard.php">Dashboard</a>
            </li>

             <li class="list-group-item">
              <a href="../categories/create.php">Create Category</a>
            </li>

            <li class="list-group-item">
              <a href="../categories/all_category.php">Show All Category</a>
            </li>



              <li class="list-group-item">
              <a href="create.php">Create product</a>
            </li>

              <li class="list-group-item">
              <a href="all_product.php">All product</a>
            </li>

             <li class="list-group-item">
             
              <button class="btn btn-dark"><a style="text-decoration: none" href="../logout.php">Logout</a></button>
            </li>


             
          </ul>
          
        </div>
 
        <div class="col-md-8">
          <div class="container">
          	
          		    <div class="card">
						  <div class="card-header">
						    Update Product
						  </div>
						  <div class="card-body">
						    <form action="update.php?id=<?php echo $row['p_id']?>" method="post" enctype="multipart/form-data">

                  <div class="form-group">
                    <label>Product Category Name</label>
                
                    <select class="form-control" name="category_id">
                          <?php 
                       $sql = "select * from product_category";
                       $result = mysqli_query($con,$sql);

                       while ($c_row = mysqli_fetch_assoc($result)) { 
                        $c_id = $c_row['category_id'];

                        $p_id = $row['category_id'];
                        if($c_id == $p_id){ ?>
                        
                        
                
                      <option selected value="<?php echo $c_row['category_id']?>"><?php echo $c_row['category_name'] ?></option>
                          <?php  }
                          else{ ?>
                            <option  value="<?php echo $c_row['category_id']?>"><?php echo $c_row['category_name'] ?></option>

                            <?php 


                          }


                        } ?>
                     
                  </select>
                
                    
                  </div>


								  <div class="form-group">
								    <label>Product Name</label>
								    <input type="text" class="form-control"  value="<?php echo $row['p_name'] ?>" name="productName" required="">
								    
								  </div>

								  <div class="form-group">
								    <label>Product Description</label>
								    <textarea cols="10" rows="10" name="productDescription" class="form-control"><?php echo $row['p_description'] ?></textarea>
								    
								  </div>

								  <div class="form-group">
								    <label>Product Price</label>
								    <input type="text" class="form-control"  value="<?php echo $row['p_price'] ?>" name="productPrice" required="">
								    
								  </div>

                   <div class="form-group">
                    <label>Product Image</label>
                    <img src="../../images/products/<?php echo $row['p_image']?>" width=40px; height = 40px;>
                    <input type="file" class="form-control" name="image"> 

                    <input type="hidden" value="<?php echo $row['p_image'] ?>" name="delete_file" />
                    
                  </div>

								  
								           

								  <button type="submit" class="btn btn-primary" name="submit">Update Product</button>
								</form>

							<?php } ?>



							    <?php


									if(isset($_POST['submit'])){
                    $c_id  = $_POST['category_id'];
										$p_name = $_POST['productName'];
										$p_description = $_POST['productDescription'];
										$p_price = $_POST['productPrice'];
                    

                    $old_image = $_POST['delete_file'];



                      // add image
                      if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){


                        $target_dir = "../../images/products/";

                        $image = $_FILES['image']['name'];
                        $directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
                        $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . $target_dir;
                        $uploadDirectory .= $image;

                         //delete old image
                        if(file_exists($target_dir.$old_image)){
                          unlink($target_dir.$old_image);
                        }
                        move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
                      

                      }
                      else{
                        $image = $old_image;
                      }

											$sql = "UPDATE  product SET category_id = '$c_id', p_name = '$p_name',p_description = '$p_description',p_price = $p_price,p_image = '$image' where p_id = $id";

										

											$result = mysqli_query($con,$sql);

											if($result){
                        echo "<script>alert('Product updated!!')</script>";
                        echo "<script>window.open('all_product.php','_self')</script>";
											
											}
                      else{
                        echo "<script>alert('Product Not updated!!')</script>";
                      }

									}


									?>
						  </div>
					</div>
          	
          </div>

          
        </div
      </div>
    
   
    </div>









    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js" ></script>
  </body>
</html>