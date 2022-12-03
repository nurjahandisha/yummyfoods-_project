<?php
session_start();
include'../database/env.php';

if(isset($_POST['submit'])){


$email =$_POST['email'];
$password =$_POST['password'];
$enc_password = sha1( $password);

$errors =[];

if(empty($email)){
    $errors['email'] ="plz enter you email address";
}
if(empty($password)){
    $errors['password'] ="plz enter you password";
}
if(count($errors)>0){

    $_SESSION['errors'] =$errors;
    header("location:../backend/login.php");

}else{
    

    $querry ="SELECT * FROM users WHERE email ='$email' ";
    $data = mysqli_query($conn,$querry);
    if(mysqli_num_rows($data) > 0){

        $querry="SELECT * FROM users WHERE email ='$email' AND password ='$enc_password' ";
        $data = mysqli_query($conn,$querry);
        if(mysqli_num_rows($data) > 0){

        $auth = mysqli_fetch_assoc($data);
            $_SESSION['auth']=$auth;

            header("location:../backend/dashboard.php");


        }else{
            $_SESSION['errors']['password'] ="incorrect password";
            header("location:../backend/login.php");

        }


 

    }else{
        $_SESSION['errors']['email'] ="no email address found";
        header("location:../backend/login.php");
    }





}






















}