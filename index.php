<?php 	
	session_start();
	if(!isset($_SESSION['member_detail'])){
		$_REQUEST['content'] = "login";
	}else{
		$login_user = $_SESSION['member_detail'];
		if(!isset($_REQUEST['content'])){
			$_REQUEST['content'] = "home";
		}
	}
	if(!isset($login_user)){
		$_REQUEST['content'] = "login";
	}
	$content = $_REQUEST['content'];
	
?>
<!DOCTYPE html>
<html lang="en">

<head>
<title><?php echo $content; ?></title>
<?php 
	require_once("header.php");
?>
</head>
<link rel="stylesheet" href="css/login.css">
<body>
		<?php
			if($content == "login"){
			require_once('page/login.php');
			}else{?>
			
				<?php require_once('header.php') ?>
				<?php require_once('menu.php') ?>
					
		
		<?php } ?>
		
	</body>
<?php require_once("footer.php"); ?>

</html>