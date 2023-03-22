<?php
require "../core/autoload.php";

use Shuchkin\SimpleXLSX;

require "excel.php";



if (!empty($_FILES['excelmsg']) && $_FILES['excelmsg']['error'] == UPLOAD_ERR_OK) {
    // Be sure we're dealing with an upload
    if (is_uploaded_file($_FILES['excelmsg']['tmp_name']) === false) {
        throw new \Exception('Error on upload: Invalid file definition');
    }

    // Rename the uploaded file
    $uploadName = $_FILES['excelmsg']['name'];
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
        echo "File type not allow
        http_response_code(503);ed";
        exit;
    }

    move_uploaded_file($_FILES['excelmsg']['tmp_name'], 'excel/' . $filename);
    // Insert it into our tracking along with the original name
    $file = "excel/" . $filename;
} else {
    $file = null;
}


if ($file == null) {
    http_response_code(503);
    echo "Format file not allowed";

    exit;
}

$a = post("a"); //3 start
$b = post("b"); //2 Phone
$c = post("c"); //4 Text

if ($a && $b && $c && $file) {
    $a = $a - 1;
    $b = $b - 1;
    $c = $c - 1;


    if ($xlsx = SimpleXLSX::parse($file)) {
        $i = 0;
        foreach ($xlsx->rows() as $elt) {
            if ($i >= $a) {
                $phone = $elt[$b];
                $text = $elt[$c];
                $sentra->sendMessageText($phone, $text);
            }
            $i++;
        }
    } else {
        $response = array(
            'status' => 0,
            'message' => 'Kesalahan parsing file',
        );
        http_response_code(503);
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }
    $response = array(
        'status' => 1,
        'message' => 'Success send message with excel file',
    );
    http_response_code(200);
    header('Content-Type: application/json');
    echo json_encode($response);
}
