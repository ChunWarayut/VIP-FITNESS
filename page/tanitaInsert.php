<script>
//---------ฟังชั่นแสดงรูป----------------
function readURL_1(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#_img_1').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    } else {
        $('#_img_1').attr('src', 'images/tanita/default.jpg');
    }
}
//---------ฟังชั่นแสดงรูป----------------
function readURL_2(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#_img_2').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    } else {
        $('#_img_2').attr('src', 'images/tanita/default.jpg');
    }
}
//---------ฟังชั่นแสดงรูป----------------
function readURL_3(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#_img_3').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    } else {
        $('#_img_3').attr('src', 'images/tanita/default.jpg');
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
            $data['customer_id'] = $_POST['customer_id'];
            $data['tanita_lesson'] = $_POST['tanita_lesson'];
            $data['tanita_comment'] = $_POST['tanita_comment'];
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
            $tanita_lesson =  $data['tanita_lesson'];
            $customer_id =  $data['customer_id'];
            $member_id =  $data['member_id'];
            $tanita_comment =  $data['tanita_comment'];
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
                    tanita_lesson, 
                    customer_id, 
                    tanita_comment, 
                    member_id) VALUES (
                        NULL, 
                        '$tanita_img', 
                        '$tanita_lesson', 
                        '$customer_id', 
                        '$tanita_comment', 
                        '$member_id'
                        )";
// print_r($result);
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

<?PHP $id = $_GET['id']; ?>
<?PHP
            require_once('models/UserModel.php');

            $tanita_model = new UserModel;

            $tanita = $tanita_model->getTanitaBy($id, $time, $member);


            ?>


<div class="card">
    <div class="card-header">

        <h1>
            เพิ่ม Tanita
        </h1>
    </div>
    <br>



    <div class="row">



        <div class="col-4">
            <form id="form_target" role="form" method="post" action="index.php?content=tanitaInsert&action=insert"
                enctype="multipart/form-data">

                <?PHP 
            $tanita = $tanita_model->getTanitaBy($_GET['id'], '1');
            // echo "<pre>";
            // print_r($tanita);
            // echo "</pre>";
            ?>
                <input type="hidden" id="tanita_img_o" name="tanita_img_o" />
                <input type="hidden" id="tanita_id" name="tanita_id" />
                <input type="hidden" id="tanita_lesson" name="tanita_lesson" value="1" />
                <input type="hidden" id="customer_id" name="customer_id" value="<?PHP echo $_GET['id']; ?>" />


                <div class="form-group" align="center">


                    <img id="_img_1" width="400" src="<?PHP
                if ($tanita[0]['tanita_img'] != '' ) {
                    # code...
                // echo $img_path . $tanita[0]['tanita_img'];
                } else {
                    # code...
                echo $img_path . 'default.jpg ';
                }


                
                
                
                ?> " class="img-fluid" alt="">


                    <?PHP if ($tanita[0]['tanita_img'] == "" || $tanita[0]['tanita_img'] == null) { ?>
                    <input accept=".jpg , .png" type="file" id="tanita_img_1" name="tanita_img" class="form-control"
                        style="margin: 14px 0 0 0 ;" onChange="readURL_1(this);">


                </div>
                <div class="col">





                    <?PHP 
            
require_once('models/UserModel.php');

$member_model = new UserModel;

$trainer =  $member_model->getUserByTrainer();
    //   print_r ($trainer);  
      ?>


                    <select class="form-control  custom-select" id="member_id" name="member_id">
                        <option value="">เลือก tanita</option>
                        <?PHP 
                    for ($i=0; $i < count($trainer); $i++) { ?>
                        <option value="<?PHP echo $trainer[$i]['member_id'];?>" <?PHP
                            if($_GET['t_id']==$trainer[$i]['member_id']) { echo 'selected' ;} ?>>
                            <?PHP echo $trainer[$i]['member_firstname']
                        .' '.  $trainer[$i]['member_lastname'];?>
                        </option>
                        <?PHP }?>
                        <option value=""> อื่น ๆ </option>
                    </select>

                    <div class="">
                        <div class="form-group">
                            <!-- <label>About Sub Title TH<font color="#F00"><b>*</b></font></label> -->
                            <textarea class="form-control " id="tanita_comment" name="tanita_comment"
                                rows="8"><?PHP echo  $tanita[0]['tanita_comment'];?></textarea>
                        </div>
                    </div>

                    <button type="submit"
                        class="au-btn au-btn-icon au-btn--green au-btn--small btn-right">submit</button>
                    <?PHP } else {
    # code...
    ?>
                           <style>
                    @media print {
                        #print {
                            display: none;
                        }
                    }
                    </style>
                    <script type="text/javascript">
                    function printSelection(node) {

                        var content = node.innerHTML
                        var pwin = window.open('');
                        var cStyls = document.getElementsByTagName('stylesheet')

                        pwin.document.open();
                        pwin.document.write('<html><body onload="window.print()">' + content + '</body></html>');
                        pwin.document.close();

                        if (document.getElementById("print").style.display == "inline") {
                            document.getElementById("print").style.display = "none";
                        }
                        setTimeout(function() {
                            pwin.close();
                        }, 10000);

                    }
                    </script>
                    <DIV id="report">
                        <img id="_img_3" width="400" src="<?PHP echo $img_path . $tanita[0]['tanita_img'];?> "
                            style="    max-width: 100%; height: fit-content;"  alt="">

                        <div class="">
                            <div class="form-group">
                                <!-- <label>About Sub Title TH<font color="#F00"><b>*</b></font></label> -->
                                <?PHP echo  $tanita[0]['tanita_comment'];?>
                            </div>
                        </div>


                        <!--#include file="include/css_div_print.inc" -->

                    </DIV>

                        <input name="button6" type="button"  value=" - = ออกรายงาน = - " id="print"
                            onClick="printSelection(document.getElementById('report'))" />



                    <?
?>
<!-- 
                    <div class="">
                        <div class="form-group">
                            <textarea class="form-control " id="tanita_comment" name="tanita_comment"
                                rows="8"><?PHP echo  $tanita[0]['tanita_comment'];?></textarea>
                        </div>
                    </div> -->

                    <?    
} ?>

                </div>

            </form>
        </div>


        <div class="col-4">
            <form id="form_target" role="form" method="post" action="index.php?content=tanitaInsert&action=insert"
                enctype="multipart/form-data">


                <?PHP 
            $tanita = $tanita_model->getTanitaBy($_GET['id'], '2');
            // echo "<pre>";
            // print_r($tanita);
            // echo "</pre>";
            ?>

                <input type="hidden" id="tanita_img_o" name="tanita_img_o" />
                <input type="hidden" id="tanita_id" name="tanita_id" />
                <input type="hidden" id="tanita_lesson" name="tanita_lesson" value="2" />
                <input type="hidden" id="customer_id" name="customer_id" value="<?PHP echo $_GET['id']; ?>" />


                <div class="form-group" align="center">

                    <img id="_img_2" width="400" src="<?PHP
                if ($tanita[0]['tanita_img'] != '' ) {
                    # code...
                // echo $img_path . $tanita[0]['tanita_img'];
                } else {
                    # code...
                echo $img_path . 'default.jpg ';
                }


                
                
                
                ?> " class="img-fluid" alt="">




                    <?PHP if ($tanita[0]['tanita_img'] == "" || $tanita[0]['tanita_img'] == null) { ?>

                    <input accept=".jpg , .png" type="file" id="tanita_img_2" name="tanita_img" class="form-control"
                        style="margin: 14px 0 0 0 ;" onChange="readURL_2(this);">



                </div>
                <div class="col">
                    <?PHP 
            
require_once('models/UserModel.php');

$member_model = new UserModel;

$trainer =  $member_model->getUserByTrainer();
    //   print_r ($trainer);  
      ?>


                    <select class="form-control  custom-select" id="member_id" name="member_id">
                        <option value="">เลือก tanita</option>
                        <?PHP 
                    for ($i=0; $i < count($trainer); $i++) { ?>
                        <option value="<?PHP echo $trainer[$i]['member_id'];?>" <?PHP
                            if($_GET['t_id']==$trainer[$i]['member_id']) { echo 'selected' ;} ?>>
                            <?PHP echo $trainer[$i]['member_firstname']
                        .' '.  $trainer[$i]['member_lastname'];?>
                        </option>
                        <?PHP }?>
                        <option value=""> อื่น ๆ </option>
                    </select>


                    <div class="">
                        <div class="form-group">
                            <!-- <label>About Sub Title TH<font color="#F00"><b>*</b></font></label> -->
                            <textarea class="form-control " id="tanita_comment" name="tanita_comment"
                                rows="8"><?PHP echo  $tanita[0]['tanita_comment'];?></textarea>
                        </div>
                    </div>


                    <button type="submit"
                        class="au-btn au-btn-icon au-btn--green au-btn--small btn-right">submit</button>

                    <?PHP } else {
    # code...

    ?>
    


    <style>
                    @media print {
                        #print {
                            display: none;
                        }
                    }
                    </style>
                    <script type="text/javascript">
                    function printSelection(node) {

                        var content = node.innerHTML
                        var pwin = window.open('');
                        var cStyls = document.getElementsByTagName('stylesheet')

                        pwin.document.open();
                        pwin.document.write('<html><body onload="window.print()">' + content + '</body></html>');
                        pwin.document.close();

                        if (document.getElementById("print").style.display == "inline") {
                            document.getElementById("print").style.display = "none";
                        }
                        setTimeout(function() {
                            pwin.close();
                        }, 10000);

                    }
                    </script>
                    <DIV id="report2">
                        <img id="_img_3" width="400" src="<?PHP echo $img_path . $tanita[0]['tanita_img'];?> "
                            style="    max-width: 100%; height: fit-content;"  alt="">

                        <div class="">
                            <div class="form-group">
                                <!-- <label>About Sub Title TH<font color="#F00"><b>*</b></font></label> -->
                                <?PHP echo  $tanita[0]['tanita_comment'];?>
                            </div>
                        </div>



                        <!--#include file="include/css_div_print.inc" -->

                    </DIV>

                        <input name="button6" type="button"  value=" - = ออกรายงาน = - " id="print"
                            onClick="printSelection(document.getElementById('report2'))" />




                    <?

    
?>

                    <!-- <div class="">
                        <div class="form-group">
                            <textarea class="form-control " id="tanita_comment" name="tanita_comment"
                                rows="8"><?PHP echo $trainer[0]['tanita_comment'];?></textarea>
                        </div>
                    </div> -->

                    <?    





} ?>
                </div>

            </form>
        </div>

        <div class="col-4">
            <form id="form_target" role="form" method="post" action="index.php?content=tanitaInsert&action=insert"
                enctype="multipart/form-data">


                <?PHP 
            $tanita = $tanita_model->getTanitaBy($_GET['id'], '3');
            
            // echo "<pre>";
            // print_r($tanita);
            // echo "</pre>";
            ?>

                <input type="hidden" id="tanita_img_o" name="tanita_img_o" />
                <input type="hidden" id="tanita_id" name="tanita_id" />
                <input type="hidden" id="tanita_lesson" name="tanita_lesson" value="3" />
                <input type="hidden" id="customer_id" name="customer_id" value="<?PHP echo $_GET['id']; ?>" />


                <div class="form-group" align="center">

                    <img id="_img_3" width="400" src="<?PHP
            if ($tanita[0]['tanita_img'] != '' ) {
                # code...
            // echo $img_path . $tanita[0]['tanita_img'];
            } else {
                # code...
            echo $img_path . 'default.jpg ';
            }


            
            
            
            ?> " class="img-fluid" alt="">


                    <?PHP if ($tanita[0]['tanita_img'] == "" || $tanita[0]['tanita_img'] == null) { ?>

                    <input accept=".jpg , .png" type="file" id="tanita_img_3" name="tanita_img" class="form-control"
                        style="margin: 14px 0 0 0 ;" onChange="readURL_3(this);">


                </div>
                <div class="col">

                    <?PHP 
            
require_once('models/UserModel.php');

$member_model = new UserModel;

$trainer =  $member_model->getUserByTrainer();
    //   print_r ($trainer);  
      ?>


                    <select class="form-control  custom-select" id="member_id" name="member_id">
                        <option value="">เลือก tanita</option>
                        <?PHP 
                    for ($i=0; $i < count($trainer); $i++) { ?>
                        <option value="<?PHP echo $trainer[$i]['member_id'];?>" <?PHP
                            if($_GET['t_id']==$trainer[$i]['member_id']) { echo 'selected' ;} ?>>
                            <?PHP echo $trainer[$i]['member_firstname']
                        .' '.  $trainer[$i]['member_lastname'];?>
                        </option>
                        <?PHP }?>
                        <option value=""> อื่น ๆ </option>
                    </select>




                    <div class="">
                        <div class="form-group">
                            <!-- <label>About Sub Title TH<font color="#F00"><b>*</b></font></label> -->
                            <textarea class="form-control " id="tanita_comment" name="tanita_comment"
                                rows="8"><?PHP echo $trainer[0]['tanita_comment'];?></textarea>
                        </div>
                    </div>





                    <button type="submit"
                        class="au-btn au-btn-icon au-btn--green au-btn--small btn-right">submit</button>

                    <?PHP } else {
    # code...

    ?>
                    <!-- <a href="">print</a>
                    <input type="button" value="- = ออกรายงาน = -" onClick="window.print()"> -->

                    <?

    
?>

                    <style>
                    @media print {
                        #print {
                            display: none;
                        }
                    }
                    </style>
                    <script type="text/javascript">
                    function printSelection(node) {

                        var content = node.innerHTML
                        var pwin = window.open('');
                        var cStyls = document.getElementsByTagName('stylesheet')

                        pwin.document.open();
                        pwin.document.write('<html><body onload="window.print()">' + content + '</body></html>');
                        pwin.document.close();

                        if (document.getElementById("print").style.display == "inline") {
                            document.getElementById("print").style.display = "none";
                        }
                        setTimeout(function() {
                            pwin.close();
                        }, 10000);

                    }
                    </script>
                    <DIV id="report3">
                        <img id="_img_3" width="400" src="<?PHP echo $img_path . $tanita[0]['tanita_img'];?> "
                            style="    max-width: 100%; height: fit-content;"  alt="">

                        <div class="">
                            <div class="form-group">
                                <!-- <label>About Sub Title TH<font color="#F00"><b>*</b></font></label> -->
                                <?PHP echo  $tanita[0]['tanita_comment'];?>
                            </div>
                        </div>



                        <!--#include file="include/css_div_print.inc" -->

                    </DIV>


                        <input name="button6" type="button"  value=" - = ออกรายงาน = - " id="print"
                            onClick="printSelection(document.getElementById('report3'))" />



                    <?    





    
} ?>

                </div>

            </form>
        </div>






    </div>