<?php
$menu = $_GET['menu'];
$id = $_GET['id'];
include '../connect/connect.php';


if($menu == 'delnews'){
    $query="delete from news where n_number = '$id'";
    if(mysqli_query($con,$query)){
            header("location:../admin/news.php");
    }else{
    echo "No".mysqli_error($con);
    } 
}

if($menu == 'delproduct'){
    $query="delete from product where Id_Product = '$id'";
    if(mysqli_query($con,$query)){
            header("location:../admin/product.php");
    }else{
    echo "No".mysqli_error($con);
    } 
}

if($menu == 'delrepair'){
    $query="delete from repair where r_id = '$id'";
    if(mysqli_query($con,$query)){
            header("location:../admin/repair.php");
    }else{
    echo "No".mysqli_error($con);
    } 
}

if($menu == 'delrepair1'){
    $query="delete from repair where r_id = '$id'";
    if(mysqli_query($con,$query)){
            header("location:../repairshow.php");
    }else{
    echo "No".mysqli_error($con);
    } 
}

if($menu == 'delpersonnel'){
    $query="delete from personnel where p_id = '$id'";
    if(mysqli_query($con,$query)){
            header("location:../admin/personnel.php");
    }else{
    echo "No".mysqli_error($con);
    } 
}


?>