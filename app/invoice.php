<?php
require '../middleware/header.php';
?>
<!-- Start Content-->
<div class="container-fluid">
    <div class="row">
        <?php
        if (get('query')) {
            $query = get('query');
            $check = $database->query("SELECT * FROM `sentra_cash_request` WHERE `query`='$query'");
            if ($check->rowCount() > 0) {
                if (get('type') == 'view') {
                    $query =  $check->fetch(PDO::FETCH_ASSOC);
                    $id = $query['id'];
                    $invoice = $query['no_invoice'];
                    $cash = $query['cash'];
                    $metod = $query['transferto'];
                    $time = $query['timestamp'];
                    if ($query['status'] == '1') {
                        $status = '<span class="badge bg-success">Success</span>';
                    } else if ($query['status'] == '2') {
                        $status = '<span class="badge bg-warning">Pending</span>';
                    } else {
                        $status = '<span class="badge bg-danger">Cancel</span>';
                    }
                    // $checkcash = $database->query("SELECT * FROM `sentra_cash` WHERE `name` = '$name'");
                    // if ($checkcash->rowCount() > 0) {
                    //     $checkcash = $checkcash->fetch(PDO::FETCH_ASSOC);
                    //     $pricecash = $checkcash['price'];
                    //     $mincash = $pricecash - $price;
                    //     if ($mincash < 0) {
                    //         $mincash = 0;
                    //     }
                    // } else {
                    //     $mincash = 0;
                    // }
        ?>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="panel-body">
                                    <div class="clearfix">
                                        <div class="float-start">
                                            <img src="../assets/images/spanel-logo.png" alt="spanel" width="200" class="mx-auto mt-2">
                                        </div>
                                        <div class="float-end">
                                            <h4>INVOICE : <br>
                                                <strong>#<?= $invoice ?></strong>
                                            </h4>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="float-start mt-3">
                                                <address>
                                                    <strong>PKM sEntra UTama</strong><br>
                                                    Jl. Cikutra 204A<br>
                                                    Bandung, Indonesia 40124<br>
                                                    <abbr title="Phone">WhatsApp:</abbr> +62 821-2323-2688
                                                </address>
                                            </div>
                                            <div class="float-end mt-3">
                                                <p><strong>Order Date: </strong> <?= date("d M Y", $time) ?></p>
                                                <p class="m-t-10"><strong>Order Status: </strong> <?= $status ?></p>
                                                <p class="m-t-10"><strong>Order ID: </strong> <?= $id ?></p>
                                            </div>
                                        </div><!-- end col -->
                                    </div>
                                    <!-- end row -->

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table mt-4">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Item</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Pembayaran Uang Kas sEntra</td>
                                                            <td>Rp <?= number_format($cash, 0, ",", ".") ?>,-</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6 col-6">
                                            <div class="clearfix mt-4">
                                                <h5 class="small text-dark fw-normal">INFORMATION</h5>

                                                <small>
                                                    Hubungi segera WhatsApp Official sEntra atau bendahara sEntra untuk mempercepat proses pengecekan.
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-6 offset-xl-3">
                                            <hr>
                                            <h3 class="text-end">Rp <?= number_format($cash, 0, ",", ".") ?>,-</h3>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="d-print-none">
                                        <div class="float-end">
                                            <a href="pay-cash" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-keyboard-backspace"></i> Back</a>
                                            <a href="javascript:window.print()" class="btn btn-dark waves-effect waves-light"><i class="fa fa-print"></i></a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        page = 'invoice';
                        document.getElementById("title").innerHTML = "Invoice #<?= $invoice ?> | Spanel - Panel BOT Automate sEntra UTama ";
                    </script>
        <?php
                } else if (get('type') == 'delete') {
                    $query =  $check->fetch(PDO::FETCH_ASSOC);
                    $id = $query['id'];
                    $status = $query['status'];
                    if ($status == '3') {
                        $database->query("DELETE FROM sentra_cash_request WHERE `sentra_cash_request`.`id` = '$id'");
                    }
                    redirect('pay-cash');
                } else {
                    redirect('pay-cash');
                }
            } else {
                redirect('pay-cash');
            }
        } else {
            redirect('pay-cash');
        }
        ?>
    </div>
</div>

<?php
require '../middleware/footer.php';
