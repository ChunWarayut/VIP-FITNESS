<?php
date_default_timezone_set("Asia/Bangkok");
include 'BaseModel.php';
$menu = $_POST['menu'];
$d1=date("d");
$d2=date("m");
$d3=date("Y");
$d4=date("H");
$d5=date("i");
$d6=date("s");
$date="$d1$d2$d3$d4$d5$d6";
$target_promotion = "../images/promotion/";
// -------------------   promotion ------------------------------------
if($menu == 'addpromotion'){
  if($_FILES['promotion_image']['name'] == ""){
    $data['promotion_image'] = "";
  }else {
    $image = $_FILES['promotion_image']['name'];
    $extension = pathinfo($image, PATHINFO_EXTENSION);
    $image=$date."-img_promotion.".$extension;  //rename image
    $target_file = $target_promotion .$image;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if file already exists
    if (file_exists($target_file)) {
        $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
        $check = false;
    }else if ($_FILES['promotion_image']["size"] > 5000000) {
        $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
        $check = false;
    }else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
        $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
        $check = false;
    }else if (move_uploaded_file($_FILES['promotion_image']['tmp_name'], $target_file)) {
        $data['promotion_image'] =$image;
        //$data['promotion_image'] = $date.'-'.strtolower(basename($_FILES['promotion_image']['name']));

    } else {
        $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
        $check = false;
    } 
            }
        $name = $_POST['promotion_name'];
        $image =  $data['promotion_image'];
        $detail = $_POST['promotion_detail'];
        $adddate = date("Y-m-d");//n7
        $admin= "1";
        $query="insert into vip_promotion (promotion_name, promotion_image, promotion_detail, promotion_adddate, promotion_sale_id) 
               values( '$name','$image','$detail','$adddate','$sale')";
        
        if(mysqli_query($con,$query)){
        header("location:../index.php");
        }else{
        echo "No".mysqli_error($con);
       } 
}
if($menu == 'editpromotion'){
  if($_FILES['promotion_image']['name'] == ""){
    $data['promotion_image'] = "";
  }else {
    $image = $_FILES['promotion_image']['name'];
    $extension = pathinfo($image, PATHINFO_EXTENSION);
    $image=$date."-img_promotion.".$extension;  //rename image
    $target_file = $target_promotion .$image;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if file already exists
    if (file_exists($target_file)) {
        $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
        $check = false;
    }else if ($_FILES['promotion_image']["size"] > 5000000) {
        $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
        $check = false;
    }else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
        $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
        $check = false;
    }else if (move_uploaded_file($_FILES['promotion_image']['tmp_name'], $target_file)) {
        $data['promotion_image'] =$image;
        //$data['promotion_image'] = $date.'-'.strtolower(basename($_FILES['promotion_image']['name']));

    } else {
        $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
        $check = false;
    } 
            }
        $name = $_POST['promotion_name'];
        $image =  $data['promotion_image'];
        $detail = $_POST['promotion_detail'];
        $adddate = date("Y-m-d");//n7
        $admin= "1";
        $query="insert into vip_promotion (promotion_name, promotion_image, promotion_detail, promotion_adddate, promotion_sale_id) 
               values( '$name','$image','$detail','$adddate','$sale')";
        
        if(mysqli_query($con,$query)){
        header("location:../index.php");
        }else{
        echo "No".mysqli_error($con);
       } 
}

if($menu == 'editnews'){
        $id = $_POST['id'];
        $title = $_POST['n3'];
        $pic =  $urlimg;//n4
        $content = $_POST['n5'];
        $category = $_POST['n6'];
        $date = date("Y-m-d H:i:s");//n7
        $query="update news set n_title = '$title' ,n_picture = '$pic',n_content = '$content',n_category = '$category',n_date = '$pdateic', where n_id = '$id'";
        if(mysqli_query($con,$query)){
    header("location:../admin/news.php");
        }else{
        echo "No".mysqli_error($con);
        }
}



?>