<?PHP 
include 'models/PromotionModel.php';
$promotion_model = new PromotionModel;
$id = $_GET['id'];  
$promotion = $promotion_model -> getPromotionByID($id);
// print_r ($promotion);
// echo $promotion[0][promotion_id];



date_default_timezone_set("Asia/Bangkok");
$menu = $_POST['menu'];
$d1=date("d");
$d2=date("m");
$d3=date("Y");
$d4=date("H");
$d5=date("i");
$d6=date("s");
$date="$d1$d2$d3$d4$d5$d6";
$target_promotion = "images/promotion/";
// -------------------   promotion ------------------------------------



if(!isset($_GET['action'])){
}else if ($_GET['action'] == 'update'){

?>
<script>
window.location = "index.php?content=updatePromotion&id=<?PHP echo $id; ?>"
</script>
<?php

}else if ($_GET['action'] == 'delete'){
    $result = $promotion_model-> deletePromotionByID($id);
    ?>
<script>
window.location = "index.php?content=home"
</script>
<?php
}else if ($_GET['action'] == 'edit'){
    $data = [];
        $data['promotion_name'] = $_POST['promotion_name'];
        $data['promotion_detail'] = $_POST['promotion_detail'];
        $data['promotion_adddate'] = date("Y-m-d");//n7
// 
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
        $data['promotion_image'] = $image;
        //$data['promotion_image'] = $date.'-'.strtolower(basename($_FILES['promotion_image']['name']));
    } else {
        $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
        $check = false;
    } 
            }
        //------------------------------------------------------------------------------
        
            $result = $promotion_model-> updatePromotionByID($id ,$data,  $image);


    ?>
<script>
window.location = "index.php?content=home"
</script>
<?php
}
?>


    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailpromotionLabel">รายละเอียด</h5>
                
                <a href="index.php?content=home">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </a>
            </div>

            <div class="modal-body">

                <div class="form-group">

                    <label class=" form-control-label"><?php echo  $promotion[0]['promotion_id'];  ?></label>
                    <input readonly type="text" id="promotion_name" name="promotion_name" placeholder="ชื่อ"
                        class="form-control" value="<?php echo  $promotion[0]['promotion_name'];  ?>"> 
                </div>
                <div class="form-group">
                    <label class=" form-control-label">รูปภาพ</label>
                    <img id="image_promotion" src="images/promotion/<?php echo $promotion[0]['promotion_image']; ?>"
                    class="form-control-label">
                </div>
                <div class="form-group">
                    <label class=" form-control-label">รายละเอียดโมโมชั่น</label>
                    <textarea readonly id="promotion_detail" name="promotion_detail" class="form-control"
                        style="min-height: 120px;"><?php echo  $promotion[0]['promotion_detail'];  ?></textarea>
                </div>
                <div class="modal-footer">
                    <a href="index.php?content=home">
                        <button type="button" class="btn btn-secondary" >back</button>
                    </a>
                    <!-- <button class="btn btn-primary">Confirm</button> -->
                </div>
            </div>
        </div>
    </div>