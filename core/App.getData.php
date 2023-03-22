<?php
require 'autoload.php';
//Type GET
$user = empty($_SESSION['username']) ? (!isset($_COOKIE['username']) ? redirect($domain . "auth/login") : $_COOKIE['username']) : $_SESSION['username'];
$type2 = get('type');
if (isset($type2)) {
    switch ($type2) {
        case 'data-project':
            $check = $database->query('SELECT * FROM sentra_project');
            if ($check->rowCount() > 0) {
                $data = $check->fetchAll(PDO::FETCH_ASSOC);
                $response = array(
                    'status' => 'success',
                    'result' => $data
                );
                http_response_code(200);
            } else {
                $response = array(
                    'status' => 'error',
                    'result' => 'No data found'
                );
                http_response_code(404);
            }
            header('Content-Type: application/json');
            echo json_encode($response);
            break;
        case 'data-member-byID':
            $id = get('id');
            $check = $database->query("SELECT * FROM users WHERE id IN ($id)");
            if ($check->rowCount() > 0) {
                $data = $check->fetchAll(PDO::FETCH_ASSOC);
                $response = array(
                    'status' => 'success',
                    'result' => $data
                );
                http_response_code(200);
            } else {
                $response = array(
                    'status' => 'error',
                    'result' => 'No data found'
                );
                http_response_code(404);
            }
            header('Content-Type: application/json');
            echo json_encode($response);
            break;
        case 'avatar-users-byID':
            $id = get('id');
            $check = $database->query("SELECT * FROM users WHERE id IN ($id)");
            if ($check->rowCount() > 0) {
                $data = $check->fetchAll(PDO::FETCH_ASSOC);
                $response = array(
                    'status' => 'success',
                    'result' => $data
                );
                http_response_code(200);
            } else {
                $response = array(
                    'status' => 'error',
                    'result' => 'No data found'
                );
                http_response_code(404);
            }
            header('Content-Type: application/json');
            echo json_encode($response);
            break;
    }
}
