<?php include '../../inc/database.php';?>

<?php
  if(isset($_GET['id'])){
  	$id = $_GET['id'];
    $result = mysqli_query($con, "SELECT * from product_category WHERE category_id=".$id);
    
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
						    Update Category
						  </div>
						  <div class="card-body">
						    <form action="update.php?id=<?php echo $row['category_id']?>" method="post">

                 
                
                    
                  </div>


								  <div class="form-group">
								    <label>Category Name</label>
								    <input type="text" class="form-control"  value="<?php echo $row['category_name'] ?>" name="categoryName" required="">
								    
								  </div>

								 

								  
								  

								  <button type="submit" class="btn btn-primary" name="submit">Update Category</button>
								</form>

							<?php } ?>



							    <?php


									if(isset($_POST['submit'])){
                    
										$c_name = $_POST['categoryName'];
										

											$sql = "UPDATE  product_category SET  category_name = '$c_name' where category_id = $id";

										

											$result = mysqli_query($con,$sql);

											if($result){
                        echo "<script>alert('Category updated!!')</script>";
											
											}
                      else{
                        echo "<script>alert('Category Not updated!!')</script>";
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