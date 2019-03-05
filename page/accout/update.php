<script>

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#img_member').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }else{
            $('#img_member').attr('src', 'images/user/default.png');
        }
    }
</script>

<h1>เเก้ไขข้อมูลข้อมูลลูกค้า</h1>
<div align="right">

</div>

<form role="form" method="post" action="index.php?content=member&action=edit" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-9">
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>username <font color="#F00"><b>*</b></font></label>
                        <input id="member_username" name="member_username" class="form-control" value="<?php echo $member['user_username']?>" autocomplete="off">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>password <font color="#F00"><b>*</b></font></label>
                        <input id="member_password" name="member_password" class="form-control" value="<?php echo $member['member_password']?>" autocomplete="off">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>ประเภท <font color="#F00"><b>*</b></font></label>
                        <input id="member_typemember" name="member_typemember" class="form-control" value="<?php echo $member['member_typemember']?>" autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label>ชื่อ <font color="#F00"><b>*</b></font></label>
                        <input id="member_firstname" name="member_firstname" class="form-control" value="<?php echo $member['member_firstname']?>" autocomplete="off">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label>นามสกุล <font color="#F00"><b>*</b></font></label>
                        <input id="member_lastname" name="member_lastname" class="form-control" value="<?php echo $member['member_lastname']?>" autocomplete="off">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label>เบอร์โทรศัพท์ </label>
                        <input id="member_phone" name="member_phone" class="form-control" value="<?php echo $member['member_phone']?>" autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>ที่อยู่อีเมล </label>
                        <input id="member_email" name="member_email" class="form-control" value="<?php echo $member['member_email']?>" autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>FACEBOOK URL </label>
                        <input id="member_facebook" name="member_facebook" class="form-control" value="<?php echo $member['member_facebook']?>" autocomplete="off">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>LINE ID </label>
                        <input id="member_line" name="member_line" class="form-control" value="<?php echo $member['member_line']?>" autocomplete="off">
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label>ที่อยู่ <font color="#F00"><b>*</b></font> </label>
                <textarea type="text" id="member_address" name="member_address" class="form-control" ><?php echo $member['member_address']?></textarea>
                <p class="help-block">Example : 271/55.</p>
            </div>
        </div>
    </div>
    <!-- /.row (nested) -->

    <div class="row">
        <div class="col-lg-3">
            <div class="form-group">
                <label>จังหวัด <font color="#F00"><b>*</b></font> </label>
                <input id="member_province" name="member_province" type="text" class="form-control" value="<?php echo $member['member_province']?>">
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group">
                <label>อำเภอ/เขต <font color="#F00"><b>*</b></font> </label>
                <input id="member_amphur" name="member_amphur" type="text" class="form-control" value="<?php echo $member['member_amphur']?>">
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group">
                <label>ตำบล/แขวง <font color="#F00"><b>*</b></font> </label>
                <input id="member_district" name="member_district" type="text" class="form-control" value="<?php echo $member['member_district']?>">
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group">
                <label>หมายเลขไปรษณีย์ <font color="#F00"><b>*</b></font> </label>
                <input id="member_zipcode" name="member_zipcode" type="text" class="form-control" value="<?php echo $member['member_zipcode']?>">
            </div>
        </div>
    </div>

    <div align="right">
        <input type="hidden"  id="member_id" name="member_id" value="<?php echo $member['member_id'] ?>" />
        <input type="hidden"  id="member_image_o" name="member_image_o" value="<?php echo  $member['member_image'] ?>" />
        <button type="button" class="btn btn-default" onclick="window.location='?content=accout';" >ย้อนกลับ</button>
        <button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
        <button name="submit" type="submit" class="btn btn-success">บันทึกข้อมูล</button>
    </div>
</form>