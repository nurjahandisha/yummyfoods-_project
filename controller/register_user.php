<?php
session_start();
include'../database/env.php';

if(isset($_POST['Register'])){
    $first_name=$_POST['fname'];
    $last_name=$_POST['lname']; 
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirm_password=$_POST['confirm_password'];
    $enc_password=sha1($password);



    $errors= [];

    if(empty($first_name)){
        $errors['fname_error']="please Enter Your Fname";
    }
    if(empty($last_name)){
        $errors['lname_error']="please Enter Your lname";
    }
    if(empty($email)){
        $errors['email_error']="please Enter Your email";
    }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){

        $errors['email_error']="please Enter a validate email adress";

    }

    if(empty($password)){
        $errors['password_error']="please Enter Your password";
    }
    if(empty($confirm_password)){
        $errors['confirm_password_error']="please Enter Your confirm password";
    }elseif($password !== $confirm_password){
        $errors['confirm_password']='confirm password did not match';
    }

    
    if(count($errors)>0){
        
        $_SESSION['errors']=$errors;
        header("location:../backend/register.php");
    }else{
           
       $querry = "INSERT INTO users( first_name, last_name, email, password) VALUES ('$first_name','$last_name','$email','$enc_password')";
       $store = mysqli_query($conn ,$querry);


       header("location:../backend/login.php");
    
    }



    

























}
