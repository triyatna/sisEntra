<?php
require '../middleware/header.php';
$checkcash = $database->query("SELECT * FROM `sentra_cash` WHERE `name` = '$name'");
$cekcash = $checkcash->fetch(PDO::FETCH_ASSOC);
$m1 = $cekcash['month_1'];
$m2 = $cekcash['month_2'];
$m3 = $cekcash['month_3'];
$m4 = $cekcash['month_4'];
$m5 = $cekcash['month_5'];
$m6 = $cekcash['month_6'];
$m7 = $cekcash['month_7'];
$m8 = $cekcash['month_8'];
$m9 = $cekcash['month_9'];
$m10 = $cekcash['month_10'];
$m11 = $cekcash['month_11'];
$m12 = $cekcash['month_12'];
if ($m1 == '1') {
    $moun = PRICE_KAS;
    if ($m2 == '1') {
        $moun = PRICE_KAS * 2;
        if ($m3 == '1') {
            $moun = PRICE_KAS * 3;
            if ($m4 == '1') {
                $moun = PRICE_KAS * 4;
                if ($m5 == '1') {
                    $moun = PRICE_KAS * 5;
                    if ($m6 == '1') {
                        $moun = PRICE_KAS * 6;
                        if ($m7 == '1') {
                            $moun = PRICE_KAS * 7;
                            if ($m8 == '1') {
                                $moun = PRICE_KAS * 8;
                                if ($m9 == '1') {
                                    $moun = PRICE_KAS * 9;
                                    if ($m9 == '1') {
                                        $moun = PRICE_KAS * 10;
                                        if ($m9 == '1') {
                                            $moun = PRICE_KAS * 11;
                                            if ($m9 == '1') {
                                                $moun = PRICE_KAS * 12;
                                            } else {
                                                $moun = PRICE_KAS * 11;
                                            }
                                        } else {
                                            $moun = PRICE_KAS * 10;
                                        }
                                    } else {
                                        $moun = PRICE_KAS * 9;
                                    }
                                } else {
                                    $moun = PRICE_KAS * 8;
                                }
                            } else {
                                $moun = PRICE_KAS * 7;
                            }
                        } else {
                            $moun = PRICE_KAS * 6;
                        }
                    } else {
                        $moun = PRICE_KAS * 5;
                    }
                } else {
                    $moun = PRICE_KAS * 4;
                }
            } else {
                $moun = PRICE_KAS * 3;
            }
        } else {
            $moun = PRICE_KAS * 2;
        }
    } else {
        $moun = PRICE_KAS * 1;
    }
} else {
    $moun = '0';
}
if (getSingleValDB('sentra_cash', 'name', $name, 'price') - $moun < 0) {
    $pricecash = 0;
} else {
    $pricecash = getSingleValDB('sentra_cash', 'name', $name, 'price') - $moun;
}
if (cekKasku($name) - $pricecash < 0) {
    $mincash = 0;
} else {
    $mincash = cekKasku($name) - $pricecash;
}
?>
<!-- Start Content-->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 mb-2">
            <h4> Hi <?= $name ?>!</h4>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">
                    Bayar Kas
                </div>
                <div class="card-body">
                    <a href="add-pay-cash" class="btn btn-lg font-16 btn-success w-100" id="btn-new-event"><i class="mdi mdi-cash-plus me-1"></i> Bayar Kas </a>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="widget-chart-1">
                        <div class="widget-detail-1 text-end">
                            <h2 class="fw-normal pt-2 mb-1"> Rp <?= cekKasku($name) ?>,- </h2>
                            <p class="text-muted mb-1">Uang Kas Yang Belum Dibayar</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="widget-chart-1">
                        <div class="widget-detail-1 text-end">
                            <h2 class="fw-normal pt-2 mb-1"> Rp <?= $pricecash ?>,- </h2>
                            <p class="text-muted mb-1">Uang tersimpan</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="widget-chart-1">
                        <div class="widget-detail-1 text-end">
                            <h2 class="fw-normal pt-2 mb-1"> Rp <?= $mincash ?>,- </h2>
                            <p class="text-muted mb-1">Uang Kurang</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="title">History Kas</h4>
                </div>
                <div class="card-body">
                    <table id="cash-table" class="table table-bordered dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>1</th>
                                <th>2</th>
                                <th>3</th>
                                <th>4</th>
                                <th>5</th>
                                <th>6</th>
                                <th>7</th>
                                <th>8</th>
                                <th>9</th>
                                <th>10</th>
                                <th>11</th>
                                <th>12</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= $cekcash['name'] ?></td>
                                <td><?= $cekcash['month_1'] == '1' ? '<span class="text-center" style="font-size:20px">✅</span>' : (date('m') == '11' ? '<span class="text-center" style="font-size:20px">❌</span>' : ''); ?></td>
                                <td><?= $cekcash['month_2'] == '1' ? '<span class="text-center" style="font-size:20px">✅</span>' : (date('m') == '12' ? '<span class="text-center" style="font-size:20px">❌</span>' : ''); ?></td>
                                <td><?= $cekcash['month_3'] == '1' ? '<span class="text-center" style="font-size:20px">✅</span>' : (date('m') == '1' ? '<span class="text-center" style="font-size:20px">❌</span>' : ''); ?></td>
                                <td><?= $cekcash['month_4'] == '1' ? '<span class="text-center" style="font-size:20px">✅</span>' : (date('m') == '2' ? '<span class="text-center" style="font-size:20px">❌</span>' : ''); ?></td>
                                <td><?= $cekcash['month_5'] == '1' ? '<span class="text-center" style="font-size:20px">✅</span>' : (date('m') == '3' ? '<span class="text-center" style="font-size:20px">❌</span>' : ''); ?></td>
                                <td><?= $cekcash['month_6'] == '1' ? '<span class="text-center" style="font-size:20px">✅</span>' : (date('m') == '4' ? '<span class="text-center" style="font-size:20px">❌</span>' : ''); ?></td>
                                <td><?= $cekcash['month_7'] == '1' ? '<span class="text-center" style="font-size:20px">✅</span>' : (date('m') == '5' ? '<span class="text-center" style="font-size:20px">❌</span>' : ''); ?></td>
                                <td><?= $cekcash['month_8'] == '1' ? '<span class="text-center" style="font-size:20px">✅</span>' : (date('m') == '6' ? '<span class="text-center" style="font-size:20px">❌</span>' : ''); ?></td>
                                <td><?= $cekcash['month_9'] == '1' ? '<span class="text-center" style="font-size:20px">✅</span>' : (date('m') == '7' ? '<span class="text-center" style="font-size:20px">❌</span>' : ''); ?></td>
                                <td><?= $cekcash['month_10'] == '1' ? '<span class="text-center" style="font-size:20px">✅</span>' : (date('m') == '8' ? '<span class="text-center" style="font-size:20px">❌</span>' : ''); ?></td>
                                <td><?= $cekcash['month_11'] == '1' ? '<span class="text-center" style="font-size:20px">✅</span>' : (date('m') == '9' ? '<span class="text-center" style="font-size:20px">❌</span>' : ''); ?></td>
                                <td><?= $cekcash['month_12'] == '1' ? '<span class="text-center" style="font-size:20px">✅</span>' : (date('m') == '10' ? '<span class="text-center" style="font-size:20px">❌</span>' : ''); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="title">History Pembayaran</h4>
                </div>
                <div class="card-body">
                    <table id="history-table" class="table table-bordered dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>No Invoice</th>
                                <th>Total</th>
                                <th>Via</th>
                                <th>Bukti</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $checkhistory = $database->query("SELECT * FROM sentra_cash_request WHERE `name` = '$name'");
                            $idd = 1;
                            foreach ($checkhistory as $v) {
                            ?>
                                <tr>
                                    <td><?= $idd++ ?></td>
                                    <td><?= $v['no_invoice'] ?></td>
                                    <td>Rp<?= number_format($v['cash'], 0, ",", ".") ?>,-</td>
                                    <td><?= $v['transferto'] ?></td>
                                    <td><a href="<?= $v['bukti'] ?>" target="_blank">Lihat</a></td>
                                    <td><?php if ($v['status'] == 1) {
                                            echo "<span class='badge bg-success'>Success</span>";
                                        } else if ($v['status'] == 2) {
                                            echo "<span class='badge bg-warning'>Pending</span>";
                                        } else {
                                            echo "<span class='badge bg-danger'>Deleted</span>";
                                        } ?></td>
                                    <td>
                                        <a href="invoice?query=<?= $v['query'] ?>&type=view" class="btn btn-primary btn-sm">Result</a>
                                        <?php
                                        if ($v['status'] == 3) {
                                            echo ' <a href="invoice?query=' . $v['query'] . '&type=delete" class="btn btn-danger btn-sm">Remove</a>';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    page = 'cash';
    document.getElementById("title").innerHTML = "Pay Cash | Spanel - Panel BOT Automate sEntra UTama ";
</script>
<?php
require '../middleware/footer.php';
