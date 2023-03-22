<?php
require '../middleware/header.output.php';
?>
<div class="account-pages mt-2 mb-3">
    <div class="container">
        <div class="row justify-content-center">
            <?php
            if (get('agenda-rapat')) {
                $egnda = get('agenda-rapat');
                $fagen = mysqli_query($mysqli, "SELECT * FROM sentra_agenda WHERE query = '$egnda'");

                if (mysqli_num_rows($fagen) > 0) {
                    while ($v = mysqli_fetch_array($fagen)) {

                        if ($v['query'] == $egnda) {
                            $dates = convertDate(date_create($v['date']));

                            // $presenc = mysqli_query($mysqli, "SELECT * FROM sentra_presence WHERE agenda = '$egnda'");
                            // if (mysqli_num_rows($presenc) == 0) {
                            // }
                            if (strtotime($v['date']) == strtotime(date("Y/m/d"))) {
            ?>
                                <!-- Formulir -->
                                <div class="col-md-8 col-lg-6 col-xl-6">
                                    <div class="text-center mb-2">
                                        <a href="../">
                                            <img src="../assets/images/logo_sentra.png" alt="" height="100" class="mx-auto">
                                        </a>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="text-black text-center">Formulir Presensi Rapat (Online)</h3>
                                            <p class="text-center"><?= $v['keterangan'] ?> pada hari <?= $dates ?></p>
                                        </div>
                                        <div class="card-body p-4">
                                            <div class="mb-3">
                                                <label for="npmm" class="form-label">NPM</label>
                                                <input class="form-control" type="text" name="npmm" id="npmm" required="" placeholder="0222222221">
                                            </div>
                                            <div class="mb-3 text-center">
                                                <button class="btn btn-primary" onclick="presensiSubm()" type="submit">Submit</button>
                                            </div>
                                        </div> <!-- end card-body -->
                                    </div>
                                    <!-- end card -->
                                </div>
                                <script>
                                    function presensiSubm() {
                                        var npmm = document.getElementById('npmm').value;
                                        $.ajax({
                                            url: "../upload",
                                            type: "POST",
                                            "data": {
                                                "type": "presence",
                                                "npm": npmm,
                                                "agenda": `<?= get('agenda-rapat') ?>`
                                            },
                                            "timeout": 0,
                                            "headers": {
                                                "Content-Type": "application/x-www-form-urlencoded"
                                            },
                                            success: function(res) {
                                                console.log(res);
                                                Swal.fire({
                                                    icon: 'success',
                                                    title: res.result.name + " Berhasil absen",
                                                    text: 'Absen di waktu ' + res.result.time + ' dengan agenda ' + res.result.agenda,
                                                    showConfirmButton: true,
                                                    didOpen: function() {
                                                        var zippi = new Audio('../assets/beep.mp3')
                                                        zippi.play();
                                                    }
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        location.reload();
                                                    }
                                                })
                                            },
                                            error: function(err) {
                                                Swal.fire({
                                                    icon: 'error',
                                                    title: 'Oops...',
                                                    text: 'Something went wrong! ' + err.responseJSON.message,
                                                    didOpen: function() {
                                                        var zippi = new Audio('../assets/error.mp3')
                                                        zippi.play();
                                                    }
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        location.reload();
                                                    }
                                                })
                                                console.log(err.responseJSON);
                                            },
                                        });

                                    }
                                </script>

                            <?php
                            } else {
                            ?>
                                <div class="col-md-8 col-lg-6 col-xl-6">
                                    <div class="text-center mb-2">
                                        <a href="../">
                                            <img src="../assets/images/logo_sentra.png" alt="" height="100" class="mx-auto">
                                        </a>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="text-black text-center">Formulir Presensi Rapat (Online)</h3>
                                            <p class="text-center"><?= $v['keterangan'] ?> pada hari <?= $dates ?></p>
                                        </div>
                                        <div class="card-body p-4">
                                            <div class="mb-3">
                                                <label for="npmm" class="form-label">NPM</label>
                                                <input class="form-control" type="text" name="npmm" id="npmm" required="" readonly placeholder="0222222221">
                                            </div>
                                            <div class="mb-3 text-center">
                                                <button class="btn btn-primary" onclick="presensiSubm()" type="submit">Submit</button>
                                            </div>
                                        </div> <!-- end card-body -->
                                    </div>
                                    <!-- end card -->
                                </div>
                                <script>
                                    function presensiSubm() {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Oops...',
                                            text: 'Agenda rapat sudah berakhir',
                                            didOpen: function() {
                                                var zippi = new Audio('../assets/error.mp3')
                                                zippi.play();
                                            }
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                location.reload();
                                            }
                                        })
                                    }
                                </script>
            <?php
                            }
                        }
                    }
                } else {
                    echo '<meta http-equiv="refresh" content="0; url=../404.shtml">';
                }
            } else if (get('q') == 'formulir-daftar-ulang') {
            } else {
                echo '<meta http-equiv="refresh" content="0; url=../404.shtml">';
            }
            ?>
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->
<!-- Vendor js -->
<script src="../assets/js/vendor.min.js"></script>

<!-- App js -->
<script src="../assets/js/app.min.js"></script>

</body>

</html>