<link href="css/account.css" rel="stylesheet">
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">


                    <div class="card">
                        <div class="card-header">
                            <h4><strong class="card-title">ข้อมูลทั่วไป</strong></h4>
                        </div>


                        <div class="card-body">
                            <div class="typo-headers">
                                
                                <h4 class="pb-1 display-5">ชื่อ-สกุล</h4> <p class="card-text"><?php echo $login_user['member_firstname'];echo $login_user['member_lastname']; ?>
                            </p>
                                <h4 class="pb-1 display-5">ชื่อเล่น</h4><p class="card-text"><?php echo $login_user['member_firstname']; ?>
                            </p>
                                <h4 class="pb-1 display-5">เพศ</h4><p class="card-text"><?php echo $login_user['member_sex']; ?>
                            </p>
                                <h4 class="pb-1 display-5">วันเกิด</h4><p class="card-text"><?php echo $login_user['member_birthday']; ?>

                                <h4 class="pb-1 display-5">หมายเลขโทรศัพท์</h4><p class="card-text"><?php echo $login_user['member_tel']; ?>
                            </p>
                            <h4 class="pb-1 display-5">วันเริ่ม</h4><p class="card-text"><?php echo $login_user['member_start']; ?>
                            </p>
                            <h4 class="pb-1 display-5">วันสิ้นสุด</h4><p class="card-text"><?php echo $login_user['member_expiry']; ?>
                            </p>
                            <h4 class="pb-1 display-5">ประเภท</h4><p class="card-text"><?php echo $login_user['member_typemember']; ?>
                            </p>
                            </p>
                            <h4 class="pb-1 display-5">สถานะ</h4><p class="card-text"><?php echo $login_user['member_status']; ?>
                            </p>
                            <h4 class="pb-1 display-5">ผู้ดูแล</h4><p class="card-text"><?php echo $login_user['member_keeper']; ?>
                            </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>