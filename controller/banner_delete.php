<?php
include'../database/env.php';
$id = $_GET['id'];
$querry = "SELECT banner_img FROM banners WHERE id = '$id'";
$data = mysqli_query($conn,$querry);
$banner = mysqli_fetch_assoc($data);
$path = "../uploads/banners/" . $banner['banner_img'] ; 

if(file_exists($path)){
    unlink($path);
}
$querry = "DELETE FROM banners WHERE id = '$id'";
$data = mysqli_query($conn,$querry);
if($data){
    header("location:../backend/all_banner.php");
}