
<?php include '../inc/database.php';

session_start();

if(isset($_POST['submit'])){
  $email = $_POST['email'];
  $password = $_POST['password'];
  $sql = "select * from admin where email = '$email' and password = '$password'";
  $result = mysqli_query($con,$sql);
  $row = mysqli_num_rows($result);
  if($row > 0){
        $_SESSION['adminLogin']=true;
    header("Location:dashboard.php");
  }
  else{
    echo "<script>alert('Username and password invalid please try again')</script>";
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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>admin login page</title>
  </head>
  <body style="background-color: #c4bcbc">
    <div class="container">
      <div class="row justify-content-md-center">
      
            <div class="card" style="margin-top: 100px;">
                <div class="card-header">
                  Admin Login
                </div>

                  <div class="card-body">
                     <form action="login.php" method="post">
                          <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                          </div>

                          <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                          </div>
                        <button type="submit" class="btn btn-primary" name="submit">Login</button>
                    </form>
                  </div>
            
          </div>
      </div>
   
    </div>




    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js" ></script>
  </body>
</html>