<?php
require '../middleware/header.output.php';
if (WEBSITE_MAINTENANCE == 'on') {
    redirect($domain . 'maintenance');
}
$ip = checkmyip();
$user = empty($_SESSION['username']) ? (!isset($_COOKIE['username']) ? '' : $_COOKIE['username']) : $_SESSION['username'];
mysqli_query($mysqli, "UPDATE users SET last_login=NOW(), ip_last='$ip' WHERE username='$user'");
$_SESSION = array();
if (isset($_COOKIE["username"])) {
    setcookie('username', null, time() - 604800, "/");
    setcookie("login", false, time() - 604800, "/");
    setcookie("timestamp", "", time() - 604800, "/");
    setcookie("ip_address", "", time() - 604800, "/");
    unset($_COOKIE['username']);
    unset($_COOKIE['login']);
    unset($_COOKIE['timestamp']);
    unset($_COOKIE['ip_address']);
}
setcookie("csrf_token", "", time() - (604800), "/");
unset($_COOKIE['csrf_token']);
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 604800,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}
session_destroy();
session_unset();
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

                        <div class="text-center">
                            <div class="mt-4">
                                <div class="logout-checkmark">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
                                        <circle class="path circle" fill="none" stroke="#4bd396" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1" />
                                        <polyline class="path check" fill="none" stroke="#4bd396" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 " />
                                    </svg>
                                </div>
                            </div>

                            <h3>See you again !</h3>

                            <p class="text-muted"> You are now successfully sign out. </p>
                        </div>

                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p class="text-white">Back to <a href="login" class="text-blue ms-1"><b>Log In</b></a></p>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->
<script>
    document.getElementById("title").innerHTML = "Log Out | Spanel - Panel BOT Automate sEntra UTama ";
</script>
<!-- Vendor js -->
<script src="../assets/js/vendor.min.js"></script>

<!-- App js -->
<script src="../assets/js/app.min.js"></script>

</body>

</html>
<?php
$mysqli->close();
$db->close();
exit;
?>