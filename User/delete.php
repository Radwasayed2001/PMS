<?php
include('../core/functions.php');
if(!isset($_SESSION['userAuth'])){
    redirect('../login.php');
    die;
  }
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    $conn = mysqli_connect("localhost", "root", "", "product management system");
    $sql = "DELETE FROM `carts_products` WHERE `product_id` = {$_GET['id']} and `user_id` = {$_SESSION['userAuth']}";
    $result = mysqli_query($conn, $sql);
    redirect('cart.php');
    die;
}