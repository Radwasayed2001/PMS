<?php
include('../inc/header.php');
include('adminNav.php');
include('../core/functions.php');
if(!isset($_SESSION['adminAuth'])){
  redirect('../login.php');
  die;
}
$conn = mysqli_connect("localhost", "root", "", "product management system");
$sql = "SELECT * FROM `products` WHERE `id` = '{$_GET['id']}'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<div class="container">
<form action="handlers/updateProduct.php?id=<?php echo $_GET['id'] ?>" class="text-center" method="POST" enctype="multipart/form-data">
<?php 
if (isset($_SESSION['errors'])):
foreach ($_SESSION['errors'] as $error):?>
<div class="alert alert-danger text-center">
  <?php
  echo $error;
  ?>
</div>
<?php endforeach;
unset($_SESSION['errors']);
endif;
?>
<?php 
if (isset($_SESSION['success'])):?>
<div class="alert alert-success text-center">
  <?php
  echo $_SESSION['success'];
  ?>
</div>
<?php 
unset($_SESSION['success']);
endif;
?>
<div class="row g-3 mb-3">
  <div class="col">
    <input value="<?php echo $row['name']?>" name="title" type="text" class="form-control" placeholder="Enter title" aria-label="Enter title">
  </div>
  <div class="col">
    <input value="<?php echo $row['price']?>" name="price" type="text" class="form-control" placeholder="Enter price" aria-label="Enter price">
  </div>
</div>
<div class="row g-3 mb-3">
  <div class="col">
    <input value="<?php echo $row['discountPercentage']?>" name="discount" type="text" class="form-control" placeholder="Enter discount percentage" aria-label="Enter discount percentage">
  </div>
  <div class="col">
    <input value="<?php echo $row['quantity']?>" name="quantity" type="text" class="form-control" placeholder="Enter quantity" aria-label="Enter quantity">
  </div>
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Description</label>
  <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"><?php
  if(isset($row['description'])) echo $row['description'];
    ?></textarea>
</div>
<div class=" w-75 m-5 text-start">
  <label  class="fs-4 mb-2 fw-bold me-5">choose categories</label>
<?php
$conn = mysqli_connect("localhost", "root", "", "product management system");
$sql = "SELECT * FROM `categories`";
$result = mysqli_query($conn, $sql);
while($row2 = mysqli_fetch_assoc($result)):
?>
<div class="form-check form-check-inline">
  <input name="<?php echo $row2['name']?>" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
    <?php echo $row2['name']?>
  </label>
</div>
<?php endwhile; ?>
</div>
<div class="form-group w-75 m-5 text-start">
  <label class="fs-5 mb-2 fw-bold">Upload Image</label>
  <input value="../images/<?php echo $row['thumbnail']?>" type="file" name="thumbnail2" id="thumbnail2" class="form-control" placeholder="Enter Image">
</div>
<button type="submit" class="btn btn-dark py-3 mt-4 w-25 fs-5 text-white fw-bold">Edit</button>
</form>
</div>
<?php
include('../inc/footer.php');
?>