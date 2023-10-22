<?php
include_once("inc/header.php");
include_once("inc/nav.php");
include_once("core/functions.php");
?>
<div class="container">
<form class="row g-3 needs-validation" novalidate method="POST" action="handlers/handleRegister.php">
  <?php if (isset($_SESSION['error']['fail'])): ?>
<div class="alert alert-danger text-center">
  <?php 
    echo $_SESSION['error']['fail'];
    unset($_SESSION['error']['fail']);
    ?>
  </div>
  <?php endif; ?>
  <div class="col-md-4">
    <label for="validationCustom01" class="form-label">First name</label>
    <input value="<?php value('firstname') ?>" name="firstname" type="text" class="form-control <?php isvalid('firstname') ?>" id="validationCustom01" required>
    <div class="<?php validfeedback('firstname') ?>">
      <?php
      if (isset($_SESSION['error']['firstname'])){
      echo $_SESSION['error']['firstname'];
      unset($_SESSION['error']['firstname']);
      }
      elseif (isset($_SESSION['firstname'])) {
        echo "valid";
        unset($_SESSION['firstname']);
      }
      ?>
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustom02" class="form-label">Last name</label>
    <input value="<?php value('lastname') ?>" name="lastname" type="text" class="form-control <?php isvalid('lastname') ?>" id="validationCustom02" required>
    <div class="<?php validfeedback('lastname') ?>">
    <?php
    if (isset($_SESSION['error']['lastname'])){
      echo $_SESSION['error']['lastname'];
      unset($_SESSION['error']['lastname']);

    }
    elseif (isset($_SESSION['lastname'])) {
      echo "valid";
      unset($_SESSION['lastname']);
    }
      ?>
    </div>
  </div>
  <div class="col-md-4">
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
    <label for="validationCustom03" class="form-label">Email</label>
    <input value="<?php value('email') ?>"  name="email" type="text" class="form-control <?php isvalid('email') ?>" id="validationCustom03" required>
    <div class="<?php validfeedback('email') ?>">
    <?php
    if (isset($_SESSION['error']['email'])){
      echo $_SESSION['error']['email'];
      unset($_SESSION['error']['email']);

    }
    elseif (isset($_SESSION['email'])) {
      echo "valid";
      unset($_SESSION['email']);
    }
      ?>
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