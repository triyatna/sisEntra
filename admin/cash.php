<?php
require '../middleware/header.php';

if ($job != 'Bendahara') {
    redirect('../');
}
if (get('accept')) {
    $id = get('accept');
    $checkcashdb = $database->query("SELECT * FROM sentra_cash_request WHERE id=$id");
    if ($checkcashdb->rowCount() > 0) {
        $accept = $checkcashdb->fetch(PDO::FETCH_ASSOC);
        $id = $accept['id'];
        $name = $accept['name'];
        $cash = $accept['cash'];
        $amountss = number_format($cash, 0, ",", ".");
        $cekdbcash = $database->query("SELECT * FROM sentra_cash WHERE `name`='$name'");
        if ($cekdbcash->rowCount() > 0) {
            $database->query("UPDATE sentra_cash_request SET `status`='1' WHERE id=$id");
            $database->insertTable("notification", "NULL, '$name', 'Halo $name, terimakasih telah melakukan pembayaran kas sEntra{n}pembayaran kas kamu telah di terima sebesar $amountss {n}{n}Regards,{n}Bendahara sEntra.', '1', '', '$querynotif', '0', UNIX_TIMESTAMP()");
            $amm = $cekdbcash->fetch(PDO::FETCH_ASSOC);
            $cashnow = $amm['price'];
            $price = $cashnow + $cash;
            if ($price >= "0" && $price < "5000") {
                $m1 = '0';
                $m2 = '0';
                $m3 = '0';
                $m4 = '0';
                $m5 = '0';
                $m6 = '0';
                $m7 = '0';
                $m8 = '0';
                $m9 = '0';
                $m10 = '0';
                $m11 = '0';
                $m12 = '0';
            } else if ($price >= "5000" && $price < "9999") {
                $m1 = '1';
                $m2 = '0';
                $m3 = '0';
                $m4 = '0';
                $m5 = '0';
                $m6 = '0';
                $m7 = '0';
                $m8 = '0';
                $m9 = '0';
                $m10 = '0';
                $m11 = '0';
                $m12 = '0';
            } else if ($price >= "10000" && $price < "14999") {
                $m1 = '1';
                $m2 = '1';
                $m3 = '0';
                $m4 = '0';
                $m5 = '0';
                $m6 = '0';
                $m7 = '0';
                $m8 = '0';
                $m9 = '0';
                $m10 = '0';
                $m11 = '0';
                $m12 = '0';
            } else if ($price >= "15000" && $price < "19999") {
                $m1 = '1';
                $m2 = '1';
                $m3 = '1';
                $m4 = '0';
                $m5 = '0';
                $m6 = '0';
                $m7 = '0';
                $m8 = '0';
                $m9 = '0';
                $m10 = '0';
                $m11 = '0';
                $m12 = '0';
            } else if ($price >= "20000" && $price < "24999") {
                $m1 = '1';
                $m2 = '1';
                $m3 = '1';
                $m4 = '1';
                $m5 = '0';
                $m6 = '0';
                $m7 = '0';
                $m8 = '0';
                $m9 = '0';
                $m10 = '0';
                $m11 = '0';
                $m12 = '0';
            } else if ($price >= "25000" && $price < "29999") {
                $m1 = '1';
                $m2 = '1';
                $m3 = '1';
                $m4 = '1';
                $m5 = '1';
                $m6 = '0';
                $m7 = '0';
                $m8 = '0';
                $m9 = '0';
                $m10 = '0';
                $m11 = '0';
                $m12 = '0';
            } else if ($price >= "30000" && $price < "34999") {
                $m1 = '1';
                $m2 = '1';
                $m3 = '1';
                $m4 = '1';
                $m5 = '1';
                $m6 = '1';
                $m7 = '0';
                $m8 = '0';
                $m9 = '0';
                $m10 = '0';
                $m11 = '0';
                $m12 = '0';
            } else if ($price >= "35000" && $price < "39999") {
                $m1 = '1';
                $m2 = '1';
                $m3 = '1';
                $m4 = '1';
                $m5 = '1';
                $m6 = '1';
                $m7 = '1';
                $m8 = '0';
                $m9 = '0';
                $m10 = '0';
                $m11 = '0';
                $m12 = '0';
            } else if ($price >= "40000" && $price < "44999") {
                $m1 = '1';
                $m2 = '1';
                $m3 = '1';
                $m4 = '1';
                $m5 = '1';
                $m6 = '1';
                $m7 = '1';
                $m8 = '1';
                $m9 = '0';
                $m10 = '0';
                $m11 = '0';
                $m12 = '0';
            } else if ($price >= "45000" && $price < "49999") {
                $m1 = '1';
                $m2 = '1';
                $m3 = '1';
                $m4 = '1';
                $m5 = '1';
                $m6 = '1';
                $m7 = '1';
                $m8 = '1';
                $m9 = '1';
                $m10 = '0';
                $m11 = '0';
                $m12 = '0';
            } else if ($price >= "50000" && $price < "54999") {
                $m1 = '1';
                $m2 = '1';
                $m3 = '1';
                $m4 = '1';
                $m5 = '1';
                $m6 = '1';
                $m7 = '1';
                $m8 = '1';
                $m9 = '1';
                $m10 = '1';
                $m11 = '0';
                $m12 = '0';
            } else if ($price >= "55000" && $price < "59999") {
                $m1 = '1';
                $m2 = '1';
                $m3 = '1';
                $m4 = '1';
                $m5 = '1';
                $m6 = '1';
                $m7 = '1';
                $m8 = '1';
                $m9 = '1';
                $m10 = '1';
                $m11 = '1';
                $m12 = '0';
            } else if ($price >= "60000" && $price < "65000") {
                $m1 = '1';
                $m2 = '1';
                $m3 = '1';
                $m4 = '1';
                $m5 = '1';
                $m6 = '1';
                $m7 = '1';
                $m8 = '1';
                $m9 = '1';
                $m10 = '1';
                $m11 = '1';
                $m12 = '1';
            }
            $database->query("UPDATE `sentra_cash` SET `month_1` = '$m1', `month_2` = '$m2', `month_3` = '$m3', `month_4` = '$m4', `month_5` = '$m5', `month_6` = '$m6', `month_7` = '$m7', `month_8` = '$m8', `month_9` = '$m9', `month_10` = '$m10', `month_11` = '$m11', `month_12` = '$m12', `price` = '$price', `date` = CURRENT_TIMESTAMP() WHERE `sentra_cash`.`name` = '$name'");
            swalfire('success', 'Dana telah diterima oleh anda', 'cash');
        } else {
            swalfire('error', 'Dana gagal diterima', 'cash');
        }
    } else {
        redirect('../');
    }
} else if (get('reject')) {
    $id = get('reject');
    $checkcashdb = $database->query("SELECT * FROM sentra_cash_request WHERE id=$id");
    if ($checkcashdb->rowCount() > 0) {
        $reject = $checkcashdb->fetch(PDO::FETCH_ASSOC);
        $id = $reject['id'];
        $database->query("UPDATE sentra_cash_request SET status='4' WHERE id=$id");
        swalfire('success', 'Dana telah ditolak oleh anda', 'cash');
    } else {
        redirect('../');
    }
}
if (post('addmanual')) {
    $name = post('name');
    $cash = post('cash');
    $ckdl = $database->query("SELECT * FROM `sentra_cash` WHERE `name`='$name'");
    $ro = $ckdl->fetch(PDO::FETCH_ASSOC);
    $price = $cash + $ro['price'];
    if ($price >= "0" && $price < "5000") {
        $m1 = '0';
        $m2 = '0';
        $m3 = '0';
        $m4 = '0';
        $m5 = '0';
        $m6 = '0';
        $m7 = '0';
        $m8 = '0';
        $m9 = '0';
        $m10 = '0';
        $m11 = '0';
        $m12 = '0';
    } else if ($price >= "5000" && $price < "9999") {
        $m1 = '1';
        $m2 = '0';
        $m3 = '0';
        $m4 = '0';
        $m5 = '0';
        $m6 = '0';
        $m7 = '0';
        $m8 = '0';
        $m9 = '0';
        $m10 = '0';
        $m11 = '0';
        $m12 = '0';
    } else if ($price >= "10000" && $price < "14999") {
        $m1 = '1';
        $m2 = '1';
        $m3 = '0';
        $m4 = '0';
        $m5 = '0';
        $m6 = '0';
        $m7 = '0';
        $m8 = '0';
        $m9 = '0';
        $m10 = '0';
        $m11 = '0';
        $m12 = '0';
    } else if ($price >= "15000" && $price < "19999") {
        $m1 = '1';
        $m2 = '1';
        $m3 = '1';
        $m4 = '0';
        $m5 = '0';
        $m6 = '0';
        $m7 = '0';
        $m8 = '0';
        $m9 = '0';
        $m10 = '0';
        $m11 = '0';
        $m12 = '0';
    } else if ($price >= "20000" && $price < "24999") {
        $m1 = '1';
        $m2 = '1';
        $m3 = '1';
        $m4 = '1';
        $m5 = '0';
        $m6 = '0';
        $m7 = '0';
        $m8 = '0';
        $m9 = '0';
        $m10 = '0';
        $m11 = '0';
        $m12 = '0';
    } else if ($price >= "25000" && $price < "29999") {
        $m1 = '1';
        $m2 = '1';
        $m3 = '1';
        $m4 = '1';
        $m5 = '1';
        $m6 = '0';
        $m7 = '0';
        $m8 = '0';
        $m9 = '0';
        $m10 = '0';
        $m11 = '0';
        $m12 = '0';
    } else if ($price >= "30000" && $price < "34999") {
        $m1 = '1';
        $m2 = '1';
        $m3 = '1';
        $m4 = '1';
        $m5 = '1';
        $m6 = '1';
        $m7 = '0';
        $m8 = '0';
        $m9 = '0';
        $m10 = '0';
        $m11 = '0';
        $m12 = '0';
    } else if ($price >= "35000" && $price < "39999") {
        $m1 = '1';
        $m2 = '1';
        $m3 = '1';
        $m4 = '1';
        $m5 = '1';
        $m6 = '1';
        $m7 = '1';
        $m8 = '0';
        $m9 = '0';
        $m10 = '0';
        $m11 = '0';
        $m12 = '0';
    } else if ($price >= "40000" && $price < "44999") {
        $m1 = '1';
        $m2 = '1';
        $m3 = '1';
        $m4 = '1';
        $m5 = '1';
        $m6 = '1';
        $m7 = '1';
        $m8 = '1';
        $m9 = '0';
        $m10 = '0';
        $m11 = '0';
        $m12 = '0';
    } else if ($price >= "45000" && $price < "49999") {
        $m1 = '1';
        $m2 = '1';
        $m3 = '1';
        $m4 = '1';
        $m5 = '1';
        $m6 = '1';
        $m7 = '1';
        $m8 = '1';
        $m9 = '1';
        $m10 = '0';
        $m11 = '0';
        $m12 = '0';
    } else if ($price >= "50000" && $price < "54999") {
        $m1 = '1';
        $m2 = '1';
        $m3 = '1';
        $m4 = '1';
        $m5 = '1';
        $m6 = '1';
        $m7 = '1';
        $m8 = '1';
        $m9 = '1';
        $m10 = '1';
        $m11 = '0';
        $m12 = '0';
    } else if ($price >= "55000" && $price < "59999") {
        $m1 = '1';
        $m2 = '1';
        $m3 = '1';
        $m4 = '1';
        $m5 = '1';
        $m6 = '1';
        $m7 = '1';
        $m8 = '1';
        $m9 = '1';
        $m10 = '1';
        $m11 = '1';
        $m12 = '0';
    } else if ($price >= "60000" && $price < "65000") {
        $m1 = '1';
        $m2 = '1';
        $m3 = '1';
        $m4 = '1';
        $m5 = '1';
        $m6 = '1';
        $m7 = '1';
        $m8 = '1';
        $m9 = '1';
        $m10 = '1';
        $m11 = '1';
        $m12 = '1';
    }
    $database->query("UPDATE `sentra_cash` SET `month_1` = '$m1', `month_2` = '$m2', `month_3` = '$m3', `month_4` = '$m4', `month_5` = '$m5', `month_6` = '$m6', `month_7` = '$m7', `month_8` = '$m8', `month_9` = '$m9', `month_10` = '$m10', `month_11` = '$m11', `month_12` = '$m12', `price` = '$price' WHERE `sentra_cash`.`name` = '$name'");
    $database->insertTable("notification", "NULL, '$name', 'Halo $name, kamu telah ditambahkan secara manual oleh bendahara sEntra untuk pembayaran uang kas sEntra sebesar $amountss {n}{n}Regards,{n}Bendahara sEntra.', '2', '', '$querynotif', '0', UNIX_TIMESTAMP()");
    redirect('');
}
?>
<!-- Start Content-->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-4">Collected</h4>

                    <div class="widget-chart-1">

                        <div class="widget-detail-1 text-end">
                            <h2 class="fw-normal pt-2 mb-1">
                                <?php
                                $checkcashdb = $database->query("SELECT SUM(price) AS price FROM sentra_cash")->fetch(PDO::FETCH_ASSOC);
                                ?>
                                Rp <?= number_format($checkcashdb['price'], 0, ",", ".") ?>,-
                            </h2>
                            <p class="text-muted mb-1">Jumlah uang kas terkumpul</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-4">Request cash</h4>

                    <div class="widget-chart-1">

                        <div class="widget-detail-1 text-end">
                            <h2 class="fw-normal pt-2 mb-1">
                                <?= countDBrow('sentra_cash_request', 'status', 2) ?>
                            </h2>
                            <p class="text-muted mb-1">Waiting to be accepted or rejected</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatables" class="table table-bordered dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>No Invoice</th>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Via</th>
                                <th>Bukti</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $checkdbcash = $database->query("SELECT * FROM sentra_cash_request WHERE `status`='2' ORDER BY id DESC");
                            foreach ($checkdbcash as $cash) {
                                $id = $cash['id'];
                                $no_invoice = $cash['no_invoice'];
                                $name = $cash['name'];
                                $total = $cash['cash'];
                                $via = $cash['transferto'];
                                $bukti = $cash['bukti'];
                                $status = $cash['status'];
                                $datetime = date('d F Y H:i:s', $cash['timestamp']);
                                if ($status == 1) {
                                    $status = '<span class="badge bg-success">Accepted</span>';
                                } else if ($status == 2) {
                                    $status = '<span class="badge bg-warning">Waiting</span>';
                                } else if ($status == 3) {
                                    $status = '<span class="badge bg-danger">Canceled</span>';
                                } else if ($status == 4) {
                                    $status = '<span class="badge bg-primary">Rejected</span>';
                                }
                            ?>
                                <tr>
                                    <td>#<?= $no_invoice ?></td>
                                    <td><?= $name ?></td>
                                    <td>Rp <?= number_format($total, 0, ",", ".") ?>,-</td>
                                    <td><?= $via ?></td>
                                    <td><a href="<?= $bukti ?>" target="_blank">View</a></td>
                                    <td><?= $status ?></td>
                                    <td><?= $datetime ?></td>
                                    <td class="text-center">
                                        <a href="cash?accept=<?= $id ?>" class="btn btn-success btn-sm"><i class="mdi mdi-check"></i></a>
                                        <a href="cash?reject=<?= $id ?>" class="btn btn-danger btn-sm"><i class="mdi mdi-close"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="title">History Kas</h4>
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#add-manual">Add Manual</button>
                    <table id="datatables2" class="table table-bordered dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>Nama</th>
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
                                <th>Mount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $checkcash = $database->query("SELECT * FROM `sentra_cash`");
                            foreach ($checkcash as $v) {
                            ?>
                                <tr>
                                    <td><?= $v['name'] ?></td>
                                    <td><?= $v['month_1'] == '1' ? '<span class="text-center" style="font-size:20px">✅</span>' : (date('m') == '11' ? '<span class="text-center" style="font-size:20px">❌</span>' : ''); ?></td>
                                    <td><?= $v['month_2'] == '1' ? '<span class="text-center" style="font-size:20px">✅</span>' : (date('m') == '12' ? '<span class="text-center" style="font-size:20px">❌</span>' : ''); ?></td>
                                    <td><?= $v['month_3'] == '1' ? '<span class="text-center" style="font-size:20px">✅</span>' : (date('m') == '1' ? '<span class="text-center" style="font-size:20px">❌</span>' : ''); ?></td>
                                    <td><?= $v['month_4'] == '1' ? '<span class="text-center" style="font-size:20px">✅</span>' : (date('m') == '2' ? '<span class="text-center" style="font-size:20px">❌</span>' : ''); ?></td>
                                    <td><?= $v['month_5'] == '1' ? '<span class="text-center" style="font-size:20px">✅</span>' : (date('m') == '3' ? '<span class="text-center" style="font-size:20px">❌</span>' : ''); ?></td>
                                    <td><?= $v['month_6'] == '1' ? '<span class="text-center" style="font-size:20px">✅</span>' : (date('m') == '4' ? '<span class="text-center" style="font-size:20px">❌</span>' : ''); ?></td>
                                    <td><?= $v['month_7'] == '1' ? '<span class="text-center" style="font-size:20px">✅</span>' : (date('m') == '5' ? '<span class="text-center" style="font-size:20px">❌</span>' : ''); ?></td>
                                    <td><?= $v['month_8'] == '1' ? '<span class="text-center" style="font-size:20px">✅</span>' : (date('m') == '6' ? '<span class="text-center" style="font-size:20px">❌</span>' : ''); ?></td>
                                    <td><?= $v['month_9'] == '1' ? '<span class="text-center" style="font-size:20px">✅</span>' : (date('m') == '7' ? '<span class="text-center" style="font-size:20px">❌</span>' : ''); ?></td>
                                    <td><?= $v['month_10'] == '1' ? '<span class="text-center" style="font-size:20px">✅</span>' : (date('m') == '8' ? '<span class="text-center" style="font-size:20px">❌</span>' : ''); ?></td>
                                    <td><?= $v['month_11'] == '1' ? '<span class="text-center" style="font-size:20px">✅</span>' : (date('m') == '9' ? '<span class="text-center" style="font-size:20px">❌</span>' : ''); ?></td>
                                    <td><?= $v['month_12'] == '1' ? '<span class="text-center" style="font-size:20px">✅</span>' : (date('m') == '10' ? '<span class="text-center" style="font-size:20px">❌</span>' : ''); ?></td>
                                    <td>Rp<?= number_format($v['price'], 0, ",", ".") ?>,-</td>
                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="add-manual" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="text-center mt-2 mb-4">
                    <div class="auth-logo">
                        <div class="logo logo-light">
                            <span class="logo-lg">
                                <img src="../assets/images/spanel-logo.png" alt="" height="22">
                            </span>
                        </div>

                        <div class="logo logo-dark">
                            <span class="logo-lg">
                                <img src="../assets/images/spanel-logo.png" alt="" height="22">
                            </span>
                        </div>
                    </div>
                    <p>Add Manual Cash</p>
                </div>

                <form class="px-3" method="post" id="contact-form">

                    <div class="mb-3">
                        <label for="select2-form" class="form-label">Name</label>
                        <select name="name" class="form-control" required id="select2-form">
                            <option value='' hidden selected>Select Name</option>
                            <?php
                            $mmbrr = mysqli_query($mysqli, "SELECT * FROM `sentra_member` ORDER BY `name` ASC");
                            while ($v = mysqli_fetch_assoc($mmbrr)) {
                                echo "<option value='" . $v['name'] . "'>" . $v['name'] . " || " . $v['npm'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="cash" class="form-label">Cash <span style="font-size:9px;color:brown">dalam rupiah</span></label>
                        <input class="form-control" type="number" name="cash" required="" id="cash" placeholder="5000">
                    </div>

                    <div class="mb-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="addmanual" name="addmanual" required>
                            <label class="form-check-label" for="addmanual">Saya setuju input sudah benar</label>
                        </div>
                    </div>

                    <div class="mb-3 text-center">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>

                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
    page = 'data-cash';
    document.getElementById("title").innerHTML = "Data Kas sEntra | Spanel - Panel BOT Automate sEntra UTama ";
</script>
<?php
require '../middleware/footer.php';
