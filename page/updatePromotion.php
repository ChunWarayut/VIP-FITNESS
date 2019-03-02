<?PHP 
include 'models/PromotionModel.php';
$promotion_model = new PromotionModel;
$id = $_GET['id'];  
$promotion = $promotion_model -> getPromotionByID($id);
// print_r ($promotion);
// echo $promotion[0][promotion_id];
?>
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
            <form action="index.php?content=detailPromo&action=edit&id=<?PHP echo $promotion[0]['promotion_id'];   ?>" method="post"  role="form" enctype="multipart/form-data">
                <div class="form-group">

                <input type="hidden" id="promotion_image_o" name="promotion_image_o" value="<?php echo  $promotion[0]['promotion_image']; ?>" />
                    <label class=" form-control-label"><?php echo  $promotion[0]['promotion_id'];  ?></label>
                    <input type="text" id="promotion_name" name="promotion_name" placeholder="ชื่อ" class="form-control"
                        value="<?php echo  $promotion[0]['promotion_name'];  ?>">
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label class=" form-control-label">รูปภาพ</label>
                        <img id="image_promotion" src="images/promotion/<?php echo $promotion[0]['promotion_image']; ?>" class="form-control-label">
                        <input accept=".jpg , .png" type="file" id="promotion_image" name="promotion_image"
                            class="form-control" onChange="readURL(this);">
                    </div>
                <div class="form-group">
                    <label class=" form-control-label">รายละเอียดโมโมชั่น</label>
                    <textarea id="promotion_detail" name="promotion_detail" class="form-control"
                        style="min-height: 120px;"
                        value="<?php echo  $promotion[0]['promotion_detail'];  ?>"><?php echo  $promotion[0]['promotion_detail'];  ?></textarea>
                </div>
                <div class="modal-footer">
                    <a href="index.php?content=home">
                        <button type="button" class="btn btn-secondary">back</button>
                    </a>
                    <button class="btn btn-primary">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>