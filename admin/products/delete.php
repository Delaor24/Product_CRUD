    
<?php include '../../inc/database.php';?>
<?php
if (isset($_GET['id'])) {
  $id = $_GET['id'];
    mysqli_query($con, "DELETE FROM product WHERE p_id=".$id);
    echo '<script>
    window.location.href = "all_product.php";
    </script>';
} else {
  echo '<script>
    window.location.href = "all_product.php";
    </script>';
}
?>