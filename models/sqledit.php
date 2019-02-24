<?php
$menu = $_POST['menu'];
include '../connect/connect.php';


if($menu == 'editadmin'){
        $id = $_POST['id'];
        $username = $_POST['txtUsernaem'];
        $pass = $_POST['txtPass'];
        $fullname = $_POST['txtFullname'];
        //echo "Yes addemployee";
        $query="update login set Username = '$username',Password = '$pass' ,Name_Login = '$fullname' where Id_Login = 2";
        if(mysqli_query($con,$query)){
                header("location:../admin/manage.php");
        }else{
        echo "No".mysqli_error($con);
        } 
}

?>