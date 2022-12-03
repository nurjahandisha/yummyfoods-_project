<?php
session_start();
include'../database/env.php';
if(isset($_POST['submit'])){

$request =$_POST;
// var_dump($request);
// exit();


$title=$request['title'];
$detail=$request['detail'];
$video=$request['video_'];
$banner_img=$_FILES['banner_img'];
$extension = pathinfo($banner_img['name'])['extension'];
$accepted_extension = ['jpg','png','webp','svg','jpeg'];

// print_r($banner_img);

// validattion
$errors = [];

if(empty($title)){
    $errors['title'] ="plz enter a Banner Tiltle";
}
if(empty($detail)){
    $errors['detail'] ="plz enter a Banner Detail ";
}
if(empty($video)){
    $errors['video_'] ="plz enter a Banner Video";
}
if($banner_img['size'] == 0 ){
    $errors['banner_img'] ="plz Insert a Banner Img";  
}elseif(in_array($extension,$accepted_extension) == false){
    $errors['banner_img'] ="plz Insert a proper Img Formet"; 
}




if(count($errors)>0){

    $_SESSION['errors'] =$errors;
    header("location:../backend/Add_banner.php");

}else{
    
$New_image_name = 'Banner-'.uniqid() . '.' . $extension ;
  move_uploaded_file($banner_img['tmp_name'], '../uploads/banners/' .$New_image_name);
        $querry = "INSERT INTO banners(banner_img, title, detail, video) VALUES ('$New_image_name','$title', '$detail', '$video')";
        $store = mysqli_query($conn,$querry);
    header("location:../backend/Add_banner.php");







    





}


















}