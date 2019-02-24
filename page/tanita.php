
<script>
    //---------ฟังชั่นแสดงรูป----------------
    function readURL(input) {
        if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#_img').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
        }else{
            $('#_img').attr('src', 'images/tanita/default.jpg');
        }
    }
</script>

<?php

$path = "images/tanita/";
$img_path = "images/tanita/";
include 'models/BaseModel.php';
require_once 'models/BaseModel.php';
$target_dir = "images/tanita/";
    //---------------------ฟังก์ชั่นวันที่------------------------------------
    date_default_timezone_set("Asia/Bangkok");
    $d1=date("d");
    $d2=date("m");
    $d3=date("Y");
    $d4=date("H");
    $d5=date("i");
    $d6=date("s");
    $date="$d1$d2$d3$d4$d5$d6";
    //---------------------------------------------------------------------
    if(isset ($_GET['action']) == "insert") {
        if(isset($_POST['tanita_id'])){
            $check = true;
            $data = [];
            $data['tanita_id'] = $_POST['tanita_id'];
            $data['member_id'] = $_POST['member_id'];
            //-----------------ฟังก์ชั่นสุ่มตัวเลข----------------
            $numrand = (mt_rand());
            //-----------------------------------------------
            if($_FILES['tanita_img']['name'] == ""){
                 $data['tanita_img'] = $_POST['tanita_img_o'];
            }else {
                //---------เอาชื่อไฟล์เก่าออกให้เหลือแต่นามสกุล----------
                $type = strrchr($_FILES['tanita_img']['name'],".");
                //--------------------------------------------------
                //-----ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม---------
                $newname = $date.$numrand.$type;
                $path_copy=$path.$newname;
                $path_link=$target_dir.$newname;
                //-------------------------------------------------
                $target_file = $target_dir .$date.$newname;
                 $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                // Check if file already exists
                if (file_exists($target_file)) {
                    $error_msg =  "ขอโทษด้วย. มีไฟล์นี้ในระบบแล้ว";
                    $check = false;
                }else if ($_FILES["tanita_img"]["size"] > 5000000) {
                    $error_msg = "ขอโทษด้วย. ไฟล์ของคุณต้องมีขนาดน้อยกว่า 5 MB.";
                    $check = false;
                }else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                    $error_msg = "ขอโทษด้วย. ระบบสามารถอัพโหลดไฟล์นามสกุล JPG, JPEG, PNG & GIF เท่านั้น.";
                    $check = false;
                }else if (move_uploaded_file($_FILES["tanita_img"]["tmp_name"], $target_file)) {
                    //-----------------------------------
                    $data['tanita_img'] = $date.$newname;
                    //-----------------------------------
                    if( $_POST['tanita_img_o'] != null){
                        $target_file = $target_dir . $_POST['tanita_img_o'];
                        if (file_exists($target_file)) {
                            unlink($target_file);
                        }
                    }
                } else {
                    $error_msg =  "ขอโทษด้วย. ระบบไม่สามารถอัพโหลดไฟล์ได้.";
                    $check = false;
                } 
            }
            //------------------------------------------------------------------------------'
            $tanita_img =  $data['tanita_img'];
            $member_id =  $data['member_id'];
            // echo $tanita_img . $member_id;
            if($check == false){
               
                ?>
    <script>
    alert('<?php echo $error_msg; ?>');
    window.history.back();
    </script>
    <?php
              
            }else{
                $result = "INSERT INTO vip_tanita (
                    tanita_id, 
                    tanita_img, 
                    member_id) VALUES (
                        NULL, 
                        '$tanita_img', 
                        '$member_id'
                        )";
print_r($result);
if(mysqli_query($con,$result)){
    // header("location:../index.php");
    }else{
    // echo "No".mysqli_error($con);
   } 
                if($result){
                    ?>
    <script>
    window.location = "index.php?content=tanita"
    // print_r( $result);
    </script>
    <?php
                }else{
                    ?>
    <script>
    window.history.back();
    </script>
    <?php
                }
            }
        }else{
            require_once('page/tanita.php');
        }
        
        }

?>


<form id="form_target" role="form" method="post" action="index.php?content=tanita&action=insert" enctype="multipart/form-data">
    <input type="hidden" id="tanita_img_o" name="tanita_img_o" />
    <input type="hidden" id="tanita_id" name="tanita_id" />


    <div class="form-group" align="center">
        <img id="_img" width="400" src="<?PHP  echo $img_path . 'default.jpg ';?> " class="img-fluid" alt="">
        <input accept=".jpg , .png" type="file" id="tanita_img" name="tanita_img" class="form-control"
            style="margin: 14px 0 0 0 ;" onChange="readURL(this);">
    </div>
    <div class="col">
        
        <select class="form-control  custom-select" id="member_id" name="member_id">
            <option  value="">เลือก tanita</option><?PHP echo "ggg";?></option>
                <?PHP $sql="SELECT * FROM `vip_member` WHERE `member_status`= 'member'";
                    $i = 1;
                    $result= mysqli_query($con,$sql);
                    while($row=mysqli_fetch_array($result)){ ?> ?>
                <option  value="<?PHP echo $row['member_id'];?>"><?PHP echo $row['member_firstname'];?></option><?PHP } ?>
            <option  value=""> อื่น ๆ </option>
        </select>
    </div>

    <button type="submit">submit</button>
</form>