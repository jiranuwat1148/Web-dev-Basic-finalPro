<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = $_POST['Uname'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $Cpassword = $_POST['Cpassword'] ?? '';
    if($Cpassword != $password){
        
    }
}
renderView('createAcc');