<link href="css/trainer.css" rel="stylesheet">
<div class="section__content section__content--p30">
    <div class="container-fluid">
        <div class="row">

			<?php   include 'models/BaseModel.php';
			$member_id = $login_user['member_id'];
                    $sql="SELECT * FROM `vip_member` WHERE `member_keeper` = '$member_id'";
                    $i = 1;
                    $result= mysqli_query($con,$sql);
                    while($row=mysqli_fetch_array($result)){ ?>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-3"> ชื่อ-สกุล: <?PHP echo $row['member_firstname'];?> <?PHP echo $row['member_lastname'];?> </h4>
                        <h4 class="card-title mb-3"> วันเกิด:  <?PHP echo $row['member_birthday'];?> </h4>
                        <h4 class="card-title mb-3"> หมายเลขโทรศัพท์: <?PHP echo $row['member_tel'];?> </h4>
                        <h4 class="card-title mb-3"> วันเริ่ม: <?PHP echo $row['member_start'];?> </h4>
						<h4 class="card-title mb-3"> วันสิ้นสุด:  <?PHP echo $row['member_expiry'];?> </h4>
						<a href="index.php?content=tanita" class="taxe-center">
							tanita
						</a>
						
                        <p class="card-text" ?>
                        </p>
                    </div>


                </div>
            </div>
                <?PHP  } ?>


        </div>
    </div>
</div>