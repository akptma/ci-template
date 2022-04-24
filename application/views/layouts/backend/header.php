<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>CMSKU</title>
    <link rel="apple-touch-icon" href="<?= base_url('public/template/admin/') ?>app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('public/template/admin/') ?>app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700" rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/template/admin/') ?>app-assets/css/vendors.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/template/admin/') ?>app-assets/css/app.css">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/template/admin/') ?>app-assets/css/core/menu/menu-types/vertical-content-menu.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/template/admin/') ?>app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/template/admin/') ?>app-assets/css/pages/timeline.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/template/admin/') ?>assets/css/style.css">
    <!-- END Custom CSS-->

    <!-- JQUERY -->
    <script src="<?= base_url('public/template/admin/') ?>app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>

    <!-- SWEETALERT -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/template/admin/') ?>app-assets/vendors/css/extensions/sweetalert.css">
    <script src="<?= base_url('public/template/admin/') ?>app-assets/vendors/js/extensions/sweetalert.min.js" type="text/javascript"></script>

    <!-- DATATABLE -->
    <script src="<?= base_url('public/template/admin/') ?>app-assets/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/template/admin/') ?>app-assets/vendors/css/tables/datatable/datatables.min.css">

    <!-- TREE VIEW -->
    <script src="<?= base_url('public/template/admin/'); ?>app-assets/vendors/js/extensions/bootstrap-treeview.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?= base_url('public/template/admin/'); ?>app-assets/vendors/css/extensions/bootstrap-treeview.min.css">



</head>

<body class="vertical-layout vertical-content-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-content-menu" data-col="2-columns">
    <!-- fixed-top-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-light navbar-hide-on-scroll navbar-border navbar-shadow navbar-brand-center">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
                    <li class="nav-item">
                        <?php $nav = $this->db->get_where('config', ['id' => 1])->row(); ?>
                        <a class="navbar-brand" href="<?= base_url('user'); ?>">
                            <img class="brand-logo" alt="modern admin logo" src="<?= base_url('public/data/backend/img-logo/' . $nav->nav_logo) ?>">
                            <h3 class="brand-text"><?= ucwords($nav->nav_brand); ?></h3>
                        </a>
                    </li>
                    <li class="nav-item d-md-none">
                        <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
                    </li>
                </ul>
            </div>
            <div class="navbar-container content">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
                    </ul>
                    <?php
                    $user = $this->session->userdata('user');
                    $petjah = explode(' ', $user->nama);
                    ?>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-user nav-item">
                            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <span class="mr-1">Hello,
                                    <span class="user-name text-bold-700"><?= $petjah[0]; ?></span>
                                </span>
                                <span class="avatar avatar-online">
                                    <img src="<?= base_url('public/data/backend/img-user/' . $user->img) ?>" alt="avatar"><i></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="<?= base_url('user/edit/' . encode($user->id)) ?>"><i class="ft-user"></i> Edit Profile</a>
                                <!-- <a class="dropdown-item" href="#"><i class="ft-mail"></i> My Inbox</a>
                                <a class="dropdown-item" href="#"><i class="ft-check-square"></i> Task</a>
                                <a class="dropdown-item" href="#"><i class="ft-message-square"></i> Chats</a> -->
                                <div class="dropdown-divider"></div><a class="dropdown-item" href="#" onclick="logout()"><i class="ft-power"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <?php
                $get_uri_segment = $this->uri->segment(1);
                switch ($get_uri_segment) {
                    case 'submenu':
                        $get_uri_segment = 'menu';
                        break;
                    case '':
                        $get_uri_segment = 'menu';
                        break;

                    default:
                        $get_uri_segment =  $this->uri->segment(1);
                        break;
                }
                $get_sub_menu = $this->db->select('kode_menu,nama_menu,routes')->get_where('menu', ['routes' => $get_uri_segment])->row();
                $get_menu = $this->db->select('title_menu')->get_where('menu', ['id' => intval($get_sub_menu->kode_menu)])->row()->title_menu;
                ?>
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"><?= ucwords($get_sub_menu->nama_menu); ?></h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><?= ucwords($get_menu); ?></li>
                                <li class="breadcrumb-item active"><a href="<?= $get_sub_menu->routes ?>"><?= ucwords($get_sub_menu->nama_menu); ?></a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="main-menu menu-static menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
                <div class="main-menu-content">
                    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

                        <?php
                        $session_user   = $this->session->userdata('user')->id;
                        $parent_menu    = $this->db->query("SELECT * FROM menu WHERE id = kode_menu AND status = 1 ORDER BY urutan ASC")->result();
                        foreach ($parent_menu as $menu) :
                            $count_all_menu = $this->db->where(['kode_menu' => $menu->kode_menu, 'id !=' => $menu->kode_menu])->count_all_results('menu');
                            $akses_kontrol_menu  = $this->db->get_where('acl', ['id_user' => intval($session_user), 'id_menu' => $menu->id, 'akses' => 'Y'])->row();
                        ?>
                            <li class=" nav-item">
                                <?php if (!is_null($akses_kontrol_menu)) : ?>
                                    <a>
                                        <?= $menu->icons; ?>
                                        <span class="menu-title" data-i18n="nav.dash.main"><?= ucwords($menu->title_menu); ?></span>
                                        <span class="badge badge badge-info badge-pill float-right mr-2"><?= $count_all_menu; ?></span>
                                    </a>

                                    <ul class="menu-content">
                                        <?php
                                        $child_menu = $this->db->query("SELECT * FROM menu WHERE id <> kode_menu AND kode_menu = '" . $menu->kode_menu . "' AND status = 1 ORDER BY urutan ASC")->result();
                                        foreach ($child_menu as $sub_menu) :
                                            $akses_kontrol_submenu  = $this->db->get_where('acl', ['id_user' => intval($session_user), 'id_menu' => $sub_menu->id, 'akses' => 'Y'])->row();
                                        ?>
                                            <?php if (!is_null($akses_kontrol_submenu)) : ?>
                                                <li class="<?= ($this->uri->segment(1) == $sub_menu->routes ? 'active' : ''); ?>"><a href="<?= base_url($sub_menu->routes); ?>" data-i18n=" nav.dash.ecommerce" class="menu-item"><?= ucwords($sub_menu->nama_menu); ?></a></li>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="content-body">