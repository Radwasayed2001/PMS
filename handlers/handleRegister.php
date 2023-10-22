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
    if (minlength($firstname,2) && !empty($firstname)){
        $_SESSION['error']['firstname'] = "firstname must be greater than 2";
    }
    elseif (maxlength($firstname,20)){
        $_SESSION['error']['firstname'] = "firstname must be less than 20";
    }
    if (minlength($lastname,2) && !empty($lastname)){
        $_SESSION['error']['lastname'] = "lastname must be greater than 2";
    }
    elseif (maxlength($lastname,20)){
        $_SESSION['error']['lastname'] = "lastname must be less than 20";
    }
    if (minlength($username,4) && !empty($username)){
        $_SESSION['error']['username'] = "username must be greater than 4";
    }
    elseif (maxlength($username,30)){
        $_SESSION['error']['username'] = "username must be less than 30";
    }
    if (minlength($password,6) && !empty($password)){
        $_SESSION['error']['password'] = "password must be greater than 6";
    }
    elseif (maxlength($password,25)){
        $_SESSION['error']['password'] = "password must be less than 25";
    }
    if (!emailVal($email) && !empty($email)) {
        $_SESSION['error']['email'] = "Email Not Valid!";

    }
    
    if (!empty($_SESSION['error'])){
        if (empty($_SESSION['error']['firstname']))$_SESSION['firstname'] = $firstname;
        if (empty($_SESSION['error']['lastname']))$_SESSION['lastname'] = $lastname;
        if (empty($_SESSION['error']['username']))$_SESSION['username'] = $username;
        if (empty($_SESSION['error']['email']))$_SESSION['email'] = $email;
        if (empty($_SESSION['error']['password']))$_SESSION['password'] = $password;
        redirect("../register.php");
        die;
    }
    else{
        $conn = mysqli_connect("localhost", "root", "", "product management system");
        $sql = "INSERT INTO `users`(`username`, `email`, `first_name`, `last_name`, `password`) VALUES ('$username','$email','$firstname','$lastname','$password')";
        $result = mysqli_query($conn, $sql);
        if(mysqli_affected_rows($conn) !== 1) {
            $_SESSION['error']['fail'] = "Email or username is already Exists";
            redirect('../register.php');
            die;
        }
        $_SESSION['userAuth'] = 1;
        redirect('../User/user.php');
        die;
    }
}