<?php include '../../inc/database.php';

session_start();
if(!isset($_SESSION['adminLogin'])){
	header("Location:../../index.php");
}





if(isset($_POST['submit'])){
	
	$c_name = $_POST['categoryName'];
	


	

		$sql = "insert into product_category (category_name) VALUES ('$c_name')";

		$result = mysqli_query($con,$sql);

		if($result){
			echo "<script>alert('Category add successfully done !')</script>";
		}else{
			echo "<script>alert('Category not added !!')</script>";
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
              <a href="../products/create.php">Create product</a>
            </li>

              <li class="list-group-item">
              <a href="../products/all_product.php">All product</a>
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
						    Add Category
						  </div>
						  <div class="card-body">
						    <form action="create.php" method="post">

						    	

								  <div class="form-group">
								    <label>Category Name</label>
								    <input type="text" class="form-control"  placeholder="Enter Category name" name="categoryName" required="">
								    
								  </div>

								  <button type="submit" class="btn btn-primary" name="submit">Add Category</button>
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