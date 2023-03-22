<?php
require '../middleware/header.php';
$name = getSingleValDB('users', 'username', $user, 'name');
$checkcash = $database->query("SELECT * FROM `sentra_cash` WHERE `name` = '$name'");

if (getSingleValDB('sentra_cash', 'name', $name, 'price')  - cekKasku2($name) < 0) {
    $pricecash = 0;
} else {
    $pricecash =  getSingleValDB('sentra_cash', 'name', $name, 'price')  - cekKasku2($name);
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
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">Informasi</div>
                <div class="card-body">
                    <h4 class="mb-3">Pembayaran Kas</h4>
                    <div class="mb-4">
                        <p> Silahkan untuk melakukan pembayaran ke :</p>
                        <div class="tfvia"></div>
                        <p class="mt-2 mb-2"> Harap melakukan pembayaran sesuai dengan total bayar yang telah ditentukan! anda bisa merubah total bayar!</p>
                    </div>
                    <div class="mt-5 text-danger">
                        <i> Setelah Melakukan Pembayaran Silahkan Lakukan Screenshot dan Segera Upload Bukti Pembayaran Anda! </i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <form method="post" id="data" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">Pembayaran Uang Kas sEntra</div>
                    <div class="card-body">
                        <div class="mb-3"><strong>Total Bayar : Rp </strong>
                            <input type="text" id="totalbayar" required name="totalbayar" value="<?= cekKasku($name) ?>"> ,-
                            <input type="text" id="byname" hidden name="byname" value="<?= $name ?>">
                        </div>
                        <select name="transfer" class="form-control" id="transfer" required>
                            <option value="" hidden selected>Pilih Metode Transfer</option>
                            <option value="DANA" onclick="dana()">DANA</option>
                            <option value="ShopeePay" onclick="shopeepay()">ShopeePay</option>
                            <option value="Gopay" onclick="gopay()">Gopay</option>
                            <option value="BANK BCA" onclick="bca()">BANK BCA</option>
                        </select>
                        <div class="mt-2"><a href="#" onclick="checkrek()" class="btn btn-primary">Check Rekening</a></div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Bukti Pembayaran</div>
                    <div class="card-body">
                        <label for="bukti" class="mb-2">Upload Bukti Pembayaran</label>
                        <input type="file" id="bukti" name="bukti" accept="image/*" required class="form-control">
                        <div class="mt-3">
                            <button class="btn btn-primary w-100 text-center d-none" id="loader" type="button">
                                <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                                Loading...
                            </button>
                            <a href="#" onclick="bayarSekarang()" id="bayar" class="btn btn-primary w-100 rounded"> Bayar Sekarang</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function dana() {
        $('.tfvia').html('<table><tr><td>E-Wallet</td><td>:</td><td>DANA</td></tr><tr><td>Atas Nama </td><td>:</td><td> Ghaida ZF</td></tr><tr><td>Account Number</td><td>:</td><td> 085872501620</td></tr></table>');
    }

    function shopeepay() {
        $('.tfvia').html('<table><tr><td>E-Wallet</td><td>:</td><td>Shopee Pay</td></tr><tr><td>Atas Nama </td><td>:</td><td> Corry Aina</td></tr><tr><td>Account Number</td><td>:</td><td> 089655668826</td></tr></table>');
    }

    function bca() {
        $('.tfvia').html('<table><tr><td>Bank </td><td>:</td><td> BCA</td></tr><tr><td>Atas Nama </td><td>:</td><td> Ghaida ZF</td></tr><tr><td>Nomor Rekening </td><td>:</td><td> 0860922339</td></tr></table>');
    }

    function gopay() {
        $('.tfvia').html('<table><tr><td>E-Wallet</td><td>:</td><td>GoPay</td></tr><tr><td>Atas Nama </td><td>:</td><td> Corry Aina</td></tr><tr><td>Account Number</td><td>:</td><td> 089655668826</td></tr></table>');
    }

    function checkrek() {
        var tf = $('#transfer').val();
        if (tf == 'ShopeePay') {
            navigator.clipboard.writeText('089655668826');

            Swal.fire({
                title: 'Via Shopeepay',
                text: "089655668826 a/n Corry Aina",
                icon: 'success',

            })
        } else if (tf == 'Gopay') {
            navigator.clipboard.writeText('089655668826');
            Swal.fire({
                title: 'Via GoPay',
                text: "089655668826 a/n Corry Aina",
                icon: 'success',

            })
        } else if (tf == 'BANK BCA') {
            navigator.clipboard.writeText('0860922339');
            Swal.fire({
                title: 'Via BANK BCA',
                text: "0860922339 a/n Ghaida ZF",
                icon: 'success',

            })
        } else if (tf == 'DANA') {
            navigator.clipboard.writeText('085872501620');
            Swal.fire({
                title: 'Via DANA',
                text: "085872501620 a/n Ghaida ZF",
                icon: 'success',

            })
        } else {
            Swal.fire({
                title: 'Error!',
                text: "Not Exist Rekening",
                icon: 'error',

            })
        }
    }


    function bayarSekarang() {
        $('#bayar').addClass('d-none');
        $('#loader').removeClass('d-none');
        var total = $('#totalbayar').val();
        var metode = $('#transfer').val();
        var bukti = $('#bukti').val();
        var name = $('#byname').val();
        var form_data = new FormData();
        if (total == '' || metode == '') {
            alert('Silahkan Isi Total Bayar dan Metode Transfer');
            $('#bayar').removeClass('d-none');
            $('#loader').addClass('d-none');
        } else if (bukti == '') {
            alert('Silahkan Upload Bukti Pembayaran');
            $('#bayar').removeClass('d-none');
            $('#loader').addClass('d-none');
        } else if (total < '5000') {
            alert('Minimal melakukan pembayaran sebesar Rp5000,-');
            $('#bayar').removeClass('d-none');
            $('#loader').addClass('d-none');
        } else {
            form_data.append('total', total);
            form_data.append('metode', metode);
            form_data.append('bukti', $('#bukti')[0].files[0], bukti);
            form_data.append('name', name);
            form_data.append('type', 'transaksi-kas-sentra');
            setTimeout(function() {
                $.ajax({
                    url: '../core/App.upload.php',
                    method: 'POST',
                    mimeType: "multipart/form-data",
                    data: form_data,
                    timeout: 0,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        $('#bayar').removeClass('d-none');
                        $('#loader').addClass('d-none');
                        Swal.fire({
                            title: 'Success',
                            text: "Success Add Request",
                            icon: 'success',
                            confirmButtonColor: '#3085d6',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = 'invoice?query=' + JSON.parse(data).result.query + '&type=view';
                            }
                        })
                        console.log(JSON.parse(data).result.query);
                    }
                });
            }, 3000);
        }
    }

    page = 'add-cash';
    document.getElementById("title").innerHTML = "Add Pay Cash | Spanel - Panel BOT Automate sEntra UTama ";
</script>
<?php
require '../middleware/footer.php';
