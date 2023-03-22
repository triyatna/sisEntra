<?php
require 'autoload.php';
require 'core.ServerMAILER.php';
$user = empty($_SESSION['username']) ? (!isset($_COOKIE['username']) ? '' : $_COOKIE['username']) : $_SESSION['username'];
$type = post('type');
    if (isset($type)) {
        switch ($type) {
            case 'forgot-password':
                if (post('access') == 'wa') {
                    $id = post('whatsapp');
                    $npm = post('npm');
                    $check = $database->query("SELECT * FROM sentra_member WHERE npm = '$npm' AND phone = '$id'");
                    if ($check->rowCount() > 0) {
                        $data = $check->fetch(PDO::FETCH_ASSOC);
                        $name = $data['name'];
                        $check = $database->query("SELECT * FROM users WHERE `name` = '$name'");
                        $data = $check->fetch(PDO::FETCH_ASSOC);
                        $username = $data['username'];
                        $password = $data['password'];
                        $expired = strtotime('+5 minutes');
                        $checkreset = $database->query("SELECT * FROM reset_password WHERE username = '$username'");
                        $query = generateRandomString(25);
                        $token = generateRandomInt();
                        $url = DOMAIN_APP . 'auth/reset-password?uname=' . $username . '&q=' . $query . '&token=' . $token . '&type=true&by=phonenumber';
                        if ($checkreset->rowCount() == 0) {
                            $database->insertTable("reset_password", "NULL, '$username', '$password', '', $token, '$query', '$expired', UNIX_TIMESTAMP()");
                            $response = array(
                                'status' => 'success',
                                'message' => 'Please check your whatsapp to reset the password',
                                'result' => [
                                    'query' => $query,
                                    'username' => $username,
                                    'url-reset' => $url
                                ]
                            );

                            $text = '========================{n}RESET PASSWORD SPANEL{n}========================{n}hi ' . $name . '!,{n}Silahkan klik link untuk melakukan reset password{n}' . $url . '{n}{n}_Jika anda tidak melakukan reset password, abaikan pesan ini_';
                            $sentra->sendMessageText($id, $text);
                            http_response_code(200);
                            header('Content-Type: application/json');
                            echo json_encode($response);
                        } else {
                            $checkdatareset = $checkreset->fetch(PDO::FETCH_ASSOC);
                            $password = $checkdatareset['before_password'];
                            $database->updateTable("reset_password", "username='$username',before_password='$password',after_password='',token='$token',query_reset='$query', expired='$expired',timestamp=UNIX_TIMESTAMP()", $checkdatareset['id']);
                            $response = array(
                                'status' => 'success',
                                'message' => 'Please check your whatsapp to reset the password',
                                'result' => [
                                    'query' => $query,
                                    'username' => $username,
                                    'url-reset' => $url
                                ]
                            );

                            $text = '========================{n}RESET PASSWORD SPANEL{n}========================{n}hi ' . $name . '!,{n}Silahkan klik link untuk melakukan reset password{n}' . $url . '{n}{n}_Jika anda tidak melakukan reset password, abaikan pesan ini_';
                            $sentra->sendMessageText($id, $text);
                            http_response_code(200);
                            header('Content-Type: application/json');
                            echo json_encode($response);
                        }
                    } else {
                        $response = array(
                            'status' => 'error',
                            'message' => 'Data not registered'
                        );
                        http_response_code(503);
                        header('Content-Type: application/json');
                        echo json_encode($response);
                    }
                } else if (post('access') == 'email') {
                    $id = post('email');
                    $npm = post('npm');
                    $check = $database->query("SELECT * FROM sentra_member WHERE npm = '$npm' AND email = '$id'");
                    if ($check->rowCount() > 0) {
                        $data = $check->fetch(PDO::FETCH_ASSOC);
                        $name = $data['name'];
                        $check = $database->query("SELECT * FROM users WHERE `name` = '$name'");
                        $data = $check->fetch(PDO::FETCH_ASSOC);
                        $username = $data['username'];
                        $password = $data['password'];
                        $avatar = $data['avatar'];
                        if (str_contains($avatar, 'https://avataaars.io/')) {
                            $avatar = 'https://sentrawidyatama.my.id/assets/images/logo_sentra.png';
                        } else {
                            $avatar = $data['avatar'];
                        }
                        $expired = strtotime('+5 minutes');
                        $checkreset = $database->query("SELECT * FROM reset_password WHERE username = '$username'");
                        $query = generateRandomString(25);
                        $token = generateRandomInt();
                        $url = DOMAIN_APP . 'auth/reset-password?uname=' . $username . '&q=' . $query . '&token=' . $token . '&type=true&by=phonenumber';
                        if ($checkreset->rowCount() == 0) {
                            $database->insertTable("reset_password", "NULL, '$username', '$password', '', $token, '$query', '$expired', UNIX_TIMESTAMP()");
                            $response = array(
                                'status' => 'success',
                                'message' => 'Please check your email to reset the password',
                                'result' => [
                                    'query' => $query,
                                    'username' => $username,
                                    'url-reset' => $url
                                ]
                            );
                            $mail->sendMailtextLocal($id, 'Reset Password | Spanel - Panelnya anak sEntra', 'Silahkan klik link untuk melakukan reset password ' . $url, $mail->templateResetPassword($name, $avatar, $url));
                            http_response_code(200);
                            header('Content-Type: application/json');
                            echo json_encode($response);
                        } else {
                            $checkdatareset = $checkreset->fetch(PDO::FETCH_ASSOC);
                            $password = $checkdatareset['before_password'];
                            $database->updateTable("reset_password", "username='$username',before_password='$password',after_password='',token='$token',query_reset='$query', expired='$expired',timestamp=UNIX_TIMESTAMP()", $checkdatareset['id']);
                            $response = array(
                                'status' => 'success',
                                'message' => 'Please check your email to reset the password',
                                'result' => [
                                    'query' => $query,
                                    'username' => $username,
                                    'url-reset' => $url
                                ]
                            );

                            $mail->sendMailtextLocal($id, 'Reset Password | Spanel - Panelnya anak sEntra', 'Silahkan klik link untuk melakukan reset password ' . $url, $mail->templateResetPassword($name, $avatar, $url));
                            http_response_code(200);
                            header('Content-Type: application/json');
                            echo json_encode($response);
                        }
                    } else {
                        $response = array(
                            'status' => 'error',
                            'message' => 'Data not registered'
                        );
                        http_response_code(503);
                        header('Content-Type: application/json');
                        echo json_encode($response);
                    }
                }
                // $response = array(
                //     'status' => 'success',
                //     'message' => 'Data success.',
                //     'result' => post('whatsapp'),
                // );
                // http_response_code(200);
                // header('Content-Type: application/json');
                // echo json_encode($response);
                break;
            case 'data-schedule':
                $check = $database->query('SELECT * FROM sentra_calendar');
                $data = $check->fetchAll(PDO::FETCH_ASSOC);
                $response = array(
                    'status' => 'success',
                    'result' => $data
                );
                http_response_code(200);
                header('Content-Type: application/json');
                echo json_encode($response);
                break;
            case 'delete-schedule':
                $title = post('title');
                $data = $database->query("DELETE FROM sentra_calendar WHERE `sentra_calendar`.`title` = '$title'");
                $response = array(
                    'status' => 'success',
                    'result' => 'deleted data schedule ' . $title
                );
                http_response_code(200);
                header('Content-Type: application/json');
                echo json_encode($response);
                break;
            case 'add-schedule-row':
                $title = post('title');
                $start = strtotime(post('start'));
                $class = post('className');
                $check = $database->query("SELECT * FROM sentra_calendar WHERE title = '$title'");
                if ($check->rowCount() == 0) {
                    $ins = $database->query("INSERT INTO sentra_calendar VALUES (NULL, '$title', 'sEntra scheduled added by live row', '$start', '$start', '$class', 'true', UNIX_TIMESTAMP(), '$user')");
                    http_response_code(200);
                    $response = array(
                        'status' => 'success',
                        'result' => 'added data schedule ' . $title
                    );
                } else {
                    http_response_code(503);
                    $response = array(
                        'status' => 'error',
                        'result' => 'data schedule ' . $title . ' already exist'
                    );
                }
                header('Content-Type: application/json');
                echo json_encode($response);
                break;
            case 'update-schedule-row':
                $title = post('title');
                $newT = post('newTitle');
                $class = post('className');
                $check = $database->query("SELECT * FROM sentra_calendar WHERE title = '$title'");
                if ($check->rowCount() > 0) {
                    $data = $check->fetch(PDO::FETCH_ASSOC);
                    $idUs = $data['id'];
                    $ins = $database->query("UPDATE `sentra_calendar` SET `title` = '$newT', `classname` = '$class' WHERE `sentra_calendar`.`id` = $idUs ");
                    http_response_code(200);
                    $response = array(
                        'status' => 'success',
                        'result' => 'Update data schedule ' . $newT
                    );
                } else {
                    http_response_code(503);
                    $response = array(
                        'status' => 'error',
                        'result' => 'data schedule ' . $title . ' not exist'
                    );
                }
                header('Content-Type: application/json');
                echo json_encode($response);
                break;
            case 'updateqrmember':
                $id = $_POST['result'];
                $npm = $_POST['npm'];
                $c = $database->query("SELECT * FROM `sentra_member` WHERE `npm`='$npm'");
                if ($c->rowCount() > 0) {
                    $idUser = $c->fetch(PDO::FETCH_ASSOC);
                    $database->updateTable("sentra_member", "qrcode='$id'", $idUser['id']);
                    $response = array(
                        'status' => 1,
                        'message' => 'Success generate QR.',
                        'result' => array(
                            'npm' => $npm,
                            'qrcode' => $id,
                            'time' => date('Y-m-d H:i:s')
                        )
                    );
                    http_response_code(200);
                    header('Content-Type: application/json');
                    echo json_encode($response);
                } else {
                    $response = array(
                        'status' => 0,
                        'message' => 'Data ' . $id . ' Not Found!',
                    );
                    http_response_code(503);
                    header('Content-Type: application/json');
                    echo json_encode($response);
                }
                exit;
                break;
            case 'delete-member':
                $id = $_POST['id'];
                $c = $database->query("SELECT * FROM `sentra_member` WHERE `id`='$id'");
                if ($c->rowCount() > 0) {
                    $idUser = $c->fetch(PDO::FETCH_ASSOC);
                    $database->deleteTable("sentra_member", $id);
                    $response = array(
                        'status' => 1,
                        'message' => 'Deleted Member',
                        'result' => array(
                            'name' => $idUser['name'],
                            'id' => $id,
                            'time' => date('Y-m-d H:i:s')
                        )
                    );
                    http_response_code(200);
                    header('Content-Type: application/json');
                    echo json_encode($response);
                } else {
                    $response = array(
                        'status' => 0,
                        'message' => 'Data ' . $id . ' Not Found!',
                    );
                    http_response_code(503);
                    header('Content-Type: application/json');
                    echo json_encode($response);
                }
                exit;
                break;
            case 'presence':
                $id = post('npm');
                $agenda = post('agenda');
                $c = $database->query("SELECT * FROM `sentra_member` WHERE `npm`='$id'");
                if ($c->rowCount() > 0) {
                    if ($c) {
                        $ass = $c->fetch(PDO::FETCH_ASSOC);
                        $name =  $ass['name'];
                        $npm = $ass['npm'];
                        $job = $ass['job'];
                        $position = $ass['position'];
                        $d = $database->query("SELECT * FROM `sentra_presence` WHERE `npm`='$npm' AND `agenda`='$agenda' AND `date`='" . date("Y-m-d") . "'");
                        $asso = $d->fetch(PDO::FETCH_ASSOC);
                        if ($d->rowCount() == 0) {
                            $database->query("INSERT INTO `sentra_presence` VALUES (NULL,'$name', '$npm', '$job', '$position', '$agenda','" . date('Y-m-d') . "',current_timestamp())");
                            // mysqli_query($mysqli, "INSERT INTO `sentra_presence` VALUES (NULL, '" . $name . "', '" . $npm . "', '" . $job . "','" . $position . "', '" . $agenda . "', '" . date('Y-m-d') . "', current_timestamp()) ");
                            $response = array(
                                'status' => 1,
                                'message' => 'Success Added Data.',
                                'result' => array(
                                    'name' => $name,
                                    'npm' => $npm,
                                    'agenda' => $agenda,
                                    'time' => date('Y-m-d H:i:s')
                                )
                            );
                            http_response_code(200);
                            header('Content-Type: application/json');
                            echo json_encode($response);
                        } else {
                            $response = array(
                                'status' => 1,
                                'message' => 'Data already exist.',
                                'result' => array(
                                    'name' => $name,
                                    'npm' => $npm,
                                    'agenda' => $agenda,
                                    'time' => $asso['timedate']
                                )
                            );
                            http_response_code(503);
                            header('Content-Type: application/json');
                            echo json_encode($response);
                        }
                    } else {
                        $response = array(
                            'status' => 0,
                            'message' => 'Data ' . $id . ' Not Found!',
                        );
                        http_response_code(404);
                        header('Content-Type: application/json');
                        echo json_encode($response);
                    }
                } else {
                    $response = array(
                        'status' => 0,
                        'message' => 'Data ' . $id . ' Not Found!',
                    );
                    http_response_code(503);
                    header('Content-Type: application/json');
                    echo json_encode($response);
                }
                exit;
                break;
            case 'updateprofileuser':
                $resl = $_POST['result'];
                $id = $_POST['id'];
                $check = $database->query("SELECT * FROM users WHERE `id`=$id");
                if ($check->rowCount() > 0) {
                    $c = $database->query("UPDATE users SET avatar = '$resl' WHERE `users`.id=$id");
                    if ($c) {
                        $response = array(
                            'status' => 1,
                            'message' => 'Success Update Profiles.',
                            'result' => array(
                                'npm' => $resl,
                                'time' => date('Y-m-d H:i:s')
                            )
                        );
                        http_response_code(200);
                        header('Content-Type: application/json');
                        echo json_encode($response);
                    } else {
                        $response = array(
                            'status' => 0,
                            'message' => 'Data not found.' . $id,
                        );
                        http_response_code(503);
                        header('Content-Type: application/json');
                        echo json_encode($response);
                    }
                } else {
                    $response = array(
                        'status' => 0,
                        'message' => 'Data not found.' . $id,
                    );
                    http_response_code(503);
                    header('Content-Type: application/json');
                    echo json_encode($response);
                }
                exit;
                break;
            case 'transaksi-kas-sentra':
                $name = post('name');
                $bukti = $_FILES['bukti'];
                $metod = post('metode');
                $total = post('total');
                $query = generateRandomString(20);
                $check = $database->query("SELECT * FROM `sentra_member` WHERE `name`='$name'");
                if ($check->rowCount() > 0) {
                    $checkfile = $sentra->uploadFILE($bukti);
                    $fileurl = $checkfile['result']['url'];
                    $row = $check->fetchAll(PDO::FETCH_ASSOC);
                    $id = $row[0]['id'];
                    $check2 = $database->query("SELECT count(*) FROM `sentra_cash_request`");
                    if ($check2->rowCount() > 0) {
                        $row2 = $check2->fetch(PDO::FETCH_ASSOC);
                        $id2 = $row2['count(*)'];
                        $invoice = 'BKS-' . $id . '0000' . $id2;
                    } else {
                        $invoice = 'BKS-' . $id . '00000';
                    }
                    $check3 = $database->query("SELECT * FROM `sentra_cash_request` WHERE `no_invoice`='$invoice'");
                    if ($check3->rowCount() > 0) {
                        $response = array(
                            'status' => 0,
                            'message' => 'Data already exist.',
                            'result' => array(
                                'name' => $name,
                                'invoice' => $invoice,
                                'time' => date('Y-m-d H:i:s')
                            )
                        );
                        http_response_code(503);
                        header('Content-Type: application/json');
                        echo json_encode($response);
                    } else {
                        $database->query("INSERT INTO `sentra_cash_request` VALUES (NULL, '$id', '$name', '$total', '$metod', '$fileurl', '2','$query','$invoice','', UNIX_TIMESTAMP())");
                        $response = array(
                            'status' => 1,
                            'message' => 'Success!',
                            'result' => array(
                                'name' => $name,
                                'invoice' => $invoice,
                                'query' => $query,
                                'time' => date('Y-m-d H:i:s')
                            )
                        );
                        http_response_code(200);
                        header('Content-Type: application/json');
                        echo json_encode($response);
                    }
                } else {
                    $response = array(
                        'status' => 0,
                        'message' => 'Data not found.' . $id,
                    );
                    http_response_code(503);
                    header('Content-Type: application/json');
                    echo json_encode($response);
                }
                exit;
                break;
            case 'addformAgenda':
                $query = post('agenda') . "-sEntra-" . md5(rand());
                $agenda = post('agenda');
                $date = post('date');
                $ket = post('catatan');
                $stat = post('status');
                $database->query("INSERT INTO `sentra_agenda` VALUES (NULL, '$agenda', '$query', '$ket', '$stat', '$date')");
                $response = array(
                    'status' => 1,
                    'message' => 'Success Added Data.',
                    'result' => array(
                        'agenda' => $query,
                        'date' => $date
                    )
                );
                http_response_code(200);
                header('Content-Type: application/json');
                echo json_encode($response);
                exit;
                break;
            default:
                echo "ERROR";
                break;
        }
    }

