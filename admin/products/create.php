<?php include '../../inc/database.php';

session_start();
if(!isset($_SESSION['adminLogin'])){
	header("Location:../../index.php");
}





if(isset($_POST['submit'])){
	$c_id = $_POST['category_id'];
	$p_name = $_POST['productName'];
	$p_description = $_POST['productDescription'];
	$p_price = $_POST['productPrice'];



	// add image
		if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){

			$target_dir = "../../images/products/";

			$image = $_FILES['image']['name'];
			$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
			$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . $target_dir;
			$uploadDirectory .= $image;
			move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);


		}

		$sql = "insert into product (category_id,p_name,p_description,p_price,p_image) VALUES ($c_id,'$p_name','$p_description',$p_price,'$image')";

		$result = mysqli_query($con,$sql);

		if($result){
			echo "<script>alert('product add successfully done !')</script>";
		}else{
			echo "<script>alert('product not added !!')</script>";
		}

}


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
						    Add Product
						  </div>
						  <div class="card-body">
						    <form action="create.php" method="post" enctype="multipart/form-data">

						    	 <div class="form-group">
								    <label>Product Category Name</label>
								
								    <select class="form-control" name="category_id">
								    	    <?php 
								       $sql = "select * from product_category";
								       $result = mysqli_query($con,$sql);

								       while ($row = mysqli_fetch_assoc($result)) { ?>
								       	
								
										  <option value="<?php echo $row['category_id']?>"><?php echo $row['category_name'] ?></option>
										      <?php } ?>
										 
									</select>
								
								    
								  </div>

								  <div class="form-group">
								    <label>Product Name</label>
								    <input type="text" class="form-control"  placeholder="Enter product name" name="productName" required="">
								    
								  </div>

								 

								  <div class="form-group">
								    <label>Product Description</label>
								    <textarea  cols="10" rows="10" name="productDescription" class="form-control"></textarea>
								    
								  </div>

								  <div class="form-group">
								    <label>Product Price</label>
								    <input type="text" class="form-control"  placeholder="Enter product price" name="productPrice" required="">
								    
								  </div>

								  <div class="form-group">
								    <label>Product Image</label>
								    <input type="file" class="form-control" name="image" required="">
								    
								  </div>
								  

								  <button type="submit" class="btn btn-primary" name="submit">Add Product</button>
								</form>
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