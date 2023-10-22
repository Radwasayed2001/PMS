<?php
  include("../core/functions.php");

if(!isset($_SESSION['adminAuth'])){
    redirect('../login.php');
    die;
  }

  unset($_SESSION['adminAuth']);
  redirect('../login.php');
  die;