<?php
include'../database/env.php';
$id = $_GET['id'];
$querry = "SELECT status FROM banners WHERE id = '$id'";
$data = mysqli_query($conn,$querry);
$banner = mysqli_fetch_assoc($data);


if($banner['status'] == 0 ){ 
    $querry = "UPDATE banners SET status='1' WHERE id = '$id'";
}else{
    $querry = "UPDATE banners SET status='0' WHERE id = '$id'";
}
mysqli_query($conn,$querry);
header("location:../backend/all_banner.php");