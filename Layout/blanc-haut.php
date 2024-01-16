<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Fonik - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App Icons -->
        <link rel="shortcut icon" href="/tpl/assets/images/favicon.ico">

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="/tpl/assets/plugins/morris/morris.css">

        <!-- Basic Css files -->
        <link href="/tpl/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="/tpl/assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="/tpl/assets/css/style.css" rel="stylesheet" type="text/css">

        <link href="/tpl/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="/tpl/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="/tpl/assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <?php
            include_once(__DIR__ . "/../helper.php");
            $db = Helper::connect_db();
        ?>
    </head>


    <body class="fixed-left">

        <!-- Loader -->
        <!-- <div id="preloader"><div id="status"><div class="spinner"></div></div></div> -->


        <!-- Begin page -->
        <div id="wrapper">

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="">
                        <!--<a href="index.html" class="logo text-center">Fonik</a>-->
                        <a href="/" class="logo"><img src="/tpl/assets/images/logo.png" height="20" alt="logo"></a>
                    </div>
                </div>

                <div class="sidebar-inner slimscrollleft">
                    <div id="sidebar-menu">
                        <ul>

                            <li class="menu-title">Main</li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-to-do"></i><span> Actions <span class="float-right"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                                <ul class="list-unstyled">
                                    <li><a href="/views/actions">Liste</a></li>
                                    <li><a href="/views/actions/create.php">Nouveau</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-tags"></i><span> Type Action <span class="float-right"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                                <ul class="list-unstyled">
                                    <li><a href="/views/actions_type">Liste</a></li>
                                    <li><a href="/views/actions_type/create.php">Nouveau</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-wallet "></i><span> PG financement <span class="float-right"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                                <ul class="list-unstyled">
                                    <li><a href="/views/programme_financement">Liste</a></li>
                                    <li><a href="/views/programme_financement/create.php">Nouveau</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-suitcase"></i><span> Entreprise <span class="float-right"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                                <ul class="list-unstyled">
                                    <li><a href="/views/entreprise">Liste</a></li>
                                    <li><a href="/views/entreprise/create.php">Nouveau</a></li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div> <!-- end sidebarinner -->
            </div>
            <!-- Left Sidebar End -->


            <!-- Start right Content here -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">

                    <!-- Top Bar Start -->
                    <div class="topbar">

                    <nav class="navbar-custom">
                        <!-- Page title -->
                        <ul class="list-inline menu-left mb-0">
                            <li class="list-inline-item">
                                <button type="button" class="button-menu-mobile open-left waves-effect">
                                    <i class="ion-navicon"></i>
                                </button>
                            </li>
                            <li class="hide-phone list-inline-item app-search">
                                <h3 class="page-title">Dashboard</h3>
                            </li>
                        </ul>

                        <div class="clearfix"></div>
                    </nav>

                    </div>
                    <!-- Top Bar End -->

                    <!-- ==================
                        PAGE CONTENT START
                        ================== -->

                    <div class="page-content-wrapper">