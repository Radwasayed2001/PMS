<?php
include_once("inc/header.php");
include_once("inc/nav.php");
include_once("core/functions.php");
?>
<div class="container">
<form class="row g-3 needs-validation" novalidate method="POST" action="handlers/handleLogin.php">
  
  <div class="col-md-6">
    <label for="validationCustomUsername" class="form-label">Username</label>
    <div class="input-group has-validation">
      <span class="input-group-text" id="inputGroupPrepend">@</span>
      <input value="<?php value('username') ?>"  name="username" type="text" class="form-control <?php isvalid('username') ?>" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
      <div class="<?php validfeedback('username') ?>">
      <?php
      if (isset($_SESSION['error']['username'])){
      echo $_SESSION['error']['username'];
      unset($_SESSION['error']['username']);
      
    }
    elseif (isset($_SESSION['username'])) {
      echo "valid";
      unset($_SESSION['username']);
    }
      ?>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustom05" class="form-label">password</label>
    <input value="<?php value('password') ?>"  name="password" type="password" class="form-control <?php isvalid('password') ?>" id="validationCustom05" required>
    <div class="<?php validfeedback('password') ?>">
    <?php
    if (isset($_SESSION['error']['password'])){
      echo $_SESSION['error']['password'];
      unset($_SESSION['error']['password']);

    }
    elseif (isset($_SESSION['password'])) {
      echo "valid";
      unset($_SESSION['password']);
    }
      ?>
    </div>
  </div>
  <div class="col-12">
    <button class="btn btn-primary fw-bold fs-5" type="submit">Register</button>
  </div>
</form>
</div>
<?php
include_once("inc/footer.php");