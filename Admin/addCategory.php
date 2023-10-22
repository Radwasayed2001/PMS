<?php
include('../inc/header.php');
include('adminNav.php');
include('../core/functions.php');
if(!isset($_SESSION['adminAuth'])){
  redirect('../login.php');
  die;
}
?>
<form class="p-3 d-flex flex-column  align-items-center" method="POST" action="handlers/storeCategory.php">
  <div class=" d-flex flex-column w-50 align-items-center mb-5">
    <?php
    if (isset($_SESSION['error']['newCategory'])):?>
    <div class="alert alert-danger text-center w-100  fs-4">
        <?php echo $_SESSION['error']['newCategory'];unset($_SESSION['error']['newCategory']);?>
    </div>
    <?php endif;?>
    <?php
    if (isset($_SESSION['success'])):?>
    <div class="alert alert-success text-center w-100  fs-4">
        <?php echo $_SESSION['success'];unset($_SESSION['success']);?>
    </div>
    <?php endif;?>
    <label id="add" for="newCategory" class="form-label fw-bold mb-3 mt-5 fs-2">Add Category</label>
    <input name="newCategory" type="text" class="form-control" id="newCategory">
  </div>
  <button type="submit" class="btn btn-success fw-bold" id="addbtn">Add</button>
</form>
<?php
include('../inc/footer.php');