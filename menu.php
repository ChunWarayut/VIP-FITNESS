<?php 

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<link href="css/menu.css" rel="stylesheet">

<body>
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar2">
            <div class="logo">
                <img class="img-logo" src="images/icon/logo.png" width="60%" />
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    <div class="image img-cir img-120">
                        <img src="images/profile/<?php echo $login_user['member_image']; ?>" />
                    </div>
                    <h4 class="name"><?php echo $login_user['member_firstname'];?>
                        <?php echo $login_user['member_lastname'];?></h4>
                    <!-- <a href="#">Sign out</a> -->
                </div>
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">

                        <?php if($login_user['member_status'] != "trainer" 
                        ){ ?>

                        <li class="<?php if($content == "" || $content =="home"){echo "active";}?> ">
                            <a href="index.php?content=home">
                                <i class="fas fa-chart-bar"></i>หน้าแรก</a>
                            <!-- <span class="inbox-num">3</span> -->
                        </li>


                        <?php if($login_user['member_status'] != "admin" 
                        ){ ?>
                        <li class="<?php if($content =="account"){echo "active ";}?> ">
                            <a href="index.php?content=account">
                                <i class="fas fa-shopping-basket"></i>ข้อมูลส่วนตัว</a>
                        </li>
                        <?PHP } ?>



                        <?php if($login_user['member_status'] == "admin" 
                        ){ ?>
                        <li class="<?php if($content =="accout"){echo "active ";}?> ">
                            <a href="index.php?content=accout">
                                <i class="fas fa-shopping-basket"></i>จัดกาารข้อมูลลูกค้า</a>
                        </li>
                        <?PHP } ?>


                        <!-- 

                        <?php if($login_user['member_status'] == "admin" || 
                                $login_user['member_status'] == "member"
                        ){ ?>
                        <li class="<?php if($content =="course"){echo "active ";}?> ">
                            <a href="index.php?content=course">
                            <i class="fas fa-shopping-basket"></i>Course</a>
                        </li><?php } ?> -->




                        <?php if( $login_user['member_status'] == "admin"
                        ){ ?>
                        <li class="<?php if($content =="tanita"){echo "active ";}?> ">
                            <a href="index.php?content=tanita">
                                <i class="fas fa-shopping-basket"></i>tanita</a>
                        </li>
                        <?php } ?>

                        <?php if( $login_user['member_status'] == "member"
                        ){ ?>
                        <li class="<?php if($content =="tanita_cus"){echo "active ";}?> ">
                            <a href="index.php?content=tanita_cus">
                                <i class="fas fa-shopping-basket"></i>tanita</a>
                        </li>
                        <?php } ?>

                        <?php if( $login_user['member_status'] == "admin"
                        ){ ?>
                        <li class="<?php if($content =="comment"){echo "active ";}?> ">
                            <a href="index.php?content=comment">
                                <i class="fas fa-shopping-basket"></i>comment</a>
                        </li><?php } ?>

                        <?php if( $login_user['member_status'] == "member"
                        ){ ?>
                        <li class="<?php if($content =="comment_cus"){echo "active ";}?> ">
                            <a href="index.php?content=comment_cus">
                                <i class="fas fa-shopping-basket"></i>comment</a>
                        </li><?php } ?>


                        <?php if($login_user['member_status'] == "trainer" ){ 
                            ?>
                        <li class="<?php if($content =="trainer"){echo "active ";}?> ">
                            <a href="index.php?content=trainer">
                                <i class="fas fa-shopping-basket"></i>Trainer</a>
                        </li>
                        <?php } ?>

                        <?php if($login_user['member_status'] == "admin" || 
                                $login_user['member_status'] == "sale"
                        ){ ?>
                        <!-- <li class="<?php if($content =="promotion"){echo "active ";}?> ">
                            <a href="index.php?content=promotion">
                            <i class="fas fa-shopping-basket"></i>โปรโมชั่น</a>
                        </li> -->
                        <!-- <li class="<?php if($content =="team"){echo "active ";}?> ">
                            <a href="#">
                            <i class="fas fa-shopping-basket"></i>ข้อมูลลูกค้า</a>
                        </li> -->
                        <li class="<?php if($content =="comment"){echo "active ";}?> ">
                            <a href="index.php?content=comment">
                                <i class="fas fa-shopping-basket"></i>Comment</a>
                        </li>
                        <?php } ?>
                        <?php } ?>

                        <?php if($login_user['member_status'] == "trainer" 
                        ){ ?>


                        <li class="<?php if($content =="trainer_cus"){echo "active ";}?> ">
                            <a href="index.php?content=trainer_cus">
                                <i class="fas fa-shopping-basket"></i>ข้อมูลลูกค้า</a>
                        </li>

                        <?php } ?>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop2">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <div class="logo d-block d-lg-none">
                                <a href="#">
                                    <img class="img-logo" src="images/icon/logo-white.png" alt="CoolAdmin" />
                                </a>
                            </div>
                            <div class="header-button2">

                                <div class="header-button-item mr-0 js-sidebar-btn">
                                    <i class="zmdi zmdi-menu"></i>
                                </div>
                                <div class="setting-menu js-right-sidebar d-none d-lg-block">
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-account"></i>Account</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="check_logout.php">
                                                <i class="zmdi zmdi-power"></i>log out</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <aside class="menu-sidebar2 js-right-sidebar d-block d-lg-none">
                <div class="logo">
                    <a href="#">
                        <img class="img-logo" src="images/icon/logo-white.png" alt="Cool Admin" />
                    </a>
                </div>
                <div class="menu-sidebar2__content js-scrollbar2">
                    <div class="account2">
                        <div class="image img-cir img-120">
                            <img src="images/icon/avatar-big-01.jpg" alt="John Doe" />
                        </div>
                        <h4 class="name">john doe</h4>
                        <a href="#">Sign out</a>
                    </div>
                    <nav class="navbar-sidebar2">
                        <ul class="list-unstyled navbar__list">



                            <li class="<?php if($content =="home"){echo "active";}?> ">
                                <a href="inbox.html">
                                    <i class="fas fa-chart-bar"></i>หน้าแรก</a>
                                <!-- <span class="inbox-num">3</span> -->
                            </li>
                            <?php if($login_user['member_status'] == "admin"){ ?>
                            <li class="<?php if($content =="team"){echo "active ";}?> ">
                                <a href="#">
                                    <i class="fas fa-shopping-basket"></i>สมาชิกทีม</a>
                            </li>
                            <li class="<?php if($content =="report"){echo "active ";}?> ">
                                <a href="#">
                                    <i class="fas fa-shopping-basket"></i>รายงาน</a>
                                <?php } ?>
                            </li>




                        </ul>
                    </nav>
                </div>
            </aside>
            <!-- END HEADER DESKTOP-->

            <div class="stathome"></div>

            <?php
        if($content=="home"){ 
            /*?>
            <link href="css/home.css" rel="stylesheet"><?php*/
            require_once("page/home.php");

        }else if($content=="account"){ 
            require_once("page/account.php");

        }else if($content=="tanita"){ 
            require_once("page/tanita.php");

        }else if($content=="tanitaInsert"){ 
            require_once("page/tanitaInsert.php");

        }else if($content=="course"){ 
            require_once("page/course.php");

        }else if($content=="trainer"){ 
            require_once("page/trainer.php");

        }else if($content=="promotion"){ 
            require_once("page/promotion.php"); 

        }else if($content=="comment"){ 
            require_once("page/comment/index.php"); 

        }else if($content=="comment_cus"){ 
            require_once("page/comment/insert.php"); 
            
        }else if($content=="detailPromo"){ 
            require_once("page/detailPromo.php"); 

        }else if($content=="updatePromotion"){ 
            require_once("page/updatePromotion.php"); 

        }else if($content=="accout"){ 
            require_once("page/accout/index.php"); 

        }else if($content=="updatePromotion"){ 
            require_once("page/updatePromotion.php"); 

        }else if($content=="trainer_cus"){ 
            require_once("page/trainer_cus/index.php"); 

        }else if($content=="tanita_cus"){ 
            require_once("page/tanita_cus.php"); 

        }else { 
            require_once("page/home.php"); 
        }
    ?>
            <!-- END PAGE CONTAINER-->
        </div>
    </div>




    <body>