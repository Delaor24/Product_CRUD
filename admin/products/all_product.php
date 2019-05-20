<?php 
include '../../inc/database.php';

$sql = "select * from product";

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
              <a href="create.php">Create product</a>
            </li>

              <li class="list-group-item">
              <a href="all_product.php">All product</a>
            </li>

             
          </ul>
          
        </div>

        <div class="col-md-8">
          <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Product Name</th>
                  <th scope="col">Product price</th>
                  <th scope="col">Image</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
             
              <?php
              $seriel = 1;
               while($row = mysqli_fetch_assoc($result)){?> 
                <tr>
                  <th scope="row"><?php echo $seriel++ ?></th>
                  <td><?php echo $row['p_name'] ?></td>
                  <td><?php echo $row['p_price'] ?></td>
                  <td><img src="../../images/products/<?php echo $row['p_image'] ?>" width=40px; height=40px; ></td>
                    <td>
                      <button class="btn btn-info"><a href="update.php?id=<?php echo $row['p_id']?>">Edit</a></button>
                      <button class="btn btn-danger"><a href="delete.php?id=<?php echo $row['p_id']?>">Delete</a></button>
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