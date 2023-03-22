<?php
// PHP Coded
// Path: email\template.php
require '../core/db.php';
require '../core/function.php';


?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <title>Email From sEntra UTAMA</title>
    <!--[if !mso]><!-- -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!--<![endif]-->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="<?= $domain ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
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
    </style>

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

    <div style="
        display: none;
        font-size: 1px;
        color: #ffffff;
        line-height: 1px;
        max-height: 0px;
        max-width: 0px;
        opacity: 0;
        overflow: hidden;
      ">
        Preview - Email from sEntra UTAMA
    </div>
    <div style="background-color: #f3f3f5">
        <div style="margin: 0px auto; max-width: 600px">
            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width: 100%">
                <tbody>
                    <tr>
                        <td style="
                  direction: ltr;
                  font-size: 0px;
                  padding: 20px 0;
                  text-align: center;
                ">
                            <div class="mj-column-per-100 mj-outlook-group-fix" style="
                    font-size: 0px;
                    text-align: left;
                    direction: ltr;
                    display: inline-block;
                    vertical-align: top;
                    width: 100%;
                  ">
                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align: top" width="100%">
                                    <tr>
                                        <td style="font-size: 0px; word-break: break-word">
                                            <div style="height: 20px">&nbsp;</div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div style="
          background: #930000;
          background-color: #930000;
          margin: 0px auto;
          border-radius: 4px 4px 0 0;
          max-width: 600px;
        ">
            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="
            background: #930000;
            background-color: #930000;
            width: 100%;
            border-radius: 4px 4px 0 0;
            margin-top: 20px;
          ">
                <tbody>
                    <tr>
                        <td style="
                  direction: ltr;
                  font-size: 0px;
                  padding: 20px 0;
                  text-align: center;
                ">
                            <div style="margin: 0px auto; max-width: 600px">
                                <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width: 100%">
                                    <tbody>
                                        <tr>
                                            <td style="
                            direction: ltr;
                            font-size: 0px;
                            padding: 0px;
                            text-align: center;
                          ">
                                                <div class="mj-column-per-100 mj-outlook-group-fix" style="
                              font-size: 0px;
                              text-align: left;
                              direction: ltr;
                              display: inline-block;
                              vertical-align: top;
                              width: 100%;
                            ">
                                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align: top" width="100%">
                                                        <tr>
                                                            <td align="center" style="
                                    font-size: 0px;
                                    padding: 10px 25px;
                                    word-break: break-word;
                                  ">
                                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="
                                      border-collapse: collapse;
                                      border-spacing: 0px;
                                    ">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td style="width: 150px">
                                                                                <img height="auto" src="<?= $domain ?>assets/images/logo_sentra.png" style="
                                              border: 0;
                                              display: block;
                                              outline: none;
                                              text-decoration: none;
                                              height: auto;
                                              width: 100%;
                                              font-size: 13px;
                                              margin-top: -100px;
                                            " width="150" />
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="font-size: 0px; word-break: break-word">
                                                                <div style="height: 20px">&nbsp;</div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" style="
                                    font-size: 0px;
                                    padding: 10px 25px;
                                    word-break: break-word;
                                  ">
                                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="
                                      border-collapse: collapse;
                                      border-spacing: 0px;
                                    ">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td style="width: 64px">
                                                                                <img alt="alert icon" height="auto" src="https://img.icons8.com/color/96/000000/error.png" style="
                                              border: 0;
                                              display: block;
                                              outline: none;
                                              text-decoration: none;
                                              height: auto;
                                              width: 100%;
                                              font-size: 13px;
                                            " width="64" />
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="center" style="
                                    font-size: 0px;
                                    padding: 10px 25px;
                                    word-break: break-word;
                                  ">
                                                                <div style="
                                      font-family: Roboto, Helvetica, Arial,
                                        sans-serif;
                                      font-size: 24px;
                                      font-weight: 400;
                                      line-height: 30px;
                                      text-align: center;
                                      color: #ffffff;
                                    ">
                                                                    <h1 style="
                                        margin: 0;
                                        font-size: 24px;
                                        line-height: normal;
                                        font-weight: 400;
                                      ">
                                                                        Did you log in from a new device?
                                                                    </h1>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" style="
                                    font-size: 0px;
                                    padding: 10px 25px;
                                    word-break: break-word;
                                  ">
                                                                <div style="
                                      font-family: Roboto, Helvetica, Arial,
                                        sans-serif;
                                      font-size: 14px;
                                      font-weight: 400;
                                      line-height: 20px;
                                      text-align: left;
                                      color: #ffffff;
                                    ">
                                                                    <p style="margin: 0">
                                                                        We noticed your [Coded Mails] account was
                                                                        logged into from a new device. If this was
                                                                        you, you can safely disregard this email.
                                                                    </p>
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
                                            <td style="
                            direction: ltr;
                            font-size: 0px;
                            padding: 10px 20px;
                            text-align: center;
                          ">
                                                <div class="mj-column-per-100 mj-outlook-group-fix" style="
                              font-size: 0px;
                              text-align: left;
                              direction: ltr;
                              display: inline-block;
                              vertical-align: top;
                              width: 100%;
                            ">
                                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%">
                                                        <tbody>
                                                            <tr>
                                                                <td style="
                                      background-color: #5f646c;
                                      border-radius: 3px 3px 0px 0px;
                                      vertical-align: top;
                                      padding: 10px 0;
                                    ">
                                                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" style width="100%">
                                                                        <tr>
                                                                            <td align="left" style="
                                            font-size: 0px;
                                            padding: 10px 25px;
                                            word-break: break-word;
                                          ">
                                                                                <div style="
                                              font-family: Roboto, Helvetica,
                                                Arial, sans-serif;
                                              font-size: 16px;
                                              font-weight: 400;
                                              line-height: 20px;
                                              text-align: left;
                                              color: #ffffff;
                                            ">
                                                                                    <p style="margin: 0">
                                                                                        <strong>When:</strong> Sun, Aug 4,
                                                                                        2019, 11:40 AM EDT
                                                                                    </p>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="left" style="
                                            font-size: 0px;
                                            padding: 10px 25px;
                                            word-break: break-word;
                                          ">
                                                                                <div style="
                                              font-family: Roboto, Helvetica,
                                                Arial, sans-serif;
                                              font-size: 16px;
                                              font-weight: 400;
                                              line-height: 20px;
                                              text-align: left;
                                              color: #ffffff;
                                            ">
                                                                                    <p style="margin: 0">
                                                                                        <strong>Where:</strong>
                                                                                        California, United States
                                                                                    </p>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="left" style="
                                            font-size: 0px;
                                            padding: 10px 25px;
                                            word-break: break-word;
                                          ">
                                                                                <div style="
                                              font-family: Roboto, Helvetica,
                                                Arial, sans-serif;
                                              font-size: 16px;
                                              font-weight: 400;
                                              line-height: 20px;
                                              text-align: left;
                                              color: #ffffff;
                                            ">
                                                                                    <p style="margin: 0">
                                                                                        <strong>Device:</strong> Firefox
                                                                                        using Mac
                                                                                    </p>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="mj-column-per-100 mj-outlook-group-fix" style="
                              font-size: 0px;
                              text-align: left;
                              direction: ltr;
                              display: inline-block;
                              vertical-align: top;
                              width: 100%;
                            ">
                                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%">
                                                        <tbody>
                                                            <tr>
                                                                <td style="
                                      background-color: #5f646c;
                                      border-radius: 0px 0px 3px 3px;
                                      vertical-align: top;
                                      padding: 10px 0px;
                                    ">
                                                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" style width="100%">
                                                                        <tr>
                                                                            <td style="
                                            font-size: 0px;
                                            padding: 10px 25px;
                                            word-break: break-word;
                                          ">
                                                                                <p style="
                                              border-top: dashed 1px lightgrey;
                                              font-size: 1px;
                                              margin: 0px auto;
                                              width: 100%;
                                            "></p>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="center" vertical-align="middle" style="
                                            font-size: 0px;
                                            padding: 10px 25px;
                                            word-break: break-word;
                                          ">
                                                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="
                                              border-collapse: separate;
                                              line-height: 100%;
                                            ">
                                                                                    <tr>
                                                                                        <td align="center" bgcolor="#2e58ff" role="presentation" style="
                                                  border: none;
                                                  border-radius: 3px;
                                                  cursor: auto;
                                                  background: #2e58ff;
                                                " valign="middle">
                                                                                            <a href="https://google.com" style="
                                                    display: inline-block;
                                                    background: #2e58ff;
                                                    color: white;
                                                    font-family: Roboto,
                                                      Helvetica, Arial,
                                                      sans-serif;
                                                    font-size: 14px;
                                                    font-weight: normal;
                                                    line-height: 32px;
                                                    margin: 0;
                                                    text-decoration: none;
                                                    text-transform: none;
                                                    padding: 10px 25px;
                                                    border-radius: 3px;
                                                  " target="_blank">
                                                                                                <strong>It wasnt you?</strong>
                                                                                                Review your Account
                                                                                            </a>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
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
                            <div style="margin: 0px auto; max-width: 600px">
                                <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width: 100%">
                                    <tbody>
                                        <tr>
                                            <td style="
                            direction: ltr;
                            font-size: 0px;
                            padding: 20px 0;
                            text-align: center;
                          ">
                                                <div class="mj-column-per-100 mj-outlook-group-fix" style="
                              font-size: 0px;
                              text-align: left;
                              direction: ltr;
                              display: inline-block;
                              vertical-align: top;
                              width: 100%;
                            ">
                                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align: top" width="100%">
                                                        <tr>
                                                            <td align="left" style="
                                    font-size: 0px;
                                    padding: 10px 25px;
                                    word-break: break-word;
                                  ">
                                                                <div style="
                                      font-family: Roboto, Helvetica, Arial,
                                        sans-serif;
                                      font-size: 14px;
                                      font-weight: 400;
                                      line-height: 20px;
                                      text-align: left;
                                      color: #ffffff;
                                    ">
                                                                    If you have any questions simply reply to
                                                                    this email and we would be more than happy
                                                                    to reply. :)
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
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div style="
          background: #ffffff;
          background-color: #ffffff;
          margin: 0px auto;
          border-radius: 0 0 4px 4px;
          max-width: 600px;
        ">
            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="
            background: #ffffff;
            background-color: #ffffff;
            width: 100%;
            border-radius: 0 0 4px 4px;
          ">
                <tbody>
                    <tr>
                        <td style="
                  direction: ltr;
                  font-size: 0px;
                  padding: 20px 0;
                  text-align: center;
                ">
                            <div class="mj-column-per-100 mj-outlook-group-fix" style="
                    font-size: 0px;
                    text-align: left;
                    direction: ltr;
                    display: inline-block;
                    vertical-align: top;
                    width: 100%;
                  ">
                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align: top" width="100%">
                                    <tr>
                                        <td align="center" style="
                          font-size: 0px;
                          padding: 10px 25px;
                          word-break: break-word;
                        ">
                                            <div style="
                            font-family: Roboto, Helvetica, Arial, sans-serif;
                            font-size: 14px;
                            font-weight: 400;
                            line-height: 20px;
                            text-align: center;
                            color: #93999f;
                          ">
                                                <h3 style="color: #f90808">
                                                    PERS Mahasiswa sEntra Universitas Widyatama
                                                </h3>
                                                <p style="font-size: 12px; margin-top: -15px">
                                                    Jl. Cikutra 204A Universitas Widyatama, Gedung PKM
                                                    Lt.3 Ruang 11
                                                </p>
                                                <i class="mdi mdi-email" style="color: #888888"></i>
                                                <a class="footer-link" href="#" style="color: #2e58ff; text-decoration: none">sentrawidyatama@gmail.com</a>
                                                |
                                                <i class="mdi mdi-whatsapp" style="color: #00b72b"></i>
                                                <a class="footer-link" href="#" style="color: #2e58ff; text-decoration: none">08232323232</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" style="
                          font-size: 0px;
                          padding: 10px 25px;
                          word-break: break-word;
                        ">
                                            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="float: none; display: inline-table">
                                                <tr>
                                                    <td style="padding: 4px">
                                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="border-radius: 3px; width: 24px">
                                                            <tr>
                                                                <td style="
                                      font-size: 0;
                                      height: 24px;
                                      vertical-align: middle;
                                      width: 24px;
                                    ">
                                                                    <a href="#" target="_blank" style="
                                        color: #2e58ff;
                                        text-decoration: none;
                                      ">
                                                                        <img alt="twitter-logo" height="24" src="<?= $domain ?>assets/images/twitter-logo-transparent.png" style="
                                          border-radius: 3px;
                                          display: block;
                                        " width="24" />
                                                                    </a>
                                                                </td>
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
                                                                <td style="
                                      font-size: 0;
                                      height: 24px;
                                      vertical-align: middle;
                                      width: 24px;
                                    ">
                                                                    <a href="#" target="_blank" style="
                                        color: #2e58ff;
                                        text-decoration: none;
                                      ">
                                                                        <img alt="facebook-logo" height="24" src="<?= $domain ?>assets/images/facebook-logo-transparent.png" style="
                                          border-radius: 3px;
                                          display: block;
                                        " width="24" />
                                                                    </a>
                                                                </td>
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
                                                                <td style="
                                      font-size: 0;
                                      height: 24px;
                                      vertical-align: middle;
                                      width: 24px;
                                    ">
                                                                    <a href="#" target="_blank" style="
                                        color: #2e58ff;
                                        text-decoration: none;
                                      ">
                                                                        <img alt="instagram-logo" height="24" src="<?= $domain ?>assets/images/insta-logo-transparent.png" style="
                                          border-radius: 3px;
                                          display: block;
                                        " width="24" />
                                                                    </a>
                                                                </td>
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
                                                                <td style="
                                      font-size: 0;
                                      height: 24px;
                                      vertical-align: middle;
                                      width: 24px;
                                    ">
                                                                    <a href="#" target="_blank" style="
                                        color: #2e58ff;
                                        text-decoration: none;
                                      ">
                                                                        <img alt="youtube-logo" height="24" src="<?= $domain ?>assets/images/youtube-logo-transparent.png" style="
                                          border-radius: 3px;
                                          display: block;
                                        " width="24" />
                                                                    </a>
                                                                </td>
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
                        <td style="
                  direction: ltr;
                  font-size: 0px;
                  padding: 20px 0;
                  text-align: center;
                ">
                            <div class="mj-column-per-100 mj-outlook-group-fix" style="
                    font-size: 0px;
                    text-align: left;
                    direction: ltr;
                    display: inline-block;
                    vertical-align: top;
                    width: 100%;
                  ">
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

</html>