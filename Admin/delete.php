<?php
include('../core/functions.php');
if(!isset($_SESSION['adminAuth'])){
    redirect('../login.php');
    die;
  }
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    $conn = mysqli_connect("localhost", "root", "", "product management system");
    
    $sql = "DELETE FROM `category_product` WHERE `product_id` = '{$_GET['id']}'";
    $result = mysqli_query($conn, $sql);
    $sql = "DELETE FROM `products` WHERE `id` = '{$_GET['id']}'";
    $result = mysqli_query($conn, $sql);
    redirect('allProducts.php');
    die;
}