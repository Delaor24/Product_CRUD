<?php 
include 'inc/database.php';

$sql = "select * from product";

$result = mysqli_query($con,$sql);


?>
<div class="container">
  <div class="row mr-0 ml-0">  
   <?php while($row = mysqli_fetch_assoc($result)){?> 
    <div class="col-md-4">
         <div class="card mt-5" style = "width: 100%">
          <img src="images/products/<?php echo $row['p_image']?>" class="card-img-top" width="100%" height=250px alt="mango">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['p_name']; ?></h5>
            <p class="card-title">Price : <?php echo $row['p_price']; ?></p>
          </div>
        </div>



        <!-- Button trigger modal -->
<button style = "width: 100%" type="button" class="btn btn-primary btn btn-sm" data-toggle="modal" data-target="#productid_<?php echo $row['p_id']?>">
  Product Details
</button>

<!-- Modal -->
<div class="modal fade" id="productid_<?php echo $row['p_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="productid_<?php echo $row['p_id']?>">Product Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5><?php echo $row['p_name']; ?></h5>
        <p>Price : <?php echo $row['p_price']; ?></p>
        <p><?php echo $row['p_description']; ?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

      
    </div>
    <?php }?>

    
 
  </div>
  
</div>