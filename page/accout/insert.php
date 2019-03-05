<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#img_member').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    } else {
        $('#img_member').attr('src', 'images/user/default.png');
    }
}
</script>

<h1>เเก้ไขข้อมูลข้อมูลลูกค้า</h1>
<div align="right">

</div>

<form role="form" method="post" action="index.php?content=accout&action=add" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-9">
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>username <font color="#F00"><b>*</b></font></label>
                        <input id="member_username" name="member_username" class="form-control"
                            value="<?php echo $member['member_username']?>" autocomplete="off">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>password <font color="#F00"><b>*</b></font></label>
                        <input id="member_password" name="member_password" class="form-control"
                            value="<?php echo $member['member_password']?>" autocomplete="off">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>ประเภท <font color="#F00"><b>*</b></font></label>
                        <input id="member_typemember" name="member_typemember" class="form-control"
                            value="<?php echo $member['member_typemember']?>" autocomplete="off">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>เพศ <font color="#F00"><b>*</b></font></label>
                        <input id="member_sex" name="member_sex" class="form-control"
                            value="<?php echo $member['member_sex']?>" autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label>ชื่อ <font color="#F00"><b>*</b></font></label>
                        <input id="member_firstname" name="member_firstname" class="form-control"
                            value="<?php echo $member['member_firstname']?>" autocomplete="off">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label>นามสกุล <font color="#F00"><b>*</b></font></label>
                        <input id="member_lastname" name="member_lastname" class="form-control"
                            value="<?php echo $member['member_lastname']?>" autocomplete="off">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label>เบอร์โทรศัพท์ </label>
                        <input id="member_tel" name="member_tel" class="form-control"
                            value="<?php echo $member['member_tel']?>" autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label> วันเกิด </label>
                        <input id="member_birthday" name="member_birthday" class="form-control"
                            value="<?php echo $member['member_birthday']?>" autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label> วันที่เริ่ม </label>
                        <input id="member_start" name="member_start" class="form-control"
                            value="<?php echo $member['member_start']?>" autocomplete="off">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label> วันที่หมดอายุ </label>
                        <input id="member_expiry" name="อ" class="form-control"
                            value="<?php echo $member['member_expiry']?>" autocomplete="off">
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label>ที่อยู่ <font color="#F00"><b>*</b></font> </label>
                <textarea type="text" id="member_address" name="member_address"
                    class="form-control"><?php echo $member['member_address']?></textarea>
                <p class="help-block">Example : 271/55.</p>
            </div>
        </div>
    </div>
    <!-- /.row (nested) -->

    <div class="row">
        <div class="col-lg-3">
            <div class="form-group">
                <?PHP  $trainer =  $member_model->getUserByTrainer();
    //   print_r ($trainer);  
      ?>

                <select class="form-control  custom-select" id="room_type_id" name="room_type_id">
                    <?PHP 
                    for ($i=0; $i < count($trainer); $i++) { ?>
                    <option value="<?PHP echo $trainer[$i]['member_id'];?>" <?PHP if($trainer[$i]['member_id'] == $member['member_keeper']){echo 'selected';}?>> 
                    <?PHP echo $trainer[$i]['member_firstname']
                        .' '.  $trainer[$i]['member_lastname'];?>
                    </option>
                    <?PHP }?>
                </select>




            </div>
        </div>

    </div>

    <div align="right">
        <input type="hidden" id="member_id" name="member_id" value="<?php echo $member['member_id'] ?>" />
        <button type="button" class="btn btn-default" onclick="window.location='?content=accout';">ย้อนกลับ</button>
        <button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
        <button name="submit" type="submit" class="btn btn-success">บันทึกข้อมูล</button>
    </div>
</form>