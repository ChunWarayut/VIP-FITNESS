<?PHP require_once('models/UserModel.php');

$member_model=new UserModel;


$path="page/accout/";

date_default_timezone_set("Asia/Bangkok");
$d1=date("d");
$d2=date("m");
$d3=date("Y");
$d4=date("H");
$d5=date("i");
$d6=date("s");
$date="$d1$d2$d3$d4$d5$d6";
$target_dir="images/user/";


if ($_POST['keyword']==" "|| $_POST['keyword']==null) {

    $keyword="member";
}

else {

    $keyword=$_POST['keyword'];
}


$member_id=$_GET['id'];

if( !isset($_GET['action'])) {

    $member=$member_model->getUserByMember($keyword);

    require_once($path.'view.php');
}

else if ($_GET['action']=='insert') {
    require_once($path.'insert.php');
}

else if ($_GET['action']=='update') {
    $member=$member_model->getUserByID($member_id);
    require_once($path.'update.php');
}

else if ($_GET['action']=='delete') {
    $member=$member_model->deleteUserById($member_id);
    ?><script>window.location="index.php?content=accout"</script><?php
}

else if ($_GET['action']=='add') {
    if(isset($_POST['member_firstname'])) {
        $check=true;
        $data=[];
        $data['member_typemember']=trim($_POST['member_typemember']);
        $data['member_firstname']=trim($_POST['member_firstname']);
        $data['member_image']=trim($_POST['member_image']);
        $data['member_lastname']=trim($_POST['member_lastname']);
        $data['member_tel']=trim($_POST['member_tel']);
        $data['member_sex']=trim($_POST['member_sex']);
        $data['member_birthday']=trim($_POST['member_birthday']);
        $data['member_start']=trim($_POST['member_start']);
        $data['member_address']=trim($_POST['member_address']);
        $data['member_expiry']=trim($_POST['member_expiry']);
        $data['member_status']='member';
        $data['member_keeper']=trim($_POST['member_keeper']);
        $data['member_zipcode']=trim($_POST['member_zipcode']);
        $data['member_username']=trim($_POST['member_username']);
        $data['member_password']=trim($_POST['member_password']);



        if($check==false) {
            ?><script>alert('<?php echo $error_msg; ?>');
            window.history.back();
            </script><?php
        }

        else {
            $member=$member_model->insertUser($data);

            if($member) {
                ?><script>window.location="index.php?content=accout"
                </script><?php
            }

            else {
                ?><script>window.history.back();
                </script><?php
            }
        }
    }

    else {
        ?><script>window.history.back();
        </script><?php
    }
}

else if ($_GET['action']=='edit') {
    if(isset($_POST['member_id'])) {
        $check=true;
        $data=[];
        $data['member_typemember']=trim($_POST['member_typemember']);
        $data['member_firstname']=trim($_POST['member_firstname']);
        $data['member_lastname']=trim($_POST['member_lastname']);
        $data['member_tel']=trim($_POST['member_tel']);
        $data['member_sex']=trim($_POST['member_sex']);
        $data['member_birthday']=trim($_POST['member_birthday']);
        $data['member_start']=trim($_POST['member_start']);
        $data['member_address']=trim($_POST['member_address']);
        $data['member_expiry']=trim($_POST['member_expiry']);
        $data['member_status']=trim($_POST['member_status']);
        $data['member_keeper']=trim($_POST['member_keeper']);
        $data['member_username']=trim($_POST['member_username']);
        $data['member_password']=trim($_POST['member_password']);

        if($check==false) {
            ?><script>alert('<?php echo $error_msg; ?>');
            window.history.back();
            </script><?php
        }

        else {
            $member=$member_model->updateUserByID($_POST['member_id'], $data);

            if($member) {
                if ($login_user['member_status'] !='admin') {


                    ?><script>window.location="index.php?content=account"
                    </script><?php
                }

                else {

                    ?><script>window.location="index.php?content=accout"
                    </script><?php
                }

            }

            else {
                ?><script> //  window.history.back();
                </script><?php
            }
        }
    }

    else {
        ?><script> //  window.history.back();
        </script><?php
    }
}

else {
    $member=$member_model->getUserBy($_GET['name'], $_GET['position'], $_GET['email']);
    require_once($path.'view.php');
}

?>