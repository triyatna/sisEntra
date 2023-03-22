<?php
require '../middleware/header.php';
?>
<!-- Start Content-->
<div class="container-fluid">
    <div class="row">
        <?php
        if (get('q')) {
            $query = get('q');
            $ceknotif = $database->query("SELECT * FROM `notification` WHERE query = '$query'");
            if ($ceknotif->rowCount() > 0) {
                $data = $ceknotif->fetch(PDO::FETCH_ASSOC);
                $id = $data['id'];
                $subjek = $data['subject'];
                $message = $data['message'];
                $time = $data['timestamp'];
                $date = date('d F Y H:i:s', $time);
                $cate = $data['category'];
                $file = $data['file'];
                if ($data['status'] == '0') {
                    $database->query("UPDATE `notification` SET `status` = '1' WHERE `notification`.`id` = '$id'");
                }
        ?>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <label class="form-label mb-2 mt-1">Subject</label>
                            <input type="text" class="form-control mb-2" value="<?= $subjek ?>" readonly>
                            <label class="form-label mb-2 mt-1">Messages</label>
                            <textarea class="form-control mb-2" cols="30" rows="10" readonly><?= str_replace('{n}', '&#10;', $message) ?>&#10;</textarea>
                            <div class="mt-3 mb-3">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="form-label mb-2 mt-1">Date Time</label>
                                        <input type="text" class="form-control mb-2" value="<?= $date ?> WIB" readonly>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label mb-2 mt-1">Type</label>
                                        <input type="text" class="form-control mb-2" value="<?= $cate ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <button onclick="javascript:window.history.back();" class="btn btn-primary"> <i class="mdi mdi-keyboard-backspace"></i> Back</button>
                        </div>
                    </div>
                </div>
            <?php
            }
        } else {
            ?>
            <div class="col-lg-12">
                <div class="inbox-app-main">
                    <main id="main">
                        <div class="overlay"></div>
                        <header class="header">
                            <h1 class="page-title">
                                <a class="sidebar-toggle-btn trigger-toggle-sidebar">
                                    <span class="line"></span>
                                    <span class="line"></span>
                                    <span class="line"></span>
                                    <span class="line line-angle1"></span>
                                    <span class="line line-angle2"></span>
                                </a>
                            </h1>
                            <div class="action-bar float-start">
                                <h4 class="title"> Notification</h4>
                            </div>

                            <div class="clearfix"></div>

                        </header>

                        <div id="main-nano-wrapper" class="nano">
                            <div class="nano-content h-100" data-simplebar>
                                <ul class="message-list">
                                    <?php
                                    $notifcheck = $database->query("SELECT * FROM `notification` WHERE `name` = '$name'");
                                    if ($notifcheck->rowCount() > 0) {
                                        while ($notif = $notifcheck->fetch(PDO::FETCH_ASSOC)) {
                                            $urlsnotif = DOMAIN_APP . 'app/notification?q=' . $notif['query'];
                                            if ($notif['status'] == '0') {
                                                echo '<li class="unread" onclick="notifread(`' . $urlsnotif . '`)">';
                                            } else {
                                                echo '<li onclick="notifread(`' . $urlsnotif . '`)">';
                                            }
                                    ?>
                                            <div class="mail-col mail-col-1"><span class="dot"></span>
                                                <p class="title">
                                                    <?= $notif['subject'] ?>
                                                </p><span class="star-toggle far fa-star"></span>
                                            </div>
                                            <div class="mail-col mail-col-2">
                                                <div class="subject"><?= $notif['message'] ?>
                                                </div>
                                                <div class="date"><?= cekDate(date("Y-m-d H:i:s", $notif['timestamp'])) ?></div>
                                            </div>
                                            </li>
                                    <?php
                                        }
                                    } ?>
                                </ul>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>
<script>
    function notifread(url) {
        window.location.href = url;
    }
    page = 'notification';
    document.getElementById("title").innerHTML = "Notification  | Spanel - Panel BOT Automate sEntra UTama ";
</script>
<?php
require '../middleware/footer.php';
