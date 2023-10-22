<?php
include("../core/functions.php");
include("../inc/header.php");
include("userNav.php");
$conn = mysqli_connect("localhost", "root", "", "product management system");
$sql = "SELECT * FROM `carts_products` WHERE `user_id` = {$_SESSION['userAuth']}";
$result = mysqli_query($conn, $sql);
?>
<div class="container w-70">
    <?php
while($row = mysqli_fetch_assoc($result)):
    $sql2 = "SELECT * FROM `products` WHERE `id` = {$row['product_id']}";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($result2);?>
<div class="card mb-3" style="max-width: 600px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="../images/<?php echo $row2['thumbnail'] ?>" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?php echo $row2['name'] ?></h5>
        <p class="card-text"><?php echo $row2['description'] ?></p>
        <a href="delete.php?id=<?php echo$row2['id']?>" class="btn btn-danger m-auto fs-5 mt-5 ms-5"><i class="fa-solid fa-trash"></i></a>
      </div>
      
    </div>
    
  </div>
</div>

<?php
endwhile;?>
</div>
<?php
include("../inc/footer.php");
