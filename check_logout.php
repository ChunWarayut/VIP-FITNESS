<?php 
	
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
	session_destroy();
	$content = "login";
	header('Location: index.php');
?>