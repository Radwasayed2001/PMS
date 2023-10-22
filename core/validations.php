<?php

function emailVal($input) {
    if (filter_var($input,FILTER_VALIDATE_EMAIL)) {
        return true;
    } 
    return false;
}