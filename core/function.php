<?php
// Using global $mysqli or $db to connect database
function get($param)
{
    global $mysqli;
    $d = isset($_GET[$param]) ? $_GET[$param] : null;
    $d = mysqli_real_escape_string($mysqli, $d);
    $d = htmlspecialchars($d);
    return $d;
}

function post($param)
{
    global $mysqli;
    $d = isset($_POST[$param]) ? $_POST[$param] : null;
    $d = mysqli_real_escape_string($mysqli, $d);
    $d = htmlspecialchars($d);
    return $d;
}

function login($u, $p)
{
    global $database;
    $pw = $database->query("SELECT * FROM users WHERE username='$u' ORDER BY id DESC LIMIT 1");
    // $pw = mysqli_query($mysqli, "SELECT * FROM users WHERE username='$u' ORDER BY id DESC LIMIT 1");
    if ($pw->rowCount() > 0) {
        $pws = $pw->fetch(PDO::FETCH_ASSOC);
        if (password_verify($p, $pws['password']) > 0) {
            $_SESSION['login'] = true;
            $_SESSION['username'] = $u;
            // mysqli_query($mysqli, "UPDATE users SET last_login=NOW(), ip_last='$ip' WHERE username='$u'");
            return true;
        } else {
            return false;
        }
    }
}
function cekSession()
{
    $login = isset($_SESSION['login']) ? $_SESSION['login'] : null;
    $loginkue = isset($_COOKIE['login']) ? $_COOKIE['login'] : null;

    if ($login == true) {
        return 1;
    } else {
        if ($loginkue == true) {
            return 1;
        } else {
            return 0;
        }
    }
}

function slugConvert($string, $type)
{
    $string = str_replace(array('[\', \']'), '', $string);
    $string = preg_replace('/\[.*\]/U', '', $string);
    $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $string);
    $string = htmlentities($string, ENT_COMPAT, 'utf-8');
    $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string);
    if ($type == 'url') {
        $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/'), '-', $string);
    } else {
        $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/'), '', $string);
    }
    return strtolower(trim($string, '-'));
}
function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function generateRandomInt($length = 6)
{
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function convertDate($dates)
{
    $day = date_format($dates, "l");
    $month = date_format($dates, "m");
    $tgl = date_format($dates, "d");
    $year = date_format($dates, "Y");
    switch ($day) {
        case "Sunday":
            $day = "Minggu";
            break;
        case "Monday":
            $day = "Senin";
            break;
        case "Tuesday":
            $day = "Selasa";
            break;
        case "Wednesday":
            $day = "Rabu";
            break;
        case "Thursday":
            $day = "Kamis";
            break;
        case "Friday":
            $day = "Jumat";
            break;
        case "Saturday":
            $day = "Sabtu";
            break;
    }

    switch ($month) {
        case "1":
            $month = "Januari";
            break;
        case "2":
            $month = "Februari";
            break;
        case "3":
            $month = "Maret";
            break;
        case "4":
            $month = "April";
            break;
        case "5":
            $month = "Mei";
            break;
        case "6":
            $month = "Juni";
            break;
        case "7":
            $month = "Juli";
            break;
        case "8":
            $month = "Agustus";
            break;
        case "9":
            $month = "September";
            break;
        case "10":
            $month = "Oktober";
            break;
        case "11":
            $month = "November";
            break;
        case "12":
            $month = "Desember";
            break;
    }
    return $day . ", " . $tgl . " " . $month . " " . $year;
}

function checkmyip()
{
    if ($_SERVER['REMOTE_ADDR'] == '::1') {
        $ip = 'localhost';
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

function uploadImage1($name, $dest, $filen)
{

    if (!empty($_FILES[$name]) && $_FILES[$name]['error'] == UPLOAD_ERR_OK) {
        // Be sure we're dealing with an upload
        if (is_uploaded_file($_FILES[$name]['tmp_name']) === false) {
            throw new \Exception('Error on upload: Invalid file definition');
        }
        if ($_FILES[$name]["size"] > 500000) {
            echo "File size is too large. Max size is 3MB.";
            exit;
        }
        // Rename the uploaded file
        $uploadName = $_FILES[$name]['name'];
        $ext = strtolower(substr($uploadName, strripos($uploadName, '.') + 1));
        $allow = ['png', 'jpeg', 'jpg'];
        if (in_array($ext, $allow)) {
            if ($ext == "png") {
                $filename = $filen . '.png';
            }
            if ($ext == "jpg") {
                $filename = $filen . '.png';
            }

            if ($ext == "jpeg") {
                $filename = $filen . '.png';
            }
        } else {
            echo  "Format png, jpg only";
        }
        // mkdir("../uploads/");
        move_uploaded_file($_FILES[$name]['tmp_name'], $dest . $filename);
    }
}

function uploadImage2($name, $dest)
{

    $target_dir = $dest;
    $target_file = $target_dir . basename($_FILES[$name]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES[$name]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES[$name]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES[$name]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES[$name]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

// Databases Checking
function countDBrow($table, $where, $param)
{
    global $database;
    $q = $database->query("SELECT * FROM `$table` WHERE `$where`='$param'");
    $row = $q->rowCount();
    return $row;
}

function countDB($table)
{
    global $database;
    $q = $database->query("SELECT * FROM `$table`");
    $row = $q->rowCount();
    return $row;
}
function getSingleValDB($table, $where, $param, $target)
{
    global $database;
    $q = $database->query("SELECT * FROM `$table` WHERE `$where`='$param'");
    if ($q->rowCount() > 0) {
        $row = $q->fetch(PDO::FETCH_ASSOC);
        return $row[$target];
    } else {
        return '';
    }
}

function redirect($target)
{
    echo '
    <script>
    window.location = "' . $target . '";
    </script>
    ';
    exit;
}
function reload()
{
    echo '
    <script>
    location.reload();
    </script>
    ';
    exit;
}
function swalfire($status, $text, $direct)
{
    if ($status == 'delete') {
        echo "
        <script>
        Swal.fire({
            title: 'Are you sure?',
            text: '" . $text . "',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
                window.location = '" . $direct . "';
              Swal.fire(
                'Deleted!',
                'Has been deleted.',
                'success'
              )
            }
          })
          <script>
      ";
    } else {
        echo "    
        <script>
          Swal.fire({
            title: '" . $status . "!',
            text: '" . $text . "',
            icon: '" . strtolower($status) . "',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
          }).then((result) => {
            if (result.isConfirmed) {
                window.location = '" . $direct . "';
            }
          })
          </script>";
    }
}

//cek uang cash koerang
function cekKasku($name) //by name
{
    $month1 = getSingleValDB('sentra_cash', 'name', $name, 'month_1');
    $month2 = getSingleValDB('sentra_cash', 'name', $name, 'month_2');
    $month3 = getSingleValDB('sentra_cash', 'name', $name, 'month_3');
    $month4 = getSingleValDB('sentra_cash', 'name', $name, 'month_4');
    $month5 = getSingleValDB('sentra_cash', 'name', $name, 'month_5');
    $month6 = getSingleValDB('sentra_cash', 'name', $name, 'month_6');
    $month7 = getSingleValDB('sentra_cash', 'name', $name, 'month_7');
    $month8 = getSingleValDB('sentra_cash', 'name', $name, 'month_8');
    $month9 = getSingleValDB('sentra_cash', 'name', $name, 'month_9');
    $month10 = getSingleValDB('sentra_cash', 'name', $name, 'month_10');
    $month11 = getSingleValDB('sentra_cash', 'name', $name, 'month_11');
    $month12 = getSingleValDB('sentra_cash', 'name', $name, 'month_12');

    if (date("m") == '11') {
        $mincash =  $month1 == '1' ? 0 : '5000';
    } else if (date("m") == '12') {
        if ($month1 == '1') {
            if ($month2 == '1') {
                $mincash = 0;
            } else {
                $mincash = '5000';
            }
        } else {
            if ($month2 == '1') {
                $mincash = '5000';
            } else {
                $mincash = '10000';
            }
        }
    } else if (date("m") == '1') {
        if ($month1 == '1') {
            if ($month2 == '1') {
                if ($month3 == '1') {
                    $mincash = 0;
                } else {
                    $mincash = '5000';
                }
            } else {
                if ($month3 == '1') {
                    $mincash = '5000';
                } else {
                    $mincash = '10000';
                }
            }
        } else {
            if ($month2 == '1') {
                if ($month3 == '1') {
                    $mincash = '5000';
                } else {
                    $mincash = '10000';
                }
            } else {
                if ($month3 == '1') {
                    $mincash = '10000';
                } else {
                    $mincash = '15000';
                }
            }
        }
    } else if (date("m") == '2') {
        if ($month1 == '1') {
            if ($month2 == '1') {
                if ($month3 == '1') {
                    if ($month4 == '1') {
                        $mincash = 0;
                    } else {
                        $mincash = '5000';
                    }
                } else {
                    if ($month4 == '1') {
                        $mincash = '5000';
                    } else {
                        $mincash = '10000';
                    }
                }
            } else {
                if ($month3 == '1') {
                    if ($month4 == '1') {
                        $mincash = '5000';
                    } else {
                        $mincash = '10000';
                    }
                } else {
                    if ($month4 == '1') {
                        $mincash = '10000';
                    } else {
                        $mincash = '15000';
                    }
                }
            }
        } else {
            if ($month2 == '1') {
                if ($month3 == '1') {
                    if ($month4 == '1') {
                        $mincash = '5000';
                    } else {
                        $mincash = '10000';
                    }
                } else {
                    if ($month4 == '1') {
                        $mincash = '10000';
                    } else {
                        $mincash = '15000';
                    }
                }
            } else {
                if ($month3 == '1') {
                    if ($month4 == '1') {
                        $mincash = '10000';
                    } else {
                        $mincash = '20000';
                    }
                } else {
                    if ($month4 == '1') {
                        $mincash = '15000';
                    } else {
                        $mincash = '20000';
                    }
                }
            }
        }
    } else if (date("m") == '3') {
        if ($month1 == '1') {
            if ($month2 == '1') {
                if ($month3 == '1') {
                    if ($month4 == '1') {
                        if ($month5 == '1') {
                            $mincash = 0;
                        } else {
                            $mincash = '5000';
                        }
                    } else {
                        if ($month5 == '1') {
                            $mincash = '5000';
                        } else {
                            $mincash = '10000';
                        }
                    }
                } else {
                    if ($month4 == '1') {
                        if ($month5 == '1') {
                            $mincash = '5000';
                        } else {
                            $mincash = '10000';
                        }
                    } else {
                        if ($month5 == '1') {
                            $mincash = '10000';
                        } else {
                            $mincash = '15000';
                        }
                    }
                }
            } else {
                if ($month3 == '1') {
                    if ($month4 == '1') {
                        if ($month5 == '1') {
                            $mincash = '5000';
                        } else {
                            $mincash = '10000';
                        }
                    } else {
                        if ($month5 == '1') {
                            $mincash = '10000';
                        } else {
                            $mincash = '15000';
                        }
                    }
                } else {
                    if ($month4 == '1') {
                        if ($month5 == '1') {
                            $mincash = '10000';
                        } else {
                            $mincash = '15000';
                        }
                    } else {
                        if ($month5 == '1') {
                            $mincash = '15000';
                        } else {
                            $mincash = '20000';
                        }
                    }
                }
            }
        } else {
            if ($month2 == '1') {
                if ($month3 == '1') {
                    if ($month4 == '1') {
                        if ($month5 == '1') {
                            $mincash = '5000';
                        } else {
                            $mincash = '10000';
                        }
                    } else {
                        if ($month5 == '1') {
                            $mincash = '10000';
                        } else {
                            $mincash = '15000';
                        }
                    }
                } else {
                    if ($month4 == '1') {
                        if ($month5 == '1') {
                            $mincash = '10000';
                        } else {
                            $mincash = '15000';
                        }
                    } else {
                        if ($month5 == '1') {
                            $mincash = '15000';
                        } else {
                            $mincash = '20000';
                        }
                    }
                }
            } else {
                if ($month3 == '1') {
                    if ($month4 == '1') {
                        if ($month5 == '1') {
                            $mincash = '10000';
                        } else {
                            $mincash = '15000';
                        }
                    } else {
                        if ($month5 == '1') {
                            $mincash = '15000';
                        } else {
                            $mincash = '20000';
                        }
                    }
                } else {
                    if ($month4 == '1') {
                        if ($month5 == '1') {
                            $mincash = '15000';
                        } else {
                            $mincash = '20000';
                        }
                    } else {
                        if ($month5 == '1') {
                            $mincash = '20000';
                        } else {
                            $mincash = '25000';
                        }
                    }
                }
            }
        }
    } else if (date("m") == '4') {
        $mincash =  $month6 == '1' ? 0 : '5000';
    } else if (date("m") == '5') {
        $mincash =  $month7 == '1' ? 0 : '5000';
    } else if (date("m") == '6') {
        $mincash =  $month8 == '1' ? 0 : '5000';
    } else if (date("m") == '7') {
        $mincash =  $month9 == '1' ? 0 : '5000';
    } else if (date("m") == '8') {
        $mincash =  $month10 == '1' ? 0 : '5000';
    } else if (date("m") == '9') {
        $mincash =  $month11 == '1' ? 0 : '5000';
    } else if (date("m") == '10') {
        $mincash =  $month12 == '1' ? 0 : '5000';
    }
    return $mincash;
}

//cek uang cash koerang
function cekKasku2($name) //by name
{
    $month1 = getSingleValDB('sentra_cash', 'name', $name, 'month_1');
    $month2 = getSingleValDB('sentra_cash', 'name', $name, 'month_2');
    $month3 = getSingleValDB('sentra_cash', 'name', $name, 'month_3');
    $month4 = getSingleValDB('sentra_cash', 'name', $name, 'month_4');
    $month5 = getSingleValDB('sentra_cash', 'name', $name, 'month_5');
    $month6 = getSingleValDB('sentra_cash', 'name', $name, 'month_6');
    $month7 = getSingleValDB('sentra_cash', 'name', $name, 'month_7');
    $month8 = getSingleValDB('sentra_cash', 'name', $name, 'month_8');
    $month9 = getSingleValDB('sentra_cash', 'name', $name, 'month_9');
    $month10 = getSingleValDB('sentra_cash', 'name', $name, 'month_10');
    $month11 = getSingleValDB('sentra_cash', 'name', $name, 'month_11');
    $month12 = getSingleValDB('sentra_cash', 'name', $name, 'month_12');

    if (date("m") == '11') {
        $mincash =  $month1 == '1' ? '5000' : 0;
    } else if (date("m") == '12') {
        if ($month1 == '1') {
            if ($month2 == '1') {
                $mincash = '10000';
            } else {
                $mincash = '5000';
            }
        } else {
            if ($month2 == '1') {
                $mincash = '5000';
            } else {
                $mincash = '10000';
            }
        }
    } else if (date("m") == '1') {
        if ($month1 == '1') {
            if ($month2 == '1') {
                if ($month3 == '1') {
                    $mincash = '15000';
                } else {
                    $mincash = '10000';
                }
            } else {
                if ($month3 == '1') {
                    $mincash = '10000';
                } else {
                    $mincash = '5000';
                }
            }
        } else {
            if ($month2 == '1') {
                if ($month3 == '1') {
                    $mincash = '10000';
                } else {
                    $mincash = '15000';
                }
            } else {
                if ($month3 == '1') {
                    $mincash = '5000';
                } else {
                    $mincash = 0;
                }
            }
        }
    } else if (date("m") == '2') {
        if ($month1 == '1') {
            if ($month2 == '1') {
                if ($month3 == '1') {
                    if ($month4 == '1') {
                        $mincash = '20000';
                    } else {
                        $mincash = '15000';
                    }
                } else {
                    if ($month4 == '1') {
                        $mincash = '15000';
                    } else {
                        $mincash = '10000';
                    }
                }
            } else {
                if ($month3 == '1') {
                    if ($month4 == '1') {
                        $mincash = '15000';
                    } else {
                        $mincash = '10000';
                    }
                } else {
                    if ($month4 == '1') {
                        $mincash = '10000';
                    } else {
                        $mincash = '5000';
                    }
                }
            }
        } else {
            if ($month2 == '1') {
                if ($month3 == '1') {
                    if ($month4 == '1') {
                        $mincash = '15000';
                    } else {
                        $mincash = '10000';
                    }
                } else {
                    if ($month4 == '1') {
                        $mincash = '10000';
                    } else {
                        $mincash = '5000';
                    }
                }
            } else {
                if ($month3 == '1') {
                    if ($month4 == '1') {
                        $mincash = '10000';
                    } else {
                        $mincash = '5000';
                    }
                } else {
                    if ($month4 == '1') {
                        $mincash = '5000';
                    } else {
                        $mincash = 0;
                    }
                }
            }
        }
    } else if (date("m") == '3') {
        if ($month1 == '1') {
            if ($month2 == '1') {
                if ($month3 == '1') {
                    if ($month4 == '1') {
                        if ($month5 == '1') {
                            $mincash = '25000';
                        } else {
                            $mincash = '20000';
                        }
                    } else {
                        if ($month5 == '1') {
                            $mincash = '20000';
                        } else {
                            $mincash = '15000';
                        }
                    }
                } else {
                    if ($month4 == '1') {
                        if ($month5 == '1') {
                            $mincash = '20000';
                        } else {
                            $mincash = '15000';
                        }
                    } else {
                        if ($month5 == '1') {
                            $mincash = '15000';
                        } else {
                            $mincash = '10000';
                        }
                    }
                }
            } else {
                if ($month3 == '1') {
                    if ($month4 == '1') {
                        if ($month5 == '1') {
                            $mincash = '20000';
                        } else {
                            $mincash = '15000';
                        }
                    } else {
                        if ($month5 == '1') {
                            $mincash = '15000';
                        } else {
                            $mincash = '10000';
                        }
                    }
                } else {
                    if ($month4 == '1') {
                        if ($month5 == '1') {
                            $mincash = '10000';
                        } else {
                            $mincash = '15000';
                        }
                    } else {
                        if ($month5 == '1') {
                            $mincash = '15000';
                        } else {
                            $mincash = '20000';
                        }
                    }
                }
            }
        } else {
            if ($month2 == '1') {
                if ($month3 == '1') {
                    if ($month4 == '1') {
                        if ($month5 == '1') {
                            $mincash = '20000';
                        } else {
                            $mincash = '15000';
                        }
                    } else {
                        if ($month5 == '1') {
                            $mincash = '15000';
                        } else {
                            $mincash = '10000';
                        }
                    }
                } else {
                    if ($month4 == '1') {
                        if ($month5 == '1') {
                            $mincash = '15000';
                        } else {
                            $mincash = '10000';
                        }
                    } else {
                        if ($month5 == '1') {
                            $mincash = '10000';
                        } else {
                            $mincash = '5000';
                        }
                    }
                }
            } else {
                if ($month3 == '1') {
                    if ($month4 == '1') {
                        if ($month5 == '1') {
                            $mincash = '15000';
                        } else {
                            $mincash = '10000';
                        }
                    } else {
                        if ($month5 == '1') {
                            $mincash = '10000';
                        } else {
                            $mincash = '15000';
                        }
                    }
                } else {
                    if ($month4 == '1') {
                        if ($month5 == '1') {
                            $mincash = '10000';
                        } else {
                            $mincash = '20000';
                        }
                    } else {
                        if ($month5 == '1') {
                            $mincash = '5000';
                        } else {
                            $mincash = 0;
                        }
                    }
                }
            }
        }
    } else if (date("m") == '4') {
        $mincash =  $month6 == '1' ? 0 : '5000';
    } else if (date("m") == '5') {
        $mincash =  $month7 == '1' ? 0 : '5000';
    } else if (date("m") == '6') {
        $mincash =  $month8 == '1' ? 0 : '5000';
    } else if (date("m") == '7') {
        $mincash =  $month9 == '1' ? 0 : '5000';
    } else if (date("m") == '8') {
        $mincash =  $month10 == '1' ? 0 : '5000';
    } else if (date("m") == '9') {
        $mincash =  $month11 == '1' ? 0 : '5000';
    } else if (date("m") == '10') {
        $mincash =  $month12 == '1' ? 0 : '5000';
    }
    return $mincash;
}
function cekDate($date)
{

    $t = new DateTime($date);
    $s = new DateTime();
    $p = $t->diff($s);

    $th = $p->y;
    $mo = $p->m;
    $da = $p->d;
    $hd = $p->h;
    $mi = $p->i;
    $se = $p->s;
    if ($th > 0) {
        $ho = $th . ' Years ago';
    } else if ($mo > 0) {
        $ho = $mo . ' Month ago';
    } else if ($da > 0) {
        $ho = $da . ' Day ago';
    } else if ($hd > 0) {
        $ho = $hd . ' Hours ago';
    } else if ($mi > 0) {
        $ho = $mi . ' Minutes ago';
    } else {
        $ho = 'a few seconds ago';
    }
    return $ho;
}
