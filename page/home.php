<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#image_promotion').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    } else {
            $('#image_promotion').attr('src', '../images/prootion/default.png');
    }
}
</script>
<link rel="stylesheet" href="css/home.css">
<div class="card">
    <div class="card-header">
        <h3>Promotion</h3>
        <?php if ($login_user ['member_status'] == 'admin') { ?>
        <button class="au-btn au-btn-icon au-btn--green au-btn--small btn-right" data-toggle="modal"
            data-target="#addpromotion">
            <i class="zmdi zmdi-plus"></i>add promotion
        </button>
        <?PHP  } ?>
    </div>
</div>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <?php   include 'models/BaseModel.php';
                    $sql="SELECT * FROM vip_promotion";
                    $i = 1;
                    $result= mysqli_query($con,$sql);
                    while($row=mysqli_fetch_array($result)){ ?>

                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="images/promotion/<?php echo $row['promotion_image']; ?>"
                            alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title mb-3"><?php echo $row['promotion_name']; ?></h4>
                            <p class="card-text"><?php echo $row['promotion_image']; ?>
                            </p>
                        </div>

                        <?php if ($login_user['member_status'] == 'admin') { ?>
                        <div>
                            <form action="index.php?content=detailPromo&id=<?PHP echo $row['promotion_id'];   ?>" method="post">
                                <button width="100%" class="au-btn au-btn--detail" data-toggle="modal"
                                    data-target="#detailpromotion">
                                    detail 
                                </button>
                            </form>
                        </div>
                        <div>
                            <form action="index.php?content=detailPromo&action=update&id=<?PHP echo $row['promotion_id'];   ?>" method="post">
                                <button width="100%" class="au-btn au-btn--ok" data-toggle="modal"
                                    data-target="#editpromotion">
                                    edit
                                </button>
                            </form>
                        </div>
                        <div>
                            <form action="index.php?content=detailPromo&action=delete&id=<?PHP echo $row['promotion_id'];   ?>" method="post">
                                <button width="100%" class="au-btn au-btn--no" data-toggle="modal"
                                    data-target="#mediumModal">
                                    delete
                                </button>
                            </form>
                        </div>
                        <?PHP  } ?>
                    </div>
                </div>
                <?PHP  } ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addpromotion" tabindex="-1" role="dialog" aria-labelledby="addpromotionLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addpromotionLabel">ข้อมูลโปรโมชั่น</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="form" action="models/sqladd.php" method="post" enctype="multipart/form-data">
                <input type="hidden" value="addpromotion" name="menu">
                <div class="modal-body">
                    <div class="form-group">
                        <label class=" form-control-label">ชื่อโปรโมชั่น</label>
                        <input type="text" id="promotion_name" name="promotion_name" placeholder="ชื่อ"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label class=" form-control-label">รูปภาพ</label>
                        <img id="image_promotion" src="images/promotion/default.png" class="form-control-label">
                        <input accept=".jpg , .png" type="file" id="promotion_image" name="promotion_image"
                            class="form-control" onChange="readURL(this);">
                    </div>
                    <div class="form-group">
                        <label class=" form-control-label">รายละเอียดโมโมชั่น</label>
                        <textarea id="promotion_detail" name="promotion_detail" class="form-control"
                            style="min-height: 120px;"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary">Confirm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="detailpromotion" tabindex="-1" role="dialog" aria-labelledby="detailpromotionLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailpromotionLabel">รายละเอียด</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="form-group">

                    <label class=" form-control-label"><?php echo  $promotion[0][promotion_id];  ?></label>
                    <input type="text" id="promotion_name" name="promotion_name" placeholder="ชื่อ"
                        class="form-control">
                </div>
                <div class="form-group">
                    <label class=" form-control-label">รูปภาพ</label>
                    <img id="image_promotion" src="images/promotion/<?php echo $promotion[0]['promotion_image']; ?>"
                    class="form-control-label">
                    <input accept=".jpg , .png" type="file" id="promotion_image" name="promotion_image"
                        class="form-control" onChange="readURL(this);">
                </div>
                <div class="form-group">
                    <label class=" form-control-label">รายละเอียดโมโมชั่น</label>
                    <textarea id="promotion_detail" name="promotion_detail" class="form-control"
                        style="min-height: 120px;"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary">Confirm</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editppromotion" tabindex="-1" role="dialog" aria-labelledby="editppromotionLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editppromotionLabel">ข้อมูลโปรโมชั่น</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="form" action="models/sqladd.php" method="post" enctype="multipart/form-data">
                <input type="hidden" value="addpromotion" name="menu">
                <div class="modal-body">
                    <div class="form-group">
                        <label class=" form-control-label">ชื่อโปรโมชั่น</label>
                        <input type="text" id="promotion_name" name="promotion_name" placeholder="ชื่อ"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label class=" form-control-label">รูปภาพ</label>
                        <img id="image_promotion" src="images/promotion/default.png" class="form-control-label">
                        <input accept=".jpg , .png" type="file" id="promotion_image" name="promotion_image"
                            class="form-control" onChange="readURL(this);">
                    </div>
                    <div class="form-group">
                        <label class=" form-control-label">รายละเอียดโมโมชั่น</label>
                        <textarea id="promotion_detail" name="promotion_detail" class="form-control"
                            style="min-height: 120px;"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary">Confirm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="editpromotion" tabindex="-1" role="dialog" aria-labelledby="editpromotionLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editpromotionLabel">ข้อมูลโปรโมชั่น</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="form" action="models/sqladd.php" method="post" enctype="multipart/form-data">
                <input type="hidden" value="editpromotion" name="menu">
                <div class="modal-body">
                    <div class="form-group">
                        <label class=" form-control-label">ชื่อโปรโมชั่น</label>
                        <input type="text" id="promotion_name" name="promotion_name" placeholder="ชื่อ"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label class=" form-control-label">รูปภาพ</label>
                        <img id="image_promotion" src="images/promotion/default.png" class="form-control-label">
                        <input accept=".jpg , .png" type="file" id="promotion_image" name="promotion_image"
                            class="form-control" onChange="readURL(this);">
                    </div>
                    <div class="form-group">
                        <label class=" form-control-label">รายละเอียดโมโมชั่น</label>
                        <textarea id="promotion_detail" name="promotion_detail" class="form-control"
                            style="min-height: 120px;"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary">Confirm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>