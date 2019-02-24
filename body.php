<?php
if($content=="home"){ 
    require_once("page/home.php"); 
}else if($content=="tanita"){ 
    require_once("page/tanita.php"); 
}else if($content=="contact"){ 
    require_once("modules/contact/views/index.php"); 
}else if($content=="article"){ 
    require_once("modules/article/views/index.php"); 
}else if($content=="background"){ 
    require_once("modules/background/views/index.php"); 
}else if($content=="product"){ 
    require_once("modules/product/views/index.php"); 
}else if($content=="order"){ 
    require_once("modules/order/views/index.php"); 

}else if($content=="product_suptype"){ 
    require_once("modules/product_suptype/views/index.php"); 
}else if($content=="product_type"){ 
    require_once("modules/product_type/views/index.php"); 
}else if($content=="service"){ 
    require_once("modules/service/views/index.php"); 
}else if($content=="call_service"){ 
    require_once("modules/call_service/views/index.php"); 
}else if($content=="team"){ 
    require_once("modules/team/views/index.php"); 
}else if($content=="service_team"){ 
    require_once("modules/service_team/views/index.php"); 
}else if($content=="brand_partner"){ 
    require_once("modules/brand_partner/views/index.php"); 
}else if($content=="job"){ 
    require_once("modules/job/views/index.php"); 
}else if($content=="job_register"){ 
    require_once("modules/job_register/views/index.php"); 
}else if($content=="member" && $login_user['user_type_id'] == 1){ 
    require_once("modules/member/views/index.php"); 
}else if($content=="page_image"){ 
    require_once("modules/page_image/views/index.php"); 
}else if($content=="about"){ 
    require_once("modules/about/views/index.php"); 
}else if($content=="about_image"){ 
    require_once("modules/about_image/views/index.php"); 
}else if($content=="setting" && $login_user['user_type_id'] == 1){ 
    require_once("modules/setting/views/index.php"); 
}else if($content=="policy" && $login_user['user_type_id'] == 1){ 
    require_once("modules/policy/views/index.php"); 
}else if($content=="page" && $login_user['user_type_id'] == 1){ 
    require_once("modules/page/views/index.php"); 
}else if($content=="login"){ 
	header('Location: page/login.php');
}else { 
    require_once("index.php");
}
?>