<?php
$new_name = '';
include('../../core/functions.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $file = $_FILES['thumbnail2'];
    $f_name = $file['name'];
    $f_type = $file['type'];
    $f_tmp_name = $file['tmp_name'];
    $f_error = $file['error'];
    $f_size = $file['size'];
    foreach($_POST as $key=>$value){
        $$key = trim(htmlentities(htmlspecialchars($value)));
    }
    
    if(empty($title)) {
        $_SESSION['errors'][] = 'Title Is Required';
    }
    if(empty($price)) {
        $_SESSION['errors'][] = 'Add The Price';
    }
    if(empty($quantity)) {
        $_SESSION['errors'][] = 'Add The Quantity';
    }
    if(empty($f_name)){
        $_SESSION['errors'][] = 'Please choose Image';
    }
    else {
        $ext = pathinfo($f_name);
        $original_name = $ext['filename'];
        $original_ext = $ext['extension'];
        $allowed = array('png', 'jpg', 'jpeg', 'gif', 'webp', 'jfif');
        if (in_array($original_ext, $allowed)){
            if($f_error != 0)
                $_SESSION['errors'][] = 'ERROR';
            else {
                $new_name = uniqid('', true) . "." . $original_ext;
                $destenation = "../../images/".$new_name;
                move_uploaded_file($f_tmp_name, $destenation);
            }
        }
        else {
            $_SESSION['errors'][] = 'ERROR';
        }
    }
    if (!empty($_SESSION['errors'])) {
        redirect("../edit.php?id={$GET['id']}");
        die;
    }
    else {
        $conn = mysqli_connect("localhost", "root", "", "product management system");
        $sql = "UPDATE `products` SET `name`='$title',`price`='$price',`description`='$description',`quantity`='$quantity',`discountPercentage`='$discount',`thumbnail`='$new_name' WHERE `id` = '{$_GET['id']}'";
        $result = mysqli_query($conn, $sql);
        echo mysqli_error($conn);
        if (mysqli_affected_rows($conn) == 1) {
            $sql2 = "SELECT * FROM `products` WHERE `name` = '$title'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $productID = $row2['id'];
            $sql3 = "DELETE  FROM `categories` WHERE `id` = '$productID'";
            $result3 = mysqli_query($conn, $sql3);
            $sql3 = "SELECT *  FROM `categories`";
            $result3 = mysqli_query($conn, $sql3);
            
            while($row3 = mysqli_fetch_assoc($result3)){
                if (isset($_POST[str_replace(' ', '_', $row3['name'])])){
                    $catname = $row3['name'];
                    $sql = "INSERT INTO `category_product`(`product_id`,`category_id`) VALUES ((SELECT `id` FROM `products` WHERE `name` = '$title'),(SELECT `id` FROM `categories` WHERE `name` = '$catname'))";
                    $result = mysqli_query($conn, $sql);
                    
                }
            }
            $_SESSION['successupdate'] = 'Done';
            redirect("../allProducts.php");
            die;
        }
        else {
            $_SESSION['errors'][] = 'Failed To Add product';
            redirect("../edit.php?id={$GET['id']}");
            die;
        }
        
    
        }}
        