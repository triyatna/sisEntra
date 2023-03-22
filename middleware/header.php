<?php
require '../core/autoload.php';
$user = empty($_SESSION['username']) ? (!isset($_COOKIE['username']) ? redirect($domain . "auth/login") : $_COOKIE['username']) : $_SESSION['username'];
$rolee = getSingleValDB('users', 'username', $user, 'role');
if (WEBSITE_MAINTENANCE == 'on') {
    redirect($domain . 'maintenance');
}
$cek = cekSession();
if ($cek == 0) {
    redirect($domain . "auth/login");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title id="title"></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="sEntra Panel - Panelnya Anak PKM sEntra Universitas Widyatama" name="description" />
    <meta content="TY Studio Dev" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= $domain ?>assets/images/favicon-32x32.png" />

    <!-- third party css -->
    <link href="<?= $domain ?>assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= $domain ?>assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= $domain ?>assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= $domain ?>assets/libs/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <!-- third party css end -->

    <!-- App css -->
    <link href="<?= $domain ?>assets/css/config/default/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="<?= $domain ?>assets/css/config/default/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="<?= $domain ?>assets/css/config/default/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled="disabled" />
    <link href="<?= $domain ?>assets/css/config/default/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" disabled="disabled" />
    <link href="<?= $domain ?>assets/libs/fullcalendar/main.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= $domain ?>assets/libs/mohithg-switchery/switchery.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= $domain ?>assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />
    <link href="<?= $domain ?>assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= $domain ?>assets/libs/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
    <link href="<?= $domain ?>assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <!-- <link href="<?= $domain ?>assets/libs/croppie/croppie.css" rel="stylesheet" type="text/css" /> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/croppie@2.6.5/croppie.css" type="text/css">

    <!-- icons -->
    <link href="<?= $domain ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <style>
        .jqclock {
            display: inline-block;
            text-align: center;
            border: 2px inset White;
            padding: 10px;
            margin-bottom: 1px;
            margin-right: auto;
            margin-left: auto;
            display: block;
        }

        body[data-sidebar-color="dark"] .jqclock-dark {
            background: #343a40;
        }

        body[data-sidebar-color="dark"] .clockdate-dark {
            color: aliceblue;
        }

        .clockdate {
            color: DarkRed;
            margin-bottom: 10px;
            font-size: 14px;
            display: block;
        }

        .clocktime {
            border: 2px inset White;
            background: Black;
            padding: 5px;
            font-size: 14px;
            font-family: "Courier";
            color: LightGreen;
            margin: 2px;
            display: block;
        }

        .ttuser tr td,
        .ttuser tr th {
            border: none !important;
        }
    </style>

    <!-- Sweet Alerts js -->
    <script src="<?= $domain ?>assets/libs/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="<?= $domain ?>assets/libs/html5-qrcode/html5-qrcode.min.js"></script>

</head>
<!-- body start -->

<body class="loading" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": true}, "topbar": {"color": "light"}, "showRightSidebarOnPageLoad": true}'>

    <?php
    require '../middleware/sidebar.php';
    ?>