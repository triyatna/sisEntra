<?php
require '../core/autoload.php';

use Shuchkin\SimpleXLSX;

require "excel.php";



if (!empty($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
    // Be sure we're dealing with an upload
    if (is_uploaded_file($_FILES['file']['tmp_name']) === false) {
        throw new \Exception('Error on upload: Invalid file definition');
    }

    // Rename the uploaded file
    $uploadName = $_FILES['file']['name'];
    $ext = strtolower(substr($uploadName, strripos($uploadName, '.') + 1));

    $allow = ['xls', 'xlsx'];
    if (in_array($ext, $allow)) {
        if ($ext == "xls") {
            $filename = round(microtime(true)) . mt_rand() . '.xls';
        }

        if ($ext == "xlsx") {
            $filename = round(microtime(true)) . mt_rand() . '.xlsx';
        }
    } else {
        echo "File type not allowed";
        exit;
    }

    move_uploaded_file($_FILES['file']['tmp_name'], 'excel/' . $filename);
    // Insert it into our tracking along with the original name
    $file = "excel/" . $filename;
} else {
    $file = null;
}


if ($file == null) {
    echo "Format file not allowed";

    exit;
}

$a = post("a"); //3 start file
$b = post("b"); //2 Name
$c = post("c"); //3 npm
$d = post("d"); //4 phone
$e = post("e"); //5 email
$f = post("f"); //6 job
$g = post("g"); //7 position
$h = post("h"); //8 prodi
$is = post("i"); //9 faculty
$j = post("j"); //10 years
$k = post("k"); //11 username

if ($a && $b && $c && $d && $e && $f && $g && $h && $is && $j && $k && $file) {
    $a = $a - 1;
    $b = $b - 1;
    $c = $c - 1;
    $d = $d - 1;
    $e = $e - 1;
    $f = $f - 1;
    $g = $g - 1;
    $h = $h - 1;
    $is = $is - 1;
    $j = $j - 1;
    $k = $k - 1;

    if ($xlsx = SimpleXLSX::parse($file)) {

        $i = 0;
        $arrayes = [];
        foreach ($xlsx->rows() as $elt) {
            if ($i >= $a) {
                $name = ucwords(strtolower($elt[$b]));
                $npm = $elt[$c];
                $email = $elt[$e];
                $phone = $elt[$d];
                $job = $elt[$f];
                $position = $elt[$g];
                $angkatan = $elt[$j];
                $fakultas = $elt[$is];
                $prodi = ucwords($elt[$h]);
                $username = slugConvert($elt[$k], 'nospace');
                $avatar = $domain . "assets/images/avatar.png";
                $password = uniqid();
                $querynotif = generateRandomString(20);
                $encrypt = password_hash($password, PASSWORD_BCRYPT);

                $arrayes[] = [
                    "nama" => $name,
                    "npm" => $npm,
                    "phone" => $phone,
                    "email" => $email,
                    "job" => $job,
                    "position" => $position,
                    "angkatan" => $angkatan,
                    "facultas" => $fakultas,
                    "prodi" => $prodi,
                    "username" => $username,
                    "avatar" => $avatar,
                ];

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
            $i++;
        }
    } else {
        echo "Kesalahan parsing file";
        exit;
    }
    $response = array(
        'status' => 1,
        'message' => 'Success Added Data.',
        'result' => $arrayes
    );
    http_response_code(200);
    header('Content-Type: application/json');
    echo json_encode($response);
}
