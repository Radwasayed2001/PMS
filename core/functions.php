<?php
session_start();
function minlength($inp, $len) {
    if (strlen($inp) <= $len) {
        return true;
    }
    return false;
}
function maxlength($inp, $len) {
    if (strlen($inp) >= $len) {
        return true;
    }
    return false;
}
function redirect($path) {
    header("location:$path");
}
function isvalid($inp){
    
    if (isset($_SESSION['error'][$inp])){
        echo "is-invalid";
    }
    else if (isset($_SESSION[$inp])) {
        echo "is-valid";
    }
    else {
        echo "";
    }
    
}
function validfeedback($inp){
    
    if (isset($_SESSION['error'][$inp])){
        echo "invalid-feedback";
    }
    else if (isset($_SESSION[$inp])) {
        echo "valid-feedback";
        
    }
    else {
        echo "valid-feedback";
    }
    
}
function value($inp){
    if (isset($_SESSION['error'][$inp])){
        echo "";
    }
    else if (isset($_SESSION[$inp])) {
        echo $_SESSION[$inp];
        // unset($_SESSION[$inp]);
    }
    else {
        echo "";
    }
}