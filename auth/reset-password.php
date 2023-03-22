<?php
require '../middleware/header.output.php';
$user = empty($_SESSION['username']) ? (!isset($_COOKIE['username']) ? '' : $_COOKIE['username']) : $_SESSION['username'];
if (WEBSITE_MAINTENANCE == 'on') {
    redirect($domain . 'maintenance');
}
$cek = cekSession();
// Checking Session
if ($cek == 1) {
    $check = $database->query("SELECT * FROM users WHERE username = '$user' ORDER BY id DESC LIMIT 1");
    if ($check->rowCount() > 0) {
        $row = $check->fetch(PDO::FETCH_ASSOC);
        if ($row['role'] == '1') {
            redirect($domain . "member/dashboard");
        } else if ($row['role'] == '2') {
            redirect($domain . "staff/dashboard");
        } else if ($row['role'] == '3') {
            redirect($domain . "admin/dashboard");
        } else if ($row['role'] == '10') {
            redirect($domain . "dev/dashboard");
        }
    }
}
if (get('uname') && get('q') && get('token')) {
    $db1 = $database->query("SELECT * FROM users WHERE username='" . get('uname') . "'");
    $db2 = $database->query("SELECT * FROM reset_password WHERE username='" . get('uname') . "' AND token='" . get('token') . "' AND query_reset='" . get('q') . "'");
    if ($db2->rowCount() > 0) {
        $reset = $db2->fetch(PDO::FETCH_ASSOC);
        $user = $db1->fetch(PDO::FETCH_ASSOC);
        if ($reset['expired'] > strtotime("now")) {
            if (post('repassword')) {
                if ($reset['expired'] > strtotime("now")) {
                    $pass = post('password');
                    $repass = post('repassword');
                    if ($pass == $repass) {
                        $repass = password_hash($repass, PASSWORD_BCRYPT);
                        $database->updateTable("users", "password='$repass'", $user['id']);
                        $database->updateTable("reset_password", "after_password = '$repass', token = '', query_reset = '', expired = '', timestamp = UNIX_TIMESTAMP()", $reset['id']);
                        $database->insertTable("notification", "NULL, '$name', 'Berhasil Ubah Password', 'Password Kamu berhasil di ubah nih :-) Jangan sampe lupa lagi ya ...✌️', '1', '', '$querynotif', '0', UNIX_TIMESTAMP()");
                        swalfire('success', 'Password has been reset', 'login');
                    } else {
                        swalfire('error', 'Password not match!', 'reset-password?uname=' . get('uname') . '&q=' . get('q') . '&token=' . get('token') . '&type=true&by=phonenumber');
                    }
                } else {
                    swalfire('error', 'Token has been expired', 'forgot-password');
                }
            }

?>
            <div class="account-pages mt-5 mb-5">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-lg-6 col-xl-4">
                            <div class="text-center mb-2">
                                <a href="../">
                                    <img src="../assets/images/logo_sentra.png" alt="" height="100" class="mx-auto">
                                </a>
                                <p class="text-white">UKM sEntra UTAMA</p>
                            </div>

                            <div class="card">

                                <div class="card-body p-4">

                                    <div class="text-center mb-2">
                                        <h4 class="text-uppercase mt-0 mb-2">Reset Password</h4>
                                        <img src="<?= $user['avatar'] ?>" width="88" alt="user-image" class="rounded-circle img-thumbnail">
                                        <p class="text-muted mb-4">Hi! <?= $user['name'] ?>, Set your new password.</p>

                                    </div>

                                    <form method="post">

                                        <div class="mb-3">
                                            <label for="password" class="form-label">New Password</label>
                                            <input class="form-control" type="password" name="password" required="" id="password" placeholder="Enter your new password">
                                        </div>
                                        <div class="mb-3">
                                            <label for="repassword" class="form-label">Re Password</label>
                                            <input class="form-control" type="password" name="repassword" required="" id="repassword" placeholder="Enter re password">
                                        </div>

                                        <div class="mb-0 text-center d-grid">
                                            <button class="btn btn-primary" type="submit"> Submit </button>
                                        </div>

                                    </form>

                                </div> <!-- end card-body -->
                            </div>
                            <!-- end card -->

                            <div class="row mt-3">
                                <div class="col-12 text-center">
                                    <p class="text-white">Back to <a href="login" class="text-blue ms-1"><b>Log In</b></a></p>
                                </div> <!-- end col -->
                            </div>

                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container -->
            </div>
            <!-- end page -->
        <?php
        } else {
        ?>
            <div class="account-pages mt-5 mb-5">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-lg-6 col-xl-4">
                            <div class="text-center mb-2">
                                <a href="../">
                                    <img src="../assets/images/logo_sentra.png" alt="" height="100" class="mx-auto">
                                </a>
                                <p class="text-white">UKM sEntra UTAMA</p>
                            </div>

                            <div class="card bg-pattern">

                                <div class="card-body p-4">

                                    <div class="text-center w-75 m-auto">
                                        <div class="auth-logo">
                                            <a href="index.html" class="logo logo-dark text-center">
                                                <span class="logo-lg">
                                                    <img src="../assets/images/logo-dark.png" alt="" height="22">
                                                </span>
                                            </a>

                                            <a href="index.html" class="logo logo-light text-center">
                                                <span class="logo-lg">
                                                    <img src="../assets/images/logo-light.png" alt="" height="22">
                                                </span>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <div class="mt-2">
                                            <div class="expired-checkmark">
                                                <img src="../assets/images/expired.png" alt="Expired" class="img-thumbnail">
                                            </div>
                                        </div>

                                        <h3>TOKEN EXPIRED</h3>

                                        <p class="text-muted"> Token anda telah kadaluwarsa! </p>
                                    </div>

                                </div> <!-- end card-body -->
                            </div>
                            <!-- end card -->
                            <div class="row mt-3">
                                <div class="col-12 text-center">
                                    <p class="text-white">Back to <a href="forgot-password" class="text-blue ms-1"><b>Forgot Password</b></a></p>
                                </div> <!-- end col -->
                            </div>

                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container -->
            </div>
            <!-- end page -->
    <?php
        }
    }
} else {
    if (post('token')) {
        $check = $database->query("SELECT * FROM reset_password WHERE token='" . post('token') . "'");
        if ($check->rowCount() > 0) {
            $data = $check->fetch(PDO::FETCH_ASSOC);
            if ($data['expired'] > strtotime("now")) {
                $url = DOMAIN_APP . 'auth/reset-password?uname=' . $data['username'] . '&q=' . $data['query_reset'] . '&token=' . $data['token']  . '&type=true&by=phonenumber';
                swalfire('success', 'Token anda valid, silahkan klik tombol OK untuk melanjutkan!', $url);
            } else {
                swalfire('error', 'Token expired!', 'reset-password');
            }
        } else {
            swalfire('error', 'Invalid token!', 'reset-password');
        }
    }
    ?>
    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="text-center mb-2">
                        <a href="../">
                            <img src="../assets/images/logo_sentra.png" alt="" height="100" class="mx-auto">
                        </a>
                        <p class="text-white">UKM sEntra UTAMA</p>
                    </div>

                    <div class="card">

                        <div class="card-body p-4">

                            <div class="text-center mb-2">
                                <h4 class="text-uppercase mt-0 mb-2">Reset Password</h4>
                                <p class="text-muted mb-4">Enter your token.</p>

                            </div>

                            <form method="post">

                                <div class="mb-3">
                                    <label for="token" class="form-label">Token</label>
                                    <input class="form-control" type="token" required="" name="token" id="token" placeholder="Enter your token">
                                </div>

                                <div class="mb-0 text-center d-grid">
                                    <button class="btn btn-primary" type="submit"> Submit </button>
                                </div>

                            </form>

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->
                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-white">Back to <a href="login" class="text-blue ms-1"><b>Log In</b></a></p>
                        </div> <!-- end col -->
                    </div>

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->
<?php
}
?>
<!-- Vendor js -->
<script src="../assets/js/vendor.min.js"></script>
<script>
    document.getElementById("title").innerHTML = "Forgot Password | Spanel - Panel BOT Automate sEntra UTama ";
</script>
<!-- App js -->
<script src="../assets/js/app.min.js"></script>

</body>

</html>