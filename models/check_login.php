<?php

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
require_once('../models/UserModel.php');

$user_model = new UserModel;

if(isset($_POST['username']) && isset($_POST['password'])){
    if($_POST['username'] != '' && $_POST['password'] != ''){
        
        $login_user = $user_model->getLogin($_POST['username'],$_POST['password']);

        if($login_user['member_id'] > 0){
            $_SESSION['member_detail'] = $login_user;
            echo "<script language=\"JavaScript\" type=\"text/javascript\"> window.parent.refresh();</script>";
        }else{
            echo "<script language=\"JavaScript\" type=\"text/javascript\"> window.parent.error();</script>";
        }
        
        
        ?>
        <script>
            window.location=" ../index.php"
        </script>
        <?PHP
        

    }else{
        
        
        ?>
        <script>
            window.location=" ../index.php"
        </script>
        <?PHP
        


    }
}else{
    
    
    ?>
    <script>
        window.location=" ../index.php"
    </script>
    <?PHP
    
    
}
?>