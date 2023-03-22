<?php
class ServersEntra
{
    function __construct($ip_api)
    {
        $this->api = $ip_api;
    }

    // send Message
    function sendMessageText($to, $text)
    {

        $curl = curl_init();
        $url = $this->api . '/api/sendMessage/type/text';
        $body = [
            'phone' => $to,
            'text' => $text
        ];
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => http_build_query($body),
            CURLOPT_HTTPHEADER => array(
                'api_key: ' . API_KEY_SERVER,
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));

        $response = curl_exec($curl);
        return json_decode($response, true);
        curl_close($curl);
    }
    function sendMessageImage($to, $text, $typemsg, $link)
    {
        $curl = curl_init();
        if ($typemsg == 'url') {
            $url = $this->api . '/api/sendMessage/type/image';
            $body = [
                'phone' => $to,
                'text' => $text,
                'url' => $link
            ];
            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => http_build_query($body),
                CURLOPT_HTTPHEADER => array(
                    'api_key: ' . API_KEY_SERVER,
                    'Content-Type: application/x-www-form-urlencoded'
                ),
            ));
        } else if ($typemsg == 'file') {
            $url = $this->api . '/api/sendMessageMedia/image';
            $body = array(
                'phone' => $to,
                'text' => $text,
                'file' => new CURLFile($link['tmp_name'], $link['type'], $link['name'])
            );
            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => $body,
                CURLOPT_HTTPHEADER => array(
                    'api_key: ' . API_KEY_SERVER,
                    'Content-Type: multipart/form-data'
                ),
            ));
        } else {
            $url = $this->api . '/api/sendMessage/type/text';
            $body = [
                'phone' => $to,
                'text' => $text
            ];
            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => http_build_query($body),
                CURLOPT_HTTPHEADER => array(
                    'api_key: ' . API_KEY_SERVER,
                    'Content-Type: application/x-www-form-urlencoded'
                ),
            ));
        }
        $response = curl_exec($curl);
        return json_decode($response, true);
        curl_close($curl);
    }

    function sendMessageButton1($to, $text, $data, $value, $withmedia) // withmedia -> yes or no example 'yes.https://example.com/data.png'
    {
        $curl = curl_init();
        $url = $this->api . '/api/sendMessage/type/button';
        if (str_contains($withmedia, '.')) {
            $check = strpos($withmedia, ".");
            $link = substr($withmedia, $check + 1);
            $yesorno = substr($withmedia, 0, $check);
            if ($yesorno == 'yes') {
                $body = [
                    'phone' => $to,
                    'text' => $text,
                    'query' => '{
                    "button": [
                      { "data": "' . $data . '", "text": "' . $value . '" }
                    ],
                    "media": "yes",
                    "link": "' . $link . '"
                  }'
                ];
            } else if ($yesorno == 'no') {
                $body = [
                    'phone' => $to,
                    'text' => $text,
                    'query' => '{
                    "button": [
                      { "data": "' . $data . '", "text": "' . $value . '" }
                    ],
                    "media": "no",
                    "link": "https://example.com"
                  }'
                ];
            }
        } else {
            $body = [
                'phone' => $to,
                'text' => $text,
                'query' => '{
                "button": [
                  { "data": "' . $data . '", "text": "' . $value . '" }
                ],
                "media": "no",
                "link": "https://example.com"
              }'
            ];
        }
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => http_build_query($body),
            CURLOPT_HTTPHEADER => array(
                'api_key: ' . API_KEY_SERVER,
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));
        $response = curl_exec($curl);
        return json_decode($response, true);
        curl_close($curl);
    }
    function sendMessageButton2($to, $text, $data, $value, $data2, $value2, $withmedia)
    {
        $curl = curl_init();
        $url = $this->api . '/api/sendMessage/type/button';
        if (str_contains($withmedia, '.')) {
            $check = strpos($withmedia, ".");
            $link = substr($withmedia, $check + 1);
            $yesorno = substr($withmedia, 0, $check);
            if ($yesorno == 'yes') {
                $body = [
                    'phone' => $to,
                    'text' => $text,
                    'query' => '{
                    "button": [
                      { "data": "' . $data . '", "text": "' . $value . '" },
                      { "data": "' . $data2 . '", "text": "' . $value2 . '" }
                    ],
                    "media": "yes",
                    "link": "' . $link . '"
                  }'
                ];
            } else if ($yesorno == 'no') {
                $body = [
                    'phone' => $to,
                    'text' => $text,
                    'query' => '{
                    "button": [
                      { "data": "' . $data . '", "text": "' . $value . '" },
                      { "data": "' . $data2 . '", "text": "' . $value2 . '" }
                    ],
                    "media": "no",
                    "link": "https://example.com"
                  }'
                ];
            }
        } else {
            $body = [
                'phone' => $to,
                'text' => $text,
                'query' => '{
                "button": [
                  { "data": "' . $data . '", "text": "' . $value . '" },
                  { "data": "' . $data2 . '", "text": "' . $value2 . '" }
                ],
                "media": "no",
                "link": "https://example.com"
              }'
            ];
        }
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => http_build_query($body),
            CURLOPT_HTTPHEADER => array(
                'api_key: ' . API_KEY_SERVER,
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));
        $response = curl_exec($curl);
        return json_decode($response, true);
        curl_close($curl);
    }
    function sendMessageButton3($to, $text, $data, $value, $data2, $value2, $data3, $value3, $withmedia)
    {
        $curl = curl_init();
        $url = $this->api . '/api/sendMessage/type/button';
        if (str_contains($withmedia, '.')) {
            $check = strpos($withmedia, ".");
            $link = substr($withmedia, $check + 1);
            $yesorno = substr($withmedia, 0, $check);
            if ($yesorno == 'yes') {
                $body = [
                    'phone' => $to,
                    'text' => $text,
                    'query' => '{
                    "button": [
                      { "data": "' . $data . '", "text": "' . $value . '" },
                      { "data": "' . $data2 . '", "text": "' . $value2 . '" },
                      { "data": "' . $data3 . '", "text": "' . $value3 . '" }
                    ],
                    "media": "yes",
                    "link": "' . $link . '"
                  }'
                ];
            } else if ($yesorno == 'no') {
                $body = [
                    'phone' => $to,
                    'text' => $text,
                    'query' => '{
                    "button": [
                      { "data": "' . $data . '", "text": "' . $value . '" },
                      { "data": "' . $data2 . '", "text": "' . $value2 . '" },
                      { "data": "' . $data3 . '", "text": "' . $value3 . '" }
                    ],
                    "media": "no",
                    "link": "https://example.com"
                  }'
                ];
            }
        } else {
            $body = [
                'phone' => $to,
                'text' => $text,
                'query' => '{
                "button": [
                  { "data": "' . $data . '", "text": "' . $value . '" },
                  { "data": "' . $data2 . '", "text": "' . $value2 . '" },
                  { "data": "' . $data3 . '", "text": "' . $value3 . '" }
                ],
                "media": "no",
                "link": "https://example.com"
              }'
            ];
        }
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => http_build_query($body),
            CURLOPT_HTTPHEADER => array(
                'api_key: ' . API_KEY_SERVER,
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));
        $response = curl_exec($curl);
        return json_decode($response, true);
        curl_close($curl);
    }
    function sendMessageVCARD($to, $text, $fullname, $number, $org)
    {
        $curl = curl_init();
        $url = $this->api . '/api/sendMessage/type/vcard';
        $body = [
            'phone' => $to,
            'text' => $text,
            'query' => '{ "fullname": "' . $fullname . '", "number": "' . $number . '", "organization": "' . $org . '" }'
        ];
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => http_build_query($body),
            CURLOPT_HTTPHEADER => array(
                'api_key: ' . API_KEY_SERVER,
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));
        $response = curl_exec($curl);
        return json_decode($response, true);
        curl_close($curl);
    }
    function sendMessageLIST($to, $text, $query)
    {
        $curl = curl_init();
        $url = $this->api . '/api/sendMessage/type/list';
        $body = [
            'phone' => $to,
            'text' => $text,
            'query' => $query
        ];
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => http_build_query($body),
            CURLOPT_HTTPHEADER => array(
                'api_key: ' . API_KEY_SERVER,
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));
        $response = curl_exec($curl);
        return json_decode($response, true);
        curl_close($curl);
    }
    function sendMessagesFile($to, $text, $file)
    {
        $curl = curl_init();
        $body = array(
            'phone' => $to,
            'text' => $text,
            'file' => new CURLFile($file['tmp_name'], $file['type'], $file['name'])
        );
        $check = strpos($_FILES['file']['type'], "/");
        $check = substr($_FILES['file']['type'], 0, $check);
        $check = str_replace("application", "doc", $check);

        $url = $this->api . '/api/sendMessageMedia/' . $check;
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $body,
            CURLOPT_HTTPHEADER => array(
                'api_key: ' . API_KEY_SERVER,
                'Content-Type: multipart/form-data'
            ),
        ));

        $response = curl_exec($curl);
        return json_decode($response, true);
        curl_close($curl);
    }
    function sendMessagesGif($to, $text, $file)
    {
        $curl = curl_init();
        $body = array(
            'phone' => $to,
            'text' => $text,
            'file' => new CURLFile($file['tmp_name'], $file['type'], $file['name'])
        );
        $check = strpos($_FILES['file']['type'], "/");
        $check = substr($_FILES['file']['type'], 0, $check);
        if ($check == "video") {
            $url = $this->api . '/api/sendMessageMedia/gif';
            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => $body,
                CURLOPT_HTTPHEADER => array(
                    'api_key: ' . API_KEY_SERVER,
                    'Content-Type: multipart/form-data'
                ),
            ));
        } else {
            $response = array(
                'status' => false,
                'message' => 'Wrong mimetype select',
            );
            http_response_code(503);
            header('Content-Type: application/json');
        }
        $response = curl_exec($curl);
        return json_decode($response, true);
        curl_close($curl);
    }
    function sendMessagesSticker($to, $file)
    {
        $curl = curl_init();
        $body = array(
            'phone' => $to,
            'file' => new CURLFile($file['tmp_name'], $file['type'], $file['name'])
        );
        $check = strpos($_FILES['file']['type'], "/");
        $check = substr($_FILES['file']['type'], 0, $check);
        if ($check == "image") {
            $url = $this->api . '/api/sendMessageSticker';
            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => $body,
                CURLOPT_HTTPHEADER => array(
                    'api_key: ' . API_KEY_SERVER,
                    'Content-Type: multipart/form-data'
                ),
            ));
            $response = curl_exec($curl);
            return json_decode($response, true);
            curl_close($curl);
        } else {
            $response = array(
                'success' => false,
                'message' => 'Wrong mimetype select',
            );
            http_response_code(503);
            header('Content-Type: application/json');
            return json_encode($response);
        }
    }
    function addBOTtext($message, $text, $delay)
    {
        $curl = curl_init();
        $body = array(
            'message' => $message,
            'text' => $text,
            'delay' => $delay
        );

        $url = $this->api . '/api/add_autoreply/text';
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $body,
            CURLOPT_HTTPHEADER => array(
                'api_key: ' . API_KEY_SERVER,
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));

        $response = curl_exec($curl);
        return json_decode($response, true);
        curl_close($curl);
    }
    function addBOTreply($message, $text, $delay)
    {
        $curl = curl_init();
        $body = array(
            'message' => $message,
            'text' => $text,
            'delay' => $delay
        );

        $url = $this->api . '/api/add_autoreply/reply';
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $body,
            CURLOPT_HTTPHEADER => array(
                'api_key: ' . API_KEY_SERVER,
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));

        $response = curl_exec($curl);
        return json_decode($response, true);
        curl_close($curl);
    }
    function addBOTvcard($message, $text, $delay, $fullname, $number, $org)
    {
        $curl = curl_init();
        $body = array(
            'message' => $message,
            'text' => $text,
            'delay' => $delay,
            'array' => '{ "fn": "' . $fullname . '", "phone": "' . $number . '", "org": "' . $org . '" }'
        );

        $url = $this->api . '/api/add_autoreply/vcard';
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => http_build_query($body),
            CURLOPT_HTTPHEADER => array(
                'api_key: ' . API_KEY_SERVER,
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));

        $response = curl_exec($curl);
        return json_decode($response, true);
        curl_close($curl);
    }
    function addBOTimage($message, $text, $delay, $link)
    {
        $curl = curl_init();
        $body = array(
            'message' => $message,
            'text' => $text,
            'delay' => $delay,
            'array' => '{
                "url": "' . $link . '"
              }'
        );

        $url = $this->api . '/api/add_autoreply/image';
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => http_build_query($body),
            CURLOPT_HTTPHEADER => array(
                'api_key: ' . API_KEY_SERVER,
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));

        $response = curl_exec($curl);
        return json_decode($response, true);
        curl_close($curl);
    }
    function addBOTdoc($message, $text, $delay, $link, $filename, $type)
    {
        $curl = curl_init();
        $body = array(
            'message' => $message,
            'text' => $text,
            'delay' => $delay,
            'array' => '{
                "url": "' . $link . '",
                "filename": "' . $filename . '",
                "type": "' . $type . '"
              }'
        );

        $url = $this->api . '/api/add_autoreply/document';
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => http_build_query($body),
            CURLOPT_HTTPHEADER => array(
                'api_key: ' . API_KEY_SERVER,
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));

        $response = curl_exec($curl);
        return json_decode($response, true);
        curl_close($curl);
    }
    function addBOTButton1($message, $text, $delay, $data, $value, $withmedia) // withmedia -> yes or no example 'yes.https://example.com/data.png'
    {
        $curl = curl_init();
        if (str_contains($withmedia, '.')) {
            $check = strpos($withmedia, ".");
            $link = substr($withmedia, $check + 1);
            $yesorno = substr($withmedia, 0, $check);
            if ($yesorno == 'yes') {
                $url = $this->api . '/api/add_autoreply/buttonimage';
                $body = [
                    'message' => $message,
                    'text' => $text,
                    'delay' => $delay,
                    'array' => '{
                        "button": [
                          { "data": "' . $data . '", "text": "' . $value . '" }
                        ],
                        "media": "yes"
                      }',
                    'url' => $link

                ];
            } else if ($yesorno == 'no') {
                $url = $this->api . '/api/add_autoreply/button';
                $body = [
                    'message' => $message,
                    'text' => $text,
                    'delay' => $delay,
                    'array' => '{
                        "button": [
                          { "data": "' . $data . '", "text": "' . $value . '" }
                        ],
                        "media": "no"
                      }',
                    'url' => 'https://example.com'
                ];
            }
        } else {
            $url = $this->api . '/api/add_autoreply/button';
            $body = [
                'message' => $message,
                'text' => $text,
                'delay' => $delay,
                'array' => '{
                    "button": [
                      { "data": "' . $data . '", "text": "' . $value . '" }
                    ],
                    "media": "no"
                  }',
                'url' => 'https://example.com'
            ];
        }
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => http_build_query($body),
            CURLOPT_HTTPHEADER => array(
                'api_key: ' . API_KEY_SERVER,
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));
        $response = curl_exec($curl);
        return json_decode($response, true);
        curl_close($curl);
    }
    function addBOTButton2($message, $text, $delay, $data, $value, $data2, $value2, $withmedia)
    {
        $curl = curl_init();
        $url = $this->api . '/api/sendMessage/type/button';
        if (str_contains($withmedia, '.')) {
            $check = strpos($withmedia, ".");
            $link = substr($withmedia, $check + 1);
            $yesorno = substr($withmedia, 0, $check);
            if ($yesorno == 'yes') {
                $url = $this->api . '/api/add_autoreply/buttonimage';
                $body = [
                    'message' => $message,
                    'text' => $text,
                    'delay' => $delay,
                    'array' => '{
                        "button": [
                          { "data": "' . $data . '", "text": "' . $value . '" },
                          { "data": "' . $data2 . '", "text": "' . $value2 . '" }
                        ],
                        "media": "yes"
                      }',
                    'url' => $link
                ];
            } else if ($yesorno == 'no') {
                $url = $this->api . '/api/add_autoreply/button';
                $body = [
                    'message' => $message,
                    'text' => $text,
                    'delay' => $delay,
                    'array' => '{
                        "button": [
                          { "data": "' . $data . '", "text": "' . $value . '" },
                          { "data": "' . $data2 . '", "text": "' . $value2 . '" }
                        ],
                        "media": "no"
                      }',
                    'url' => 'https://example.com'
                ];
            }
        } else {
            $url = $this->api . '/api/add_autoreply/button';
            $body = [
                'message' => $message,
                'text' => $text,
                'delay' => $delay,
                'array' => '{
                    "button": [
                      { "data": "' . $data . '", "text": "' . $value . '" },
                      { "data": "' . $data2 . '", "text": "' . $value2 . '" }
                    ],
                    "media": "no"
                  }',
                'url' => 'https://example.com'
            ];
        }
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => http_build_query($body),
            CURLOPT_HTTPHEADER => array(
                'api_key: ' . API_KEY_SERVER,
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));
        $response = curl_exec($curl);
        return json_decode($response, true);
        curl_close($curl);
    }
    function addBOTButton3($message, $text,  $delay, $data, $value, $data2, $value2, $data3, $value3, $withmedia)
    {
        $curl = curl_init();
        $url = $this->api . '/api/sendMessage/type/button';
        if (str_contains($withmedia, '.')) {
            $check = strpos($withmedia, ".");
            $link = substr($withmedia, $check + 1);
            $yesorno = substr($withmedia, 0, $check);
            if ($yesorno == 'yes') {
                $url = $this->api . '/api/add_autoreply/buttonimage';
                $body = [
                    'message' => $message,
                    'text' => $text,
                    'delay' => $delay,
                    'array' => '{
                        "button": [
                          { "data": "' . $data . '", "text": "' . $value . '" },
                          { "data": "' . $data2 . '", "text": "' . $value2 . '" },
                          { "data": "' . $data3 . '", "text": "' . $value3 . '" }
                        ],
                        "media": "yes"
                      }',
                    'url' => $link
                ];
            } else if ($yesorno == 'no') {
                $url = $this->api . '/api/add_autoreply/button';
                $body = [
                    'message' => $message,
                    'text' => $text,
                    'delay' => $delay,
                    'array' => '{
                        "button": [
                          { "data": "' . $data . '", "text": "' . $value . '" },
                          { "data": "' . $data2 . '", "text": "' . $value2 . '" },
                          { "data": "' . $data3 . '", "text": "' . $value3 . '" }
                        ],
                        "media": "no"
                      }',
                    'url' => 'https://example.com'
                ];
            }
        } else {
            $url = $this->api . '/api/add_autoreply/button';
            $body = [
                'message' => $message,
                'text' => $text,
                'delay' => $delay,
                'array' => '{
                    "button": [
                      { "data": "' . $data . '", "text": "' . $value . '" },
                      { "data": "' . $data2 . '", "text": "' . $value2 . '" },
                      { "data": "' . $data3 . '", "text": "' . $value3 . '" }
                    ],
                    "media": "no"
                  }',
                'url' => 'https://example.com'
            ];
        }
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => http_build_query($body),
            CURLOPT_HTTPHEADER => array(
                'api_key: ' . API_KEY_SERVER,
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));
        $response = curl_exec($curl);
        return json_decode($response, true);
        curl_close($curl);
    }
    function addBOTlist($message, $text, $delay, $query)
    {
        $curl = curl_init();
        $body = array(
            'message' => $message,
            'text' => $text,
            'delay' => $delay,
            'array' => $query
        );

        $url = $this->api . '/api/add_autoreply/list';
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => http_build_query($body),
            CURLOPT_HTTPHEADER => array(
                'api_key: ' . API_KEY_SERVER,
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));

        $response = curl_exec($curl);
        return json_decode($response, true);
        curl_close($curl);
    }
    function uploadFILE($file)
    {
        $curl = curl_init();
        $body = array(
            'file' => new CURLFile($file['tmp_name'], $file['type'], $file['name'])
        );

        $url = $this->api . '/api/upload_file';
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $body,
            CURLOPT_HTTPHEADER => array(
                'api_key: ' . API_KEY_SERVER,
                'Content-Type: multipart/form-data'
            ),
        ));

        $response = curl_exec($curl);
        return json_decode($response, true);
        curl_close($curl);
    }
    // PUT
    function updateBOTmessage($id, $message, $text, $delay) // update data
    {
        $curl = curl_init();
        $body = array(
            "query" => "message='$message',text='$text',delay='$delay'",
        );

        $url = $this->api . '/api/update_table_rows/messages/' . $id;
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => http_build_query($body),
            CURLOPT_HTTPHEADER => array(
                'api_key: ' . API_KEY_SERVER,
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));

        $response = curl_exec($curl);
        return json_decode($response, true);
        curl_close($curl);
    }
    function deleteBOTmessage($id) // update data
    {
        $curl = curl_init();

        $url = $this->api . '/api/delete_autoreply/' . $id;
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            CURLOPT_HTTPHEADER => array(
                'api_key: APICLIENTID'
            ),
        ));

        $response = curl_exec($curl);
        return json_decode($response, true);
        curl_close($curl);
    }
}
