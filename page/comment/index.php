<?PHP #endregion


require_once('models/CommentModel.php');

$comment_model = new CommentModel;

$path = "page/comment/";



$comment = $comment_model -> getCommentByMemberID();
$comment_by_id = $comment_model -> getCommentByID($login_user['member_id']);



$member_id =  $login_user['member_id'];
$comment_point = $comment_model -> getCommentPointByID($member_id);
// print_r($comment_by_id);


if(!isset($_GET['action'])){
    
    $comment = $comment_model -> getCommentByMemberID();
    require_once($path.'view.php');
    

//--------------------------------------------------------------------------

}else if ($_GET['action'] == 'insert'){
    
    require_once($path.'insert.php');
    

//--------------------------------------------------------------------------

}else if ($_GET['action'] == 'delete'){
    $comment = $comment_model->deleteCommentByID($_GET['id']);
    ?>
    <script>window.location="index.php?content=comment"</script>
    <?php

//--------------------------------------------------------------------------

}else if ($_GET['action'] == 'add'){
    $id_chk= $_POST['idd'] ;
    $data = [];
	for($i=1;$i < ($id_chk);$i++) 
    {			
            if($_POST["radionNo".$i] != "") 
        {	
            $data['id_person'] = $member_id;
            $data['i'] = ($i);
            $data['radionNo'] = ($_POST["radionNo".$i]);	
            $comment = $comment_model->insertCommentPoint($data);
        }

    }	

    $data1 = [];
    $data1['comment_detail'] = $_POST['comment_detail'] ;
    $data1['member_id'] = $login_user['member_id'];

    $comment = $comment_model -> insertComment($data1)
    ?>
    <script>window.location="index.php?content=comment&action=insert"</script>
    <?php

//--------------------------------------------------------------------------


}
?>

