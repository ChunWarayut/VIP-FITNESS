<?PHP


require_once('models/UserModel.php');

$member_model = new UserModel;


$path = "page/trainer_cus/";

date_default_timezone_set("Asia/Bangkok");
$d1=date("d");
$d2=date("m");
$d3=date("Y");
$d4=date("H");
$d5=date("i");
$d6=date("s");
$date="$d1$d2$d3$d4$d5$d6";
$target_dir = "images/user/";

// echo $login_user['member_id'];

if(!isset($_GET['action'])){
    $member = $member_model->getUserByTrainerCusID($login_user['member_id']);
    // echo "<pre>";
    // print_r($member);
    // echo "</pre>";
    require_once($path.'view.php');
}

?>