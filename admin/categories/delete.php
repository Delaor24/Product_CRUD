    
<?php include '../../inc/database.php';?>
<?php
if (isset($_GET['id'])) {
  $id = $_GET['id'];
    mysqli_query($con, "DELETE FROM product_category WHERE category_id=".$id);
    echo '<script>
    window.location.href = "all_category.php";
    </script>';
} else {
  echo '<script>
    window.location.href = "all_category.php";
    </script>';
}
?>