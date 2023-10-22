<?php
include('../../core/functions.php');
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['newCategory'])) {
        $newCategory = trim(htmlspecialchars(htmlentities($_POST['newCategory'])));
        if (empty($newCategory)){
            $_SESSION['error']['newCategory'] = "This Field is required";
            redirect('../addCategory.php');
            die;
        }
        $conn = mysqli_connect("localhost", "root", "", "product management system");
        $sql = "INSERT INTO `categories`(`name`) VALUES ('$newCategory')";
        $result = mysqli_query($conn, $sql);
        if (mysqli_affected_rows($conn) == 1){
            $_SESSION['success'] = "Done";
            redirect('../addCategory.php');
            die;
        }
        else {
            $_SESSION['error']['newCategory'] = "Exists";
            redirect('../addCategory.php');
            die;
        }
    }
}
