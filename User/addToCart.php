<?php
include("../core/functions.php");
if($_SERVER['REQUEST_METHOD'] == "GET") {
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $conn = mysqli_connect("localhost", "root", "", "product management system");
        $sql = "INSERT INTO `carts_products`(`user_id`, `product_id`) VALUES ('{$_SESSION['userAuth']}','$id')";
        $result = mysqli_query($conn, $sql);
        redirect("allProducts.php");
        die;
    }
    else {
        redirect("allProducts.php");
        die;
    }
}else {
    redirect("allProducts.php");
    die;
}