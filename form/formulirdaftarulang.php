<?php
require '../middleware/header.output.php';

if (post('addMember')) {
    $name = ucwords(strtolower(post('name')));
    $npm = post('npm');
    $email = post('email');
    $phone = post('phone');
    $job = post('job');
    $position = post('position');
    $angkatan = post('angkatan');
    $fakultas = post('fakultas');
    $prodi = ucwords(post('prodi'));
    $avatar = post('avatar');
    $password = uniqid();
    $querynotif = generateRandomString(20);
    $encrypt = password_hash($password, PASSWORD_BCRYPT);
    $username = slugConvert(post('username'), 'nospace');
    $date = date('Y-m-d H:i:s');
    $role = $position === "Pimpinan" || $position === "Sekretaris" || $position === "Bendahara" ? "3" : ($position === "Ketua" || $position === "Wakil Ketua" ? "2" : "1");
    $pdos = $database->query("SELECT * FROM `sentra_member` WHERE `npm`='$npm' OR `name`='$name'");
    $pdos1 = $database->query("SELECT * FROM `sentra_member` WHERE `phone`='$phone' OR `email`='$email'");
    $pdos2 = $database->query("SELECT * FROM `users` WHERE `username`='$username'");
    if ($pdos->rowCount() == 0) {
        if ($pdos1->rowCount() == 0) {
            if ($pdos2->rowCount() == 0) {
                $database->insertTable("sentra_member", "NULL, '$name', '$npm', '$email', '$phone', '$job', '$position', '$fakultas', '$angkatan', '$prodi', ''");
                $database->insertTable("sentra_cash", "NULL, '$name', '$npm', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '$date'");
                $database->insertTable("users", "NULL, '$name', '$username', '$encrypt', CURRENT_TIMESTAMP(), '$avatar', '$role', 'true', '', ''");
                $database->insertTable("notification", "NULL, '$name', 'Welcome to sPanel - Panelnya anak PKM sEntra Universitas Widyatama', 'Halo $name,{n}Selamat kamu telah terdaftar di sPanel Panelnya anak PKM sEntra Universitas Widyatama. Kami harap dengan adanya sPanel ini dapat mempermudah mengakses segala informasi internal.{n}Terimakasih! dan selamat bergabung.{n}{n}Regards,{n}Developer.', '1', '', '$querynotif', '0', UNIX_TIMESTAMP()");
                $sentra->sendMessageText($phone, '==INFORMASI=={n}Halo ' . $name . ',{n}Daftar ulang anggota telah berhasil! data kamu sudah masuk ke database kami sebagai anggota sEntra.{n}Berikut kami informasikan data untuk akses akun kamu di sEntra Panel.{n}username : ' . $username . '{n}password : ' . $password . '{n}{n}silahkan untuk login di ' . $domain . '{n}login dan harap untuk segera ganti password kamu setelah melakukan login ke akun kamu, untuk menjaga keamanan :){n}{n}terimakasih,{n}salam mahasiswa!.');
                swalfire('success', 'Successfully Added data! by name ' . $name . '', DOMAIN_APP);
            } else {
                swalfire('error', 'Username already used!', 'formulirdaftarulang');
            }
        } else {
            swalfire('error', 'Phone or Email already used!', 'formulirdaftarulang');
        }
    } else {
        swalfire('error', 'Failed to add data! by name ' . $name . '', 'formulirdaftarulang');
    }
}

?>
<div class="account-pages mt-2 mb-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-6">
                <div class="text-center mb-2">
                    <a href="../">
                        <img src="../assets/images/logo_sentra.png" alt="" height="100" class="mx-auto">
                    </a>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-4 text-black text-center">Formulir Daftar Ulang Anggota</h3>
                        <hr>
                        <p class="text-center">Bagi seluruh anggota sEntra periode 2022/2023 silahkan untuk mendaftar, gunakanlah data yang valid dan dapat dipertanggungjawabkan!</p>
                    </div>
                    <div class="card-body p-4">

                        <form class="px-3" method="post" id="contact-form">
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input class="form-control" type="text" name="name" id="name" required="" placeholder="Jhon Wick Zenaty">
                            </div>

                            <div class="mb-3">
                                <label for="npm" class="form-label">NPM (Univ. Widyatama)</label>
                                <input class="form-control" type="number" name="npm" id="npm" required="" placeholder="0220101059">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input class="form-control" type="email" name="email" required="" id="email" placeholder="jhonwick@gmail.com">
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input class="form-control" type="number" name="phone" required="" id="phone" placeholder="12345292018">
                            </div>

                            <div class="mb-3">
                                <label for="job" class="form-label">Job</label>
                                <select name="job" class="form-select" required="" id="job">
                                    <option value="" hidden>Select your job</option>
                                    <option value="Pemimpin Umum">Pemimpin Umum</option>
                                    <option value="Pemimpin Redaksi">Pemimpin Redaksi</option>
                                    <option value="Sekretaris">Sekretaris</option>
                                    <option value="Bendahara">Bendahara</option>
                                    <option value="Marketing">Marketing</option>
                                    <option value="B. Internasional">B. Internasional</option>
                                    <option value="B. Nasional">B. Nasional</option>
                                    <option value="B. Kampus">B. Kampus</option>
                                    <option value="B. Evergreen">B. Evergreen</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="position" class="form-label">Position</label>
                                <select name="position" class="form-select" required="" id="position">
                                    <option value="" hidden>Select Position</option>
                                    <optgroup label="PU & Pemred Only!">
                                        <option value="Pimpinan">Pimpinan</option>
                                    </optgroup>
                                    <optgroup label="Sekretaris & Bendahara">
                                        <option value="Sekretaris">Sekretaris 1</option>
                                        <option value="Sekretaris">Sekretaris 2</option>
                                        <option value="Bendahara">Bendahara 1</option>
                                        <option value="Bendahara">Bendahara 2</option>
                                    </optgroup>
                                    <optgroup label="Staff Inti">
                                        <option value="Ketua">Ketua</option>
                                        <option value="Wakil Ketua">Wakil Ketua</option>
                                    </optgroup>
                                    <optgroup label="Berita">
                                        <option value="Redaksi">Redaksi</option>
                                        <option value="Editor">Editor</option>
                                        <option value="Kreatif">Kreatif</option>
                                    </optgroup>
                                    <optgroup label="Marketing">
                                        <option value="Sosmed">Sosmed</option>
                                        <option value="Reporter">Reporter</option>
                                        <option value="Design">Design</option>
                                        <option value="Konten">Konten</option>
                                        <option value="IT">IT</option>
                                    </optgroup>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="angkatan" class="form-label">Angkatan</label>
                                <input class="form-control" type="number" name="angkatan" required="" id="angkatan" placeholder="2020">
                            </div>

                            <div class="mb-3">
                                <label for="fakultas" class="form-label">Faculty</label>
                                <select name="fakultas" class="form-select" id="fakultas" required="">
                                    <option value="" hidden>Select your faculty</option>
                                    <option value="FEB">FEB</option>
                                    <option value="FIB">FIB</option>
                                    <option value="FISIP">FISIP</option>
                                    <option value="FT">FT</option>
                                    <option value="FDKV">FDKV</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="prodi" class="form-label">Prodi</label>
                                <input class="form-control" type="text" name="prodi" required="" id="prodi" placeholder="Manajemen">
                            </div>

                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label> <span style="font-size:10px ;color:crimson">*untuk mendapatkan akses akun ke spanel</span>
                                <input class="form-control" type="text" name="username" required="" id="username" placeholder="jhonwick">
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="addMember" name="addMember" required>
                                    <label class="form-check-label" for="addMember">Saya merupakan anggota UKM sEntra Univ. Widyatama</label>
                                    <input type="text" name="avatar" hidden id="avatar">
                                </div>
                            </div>

                            <div class="mb-3 text-center">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>

                        </form>
                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

            </div> <!-- end col -->

        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->
<!-- Vendor js -->
<script src="../assets/js/vendor.min.js"></script>
<script src="../core/getavatar.js"></script>
<script>
    document.getElementById('title').innerHTML = "Daftar Ulang | Spanel - sEntra Panel";
    $('#avatar').val(generateAvatar());
</script>
<!-- App js -->
<script src="../assets/js/app.min.js"></script>

</body>

</html>