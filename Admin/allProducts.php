<?php
include('../inc/header.php');
include('adminNav.php');
include("../core/functions.php");
if(!isset($_SESSION['adminAuth'])){
    redirect('../login.php');
    die;
  }
$conn = mysqli_connect("localhost", "root", "", "product management system");
$sql = "SELECT * FROM `products`";
$result = mysqli_query($conn, $sql);
?>
<div class="container d-flex  justify-content-center align-items-center flex-wrap">
<?php 
while($row = mysqli_fetch_assoc($result)):
    ?>
<div class="card m-3" style="width: 18rem;">
  <img src="../images/<?php echo $row['thumbnail']?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $row['name']?></h5>
    <p class="card-text"><?php echo $row['description']?></p>
    <div class="d-flex justify-content-between px-5">
    <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">Edit</a>
    <a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger">Delete</a>
    </div>
  </div>
</div>
<?php endwhile;?>
</div>
<?php
include('../inc/footer.php');
?>
