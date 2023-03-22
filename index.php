<?php
require './core/autoload.php';

if (WEBSITE_MAINTENANCE == 'on') {
    redirect($domain . 'maintenance');
} else {
    $cek = cekSession();
    if ($cek == 1) {
        $user = empty($_SESSION['username']) ? (!isset($_COOKIE['username']) ? redirect($domain . "auth/login") : $_COOKIE['username']) : $_SESSION['username'];
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
        } else {
            redirect($domain . "auth/login");
        }
    } else {
        redirect($domain . "auth/login");
    }
}
