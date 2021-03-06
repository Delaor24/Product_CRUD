<?php 
include '../../inc/database.php';

session_start();
if(!isset($_SESSION['adminLogin'])){
  header("Location:../../index.php");
}

$sql = "select * from product_category";

$result = mysqli_query($con,$sql);


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
          <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Category Name</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
             
              <?php
              $seriel = 1;
               while($row = mysqli_fetch_assoc($result)){?> 
                <tr>
                  <th scope="row"><?php echo $seriel++ ?></th>
                  <td><?php echo $row['category_name'] ?></td>
                 
                    <td>
                      <button class="btn btn-info"><a style="color: black;"  href="update.php?id=<?php echo $row['category_id']?>">Edit</a></button>
                      <button class="btn btn-danger"><a style="color: black;" href="delete.php?id=<?php echo $row['category_id']?>">Delete</a></button>
                    </td>
                </tr>

              <?php } ?>
                
              </tbody>
            </table>

          
        </div>
      </div>
    
   
    </div>




    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js" ></script>
  </body>
</html>