<?php
include_once('../core/functions.php');
include_once('../core/validations.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach($_POST as $key=>$value){
        $$key = trim(htmlentities(htmlspecialchars($value)));
        if (empty($$key)) {
            $_SESSION['error'][$key] = "$key is requied";
        }
    }
    if (empty($_SESSION['error'])){
    $conn = mysqli_connect("localhost", "root", "", "product management system");
        $sql = "SELECT * FROM `users`WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        
        $row = mysqli_fetch_assoc($result);
        // echo "<pre>";
        // var_dump($row);
        if (isset($row)){
            if ($row['password']===$password){
                if ($row['groupID']){
                    $_SESSION['adminAuth'] = $row['id'];
                    redirect('../Admin/allProducts.php');
                }
                else{
                    $_SESSION['userAuth'] = $row['id'];
                    redirect('../User/user.php');
                    die;
                }
            }
            else {
                $_SESSION['username'] = $username; 
                $_SESSION['error']['password'] = "wrong password";
                redirect('../login.php');
                die;
            }
        }
        else{
            $_SESSION['error']['username'] = "Username Not Exists";
            redirect('../login.php');
            die;
        }
    }
    else {
        if (empty($_SESSION['error']['username']))$_SESSION['username'] = $username;
        redirect('../login.php');
        die;
    }
}