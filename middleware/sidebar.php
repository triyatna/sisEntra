<?php
$ckusr = $database->query("SELECT * FROM users WHERE username = '$user'")->fetch(PDO::FETCH_ASSOC);
$name = $ckusr['name'];
$ckmembr = $database->query("SELECT * FROM `sentra_member` WHERE `name` = '$name'")->fetch(PDO::FETCH_ASSOC);
$job = $ckmembr['job'];
?>
<div id="wrapper">
    <!-- Topbar Start -->
    <div class="navbar-custom">
        <ul class="list-unstyled topnav-menu float-end mb-0">
            <li class="dropdown notification-list topbar-dropdown">
                <a class="nav-link dropdown-toggle waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="fe-bell noti-icon"></i>
                    <span class="badge bg-danger rounded-circle noti-icon-badge">
                        <?php
                        $quer = $database->query("SELECT * FROM `notification` WHERE `name`='$name' AND `status` = '0'");
                        if ($quer->rowCount() > 0) {
                            echo $quer->rowCount();
                        } else {
                            echo '0';
                        }
                        ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-lg">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5 class="m-0">
                            <span class="float-end">
                                <a href="" class="text-dark">
                                    <small>Clear All</small>
                                </a> </span>Notification
                        </h5>
                    </div>

                    <div class="noti-scroll" data-simplebar>
                        <?php
                        $notifcheck = $database->query("SELECT * FROM `notification` WHERE `name` = '$name' ORDER BY id DESC LIMIT 5");
                        if ($notifcheck->rowCount() > 0) {
                            while ($notif = $notifcheck->fetch(PDO::FETCH_ASSOC)) {
                                $urlsnotif = DOMAIN_APP . 'app/notification?q=' . $notif['query'];
                                if ($notif['status'] == '0') {
                                    echo '<a href="' . $urlsnotif . '" class="dropdown-item notify-item active">';
                                } else {
                                    echo '<a href="' . $urlsnotif . '" class="dropdown-item notify-item">';
                                }
                        ?>

                                <?php
                                if ($notif['category'] == '1') { //notif
                                    echo '<div class="notify-icon bg-primary"><i class="mdi mdi-robot-excited-outline"></i></div>';
                                } else if ($notif['category'] == '2') { //cash
                                    echo '<div class="notify-icon bg-success"><i class="mdi mdi-cash-multiple"></i></div>';
                                } else {
                                    echo '<div class="notify-icon bg-warning"><i class="mdi mdi-alert-outline"></i></div>';
                                }
                                ?>
                                <p class="notify-details"><?= $notif['subject'] ?>
                                    <small class="text-muted"><?= cekDate(date("Y-m-d H:i:s", $notif['timestamp'])) ?></small>
                                </p>
                                </a>
                        <?php
                            }
                        } ?>
                    </div>
                    <!-- All-->
                    <a href="<?= DOMAIN_APP . 'app/notification' ?>" class="dropdown-item text-center text-primary notify-item notify-all">
                        View all
                        <i class="fe-arrow-right"></i>
                    </a>
                </div>
            </li>

            <li class="dropdown notification-list topbar-dropdown">
                <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="<?= getSingleValDB('users', 'username', $user, 'avatar') ?>" alt="user-image" class="rounded-circle" />
                    <span class="pro-user-name ms-1">
                        <?= $user ?> <i class="mdi mdi-chevron-down"></i>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end profile-dropdown">
                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                    <!-- item-->
                    <a href="<?= $domain ?>account/profiles" class="dropdown-item notify-item">
                        <i class="fe-user"></i>
                        <span>My Account</span>
                    </a>
                    <div class="dropdown-divider"></div>

                    <!-- item-->
                    <a href="#" onclick="logoutsess();" class="dropdown-item notify-item">
                        <i class="fe-log-out"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </li>

            <li class="dropdown notification-list">
                <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                    <i class="fe-settings noti-icon"></i>
                </a>
            </li>
        </ul>

        <!-- LOGO -->
        <div class="logo-box">
            <a href="/" class="logo logo-light text-center">
                <span class="logo-sm">
                    <img src="<?= $domain ?>assets/images/spanel-logo-sm.png" alt="" height="40" />
                </span>
                <span class="logo-lg">
                    <img src="<?= $domain ?>assets/images/spanel-logo.png" alt="" height="30" />
                </span>
            </a>
            <a href="/" class="logo logo-dark text-center">
                <span class="logo-sm">
                    <img src="<?= $domain ?>assets/images/spanel-logo-sm.png" alt="" height="40" />
                </span>
                <span class="logo-lg">
                    <img src="<?= $domain ?>assets/images/spanel-logo.png" alt="" height="30" />
                </span>
            </a>
        </div>

        <ul class="list-unstyled topnav-menu topnav-menu-left mb-0">
            <li>
                <button class="button-menu-mobile disable-btn waves-effect">
                    <i class="fe-menu"></i>
                </button>
            </li>

            <li>
                <h4 class="page-title-main">
                    <div id="pages"></div>
                </h4>
            </li>
        </ul>

        <div class="clearfix"></div>
    </div>
    <!-- end Topbar -->

    <!-- ========== Left Sidebar Start ========== -->
    <div class="left-side-menu">
        <div class="h-100" data-simplebar>
            <!-- User box -->
            <div class="user-box text-center">
                <img src="<?= getSingleValDB('users', 'username', $user, 'avatar') ?>" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail avatar-md" />
                <div class="dropdown">
                    <a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown" aria-expanded="false"><?= $user ?></a>
                    <div class="dropdown-menu user-pro-dropdown">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-user me-1"></i>
                            <span>My Account</span>
                        </a>

                        <!-- item-->
                        <a href="#" onclick="logoutsess();" class="dropdown-item notify-item">
                            <i class="fe-log-out me-1"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </div>

                <p class="text-muted left-user-info"><?= $ckmembr['job'] ?></p>

                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a href="<?= $domain ?>account/profiles" class="text-muted left-user-info">
                            <i class="mdi mdi-cog"></i>
                        </a>
                    </li>

                    <li class="list-inline-item">
                        <a href="#" onclick="logoutsess();">
                            <i class="mdi mdi-power"></i>
                        </a>
                    </li>
                </ul>
            </div>

            <?php
            if ($ckusr['role'] == '3') {
            ?>
                <!--- Sidemenu Admin-->
                <div id="sidebar-menu">
                    <ul id="side-menu">
                        <li class="menu-title">Navigation</li>

                        <li id="dashboard" class="active">
                            <a href="<?= $domain ?>admin/dashboard">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>
                        <li id="member" class="active">
                            <a href="<?= $domain ?>admin/member-list">
                                <i class="fe-users"></i>
                                <span> Member </span>
                            </a>
                        </li>
                        <li id="cash" class="active">
                            <a href="<?= $domain ?>app/pay-cash">
                                <i class="mdi mdi-cash-plus"></i>
                                <span> Pay cash </span>
                            </a>
                        </li>
                        <li>
                            <a href="#master" data-bs-toggle="collapse">
                                <i class="mdi mdi-clipboard-list"></i>
                                <span> Master Data </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="master">
                                <ul class="nav-second-level">
                                    <li id="project">
                                        <a href="<?= $domain ?>admin/project">Data Project</a>
                                    </li>
                                    <li id="presence">
                                        <a href="<?= $domain ?>admin/presence">Data Presence</a>
                                    </li>
                                    <?php
                                    if ($job == 'Bendahara') {
                                        echo '<li id="data-cash">
                                        <a href="' . $domain . 'admin/cash">Data Kas sEntra</a>
                                    </li>';
                                    }
                                    ?>

                                </ul>
                            </div>
                        </li>

                        <li class="menu-title mt-2">Apps</li>
                        <li>
                            <a href="#form" data-bs-toggle="collapse">
                                <i class="mdi mdi-file-link-outline"></i>
                                <span> Form </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="form">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="<?= $domain ?>app/form-agenda">Create Form Agenda</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="#whatsapp" data-bs-toggle="collapse">
                                <i class="mdi mdi-whatsapp"></i>
                                <span> WhatsApp </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="whatsapp">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="<?= $domain ?>app/whatsapp/send-message">Send Messages</a>
                                    </li>
                                    <li>
                                        <a href="<?= $domain ?>app/whatsapp/broadcast">Broadcast</a>
                                    </li>
                                    <li>
                                        <a href="<?= $domain ?>app/whatsapp/schedule-message">Schedule Message</a>
                                    </li>
                                    <li>
                                        <a href="<?= $domain ?>app/whatsapp/bot-manager">BOT Manager</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li id="scan" class="active">
                            <a href="<?= $domain ?>app/scan-presence">
                                <i class="mdi mdi-page-next"></i>
                                <span> Scan </span>
                            </a>
                        </li>
                        <li id="calendar-page">
                            <a href="<?= $domain ?>app/schedule-calendar">
                                <i class="mdi mdi-calendar"></i>
                                <span> Calendar </span>
                            </a>
                        </li>
                        <li class="menu-title mt-2">Users</li>
                        <li>
                            <a href="#account" data-bs-toggle="collapse">
                                <i class="mdi mdi-account-settings"></i>
                                <span> Account </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="account">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="<?= $domain ?>account/profiles">Profiles</a>
                                    </li>
                                    <li>
                                        <a href="<?= $domain ?>account/change-password">Change Password</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="menu-title mt-2">Other</li>
                        <li id="report">
                            <a href="<?= $domain ?>app/report">
                                <i class="mdi mdi-bug"></i>
                                <span> Report Bug </span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End Sidebar -->
            <?php
            } else if ($ckusr['role'] == '2') {
            ?>
                <!--- Sidemenu Staf -->
                <div id="sidebar-menu">
                    <ul id="side-menu">
                        <li class="menu-title">Navigation</li>

                        <li id="dashboard" class="active">
                            <a href="<?= $domain ?>staff/dashboard">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>
                        <li id="member" class="active">
                            <a href="<?= $domain ?>staff/member-list">
                                <i class="fe-users"></i>
                                <span> Member </span>
                            </a>
                        </li>
                        <li id="cash" class="active">
                            <a href="<?= $domain ?>app/pay-cash">
                                <i class="mdi mdi-cash-plus"></i>
                                <span> Pay cash </span>
                            </a>
                        </li>
                        <li>
                            <a href="#master" data-bs-toggle="collapse">
                                <i class="mdi mdi-clipboard-list"></i>
                                <span> Master Data </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="master">
                                <ul class="nav-second-level">
                                    <li id="project">
                                        <a href="<?= $domain ?>staff/project">Data Project</a>
                                    </li>
                                    <li id="presence">
                                        <a href="<?= $domain ?>staff/presence">Data Presence</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="menu-title mt-2">Apps</li>
                        <li>
                            <a href="#form" data-bs-toggle="collapse">
                                <i class="mdi mdi-file-link-outline"></i>
                                <span> Form </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="form">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="<?= $domain ?>app/form-agenda">Create Form Agenda</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="#whatsapp" data-bs-toggle="collapse">
                                <i class="mdi mdi-whatsapp"></i>
                                <span> WhatsApp </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="whatsapp">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="<?= $domain ?>app/whatsapp/send-message">Send Messages</a>
                                    </li>
                                    <li>
                                        <a href="<?= $domain ?>app/whatsapp/broadcast">Broadcast</a>
                                    </li>
                                    <li>
                                        <a href="<?= $domain ?>app/whatsapp/schedule-message">Schedule Message</a>
                                    </li>
                                    <li>
                                        <a href="<?= $domain ?>app/whatsapp/bot-manager">BOT Manager</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li id="scan" class="active">
                            <a href="<?= $domain ?>app/scan-presence">
                                <i class="mdi mdi-page-next"></i>
                                <span> Scan </span>
                            </a>
                        </li>
                        <li id="calendar-page">
                            <a href="<?= $domain ?>app/schedule-calendar">
                                <i class="mdi mdi-calendar"></i>
                                <span> Calendar </span>
                            </a>
                        </li>
                        <li class="menu-title mt-2">Users</li>
                        <li>
                            <a href="#account" data-bs-toggle="collapse">
                                <i class="mdi mdi-account-settings"></i>
                                <span> Account </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="account">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="<?= $domain ?>account/profiles">Profiles</a>
                                    </li>
                                    <li>
                                        <a href="<?= $domain ?>account/change-password">Change Password</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="menu-title mt-2">Other</li>
                        <li id="report">
                            <a href="<?= $domain ?>app/report">
                                <i class="mdi mdi-bug"></i>
                                <span> Report Bug </span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End Sidebar -->
            <?php
            } else if ($ckusr['role'] == '1') {
            ?>
                <!--- Sidemenu Member-->
                <div id="sidebar-menu">
                    <ul id="side-menu">
                        <li class="menu-title">Navigation</li>

                        <li id="dashboard" class="active">
                            <a href="<?= $domain ?>member/dashboard">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>
                        <li id="cash" class="active">
                            <a href="<?= $domain ?>app/pay-cash">
                                <i class="mdi mdi-cash-plus"></i>
                                <span> Pay cash </span>
                            </a>
                        </li>
                        <li>
                            <a href="#activity" data-bs-toggle="collapse">
                                <i class="mdi mdi-package"></i>
                                <span> Report </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="activity">
                                <ul class="nav-second-level">
                                    <li id="presence">
                                        <a href="<?= $domain ?>member/presence">
                                            Presence
                                        </a>
                                    </li>
                                    <li id="work">
                                        <a href="<?= $domain ?>member/project">Project</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="menu-title mt-2">Users</li>
                        <li>
                            <a href="#account" data-bs-toggle="collapse">
                                <i class="mdi mdi-account-settings"></i>
                                <span> Account </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="account">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="<?= $domain ?>account/profiles">Profiles</a>
                                    </li>
                                    <li>
                                        <a href="<?= $domain ?>account/change-password">Change Password</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="menu-title mt-2">Other</li>
                        <li id="report">
                            <a href="<?= $domain ?>app/report">
                                <i class="mdi mdi-bug"></i>
                                <span> Report Bug </span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End Sidebar -->
            <?php
            }
            ?>

            <div class="clearfix"></div>
        </div>
        <!-- Sidebar -left -->
    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">