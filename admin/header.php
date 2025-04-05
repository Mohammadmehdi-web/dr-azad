<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link rel="icon" type="image/png" href="./assets/img/favicon.jpg" />
    <!-- GLOBAL MAINLY STYLES-->
    <link href="./assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="./assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="./assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <!-- PLUGINS STYLES-->
    <link href="./assets/vendors/DataTables/datatables.min.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="assets/css/main.min.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->


    <!-- PLUGINS STYLES-->
    <link href="./assets/vendors/summernote/dist/summernote.css" rel="stylesheet" />
    <link href="./assets/vendors/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" />
    <!-- THEME STYLES-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <style>
        .header .dropdown-user a.dropdown-toggle img {
            width: 78px;
            -webkit-border-radius: 0%;
            border-radius: 0%;
            margin-right: 10px;
        }
    </style>
</head>

<body class="fixed-navbar">
    <div class="page-wrapper">
        <!-- START HEADER-->
        <header class="header">
            <div class="page-brand">
                <a class="link" href="index.php">
                    <span class="brand">
                        <img src="./assets/img/logo.jpg" alt="" height="60px">
                    </span>
                    <span class="brand-mini"> <img src="./assets/img/logo.jpg" alt="" width="100px;"></span>
                </a>
            </div>
            <div class="flexbox flex-1">
                <!-- START TOP-LEFT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li>
                        <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="ti-menu"></i></a>
                    </li>
                </ul>
                <!-- END TOP-LEFT TOOLBAR-->
                <!-- START TOP-RIGHT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li class="dropdown dropdown-user">
                        <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                            <img src="./assets/img/logo.jpg" />
                            <span></span>Admin<i class="fa fa-angle-down m-l-5"></i></a>
                        <ul class="dropdown-menu dropdown-menu-right">

                            <a class="dropdown-item" href="logout"><i class="fa fa-power-off"></i>Logout</a>
                        </ul>
                    </li>
                </ul>
                <!-- END TOP-RIGHT TOOLBAR-->
            </div>
        </header>
        <!-- END HEADER-->
        <!-- START SIDEBAR-->
        <nav class="page-sidebar" id="sidebar">
            <div id="sidebar-collapse">
                <ul class="side-menu metismenu">
                    <li>
                        <a class="active mt-5" href="index"><i class="sidebar-item-icon"><img width="30" height="30"
                                    src="https://img.icons8.com/glyph-neue/50/FFFFFF/speed.png" alt="speed" /></i>
                            <span class="nav-label">Dashboard</span>
                        </a>
                    </li>
                   
                    <li class="mt-2">
                        <a href="javascript:;"><i class="sidebar-item-icon"><img width="30" height="30"
                                    src="https://img.icons8.com/ios-filled/50/FFFFFF/google-blog-search.png"
                                    alt="google-blog-search" /></i>
                            <span class="nav-label"> Blog</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="add_blog"> Add New Blog </a>
                            </li>
                            <li>
                                <a href="blog_list"> Blog List</a>
                            </li>
                        </ul>
                    </li>
                    <li class="mt-2">
                        <a href="javascript:;"><i class="sidebar-item-icon"><img width="30" height="30"
                                    src="https://img.icons8.com/external-kmg-design-glyph-kmg-design/32/FFFFFF/external-feedback-feedback-kmg-design-glyph-kmg-design.png" /></i>
                            <span class="nav-label"> Testimonials</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="add_testimonial"> Add New Testimonials </a>
                            </li>
                            <li>
                                <a href="testimonials_list"> Testimonials List</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="" href="querylist"><i class="sidebar-item-icon"><img width="30" height="30"
                                    src="https://img.icons8.com/ios-filled/50/FFFFFF/ask-question.png"
                                    alt="ask-question" /></i>
                            <span class="nav-label">Query List</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>