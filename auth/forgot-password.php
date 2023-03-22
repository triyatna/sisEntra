<?php
require '../middleware/header.output.php';
$user = empty($_SESSION['username']) ? (!isset($_COOKIE['username']) ? '' : $_COOKIE['username']) : $_SESSION['username'];
if (WEBSITE_MAINTENANCE == 'on') {
    redirect($domain . 'maintenance');
}
$cek = cekSession();
// Checking Session
if ($cek == 1) {
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
    }
}
?>
<div class="account-pages mt-5 mb-5">
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

                        <div class="text-center mb-4">
                            <h4 class="text-uppercase mt-0 mb-3">Forgot Password</h4>
                            <p class="text-muted mb-0 font-13">Enter your email address or whatsapp number and we will send you a message with instructions to reset your password.</p>
                        </div>

                        <form action="#" id="form">
                            <label for="address" class="form-label">Email or WhatsApp</label>
                            <div class="mb-3 input-group input-group-merge">
                                <input type="text" name="address" id="address" autocomplete="off" auto class="form-control" required="" placeholder="Enter your email address or whatsApp number">
                                <div class="input-group-text">
                                    <div id="iconne"><span class="fe-x"></span></div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="npm" class="form-label">NPM</label>
                                <input class="form-control" type="text" id="npm" name="npm" required="" placeholder="Enter your NPM UTama!">
                            </div>
                            <div class="alert-fill"></div>
                            <div class="mb-3 text-center d-grid">
                                <button class="btn btn-primary mt-2 text-center m-auto d-block d-none" id="loaderin" type="button">
                                    <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                                    Loading...
                                </button>
                                <button class="btn btn-primary" id="buttonin" type="submit"> Reset Password </button>
                            </div>

                        </form>

                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p class="text-white">Back to <a href="login" class="text-blue ms-1"><b>Log In</b></a></p>
                    </div> <!-- end col -->
                </div>

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->

<!-- Vendor js -->
<script src="../assets/js/vendor.min.js"></script>
<script>
    document.getElementById("title").innerHTML = "Forgot Password | Spanel - Panel BOT Automate sEntra UTama ";

    $('#address').keyup(function() {
        let input = $('#address').val();
        if (input.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,6})+$/)) {
            console.log('ada email');
            $('.input-group-text').addClass('bg-success');
            $('#iconne').html('<span class="fe-mail text-white"></span>');
        } else {
            if (input.match(/^[0-9]+$/)) {
                if (input.length > 8 && input.length < 15) {
                    console.log('ada nomor');
                    $('.input-group-text').addClass('bg-success');
                    $('#iconne').html('<span class="mdi mdi-whatsapp text-white"></span>');
                } else {
                    $('.input-group-text').removeClass('bg-success');
                    $('#iconne').html('<span class="fe-x"></span>');
                }
            } else {
                $('.input-group-text').removeClass('bg-success');
                $('#iconne').html('<span class="fe-x"></span>');
            }
        }

    });
    $('#form').submit(function(e) {
        e.preventDefault();
        $('#buttonin').addClass('d-none');
        $('#loaderin').removeClass('d-none');
        let address = $('#address').val();
        let npm = $('#npm').val();
        if (address == "" || npm == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please fill in the email or whatsapp number field!',
            })
        } else {
            if (address.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,6})+$/)) {
                $.ajax({
                    url: '../core/App.upload.php',
                    type: 'POST',
                    data: {
                        email: address,
                        npm: npm,
                        type: 'forgot-password',
                        access: 'email'
                    },
                    success: function(data) {
                        console.log(data);
                        if (data.status == "success") {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'Please check your email or whatsapp number!',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.close();
                                }
                            })
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                            })
                        }
                    },
                    error: function(data) {
                        console.log(data);
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Data not registered!',
                        })
                    }
                });
            } else {
                if (address.match(/^[0-9]+$/)) {
                    if (address.length > 8 && address.length < 15) {
                        $.ajax({
                            url: '../core/App.upload.php',
                            type: 'POST',
                            data: {
                                whatsapp: address,
                                npm: npm,
                                type: 'forgot-password',
                                access: 'wa'
                            },
                            success: function(data) {
                                console.log(data);
                                if (data.status == "success") {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success',
                                        text: 'Please check your email or whatsapp number!',
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.close();
                                        }
                                    })
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: 'Something went wrong!',
                                    })
                                }
                            },
                            error: function(data) {
                                console.log(data);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Data not registered!',
                                })
                            }
                        });
                    } else {
                        $('.alert-fill').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong>Oops!</strong> invalid whatsapp number!. </div>');
                    }
                } else {
                    $('.alert-fill').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong>Oops!</strong> invalid data! </div>');
                }
            }
        }
    });
</script>
<!-- App js -->
<script src="../assets/js/app.min.js"></script>

</body>

</html>