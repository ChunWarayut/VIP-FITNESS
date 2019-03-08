<link href="css/account.css" rel="stylesheet">
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">


                            <?PHP 
                            

                            require_once('models/UserModel.php');

                            $member_model = new UserModel;

                            
                            $login_user = $member_model -> getUserByTrainerID($login_user['member_id']) ;
                            $login_user = $login_user[0];
                            
                            ?>

                    <form role="form" method="post" action="index.php?content=accout&action=edit"
                        enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-header">
                                <h4><strong class="card-title">ข้อมูลทั่วไป</strong></h4>
                            </div>
                            <input class="form-control" type="hidden" name="member_id" id="member_id" value="<?php echo $login_user['member_id'];?>" />
                            <input class="form-control" type="hidden" name="member_start" id="member_start" value="<?php echo $login_user['member_start'];?>" />
                            <input class="form-control" type="hidden" name="member_expiry" id="member_expiry" value="<?php echo $login_user['member_expiry'];?>" />
                            <input class="form-control" type="hidden" name="member_typemember" id="member_typemember" value="<?php echo $login_user['member_typemember'];?>" />
                            <input class="form-control" type="hidden" name="member_status" id="member_status" value="<?php echo $login_user['member_status'];?>" />
                            <input class="form-control" type="hidden" name="member_keeper" id="member_keeper" value="<?php echo $login_user['member_keeper'];?>" />

                            <div class="card-body">
                                <div class="typo-headers">


                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-6">

                                                <h4 class="pb-1 display-5">ชื่อผู้ใช้</h4>
                                                <input class="form-control" type="text" name="member_username"
                                                    id="member_username"
                                                    value="<?php echo $login_user['member_username'];?>" />

                                            </div>

                                            <div class="col-6">

                                                <h4 class="pb-1 display-5">รหัสผ่าน</h4>
                                                <input class="form-control" type="password" name="member_password"
                                                    id="member_password"
                                                    value="<?php echo $login_user['member_password'];?>" />

                                            </div>
                                            <div class="col-2">

                                                <h4 class="pb-1 display-5">ชื่อ</h4>
                                                <input class="form-control" type="text" name="member_firstname"
                                                    id="member_firstname"
                                                    value="<?php echo $login_user['member_firstname'];?>" />

                                            </div>

                                            <div class="col-2">

                                                <h4 class="pb-1 display-5">สกุล</h4>
                                                <input class="form-control" type="text" name="member_lastname"
                                                    id="member_lastname"
                                                    value="<?php echo $login_user['member_lastname'];?>" />

                                            </div>

                                            <div class="col-2">
                                                <h4 class="pb-1 display-5">เพศ</h4>
                                                <input class="form-control" type="text" name="member_sex"
                                                    id="member_sex" value="<?php echo $login_user['member_sex'];?>" />
                                            </div>

                                            <div class="col-3">
                                                <h4 class="pb-1 display-5">วันเกิด</h4>
                                                <input class="form-control" type="text" name="member_birthday"
                                                    id="member_birthday"
                                                    value="<?php echo $login_user['member_birthday'];?>" />
                                            </div>

                                            <div class="col-3">
                                                <h4 class="pb-1 display-5">หมายเลขโทรศัพท์</h4>
                                                <input class="form-control" type="text" name="member_tel"
                                                    id="member_tel" value="<?php echo $login_user['member_tel'];?>" />
                                            </div>

                                            <div class="col-12">
                                                <h4 class="pb-1 display-5">ที่อยู่</h4>
                                                <input class="form-control" type="text" name="member_address"
                                                    id="member_address" value="<?php echo $login_user['member_address'];?>" />
                                            </div>

                                            <div class="col-2">
                                                <h4 class="pb-1 display-5">วันเริ่ม</h4>
                                                <input disabled class="form-control" type="text"
                                                    value="<?php echo $login_user['member_start'];?>" />
                                            </div>

                                            <div class="col-2">
                                                <h4 class="pb-1 display-5">วันสิ้นสุด</h4>
                                                <input disabled class="form-control" type="text" 
                                                    value="<?php echo $login_user['member_expiry'];?>" />
                                            </div>

                                            <div class="col-3">
                                                <h4 class="pb-1 display-5">ประเภท</h4>
                                                <input disabled class="form-control" type="text"
                                                    value="<?php echo $login_user['member_typemember'];?>" />
                                            </div>

                                            <div class="col-2">
                                                <h4 class="pb-1 display-5">สถานะ</h4>
                                                <input disabled class="form-control" type="text" 
                                                    value="<?php echo $login_user['member_status'];?>" />
                                            </div>

                                            <div class="col-3">
                                                <h4 class="pb-1 display-5">ผู้ดูแล</h4>
                                                <?php 
                                            
                                                require_once('models/UserModel.php');

                                                $member_model = new UserModel;

                                                                                                $trainer =  $member_model->getUserByTrainerID($login_user['member_keeper']);
                                                        // print_r($trainer);
                                                        echo $member[$i]['member_keeper'];
                                                        $trainer = $trainer[0];?>
                                                <input disabled class="form-control" type="text"
                                                    value="<?php echo $trainer['member_firstname'] .' '. $trainer['member_lastname'];  ?>" />
                                            </div>

                                        </div>
                                    </div>
                                    <div align="right">

                                        <br>
                                        <button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
                                        <button name="submit" type="submit"
                                            class="btn btn-success">บันทึกข้อมูล</button>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>