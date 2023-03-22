<?php
require '../template-app/header.php';
$qname = $database->query("SELECT * FROM sentra_member");
if (post('phone1')) {
    if (post('phone1') == 'bc') {
        foreach ($qname as $row) {
            $name = $row['name'];
            $npm = $row['npm'];
            $email = $row['email'];
            $phone = $row['phone'];
            $job = $row['job'];
            $position = $row['position'];
            $faculty = $row['faculty'];
            $angkatan = $row['angkatan'];
            $prodi = $row['prodi'];
            $code = ["%name%", "%npm%", "%email%", "%phone%", "%job%", "%position%", "%faculty%", "%years%", "%prodi%", "/\r?\n/g"];
            $arrcode   = [$name, $npm, $email, $phone, $job, $position, $faculty, $angkatan, $prodi, "{n}"];
            $msg = str_replace($code, $arrcode, post('text1'));

            $sentra->sendMessageText($phone, $msg);
        }
    } else if (post('phone1') == 'grupmarketing') {
        $code = ["%name%", "%npm%", "%email%", "%phone%", "%job%", "%position%", "%faculty%", "%years%", "%prodi%", "/\r?\n/g"];
        $arrcode   = ['Divisi Marketing', '', '', '120363028307908907@g.us', '', '', '', '', '', "{n}"];
        $msg = str_replace($code, $arrcode, post('text1'));
        $phone = '120363028307908907@g.us';
        $sentra->sendMessageText($phone, $msg);
    } else if (post('phone1') == 'grupinternasional') {
        $code = ["%name%", "%npm%", "%email%", "%phone%", "%job%", "%position%", "%faculty%", "%years%", "%prodi%", "/\r?\n/g"];
        $arrcode   = ['Divisi Berita Internasional', '', '', '120363026717060049@g.us', '', '', '', '', '', "{n}"];
        $msg = str_replace($code, $arrcode, post('text1'));
        $phone = '120363026717060049@g.us';
        $sentra->sendMessageText($phone, $msg);
    } else if (post('phone1') == 'grupnasional') {
        $code = ["%name%", "%npm%", "%email%", "%phone%", "%job%", "%position%", "%faculty%", "%years%", "%prodi%", "/\r?\n/g"];
        $arrcode   = ['Divisi Berita Nasional', '', '', 'phone', '', '', '', '', '', "{n}"];
        $msg = str_replace($code, $arrcode, post('text1'));
        $phone = '';
        $sentra->sendMessageText($phone, $msg);
    } else if (post('phone1') == 'grupkampus') {
        $code = ["%name%", "%npm%", "%email%", "%phone%", "%job%", "%position%", "%faculty%", "%years%", "%prodi%", "/\r?\n/g"];
        $arrcode   = ['Divisi Berita Kampus', '', '', '120363043988806189@g.us', '', '', '', '', '', "{n}"];
        $msg = str_replace($code, $arrcode, post('text1'));
        $phone = '120363043988806189@g.us';
        $sentra->sendMessageText($phone, $msg);
    } else if (post('phone1') == 'grupevergreen') {
        $code = ["%name%", "%npm%", "%email%", "%phone%", "%job%", "%position%", "%faculty%", "%years%", "%prodi%", "/\r?\n/g"];
        $arrcode   = ['Divisi Berita Evergreen', '', '', '120363025554899538@g.us', '', '', '', '', '', "{n}"];
        $msg = str_replace($code, $arrcode, post('text1'));
        $phone = '120363025554899538@g.us';
        $sentra->sendMessageText($phone, $msg);
    } else if (post('phone1') == 'grupglobal') {
        $code = ["%name%", "%npm%", "%email%", "%phone%", "%job%", "%position%", "%faculty%", "%years%", "%prodi%", "/\r?\n/g"];
        $arrcode   = ['sEntrative', '', '', '120363025789503036@g.us', '', '', '', '', '', "{n}"];
        $msg = str_replace($code, $arrcode, post('text1'));
        $phone = '120363025789503036@g.us';
        $sentra->sendMessageText($phone, $msg);
    } else if (post('phone1') == 'bcstaff') {
        foreach ($qname as $row) {
            if ($row['position'] == 'Ketua' || $row['position'] == 'Wakil Ketua' || $row['position'] == 'Sekretaris' || $row['position'] == 'Bendahara' || $row['position'] == 'Pimpinan') {
                $name = $row['name'];
                $npm = $row['npm'];
                $email = $row['email'];
                $phone = $row['phone'];
                $job = $row['job'];
                $position = $row['position'];
                $faculty = $row['faculty'];
                $angkatan = $row['angkatan'];
                $prodi = $row['prodi'];
                $code = ["%name%", "%npm%", "%email%", "%phone%", "%job%", "%position%", "%faculty%", "%years%", "%prodi%", "/\r?\n/g"];
                $arrcode   = [$name, $npm, $email, $phone, $job, $position, $faculty, $angkatan, $prodi, "{n}"];
                $msg = str_replace($code, $arrcode, post('text1'));

                $sentra->sendMessageText($phone, $msg);
            }
        }
    } else if (post('phone1') == 'bcmember') {
        foreach ($qname as $row) {
            if ($row['position'] != 'Ketua' && $row['position'] !=  'Wakil Ketua' && $row['position'] !=  'Sekretaris' && $row['position'] !=  'Bendahara' && $row['position'] !=  'Pimpinan') {
                $name = $row['name'];
                $npm = $row['npm'];
                $email = $row['email'];
                $phone = $row['phone'];
                $job = $row['job'];
                $position = $row['position'];
                $faculty = $row['faculty'];
                $angkatan = $row['angkatan'];
                $prodi = $row['prodi'];
                $code = ["%name%", "%npm%", "%email%", "%phone%", "%job%", "%position%", "%faculty%", "%years%", "%prodi%", "/\r?\n/g"];
                $arrcode   = [$name, $npm, $email, $phone, $job, $position, $faculty, $angkatan, $prodi, "{n}"];
                $msg = str_replace($code, $arrcode, post('text1'));

                $sentra->sendMessageText($phone, $msg);
            }
        }
    } else {
        $qname = $database->query("SELECT * FROM sentra_member WHERE phone='" . post('phone1') . "'");
        foreach ($qname as $row) {
            $name = $row['name'];
            $npm = $row['npm'];
            $email = $row['email'];
            $phone = $row['phone'];
            $job = $row['job'];
            $position = $row['position'];
            $faculty = $row['faculty'];
            $angkatan = $row['angkatan'];
            $prodi = $row['prodi'];
            $code = ["%name%", "%npm%", "%email%", "%phone%", "%job%", "%position%", "%faculty%", "%years%", "%prodi%", "/\r?\n/g"];
            $arrcode   = [$name, $npm, $email, $phone, $job, $position, $faculty, $angkatan, $prodi, "{n}"];
            $msg = str_replace($code, $arrcode, post('text1'));
            $phone = post('phone1');
            $sentra->sendMessageText($phone, $msg);
        }
    }
}
?>
<div id="loadingsend" class="d-none">
    <img src="<?= $domain ?>assets/images/logo_sentra.png" class="tuna" alt="">
    <div class="loading loading05">
        <span>Send Message</span>
    </div>
</div>
<!-- Start Content-->
<div class="container-fluid">
    <div class="row" id="loadingsendarea">
        <div class="col-xl-9 col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4 mt-1">Send Message sEntra Member</h4>

                    <div class="form-group mb-3">
                        <label for="phone1">Phone</label>
                        <select name="phone1" id="phone1" class="form-control" id="select2-form" required>
                            <option value="" selected hidden>Select Phone Number</option>
                            <option value="bcmember"><b>~Member Only!</b></option>
                            <option value="bcstaff"><b>~Staff & Admin Only!</b></option>
                            <option value="bc"><b>~Mode Broadcast!</b></option>
                            <option value="grupglobal"><b>~Group Global</b></option>
                            <option value="grupmarketing"><b>~Group Divisi Marketing</b></option>
                            <option value="grupinternasional"><b>~Group Divisi B. Internasional</b></option>
                            <option value="grupnasional"><b>~Group Divisi B. Nasional</b></option>
                            <option value="grupkampus"><b>~Group Divisi B. Kampus</b></option>
                            <option value="grupevergreen"><b>~Group Divisi B. Evergreen</b></option>
                            <?php foreach ($qname as $row) { ?>
                                <option value="<?= $row['phone']; ?>"><?= $row['name']; ?> || <?= $row['phone']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="text1">Message Text</label>
                        <textarea name="text1" id="text1" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                    <div class="notif1" id="notif1"></div>
                    <div class="mb-3 mt-3 text-end">
                        <button class="btn btn-primary" type="submit" onclick="process()">Submit</button>
                    </div>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
        <div class="col-xl-3 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-1 mt-1">Shortcut Message</h4>
                    <div class="card-body bg-dark text-white">
                        <table class="table table-dark table-sm">
                            <tbody>
                                <tr>
                                    <td>%name%</td>
                                    <td>Nama</td>
                                </tr>
                                <tr>
                                    <td>%npm%</td>
                                    <td>NPM</td>
                                </tr>
                                <tr>
                                    <td>%email%</td>
                                    <td>Email</td>
                                </tr>
                                <tr>
                                    <td>%phone%</td>
                                    <td>No Whatsapp</td>
                                </tr>
                                <tr>
                                    <td>%job%</td>
                                    <td>Divisi</td>
                                </tr>
                                <tr>
                                    <td>%position% </td>
                                    <td>Posisi</td>
                                </tr>
                                <tr>
                                    <td>%faculty%</td>
                                    <td>Fakultas</td>
                                </tr>
                                <tr>
                                    <td>{n}</td>
                                    <td>Garis Baru</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row -->
</div>
<!-- End Content -->
<script>
    function process() {
        text = $('#text1').val().replace(/\r?\n/g, '{n}');
        phone = $('#phone1').val();
        if (text == '' || phone == '') {
            document.getElementById('notif1').innerHTML = '<div class="alert alert-danger" role="alert">Please fill all the fields!</div>';
        } else {
            $('#loadingsend').removeClass('d-none');
            $('#loadingsendarea').addClass('d-none bg-bluur');
            $.ajax({
                url: '<?= $domain; ?>app/whatsapp/broadcast',
                type: 'POST',
                data: {
                    phone1: phone,
                    text1: text,
                },
                success: function(data) {
                    $('#loadingsend').addClass('d-none');
                    $('#loadingsendarea').removeClass('d-none bg-bluur');
                    Swal.fire({
                        icon: 'success',
                        title: 'Done!',
                        text: 'Send Message Success!',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // location.reload();
                        }
                    })

                }
            });
        }

    }
    page = 'broadcast-wa';
    document.getElementById("title").innerHTML = "{WA}Broadcast Messages | Spanel - Panel BOT Automate sEntra UTama ";
</script>
<?php
require '../template-app/footer.php';
?>