<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Language" content="en">
    <title> Dashboard </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="css/installation-wizard.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="../assets/cashier/sweetalert@2.1.2/sweetalert.min.js"></script>
</head>
<body>
    <div id="overlay" style="display: none;"></div>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo bg-logo">
                
                <div class="header__pane">
                    <!-- <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                // <span class="hamburger-inner icon-logo"></span>
                                <img class=" icon-logo" src="../sagitec Nilesh_Kamble/images/burger-icon.png" alt="">
                            </span>
                        </button>
                    </div> -->
                </div>
                <div class="logo-src ml-2"><img src="images/a2zpos.png" alt="" style="margin-top: -9px; height: 50px;"></div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            
            <div class="app-header__content">
                <div class="app-header-left">
                    <p class="portal-tag">                        
                    </p>    
                </div>
                
                <?php /*
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">                        
                        <div class="widget-content p-0">                            
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <div class="dropdown">
                                            <a class="btn btn-secondary dropdown-toggle user-account" href="#" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <img width="25" class="rounded-circle" src="images/pngegg.png" alt="">Thomas
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                              <a class="dropdown-item" href="#">User Account</a>
                                              <a class="dropdown-item" href="#">Settings</a>
                                              <a class="dropdown-item" href="#">Actions</a>
                                            </div>
                                          </div>                                        
                                    </div>
                                </div>                                
                            </div>
                        </div>
                    </div>
                 </div> */ ?>

            </div>
        </div>        
            <div class="app-main">

                <div class="app-sidebar sidebar-shadow">
                    <div class="app-header__logo">
                        <div class=""></div>
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="app-header__mobile-menu">
                        <div>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                    </div>
                    <?php
                        $fileName = ((isset($_GET['action']) && $_GET['action'] == "summary")?"summary":"create_store");
                        $store_id = ((isset($_SESSION["store_session_data"]["store_information"]['store_id']) && $_SESSION["store_session_data"]["store_information"]['store_id'] != "")?$_SESSION["store_session_data"]["store_information"]['store_id']:"0");
                        $disableCreatestore = "class='disable'";
                        if(trim($fileName) == "summary" || intval($store_id) > 0) {
                            $disableCreatestore = "";
                        }
                    ?>
                    <nav class="app-sidebar__inner scrollbar-sidebar nav-back">
                        <ul>
                            <li <?php print $disableCreatestore; ?>><a href='#' class="business_information onShrink" onclick = "showForm1()">Business Information</a></li>

                            <li <?php //print $enableCreatestore; ?>><a href='#' class="store_information onShrink <?php if($fileName == "create_store") print "active"; ?>" onclick = "showForm2()">Store Information</a></li>

                            <li <?php print $disableCreatestore; ?>><a href='#' class="tax_settings onShrink" onclick = "showForm3()">Tax Settings</a></li>

                            <li <?php print $disableCreatestore; ?>><a href='#' class="card_processor_settings onShrink" onclick = "showForm4()">Card Processor Settings</a></li>

                            <li <?php print $disableCreatestore; ?>><a href='#' class="cash_register_settings onShrink" onclick = "showForm5()">Cash Register Settings</a></li>

                            <li <?php print $disableCreatestore; ?>><a href='#' class="summary onShrink <?php if($fileName == "summary") print "active"; ?>" onclick = "showForm7()">Summary</a></li>

                            <!-- <li <?php print $disableCreatestore; ?>><a href='#' class="onShrink devices" onclick = "showForm6()"><img class="pr-2" src="images/device logo.png" width="30"/>Devices</a></li> -->
                        </ul>
                        <div class="sidebar-bottom-section">
                            <p>Need Help?<br>
                                Try to contact our<br>
                                Customer Suppprt</p>
                            <button type="button" class="btn btn-contact-us">
                                Contact Us
                            </button>
                        </div>
                    </nav>
                </div>