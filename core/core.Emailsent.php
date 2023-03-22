<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\OAuth;
use League\OAuth2\Client\Provider\Google;

date_default_timezone_set('Asia/Jakarta');

//Load Composer's autoloader
require '../vendor/autoload.php';

class Mailer
{
    function __construct()
    {
        $this->server = new PHPMailer(true);
    }
    function templateResetPassword($name, $avatar, $href)
    {
        return '<!doctype html>
        <html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
        
        <head>
            <title>
                Email from Spanel | sEntra Panel
            </title>
            <!--[if !mso]><!-- -->
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <!--<![endif]-->
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <style type="text/css">
                #outlook a {
                    padding: 0;
                }
        
                .ReadMsgBody {
                    width: 100%;
                }
        
                .ExternalClass {
                    width: 100%;
                }
        
                .ExternalClass * {
                    line-height: 100%;
                }
        
                body {
                    margin: 0;
                    padding: 0;
                    -webkit-text-size-adjust: 100%;
                    -ms-text-size-adjust: 100%;
                }
        
                table,
                td {
                    border-collapse: collapse;
                }
        
                img {
                    border: 0;
                    height: auto;
                    line-height: 100%;
                    outline: none;
                    text-decoration: none;
                    -ms-interpolation-mode: bicubic;
                }
        
                p {
                    display: block;
                    margin: 13px 0;
                }
            </style>
            <!--[if !mso]><!-->
            <style type="text/css">
                @media only screen and (max-width:480px) {
                    @-ms-viewport {
                        width: 320px;
                    }
        
                    @viewport {
                        width: 320px;
                    }
                }
            </style>
            <!--<![endif]-->
            <!--[if mso]>
                <xml>
                <o:OfficeDocumentSettings>
                  <o:AllowPNG/>
                  <o:PixelsPerInch>96</o:PixelsPerInch>
                </o:OfficeDocumentSettings>
                </xml>
                <![endif]-->
            <!--[if lte mso 11]>
                <style type="text/css">
                  .outlook-group-fix { width:100% !important; }
                </style>
                <![endif]-->
        
        
            <style type="text/css">
                @media only screen and (min-width:480px) {
                    .mj-column-per-100 {
                        width: 100% !important;
                    }
                }
            </style>
        
        
            <style type="text/css">
            </style>
        
        </head>
        
        <body style="background-color:#f9f9f9;">
        
        
            <div style="background-color:#f9f9f9;">
        
        
                <!--[if mso | IE]>
              <table
                 align="center" border="0" cellpadding="0" cellspacing="0" style="width:600px;" width="600"
              >
                <tr>
                  <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
              <![endif]-->
        
        
                <div style="background:#f9f9f9;background-color:#f9f9f9;Margin:0px auto;max-width:600px;">
        
                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#f9f9f9;background-color:#f9f9f9;width:100%;">
                        <tbody>
                            <tr>
                                <td style="border-bottom:#333957 solid 5px;direction:ltr;font-size:0px;padding:20px 0;text-align:center;vertical-align:top;">
                                    <!--[if mso | IE]>
                          <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                        
                <tr>
              
                </tr>
              
                          </table>
                        <![endif]-->
                                </td>
                            </tr>
                        </tbody>
                    </table>
        
                </div>
        
        
                <!--[if mso | IE]>
                  </td>
                </tr>
              </table>
              
              <table
                 align="center" border="0" cellpadding="0" cellspacing="0" style="width:600px;" width="600"
              >
                <tr>
                  <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
              <![endif]-->
        
        
                <div style="background:#fff;background-color:#fff;Margin:0px auto;max-width:600px;">
        
                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#fff;background-color:#fff;width:100%;">
                        <tbody>
                            <tr>
                                <td style="border:#dddddd solid 1px;border-top:0px;direction:ltr;font-size:0px;padding:20px 0;text-align:center;vertical-align:top;">
                                    <!--[if mso | IE]>
                          <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                        
                <tr>
              
                    <td
                       style="vertical-align:bottom;width:600px;"
                    >
                  <![endif]-->
        
                                    <div class="mj-column-per-100 outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:bottom;width:100%;">
        
                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:bottom;" width="100%">
        
                                            <tr>
                                                <td align="center" style="font-size:0px;padding:10px 25px;word-break:break-word;background-color:#5e0000">
        
                                                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;border-spacing:0px;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="width:200px;">
        
                                                                    <img height="auto" src="https://sentrawidyatama.my.id/assets/images/spanel-logo.png" style="border:0;display:block;outline:none;text-decoration:none;width:100%;" width="150" />
        
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
        
                                                </td>
                                            </tr>
        
                                            <tr>
                                                <td align="center" style="font-size:0px;padding:10px 25px;padding-bottom:40px;word-break:break-word;">
        
                                                    <div style="font-family:Helvetica Neue,Arial,sans-serif;font-size:38px;font-weight:bold;line-height:1;text-align:center;color:#555;">
        
                                                    </div>
        
                                                </td>
                                            </tr>
        
                                            <tr>
                                                <td align="center" style="font-size:0px;padding:10px 25px;word-break:break-word;">
        
                                                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;border-spacing:0px;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="width:128px;">
        
                                                                    <img height="auto" src="' . $avatar . '" style="border:0;display:block;outline:none;text-decoration:none;width:100%;" width="128" />
        
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
        
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="font-size:0px;padding:10px 25px;padding-bottom:30px;word-break:break-word;">
        
                                                    <div style="font-family:Helvetica Neue,Arial,sans-serif;font-size:16px;line-height:1;color:#555;">
                                                        <p>Hay ' . $name . '!,</p>
                                                        <p>Silahkan klik tombol reset di bawah ini untuk melakukan reset password atau jika tidak berfungsi, silahkan untuk salin link yang tertera di bawah</p>
                                                    </div>
        
                                                </td>
                                            </tr>
        
        
                                            <tr>
                                                <td align="center" style="font-size:0px;word-break:break-word;">
                                                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="padding-bottom:40px;border-collapse:separate;line-height:100%;">
                                                        <tr>
                                                            <td align="center" bgcolor="#2F67F6" role="presentation" valign="middle">
                                                                <a href="' . $href . '" style="padding:15px 25px;background:#2F67F6;color:#ffffff;font-family:Helvetica Neue,Arial,sans-serif;font-size:15px;font-weight:normal;line-height:120%;Margin:0;text-decoration:none;text-transform:none;">
                                                                    Reset Password
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </table>
        
                                                </td>
                                            </tr>
        
                                            <tr>
                                                <td style="font-size:0px;padding:10px 25px;padding-bottom:50px;word-break:break-word;">
        
                                                    <div style="font-family:Helvetica Neue,Arial,sans-serif;font-size:15px;line-height:1;color:#555;">
                                                        <a href="' . $href . '">' . $href . '</a>
                                                    </div>
        
                                                </td>
                                            </tr>
        
                                            <tr>
                                                <td align="center" style="font-size:0px;padding:10px 25px;padding-bottom:40px;word-break:break-word;">
        
                                                    <div style="font-family:Helvetica Neue,Arial,sans-serif;font-size:14px;line-height:20px;text-align:center;color:#7F8FA4;">
                                                        <hr>
                                                        <i>Jika Anda tidak membuat permintaan ini, abaikan saja email ini. Jika tidak, silakan klik tombol di atas untuk mengatur ulang kata sandi Anda.</i>
                                                    </div>
        
                                                </td>
                                            </tr>
        
                                        </table>
        
                                    </div>
        
                                    <!--[if mso | IE]>
                    </td>
                  
                </tr>
              
                          </table>
                        <![endif]-->
                                </td>
                            </tr>
                        </tbody>
                    </table>
        
                </div>
        
        
                <!--[if mso | IE]>
                  </td>
                </tr>
              </table>
              
              <table
                 align="center" border="0" cellpadding="0" cellspacing="0" style="width:600px;" width="600"
              >
                <tr>
                  <td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;">
              <![endif]-->
        
        
                <div style="Margin:0px auto;max-width:600px;">
        
                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
                        <tbody>
                            <tr>
                                <td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;vertical-align:top;">
                                    <!--[if mso | IE]>
                          <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                        
                <tr>
              
                    <td
                       style="vertical-align:bottom;width:600px;"
                    >
                  <![endif]-->
        
                                    <div class="mj-column-per-100 outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:bottom;width:100%;">
        
                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%">
                                            <tbody>
                                                <tr>
                                                    <td style="vertical-align:bottom;padding:0;">
        
                                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%">
        
                                                            <tr>
                                                                <td align="center" style="font-size:0px;padding:0;word-break:break-word;">
        
                                                                    <div style="font-family:Helvetica Neue,Arial,sans-serif;font-size:12px;font-weight:300;line-height:1;text-align:center;color:#575757;">
                                                                        Copyright 2022 © <a href="https://sentrawidyatama.my.id" style="color:#575757;text-decoration:none;">Spanel | Panelnya anak sEntra</a>
                                                                    </div>
        
                                                                </td>
                                                            </tr>
                                                        </table>
        
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
        
                                    </div>
        
                                    <!--[if mso | IE]>
                    </td>
                  
                </tr>
              
                          </table>
                        <![endif]-->
                                </td>
                            </tr>
                        </tbody>
                    </table>
        
                </div>
        
        
                <!--[if mso | IE]>
                  </td>
                </tr>
              </table>
              <![endif]-->
        
        
            </div>
        
        </body>
        
        </html>';
    }
    function templatetext($text)
    {
        return '<!DOCTYPE html>
        <html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
        
        <head>
            <title>Email from sEntra UTAMA</title>
            <!--[if !mso]><!-- -->
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <!--<![endif]-->
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1" />
            <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.9.96/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
            <style type="text/css">
                #outlook a {
                    padding: 0;
                }
        
                body {
                    margin: 0;
                    padding: 0;
                    -webkit-text-size-adjust: 100%;
                    -ms-text-size-adjust: 100%;
                }
        
                table,
                td {
                    border-collapse: collapse;
                }
        
                img {
                    border: 0;
                    height: auto;
                    line-height: 100%;
                    outline: none;
                    text-decoration: none;
                    -ms-interpolation-mode: bicubic;
                }
        
                p {
                    display: block;
                    margin: 13px 0;
                }
        
                .btn-href:hover {
                    box-shadow: 2px 3px 7px 0px rgba(0, 0, 0, 0.75);
                    -webkit-box-shadow: 2px 3px 7px 0px rgba(0, 0, 0, 0.75);
                    -moz-box-shadow: 2px 3px 7px 0px rgba(0, 0, 0, 0.75);
                    border-radius: 10px;
                }
            </style>
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Island+Moments&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Shalimar&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700" rel="stylesheet" type="text/css" />
            <style type="text/css">
                @import url(https://fonts.googleapis.com/css?family=Roboto:100,300,400,700);
            </style>
            <!--<![endif]-->
            <style type="text/css">
                @media only screen and (min-width: 480px) {
                    .mj-column-per-100 {
                        width: 100% !important;
                        max-width: 100%;
                    }
                }
            </style>
            <style type="text/css">
                @media only screen and (max-width: 480px) {
                    table.mj-full-width-mobile {
                        width: 100% !important;
                    }
        
                    td.mj-full-width-mobile {
                        width: auto !important;
                    }
                }
            </style>
            <style type="text/css">
                a,
                span,
                td,
                th {
                    -webkit-font-smoothing: antialiased !important;
                    -moz-osx-font-smoothing: grayscale !important;
                }
            </style>
        </head>
        
        <body style="background-color: #f3f3f5">
            <div style="display: none;font-size: 1px;color: #ffffff;line-height: 1px;max-height: 0px;max-width: 0px;opacity: 0;overflow: hidden;"> Preview - Email from sEntra UTAMA </div>
            <div style="background-color: #f3f3f5">
                <div style="margin: 0px auto; max-width: 600px">
                    <table align="center" border="1" cellpadding="0" cellspacing="0" role="presentation" style="width: 100%">
                        <tbody>
        
                            <!-- <tr>
                                <td style=" direction: ltr; font-size: 0px; text-align: center;      ">
                                    <div class="mj-column-per-100 mj-outlook-group-fix" style=" font-size: 0px; text-align: left; direction: ltr; display: inline-block; vertical-align: top; width: 100%; ">
                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align: top" width="100%">
                                            <tr>
                                                <td style="font-size: 0px; word-break: break-word">
                                                    <div style="height: 20px">&nbsp;</div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
                <div style="background: #930000;background-color: #930000;margin: 0px auto;border-radius: 4px 4px 0 0;max-width: 600px;">
                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background: #930000;  background-color: #930000;  width: 100%;  border-radius: 4px 4px 0 0;  margin-top: 20px;">
                        <tbody>
                            <tr>
                                <td align="center" style=" font-size: 0px; padding: 10px 0; word-break: break-word;background-color:#f3f3f5   ">
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="   border-collapse: collapse;   border-spacing: 0px; ">
                                        <tbody>
                                            <tr>
                                                <td style="width: 100px"> <img height="auto" src="https://sentrawidyatama.my.id/assets/images/logo_sentra.png" style=" border: 0;display: block;outline: none;text-decoration: none;height: auto;width: 100%;font-size: 13px;" /> </td>
                                                <td style="width: 200px"> <img height="auto" src="https://www.widyatama.ac.id/wp-content/uploads/2015/02/logoutama-1.png" style=" border: 0;display: block;outline: none;text-decoration: none;height: auto;width: 100%;font-size: 13px;" /> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" style=" font-size: 0px; word-break: break-word;    ">
                                    <h3 style="color:#fff;font-size:20px;text-align:center;margin-bottom:-10px">Pers Kampus Mahasiswa sEntra</h3>
                                    <h3 style="color:#fff;font-size:20px;text-align:center;">UNIVERSITAS WIDYATAMA</h3>
                                    <hr style="color:#f3f3f5">
                                </td>
                            </tr>
                            <tr>
                                <td style=" direction: ltr; font-size: 0px; padding: 20px 0; text-align: center;      ">
                                    <div style="margin: 0px auto; max-width: 600px">
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width: 100%">
                                            <tbody>
        
                                                <tr>
                                                    <td style="direction: ltr;font-size: 0px;padding: 0px;text-align: center;       ">
                                                        <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size: 0px;text-align: left;direction: ltr;display: inline-block;vertical-align: top;width: 100%;">
                                                            <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align: top" width="100%">
                                                                <!-- Subject     -->
                                                                <!--  <tr> 
                                                                    <td align="left" style=" font-size: 0px; word-break: break-word;">
                                                                        <div style="   font-family: Roboto, Helvetica, Arial,     sans-serif;   font-size: 14px;   font-weight: 400;   line-height: 20px;   text-align: left;   color: #ffffff; ">
                                                                            <h3 style="color:#fff;font-size:20px;text-align:center">Pers Kampus Mahasiswa sEntra</h3>
                                                                        </div>
                                                                    </td>
                                                                </tr> -->
                                                                <tr>
                                                                    <td align="left" style=" font-size: 0px; padding: 10px 25px; word-break: break-word;    ">
                                                                        <div style="font-family: ‘Open Sans’, Arial, sans-serif !important;   font-size: 14px;   font-weight: 400;   line-height: 20px;   text-align: left;   color: #ffffff; ">
                                                                           ' . $text . '
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div style="margin: 0px auto; max-width: 600px">
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width: 100%">
                                            <tbody>
                                                <tr>
                                                    <td style="direction: ltr;font-size: 0px;padding: 10px 20px;text-align: center;       ">
                                                        <!-- <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size: 0px;text-align: left;direction: ltr;display: inline-block;vertical-align: top;width: 100%;">
                                                            <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%">
                                                                <tbody>
                                                                    <tr>
                                                                        <td style="   background-color: #5f646c;   border-radius: 3px 3px 0px 0px;   vertical-align: top;   padding: 10px 0; ">
                                                                            <table border="0" cellpadding="0" cellspacing="0" role="presentation" style width="100%">
                                                                                <tr>
                                                                                    <td align="left" style="font-size: 0px;padding: 10px 25px;word-break: break-word;       ">
                                                                                        <div style="font-family: Roboto, Helvetica,  Arial, sans-serif;font-size: 16px;font-weight: 400;line-height: 20px;text-align: left;color: #ffffff;">
                                                                                            <p style="margin: 0"> <strong>When:</strong> Sun, Aug 4, 2019, 11:40 AM EDT</p>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
        
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div> -->
                                                        <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size: 0px;text-align: left;direction: ltr;display: inline-block;vertical-align: top;width: 100%;">
                                                            <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%">
                                                                <tbody>
                                                                    <tr>
                                                                        <td style="   background-color: #5f646c;   border-radius: 0px 0px 3px 3px;   vertical-align: top; ">
                                                                            <table border="0" cellpadding="0" cellspacing="0" role="presentation" style width="100%">
                                                                                <tr>
                                                                                    <td style="font-size: 0px;padding: 10px 25px;word-break: break-word;       ">
                                                                                        <p style="border-top: dashed 1px lightgrey;font-size: 1px;margin: 0px auto;width: 100%;"></p>
                                                                                    </td>
                                                                                </tr>
        
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
        
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div style="background: #ffffff;background-color: #ffffff;margin: 0px auto;border-radius: 0 0 4px 4px;max-width: 600px;">
                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="  background: #ffffff;  background-color: #ffffff;  width: 100%;  border-radius: 0 0 4px 4px;">
                        <tbody>
                            <tr>
                                <td style=" direction: ltr; font-size: 0px; padding: 20px 0; text-align: center;      ">
                                    <div class="mj-column-per-100 mj-outlook-group-fix" style=" font-size: 0px; text-align: left; direction: ltr; display: inline-block; vertical-align: top; width: 100%; ">
                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align: top" width="100%">
                                            <tr>
                                                <td align="center" style="       font-size: 0px;       padding: 10px 25px;       word-break: break-word;     ">
                                                    <div style="font-family: Roboto, Helvetica, Arial, sans-serif;font-size: 14px;font-weight: 400;line-height: 20px;text-align: center;color: #93999f;       ">
                                                        <h3 style="color: #f90808;font-family: Shalimar, cursive;font-size:20px"> PKM sEntra Universitas Widyatama </h3>
                                                        <p style="font-size: 12px; margin-top: -15px"> Jl. Cikutra 204A Universitas Widyatama, Gedung PKM Lt.3 Ruang 11 </p> <i class="mdi mdi-email" style="color: #888888"></i> <a class="footer-link" href="mailto:sentrawidyatama@gmail.com" style="color: #2e58ff; text-decoration: none" target="_blank">sentrawidyatama@gmail.com</a> | <i class="mdi mdi-whatsapp" style="color: #00b72b"></i> <a class="footer-link" href="https://api.whatsapp.com/send/?phone=6282123232688" target="_blank" style="color: #2e58ff; text-decoration: none">6282123232688</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" style="       font-size: 0px;       padding: 10px 25px;       word-break: break-word;     ">
                                                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="float: none; display: inline-table">
                                                        <tr>
                                                            <td style="padding: 4px">
                                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-radius: 3px; width: 24px">
                                                                    <tr>
                                                                        <td style="   font-size: 0;   height: 24px;   vertical-align: middle;   width: 24px; "> <a href="https://twitter.com/sentrawidyatama" target="_blank" style="     color: #2e58ff;     text-decoration: none;   "> <img alt="twitter-logo" height="24" src="https://sentrawidyatama.my.id/assets/images/twitter-logo-transparent.png" style="       border-radius: 3px;       display: block;     " width="24" /> </a></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="float: none; display: inline-table">
                                                        <tr>
                                                            <td style="padding: 4px">
                                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-radius: 3px; width: 24px">
                                                                    <tr>
                                                                        <td style="   font-size: 0;   height: 24px;   vertical-align: middle;   width: 24px; "> <a href="https://www.facebook.com/100067901605846" target="_blank" style="     color: #2e58ff;     text-decoration: none;   "> <img alt="facebook-logo" height="24" src="https://sentrawidyatama.my.id/assets/images/facebook-logo-transparent.png" style="       border-radius: 3px;       display: block;     " width="24" /> </a></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="float: none; display: inline-table">
                                                        <tr>
                                                            <td style="padding: 4px">
                                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-radius: 3px; width: 24px">
                                                                    <tr>
                                                                        <td style="   font-size: 0;   height: 24px;   vertical-align: middle;   width: 24px; "> <a href="https://www.instagram.com/sentra_utama/" target="_blank" style="     color: #2e58ff;     text-decoration: none;   "> <img alt="instagram-logo" height="24" src="https://sentrawidyatama.my.id/assets/images/insta-logo-transparent.png" style="       border-radius: 3px;       display: block;     " width="24" /> </a></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="float: none; display: inline-table">
                                                        <tr>
                                                            <td style="padding: 4px">
                                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-radius: 3px; width: 24px">
                                                                    <tr>
                                                                        <td style="   font-size: 0;   height: 24px;   vertical-align: middle;   width: 24px; "> <a href="https://www.youtube.com/c/sEntraUTAMA/" target="_blank" style="     color: #2e58ff;     text-decoration: none;   "> <img alt="youtube-logo" height="24" src="https://sentrawidyatama.my.id/assets/images/youtube-logo-transparent.png" style="       border-radius: 3px;       display: block;     " width="24" /> </a></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div style="margin: 0px auto; max-width: 600px">
                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width: 100%">
                        <tbody>
                            <tr>
                                <td style=" direction: ltr; font-size: 0px; padding: 20px 0; text-align: center;      ">
                                    <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size: 0px;text-align: left;direction: ltr;display: inline-block;vertical-align: top; width: 100%; ">
                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align: top" width="100%">
                                            <tr>
                                                <td style="font-size: 0px; word-break: break-word">
                                                    <div style="height: 1px">&nbsp;</div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </body>
        
        </html>';
    }
    function templateWithbutton($text, $href, $hrefname)
    {
        return '<!DOCTYPE html>
        <html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
        
        <head>
            <title>Email from sEntra UTAMA</title>
            <!--[if !mso]><!-- -->
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <!--<![endif]-->
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1" />
            <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.9.96/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
            <style type="text/css">
                #outlook a {
                    padding: 0;
                }
        
                body {
                    margin: 0;
                    padding: 0;
                    -webkit-text-size-adjust: 100%;
                    -ms-text-size-adjust: 100%;
                }
        
                table,
                td {
                    border-collapse: collapse;
                }
        
                img {
                    border: 0;
                    height: auto;
                    line-height: 100%;
                    outline: none;
                    text-decoration: none;
                    -ms-interpolation-mode: bicubic;
                }
        
                p {
                    display: block;
                    margin: 13px 0;
                }
        
                .btn-href:hover {
                    box-shadow: 2px 3px 7px 0px rgba(0, 0, 0, 0.75);
                    -webkit-box-shadow: 2px 3px 7px 0px rgba(0, 0, 0, 0.75);
                    -moz-box-shadow: 2px 3px 7px 0px rgba(0, 0, 0, 0.75);
                    border-radius: 10px;
                }
            </style>
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Island+Moments&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Shalimar&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700" rel="stylesheet" type="text/css" />
            <style type="text/css">
                @import url(https://fonts.googleapis.com/css?family=Roboto:100,300,400,700);
            </style>
            <!--<![endif]-->
            <style type="text/css">
                @media only screen and (min-width: 480px) {
                    .mj-column-per-100 {
                        width: 100% !important;
                        max-width: 100%;
                    }
                }
            </style>
            <style type="text/css">
                @media only screen and (max-width: 480px) {
                    table.mj-full-width-mobile {
                        width: 100% !important;
                    }
        
                    td.mj-full-width-mobile {
                        width: auto !important;
                    }
                }
            </style>
            <style type="text/css">
                a,
                span,
                td,
                th {
                    -webkit-font-smoothing: antialiased !important;
                    -moz-osx-font-smoothing: grayscale !important;
                }
            </style>
        </head>
                
                <body style="background-color: #f3f3f5">
                    <div style="display: none;font-size: 1px;color: #ffffff;line-height: 1px;max-height: 0px;max-width: 0px;opacity: 0;overflow: hidden;"> Preview - Email from sEntra UTAMA </div>
                    <div style="background-color: #f3f3f5">
                        <div style="margin: 0px auto; max-width: 600px">
                            <table align="center" border="1" cellpadding="0" cellspacing="0" role="presentation" style="width: 100%">
                                <tbody>
                
                                    <!-- <tr>
                                        <td style=" direction: ltr; font-size: 0px; text-align: center;      ">
                                            <div class="mj-column-per-100 mj-outlook-group-fix" style=" font-size: 0px; text-align: left; direction: ltr; display: inline-block; vertical-align: top; width: 100%; ">
                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align: top" width="100%">
                                                    <tr>
                                                        <td style="font-size: 0px; word-break: break-word">
                                                            <div style="height: 20px">&nbsp;</div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                        <div style="background: #930000;background-color: #930000;margin: 0px auto;border-radius: 4px 4px 0 0;max-width: 600px;">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background: #930000;  background-color: #930000;  width: 100%;  border-radius: 4px 4px 0 0;  margin-top: 20px;">
                                <tbody>
                                    <tr>
                                        <td align="center" style=" font-size: 0px; padding: 10px 0; word-break: break-word;background-color:#f3f3f5   ">
                                            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="   border-collapse: collapse;   border-spacing: 0px; ">
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 100px"> <img height="auto" src="https://sentrawidyatama.my.id/assets/images/logo_sentra.png" style=" border: 0;display: block;outline: none;text-decoration: none;height: auto;width: 100%;font-size: 13px;" /> </td>
                                                        <td style="width: 200px"> <img height="auto" src="https://www.widyatama.ac.id/wp-content/uploads/2015/02/logoutama-1.png" style=" border: 0;display: block;outline: none;text-decoration: none;height: auto;width: 100%;font-size: 13px;" /> </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" style=" font-size: 0px; word-break: break-word;    ">
                                            <h3 style="color:#fff;font-size:20px;text-align:center;margin-bottom:-10px">Pers Kampus Mahasiswa sEntra</h3>
                                            <h3 style="color:#fff;font-size:20px;text-align:center;">UNIVERSITAS WIDYATAMA</h3>
                                            <hr style="color:#f3f3f5">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style=" direction: ltr; font-size: 0px; padding: 20px 0; text-align: center;      ">
                                            <div style="margin: 0px auto; max-width: 600px">
                                                <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width: 100%">
                                                    <tbody>
                
                                                        <tr>
                                                            <td style="direction: ltr;font-size: 0px;padding: 0px;text-align: center;       ">
                                                                <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size: 0px;text-align: left;direction: ltr;display: inline-block;vertical-align: top;width: 100%;">
                                                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align: top" width="100%">
                                                                        <!-- Subject     -->
                                                                        <!--  <tr> 
                                                                            <td align="left" style=" font-size: 0px; word-break: break-word;">
                                                                                <div style="   font-family: Roboto, Helvetica, Arial,     sans-serif;   font-size: 14px;   font-weight: 400;   line-height: 20px;   text-align: left;   color: #ffffff; ">
                                                                                    <h3 style="color:#fff;font-size:20px;text-align:center">Pers Kampus Mahasiswa sEntra</h3>
                                                                                </div>
                                                                            </td>
                                                                        </tr> -->
                                                                        <tr>
                                                                            <td align="left" style=" font-size: 0px; padding: 10px 25px; word-break: break-word;    ">
                                                                                <div style="font-family: ‘Open Sans’, Arial, sans-serif !important;   font-size: 14px;   font-weight: 400;   line-height: 20px;   text-align: left;   color: #ffffff; ">
                                                                                  ' . $text . '
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div style="margin: 0px auto; max-width: 600px">
                                                <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width: 100%">
                                                    <tbody>
                                                        <tr>
                                                            <td style="direction: ltr;font-size: 0px;padding: 10px 20px;text-align: center;       ">
                                                                <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size: 0px;text-align: left;direction: ltr;display: inline-block;vertical-align: top;width: 100%;">
                                                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%">
                                                                        <tbody>
                                                                            <tr>
                                                                                <!-- <td style="   background-color: #5f646c;   border-radius: 3px 3px 0px 0px;   vertical-align: top;   padding: 10px 0; ">
                                                                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" style width="100%">
                                                                                        <tr>
                                                                                            <td align="left" style="font-size: 0px;padding: 10px 25px;word-break: break-word;       ">
                                                                                                <div style="font-family: Roboto, Helvetica,  Arial, sans-serif;font-size: 16px;font-weight: 400;line-height: 20px;text-align: left;color: #ffffff;">
                                                                                                    <p style="margin: 0"> <strong>When:</strong> Sun, Aug 4, 2019, 11:40 AM EDT</p>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </td> -->
                                                                                <td align="left" style=" font-size: 0px; padding: 10px 25px; word-break: break-word;    ">
                                                                                    <div style="font-family: Roboto, Helvetica, Arial,     sans-serif;   font-size: 14px;   font-weight: 400;   line-height: 20px;   text-align: left;   color: #ffffff; ">
                                                                                        <a href="' . $href . '" class="btn-href" style="width:150px;height:20px;background:#2e58ff;padding:10px 20px 10px 20px;text-align:center;margin:auto;display:block;text-decoration:none;color:#f3f3f5;">' . $hrefname . '</a>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <!-- <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size: 0px;text-align: left;direction: ltr;display: inline-block;vertical-align: top;width: 100%;">
                                                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="   background-color: #5f646c;   border-radius: 0px 0px 3px 3px;   vertical-align: top; ">
                                                                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" style width="100%">
                                                                                        <tr>
                                                                                            <td style="font-size: 0px;padding: 10px 25px;word-break: break-word;       ">
                                                                                                <p style="border-top: dashed 1px lightgrey;font-size: 1px;margin: 0px auto;width: 100%;"></p>
                                                                                            </td>
                                                                                        </tr>
                
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div> -->
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div style="background: #ffffff;background-color: #ffffff;margin: 0px auto;border-radius: 0 0 4px 4px;max-width: 600px;">
                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="  background: #ffffff;  background-color: #ffffff;  width: 100%;  border-radius: 0 0 4px 4px;">
                        <tbody>
                            <tr>
                                <td style=" direction: ltr; font-size: 0px; padding: 20px 0; text-align: center;      ">
                                    <div class="mj-column-per-100 mj-outlook-group-fix" style=" font-size: 0px; text-align: left; direction: ltr; display: inline-block; vertical-align: top; width: 100%; ">
                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align: top" width="100%">
                                            <tr>
                                                <td align="center" style="       font-size: 0px;       padding: 10px 25px;       word-break: break-word;     ">
                                                    <div style="font-family: Roboto, Helvetica, Arial, sans-serif;font-size: 14px;font-weight: 400;line-height: 20px;text-align: center;color: #93999f;       ">
                                                        <h3 style="color: #f90808;font-family: Shalimar, cursive;font-size:20px"> PKM sEntra Universitas Widyatama </h3>
                                                        <p style="font-size: 12px; margin-top: -15px"> Jl. Cikutra 204A Universitas Widyatama, Gedung PKM Lt.3 Ruang 11 </p> <i class="mdi mdi-email" style="color: #888888"></i> <a class="footer-link" href="mailto:sentrawidyatama@gmail.com" style="color: #2e58ff; text-decoration: none" target="_blank">sentrawidyatama@gmail.com</a> | <i class="mdi mdi-whatsapp" style="color: #00b72b"></i> <a class="footer-link" href="https://api.whatsapp.com/send/?phone=6282123232688" target="_blank" style="color: #2e58ff; text-decoration: none">6282123232688</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" style="       font-size: 0px;       padding: 10px 25px;       word-break: break-word;     ">
                                                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="float: none; display: inline-table">
                                                        <tr>
                                                            <td style="padding: 4px">
                                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-radius: 3px; width: 24px">
                                                                    <tr>
                                                                        <td style="   font-size: 0;   height: 24px;   vertical-align: middle;   width: 24px; "> <a href="https://twitter.com/sentrawidyatama" target="_blank" style="     color: #2e58ff;     text-decoration: none;   "> <img alt="twitter-logo" height="24" src="https://sentrawidyatama.my.id/assets/images/twitter-logo-transparent.png" style="       border-radius: 3px;       display: block;     " width="24" /> </a></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="float: none; display: inline-table">
                                                        <tr>
                                                            <td style="padding: 4px">
                                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-radius: 3px; width: 24px">
                                                                    <tr>
                                                                        <td style="   font-size: 0;   height: 24px;   vertical-align: middle;   width: 24px; "> <a href="https://www.facebook.com/100067901605846" target="_blank" style="     color: #2e58ff;     text-decoration: none;   "> <img alt="facebook-logo" height="24" src="https://sentrawidyatama.my.id/assets/images/facebook-logo-transparent.png" style="       border-radius: 3px;       display: block;     " width="24" /> </a></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="float: none; display: inline-table">
                                                        <tr>
                                                            <td style="padding: 4px">
                                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-radius: 3px; width: 24px">
                                                                    <tr>
                                                                        <td style="   font-size: 0;   height: 24px;   vertical-align: middle;   width: 24px; "> <a href="https://www.instagram.com/sentra_utama/" target="_blank" style="     color: #2e58ff;     text-decoration: none;   "> <img alt="instagram-logo" height="24" src="https://sentrawidyatama.my.id/assets/images/insta-logo-transparent.png" style="       border-radius: 3px;       display: block;     " width="24" /> </a></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="float: none; display: inline-table">
                                                        <tr>
                                                            <td style="padding: 4px">
                                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-radius: 3px; width: 24px">
                                                                    <tr>
                                                                        <td style="   font-size: 0;   height: 24px;   vertical-align: middle;   width: 24px; "> <a href="https://www.youtube.com/c/sEntraUTAMA/" target="_blank" style="     color: #2e58ff;     text-decoration: none;   "> <img alt="youtube-logo" height="24" src="https://sentrawidyatama.my.id/assets/images/youtube-logo-transparent.png" style="       border-radius: 3px;       display: block;     " width="24" /> </a></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div style="margin: 0px auto; max-width: 600px">
                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width: 100%">
                        <tbody>
                            <tr>
                                <td style=" direction: ltr; font-size: 0px; padding: 20px 0; text-align: center;      ">
                                    <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size: 0px;text-align: left;direction: ltr;display: inline-block;vertical-align: top; width: 100%; ">
                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align: top" width="100%">
                                            <tr>
                                                <td style="font-size: 0px; word-break: break-word">
                                                    <div style="height: 1px">&nbsp;</div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </body>
        
        </html>';
    }
    function templateWithattachment()
    {
        return '';
    }
    function templatewithImage()
    {
        return '';
    }
    function templateNewletter()
    {
        return '';
    }
    function templatePromosi()
    {
        return '';
    }
    function templateNotification()
    {
        return '';
    }
    function templateJadwal($text, $jadwal)
    {
        return '<!DOCTYPE html>
        <html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
        
        <head>
            <title>Email from sEntra UTAMA</title>
            <!--[if !mso]><!-- -->
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <!--<![endif]-->
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1" />
            <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.9.96/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
            <style type="text/css">
                #outlook a {
                    padding: 0;
                }
        
                body {
                    margin: 0;
                    padding: 0;
                    -webkit-text-size-adjust: 100%;
                    -ms-text-size-adjust: 100%;
                }
        
                table,
                td {
                    border-collapse: collapse;
                }
        
                img {
                    border: 0;
                    height: auto;
                    line-height: 100%;
                    outline: none;
                    text-decoration: none;
                    -ms-interpolation-mode: bicubic;
                }
        
                p {
                    display: block;
                    margin: 13px 0;
                }
        
                .btn-href:hover {
                    box-shadow: 2px 3px 7px 0px rgba(0, 0, 0, 0.75);
                    -webkit-box-shadow: 2px 3px 7px 0px rgba(0, 0, 0, 0.75);
                    -moz-box-shadow: 2px 3px 7px 0px rgba(0, 0, 0, 0.75);
                    border-radius: 10px;
                }
            </style>
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Island+Moments&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Shalimar&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700" rel="stylesheet" type="text/css" />
            <link href="https://fonts.googleapis.com/css2?family=Zen+Antique+Soft&display=swap" rel="stylesheet">
            <style type="text/css">
                @import url(https://fonts.googleapis.com/css?family=Roboto:100,300,400,700);
            </style>
            <!--<![endif]-->
            <style type="text/css">
                @media only screen and (min-width: 480px) {
                    .mj-column-per-100 {
                        width: 100% !important;
                        max-width: 100%;
                    }
                }
            </style>
            <style type="text/css">
                @media only screen and (max-width: 480px) {
                    table.mj-full-width-mobile {
                        width: 100% !important;
                    }
        
                    td.mj-full-width-mobile {
                        width: auto !important;
                    }
                }
            </style>
            <style type="text/css">
                a,
                span,
                td,
                th {
                    -webkit-font-smoothing: antialiased !important;
                    -moz-osx-font-smoothing: grayscale !important;
                }
            </style>
        </head>
        
        <body style="background-color: #f3f3f5">
            <div style="display: none;font-size: 1px;color: #ffffff;line-height: 1px;max-height: 0px;max-width: 0px;opacity: 0;overflow: hidden;"> Preview - Email from sEntra UTAMA </div>
            <div style="background-color: #f3f3f5">
                <div style="margin: 0px auto; max-width: 600px">
                    <table align="center" border="1" cellpadding="0" cellspacing="0" role="presentation" style="width: 100%">
                        <tbody>
        
                            <!-- <tr>
                                <td style=" direction: ltr; font-size: 0px; text-align: center;      ">
                                    <div class="mj-column-per-100 mj-outlook-group-fix" style=" font-size: 0px; text-align: left; direction: ltr; display: inline-block; vertical-align: top; width: 100%; ">
                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align: top" width="100%">
                                            <tr>
                                                <td style="font-size: 0px; word-break: break-word">
                                                    <div style="height: 20px">&nbsp;</div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
                <div style="background: #930000;background-color: #930000;margin: 0px auto;border-radius: 4px 4px 0 0;max-width: 600px;">
                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background: #930000;  background-color: #930000;  width: 100%;  border-radius: 4px 4px 0 0;  margin-top: 20px;">
                        <tbody>
                            <tr>
                                <td align="center" style=" font-size: 0px; padding: 10px 0; word-break: break-word;background-color:#f3f3f5   ">
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="   border-collapse: collapse;   border-spacing: 0px; ">
                                        <tbody>
                                            <tr>
                                                <td style="width: 100px"> <img height="auto" src="https://sentrawidyatama.my.id/assets/images/logo_sentra.png" style=" border: 0;display: block;outline: none;text-decoration: none;height: auto;width: 100%;font-size: 13px;" /> </td>
                                                <td style="width: 200px"> <img height="auto" src="https://www.widyatama.ac.id/wp-content/uploads/2015/02/logoutama-1.png" style=" border: 0;display: block;outline: none;text-decoration: none;height: auto;width: 100%;font-size: 13px;" /> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" style=" font-size: 0px; word-break: break-word;    ">
                                    <h3 style="color:#fff;font-size:20px;text-align:center;margin-bottom:-10px">Pers Kampus Mahasiswa sEntra</h3>
                                    <h3 style="color:#fff;font-size:20px;text-align:center;">UNIVERSITAS WIDYATAMA</h3>
                                    <hr style="color:#f3f3f5">
                                </td>
                            </tr>
                            <tr>
                                <td style=" direction: ltr; font-size: 0px; padding: 20px 0; text-align: center;      ">
                                    <div style="margin: 0px auto; max-width: 600px">
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width: 100%">
                                            <tbody>
        
                                                <tr>
                                                    <td style="direction: ltr;font-size: 0px;padding: 0px;text-align: center;       ">
                                                        <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size: 0px;text-align: left;direction: ltr;display: inline-block;vertical-align: top;width: 100%;">
                                                            <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align: top" width="100%">
                                                                <!-- Subject     -->
                                                                <!--  <tr> 
                                                                    <td align="left" style=" font-size: 0px; word-break: break-word;">
                                                                        <div style="   font-family: Roboto, Helvetica, Arial,     sans-serif;   font-size: 14px;   font-weight: 400;   line-height: 20px;   text-align: left;   color: #ffffff; ">
                                                                            <h3 style="color:#fff;font-size:20px;text-align:center">Pers Kampus Mahasiswa sEntra</h3>
                                                                        </div>
                                                                    </td>
                                                                </tr> -->
                                                                <tr>
                                                                    <td align="left" style=" font-size: 0px; padding: 10px 25px; word-break: break-word;    ">
                                                                        <div style="font-family: Roboto, Helvetica, Arial,     sans-serif;   font-size: 14px;   font-weight: 400;   line-height: 20px;   text-align: left;   color: #ffffff; ">
                                                                            ' . $text . '
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div style="margin: 0px auto; max-width: 600px">
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width: 100%">
                                            <tbody>
                                                <tr>
                                                    <td style="direction: ltr;font-size: 0px;padding: 10px 20px;text-align: center;       ">
                                                        <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size: 0px;text-align: left;direction: ltr;display: inline-block;vertical-align: top;width: 100%;">
                                                            <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%">
                                                                <tbody>
                                                                    <tr>
                                                                        <td style="   background-color: #5f646c;   border-radius: 3px 3px 0px 0px;   vertical-align: top;   padding: 10px 0; ">
                                                                            <table border="0" cellpadding="0" cellspacing="0" role="presentation" style width="100%">
                                                                                <tr>
                                                                                    <td align="left" style="font-size: 0px;padding: 10px 25px;word-break: break-word;       ">
                                                                                        <div style="font-family: Zen Antique Soft, serif;font-size: 16px;font-weight: 400;line-height: 20px;text-align: left;color: #ffffff;">
                                                                                        ' . $jadwal . '
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
        
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!-- <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size: 0px;text-align: left;direction: ltr;display: inline-block;vertical-align: top;width: 100%;">
                                                            <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%">
                                                                <tbody>
                                                                    <tr>
                                                                        <td style="   background-color: #5f646c;   border-radius: 3px 3px 0px 0px;   vertical-align: top;   padding: 10px 0; ">
                                                                            <table border="0" cellpadding="0" cellspacing="0" role="presentation" style width="100%">
                                                                                <tr>
                                                                                    <td align="left" style="font-size: 0px;padding: 10px 25px;word-break: break-word;       ">
                                                                                        <div style="font-family: Roboto, Helvetica,  Arial, sans-serif;font-size: 16px;font-weight: 400;line-height: 20px;text-align: left;color: #ffffff;">
                                                                                            <p style="margin: 0"> <strong>When:</strong> Sun, Aug 4, 2019, 11:40 AM EDT</p>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
        
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div> -->
        
                                                        <!-- <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size: 0px;text-align: left;direction: ltr;display: inline-block;vertical-align: top;width: 100%;">
                                                            <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%">
                                                                <tbody>
                                                                    <tr>
                                                                        <td style="   background-color: #5f646c;   border-radius: 0px 0px 3px 3px;   vertical-align: top; ">
                                                                            <table border="0" cellpadding="0" cellspacing="0" role="presentation" style width="100%">
                                                                                <tr>
                                                                                    <td style="font-size: 0px;padding: 10px 25px;word-break: break-word;       ">
                                                                                        <p style="border-top: dashed 1px lightgrey;font-size: 1px;margin: 0px auto;width: 100%;"></p>
                                                                                    </td>
                                                                                </tr>
        
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div> -->
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
        
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div style="background: #ffffff;background-color: #ffffff;margin: 0px auto;border-radius: 0 0 4px 4px;max-width: 600px;">
                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="  background: #ffffff;  background-color: #ffffff;  width: 100%;  border-radius: 0 0 4px 4px;">
                        <tbody>
                            <tr>
                                <td style=" direction: ltr; font-size: 0px; padding: 20px 0; text-align: center;      ">
                                    <div class="mj-column-per-100 mj-outlook-group-fix" style=" font-size: 0px; text-align: left; direction: ltr; display: inline-block; vertical-align: top; width: 100%; ">
                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align: top" width="100%">
                                            <tr>
                                                <td align="center" style="       font-size: 0px;       padding: 10px 25px;       word-break: break-word;     ">
                                                    <div style="font-family: Roboto, Helvetica, Arial, sans-serif;font-size: 14px;font-weight: 400;line-height: 20px;text-align: center;color: #93999f;       ">
                                                        <h3 style="color: #f90808;font-family: Shalimar, cursive;font-size:20px"> PKM sEntra Universitas Widyatama </h3>
                                                        <p style="font-size: 12px; margin-top: -15px"> Jl. Cikutra 204A Universitas Widyatama, Gedung PKM Lt.3 Ruang 11 </p> <i class="mdi mdi-email" style="color: #888888"></i> <a class="footer-link" href="mailto:sentrawidyatama@gmail.com" style="color: #2e58ff; text-decoration: none" target="_blank">sentrawidyatama@gmail.com</a> | <i class="mdi mdi-whatsapp" style="color: #00b72b"></i> <a class="footer-link" href="https://api.whatsapp.com/send/?phone=6282123232688" target="_blank" style="color: #2e58ff; text-decoration: none">6282123232688</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center" style="       font-size: 0px;       padding: 10px 25px;       word-break: break-word;     ">
                                                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="float: none; display: inline-table">
                                                        <tr>
                                                            <td style="padding: 4px">
                                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-radius: 3px; width: 24px">
                                                                    <tr>
                                                                        <td style="   font-size: 0;   height: 24px;   vertical-align: middle;   width: 24px; "> <a href="https://twitter.com/sentrawidyatama" target="_blank" style="     color: #2e58ff;     text-decoration: none;   "> <img alt="twitter-logo" height="24" src="https://sentrawidyatama.my.id/assets/images/twitter-logo-transparent.png" style="       border-radius: 3px;       display: block;     " width="24" /> </a></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="float: none; display: inline-table">
                                                        <tr>
                                                            <td style="padding: 4px">
                                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-radius: 3px; width: 24px">
                                                                    <tr>
                                                                        <td style="   font-size: 0;   height: 24px;   vertical-align: middle;   width: 24px; "> <a href="https://www.facebook.com/100067901605846" target="_blank" style="     color: #2e58ff;     text-decoration: none;   "> <img alt="facebook-logo" height="24" src="https://sentrawidyatama.my.id/assets/images/facebook-logo-transparent.png" style="       border-radius: 3px;       display: block;     " width="24" /> </a></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="float: none; display: inline-table">
                                                        <tr>
                                                            <td style="padding: 4px">
                                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-radius: 3px; width: 24px">
                                                                    <tr>
                                                                        <td style="   font-size: 0;   height: 24px;   vertical-align: middle;   width: 24px; "> <a href="https://www.instagram.com/sentra_utama/" target="_blank" style="     color: #2e58ff;     text-decoration: none;   "> <img alt="instagram-logo" height="24" src="https://sentrawidyatama.my.id/assets/images/insta-logo-transparent.png" style="       border-radius: 3px;       display: block;     " width="24" /> </a></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="float: none; display: inline-table">
                                                        <tr>
                                                            <td style="padding: 4px">
                                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-radius: 3px; width: 24px">
                                                                    <tr>
                                                                        <td style="   font-size: 0;   height: 24px;   vertical-align: middle;   width: 24px; "> <a href="https://www.youtube.com/c/sEntraUTAMA/" target="_blank" style="     color: #2e58ff;     text-decoration: none;   "> <img alt="youtube-logo" height="24" src="https://sentrawidyatama.my.id/assets/images/youtube-logo-transparent.png" style="       border-radius: 3px;       display: block;     " width="24" /> </a></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div style="margin: 0px auto; max-width: 600px">
                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width: 100%">
                        <tbody>
                            <tr>
                                <td style=" direction: ltr; font-size: 0px; padding: 20px 0; text-align: center;      ">
                                    <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size: 0px;text-align: left;direction: ltr;display: inline-block;vertical-align: top; width: 100%; ">
                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align: top" width="100%">
                                            <tr>
                                                <td style="font-size: 0px; word-break: break-word">
                                                    <div style="height: 1px">&nbsp;</div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </body>
        
        </html>';
    }
    function sendMailtextLocal($from, $subject, $text, $template)
    {
        //Create an instance; passing `true` enables exceptions
        $mail = $this->server;
        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
            $mail->isSMTP(); //Send using SMTP
            $mail->Host = 'mail.sentrawidyatama.my.id'; //Set the SMTP server to send through
            $mail->SMTPAuth = true; //Enable SMTP authentication
            $mail->Username = 'marketing@sentrawidyatama.my.id'; //SMTP username
            $mail->Password = 'Zerz3231!'; //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
            $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('official@sentrawidyatama.my.id', 'sEntra UTAMA');
            $mail->addAddress($from); //Add a recipient
            $mail->addCC('triyatna.com@gmail.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz'); //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); //Optional name

            //Content
            $mail->isHTML(true); //Set email format to HTML
            $mail->Subject = $subject;
            $mail->CharSet = PHPMailer::CHARSET_UTF8;
            // $mail->msgHTML(file_get_contents('../middleware/template-mail.php'), __DIR__);
            $mail->Body = $template;
            $mail->AltBody = $text;

            $mail->send();
            return 'Message has been sent';
        } catch (Exception $e) {
            return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
    function sendMailtextGmail()
    {
        $mail = $this->server;

        //Tell PHPMailer to use SMTP
        $mail->isSMTP();

        //Enable SMTP debugging
        //SMTP::DEBUG_OFF = off (for production use)
        //SMTP::DEBUG_CLIENT = client messages
        //SMTP::DEBUG_SERVER = client and server messages
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

        //Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';

        //Set the SMTP port number:
        // - 465 for SMTP with implicit TLS, a.k.a. RFC8314 SMTPS or
        // - 587 for SMTP+STARTTLS
        $mail->Port = 465;

        //Set the encryption mechanism to use:
        // - SMTPS (implicit TLS on port 465) or
        // - STARTTLS (explicit TLS on port 587)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;

        //Set AuthType to use XOAUTH2
        $mail->AuthType = 'XOAUTH2';

        //Start Option 1: Use league/oauth2-client as OAuth2 token provider
        //Fill in authentication details here
        //Either the gmail account owner, or the user that gave consent
        $email = 'sentrawidyatama@gmail.com';
        $clientId = '1031658530166-vo4fo8441ci0t3cbghhl4rmjje94isb0.apps.googleusercontent.com';
        $clientSecret = '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';

        //Obtained by configuring and running get_oauth_token.php
        //after setting up an app in Google Developer Console.
        $refreshToken = '1//0gDMhjqpSpJ3MCgYIARAAGBASNwF-L9IrAC0hFNUmMOP9RbvBm6sqJWMW_nMpZ0iszatzDJniNVIJNF-tz57T6fFuF9OiOk8mj6Q';

        //Create a new OAuth2 provider instance
        $provider = new Google(
            [
                'clientId' => $clientId,
                'clientSecret' => $clientSecret,
            ]
        );

        //Pass the OAuth provider instance to PHPMailer
        $mail->setOAuth(
            new OAuth(
                [
                    'provider' => $provider,
                    'clientId' => $clientId,
                    'clientSecret' => $clientSecret,
                    'refreshToken' => $refreshToken,
                    'userName' => $email,
                ]
            )
        );
        //End Option 1

        // //Option 2: Another OAuth library as OAuth2 token provider
        // //Set up the other oauth library as per its documentation
        // //Then create the wrapper class that implementations OAuthTokenProvider
        // $oauthTokenProvider = new MyOAuthTokenProvider(/* Email, ClientId, ClientSecret, etc. */);

        // //Pass the implementation of OAuthTokenProvider to PHPMailer
        // $mail->setOAuth($oauthTokenProvider);
        // //End Option 2

        //Set who the message is to be sent from
        //For gmail, this generally needs to be the same as the user you logged in as
        $mail->setFrom($email, 'sEntra UTAMA');

        //Set who the message is to be sent to
        $mail->addAddress('triyatna.com@gmail.com');

        //Set the subject line
        $mail->Subject = 'PHPMailer GMail XOAUTH2 SMTP test';

        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        $mail->CharSet = PHPMailer::CHARSET_UTF8;
        $mail->msgHTML(file_get_contents('../middleware/template-mail.php'), __DIR__);

        //Replace the plain text body with one created manually
        $mail->AltBody = 'This is a plain-text message body';

        // //Attach an image file
        // $mail->addAttachment('images/phpmailer_mini.png');

        //send the message, check for errors
        if (!$mail->send()) {
            return 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            return 'Message sent!';
        }
    }
}
