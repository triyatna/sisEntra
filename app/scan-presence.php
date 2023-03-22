<?php
require '../middleware/header.php';
if ($rolee == '1') {
    redirect('../member'); // Member
}
if (get('agenda')) {
    $agenda = get('agenda');
    $check = $database->query("SELECT * FROM `sentra_agenda` WHERE `query` = '$agenda'");
    if ($check->rowCount() > 0) {
?>
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="reader" width="50px"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            page = 'scan';
            document.getElementById("title").innerHTML = "Presence Scan | Spanel - Panel BOT Automate sEntra UTama ";

            function onScanSuccess(decodedText, decodedResult) {
                $.ajax({
                    url: "../core/App.upload",
                    type: "POST",
                    "data": {
                        "type": "presence",
                        "npm": `${decodedText}`,
                        "agenda": `<?= get('agenda') ?>`
                    },
                    "timeout": 0,
                    "headers": {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    success: function(res) {
                        console.log(res);
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: res.result.name + " Berhasil absen",
                            text: 'Absen di waktu ' + res.result.time + ' dengan agenda ' + res.result.agenda,
                            showConfirmButton: false,
                            timer: 3000,
                            didOpen: function() {
                                var zippi = new Audio('../assets/beep.mp3')
                                zippi.play();
                            }
                        })
                    },
                    error: function(err) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops... ' + err.message,
                            text: 'Something went wrong!',
                            didOpen: function() {
                                var zippi = new Audio('../assets/error.mp3')
                                zippi.play();
                            }
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                        console.log(err);
                    },
                });
            }


            let html5QrcodeScanner = new Html5QrcodeScanner(
                "reader", {
                    fps: 10,
                    qrbox: {
                        width: 600,
                        height: 600
                    }
                },
                /* verbose= */
                false);
            html5QrcodeScanner.render(onScanSuccess);
        </script>
    <?php
    } else {
        redirect('scan');
    }
} else {
    $check = $database->query("SELECT * FROM `sentra_agenda`");
    if (post('agenda')) {
        $query = post('agenda') . "-sEntra-" . md5(rand());
        $ag = post('agenda');
        $date = post('date');
        $ket = post('catatan');
        $status = post('sasaran');
        $database->query("INSERT INTO `sentra_agenda` VALUES (NULL, '$ag','$query, '$ket', '$status', '$date')");
        swalfire('success', 'Successfully Added Agenda ' . $ag, 'scan-presence?agenda=' . urlencode($agenda));
    }
    ?>
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title"> Create Agenda </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="post">
                                    <div class="mb-3">
                                        <label for="agenda" class="form-label">Nama Agenda</label>
                                        <input class="form-control" type="text" name="agenda" id="agenda" required="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="catatan" class="form-label">Catatan</label>
                                        <textarea name="catatan" class="form-control" id="catatan" cols="30" rows="10"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="catatan" class="form-label">Sasaran</label>
                                        <select name="sasaran" id="sasaran" class="form-control">
                                            <option value="" required hidden>Pilih Sasaran Agenda</option>
                                            <option value="0">Global</option>
                                            <option value="1">Divisi</option>
                                            <option value="2">Staff Inti</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="date" class="form-label">Jadwal</label>
                                        <input type="date" class="form-control" name="date" id="date">
                                    </div>
                                    <div class="mb-3 text-center">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-5">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">Agenda sEntra</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="agendas" class="form-label">Agenda</label>
                                    <select name="agendas" class="form-control" id="agendas">
                                        <option value="" hidden selected>Select Agenda</option>
                                        <?php
                                        foreach ($check->fetchAll(PDO::FETCH_ASSOC) as $key => $as) {
                                        ?>
                                            <option value="<?= urlencode($as['query']) ?>" id="agendanames"><?= $as['agenda_name'] ?> ~ <?= date("d-m-Y", strtotime($as['date'])) ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3 mt-3 text-center">
                                    <div class="btn btn-primary" onclick="redirect()">Submit</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function redirect() {
            var da = document.getElementById("agendas").value;
            if (da == "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Select Agenda!',
                })
            } else {
                window.location.href = "scan-presence?agenda=" + da;
            }
        }
        page = 'scan';
        document.getElementById("title").innerHTML = "Agenda | Spanel - Panel BOT Automate sEntra UTama ";
    </script>
<?php
}
require '../middleware/footer.php';
