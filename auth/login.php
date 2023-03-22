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
if (post('username')) {

    $u = stripslashes(strip_tags(htmlentities(htmlspecialchars(addslashes(post('username')), ENT_QUOTES))));
    $p = post('password');
    $login = login($u, $p);
    if ($login == true) {
        $check = $database->query("SELECT * FROM users WHERE username='$u' ORDER BY id DESC LIMIT 1");
        $data = $check->fetch(PDO::FETCH_ASSOC);
        $_SESSION['name'] = $data['name'];
        $_SESSION['token'] = bin2hex(random_bytes(35));
        setcookie("csrf_token", $_SESSION['token'], time() + (604800), "/");
        // save 1 week remember
        if (!empty(post("remember"))) {
            setcookie("username", post('username'), time() + (604800), "/");
            setcookie("login", true, time() + (604800), "/");
            setcookie("timestamp", time(), time() + (604800), "/");
            setcookie("ip_address", checkmyip(), time() + (604800), "/");
        } else {
            if (isset($_COOKIE["username"])) {
                setcookie("username", "");
                unset($_COOKIE['username']);
            } else if (isset($_COOKIE["login"])) {
                setcookie("login", "");
                unset($_COOKIE['login']);
            } else if (isset($_COOKIE["timestamp"])) {
                setcookie("timestamp", "");
                unset($_COOKIE['timestamp']);
            } else if (isset($_COOKIE["ip_address"])) {
                setcookie("ip_address", "");
                unset($_COOKIE['ip_address']);
            }
        }
        swalfire('success', 'Login Success, Welcome back sEntrative!', '../');
    } else {
        swalfire('Error', 'Username & password salah!', 'login');
    }
}
?>
<div class="account-pages my-5">
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

                        <div class="text-center mb-4">
                            <h4 class="text-uppercase mt-0">Log in</h4>
                        </div>

                        <form method="POST" id="login_form">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input class="form-control" type="text" id="username" name="username" required="" placeholder="Enter your username!">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password">
                                    <div class="input-group-text" data-password="false">
                                        <span class="password-eye"></span>
                                    </div>
                                </div>
                                <div class="text-end mt-1"><a href="#" onclick='window.open("forgot-password", "_blank", "width=1200,height=1200")'>Forgot Password</a></div>
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input type="checkbox" name="remember" class="form-check-input" id="checkbox-signin">
                                    <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                </div>
                            </div>

                            <div class="mb-3 d-grid text-center">
                                <button class="btn btn-primary" type="submit"> Log In </button>
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
<script>
    document.getElementById("title").innerHTML = "Log In | Spanel - Panel BOT Automate sEntra UTama ";
</script>
<!-- App js -->
<script src="../assets/js/app.min.js"></script>

</body>

</html>