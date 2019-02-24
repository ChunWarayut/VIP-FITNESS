<?php
if($content=="home"){ 
    require_once("page/home.php"); 
}else if($content=="tanita"){ 
    require_once("page/tanita.php");    
}else if($content=="login"){ 
	header('Location: page/login.php');
}else { 
    require_once("index.php");
}
?>