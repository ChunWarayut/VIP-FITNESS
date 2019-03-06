<?PHP #endregion


require_once('models/CommentModel.php');

$comment_model = new CommentModel;

$path = "page/comment/";



$comment = $comment_model -> getCommentByMemberID();

// print_r($comment);


if(!isset($_GET['action'])){
    require_once($path.'view.php');
    

//--------------------------------------------------------------------------

}else if ($_GET['action'] == 'delete'){
    $comment = $comment_model->deleteCommentByID($_GET['id']);
    ?>
    <script>window.location="index.php?content=comment"</script>
    <?php

//--------------------------------------------------------------------------


}
?>

