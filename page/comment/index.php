<?PHP #endregion


require_once('models/CommentModel.php');

$comment_model = new CommentModel;

$path = "page/comment/";



$comment = $comment_model -> getCommentByMemberID();

// print_r($comment);


if(!isset($_GET['action'])){
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
    // echo 9;
    $id_chk= $_POST['idd'] ;
    // echo $id_chk;
    $data = [];
	for($i=1;$i<=($id_chk);$i++) 
    {			
            if($_POST["radionNo".$i] != "") 
        {	
            $data['id_person'] = ($login_user['member_id']);
            $data['i'] = ($i);
            $data['radionNo'] = ($_POST["radionNo".$i]);	
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            $comment = $comment_model->insertCommentPoint($data);
        }

    }	



    // $comment = $comment_model->deleteCommentByID($_GET['id']);
    ?>
    <!-- <script>window.location="index.php?content=comment"</script> -->
    <?php

//--------------------------------------------------------------------------


}
?>

