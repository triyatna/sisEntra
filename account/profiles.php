<?php
require '../middleware/header.php';
?>
<!-- Start Content-->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body task-detail">
                    <div class="d-flex mb-3">
                        <img class="flex-shrink-0 me-3 rounded-circle avatar-md" style="background-color: #cecece;border:0.4px #000 solid;border-radius:50%;box-shadow: 2xpx 2px 3px 0px rgba(0,0,0,0.75);-webkit-box-shadow: 2px 2px 3px 0px rgba(0,0,0,0.75);-moz-box-shadow: 2px 2px 3px 0px rgba(0,0,0,0.75);" alt="64x64" src="<?= getSingleValDB('users', 'username', $user, 'avatar') ?>">
                        <div class="flex-grow-1">
                            <h4 class="media-heading mt-0"><?= $user ?></h4>
                            <span class="badge bg-danger"><?= getSingleValDB('sentra_member', 'name', getSingleValDB('users', 'username', $user, 'name'), 'job') ?></span>
                        </div>
                    </div>

                    <div class="row task-dates mb-0 mt-2">
                        <div class="col-lg-6">
                            <h5 class="font-600 m-b-5">Name</h5>
                            <p> <?= getSingleValDB('users', 'username', $user, 'name') ?></p>
                        </div>
                        <div class="col-lg-6">
                            <h5 class="font-600 m-b-5">NPM</h5>
                            <p> <?= getSingleValDB('sentra_member', 'name', getSingleValDB('users', 'username', $user, 'name'), 'npm') ?></p>
                        </div>
                        <div class="col-lg-6">
                            <h5 class="font-600 m-b-5">Email</h5>
                            <p> <?= getSingleValDB('sentra_member', 'name', getSingleValDB('users', 'username', $user, 'name'), 'email') ?></p>
                        </div>
                        <div class="col-lg-6">
                            <h5 class="font-600 m-b-5">Phone</h5>
                            <p> <?= getSingleValDB('sentra_member', 'name', getSingleValDB('users', 'username', $user, 'name'), 'phone') ?></p>
                        </div>
                        <hr>
                        <div class="col-lg-6">
                            <h5 class="font-600 m-b-5">Job</h5>
                            <p> <?= getSingleValDB('sentra_member', 'name', getSingleValDB('users', 'username', $user, 'name'), 'job') ?></p>
                        </div>
                        <div class="col-lg-6">
                            <h5 class="font-600 m-b-5">Position</h5>
                            <p> <?= getSingleValDB('sentra_member', 'name', getSingleValDB('users', 'username', $user, 'name'), 'position') ?></p>
                        </div>
                        <hr>
                        <div class="col-lg-4">
                            <h5 class="font-600 m-b-5">Faculty</h5>
                            <p> <?= getSingleValDB('sentra_member', 'name', getSingleValDB('users', 'username', $user, 'name'), 'faculty') ?></p>
                        </div>
                        <div class="col-lg-4">
                            <h5 class="font-600 m-b-5">Study</h5>
                            <p> <?= getSingleValDB('sentra_member', 'name', getSingleValDB('users', 'username', $user, 'name'), 'prodi') ?></p>
                        </div>
                        <div class="col-lg-4">
                            <h5 class="font-600 m-b-5">Years</h5>
                            <p> <?= getSingleValDB('sentra_member', 'name', getSingleValDB('users', 'username', $user, 'name'), 'angkatan') ?></p>
                        </div>
                        <hr>
                        <button class="btn btn-primary d-none" id="generate-loader" type="button">
                            <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                            Loading...
                        </button>
                        <?php
                        if (getSingleValDB('sentra_member', 'name', getSingleValDB('users', 'username', $user, 'name'), 'qrcode') == '') {
                            echo '<a href="#" id="generate-loading" onclick="generateQr(`' . getSingleValDB('sentra_member', 'name', getSingleValDB('users', 'username', $user, 'name'), 'npm') . '`)" class="btn btn-primary">Generate QR Code</a>';
                        } else {
                        ?>
                            <div style="margin-left: auto; margin-right: auto; display:block;width:201px;height:201px;background-color:#000" class="mb-5">
                                <p style="margin-bottom:-2px ;color:#fff" class="text-center">QR CODE</p>
                                <a href="<?= getSingleValDB('sentra_member', 'name', getSingleValDB('users', 'username', $user, 'name'), 'qrcode') ?>" download><img class="flex-shrink-0 me-3 text-center" id="output" alt="64x64" style="width:200px;height:200px;border:1px #000 solid" src="<?= getSingleValDB('sentra_member', 'name', getSingleValDB('users', 'username', $user, 'name'), 'qrcode') ?>"></a>
                                <p style="font-size:9px;" class="text-center">klik untuk download otomatis QR Code!</p>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

        </div><!-- end col -->

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div id="otp1" style="margin-left: auto; margin-right: auto; display:block;width:201px;height:201px;background-color: #cecece;border:1px #000 solid;border-radius:50%;box-shadow: 4px 4px 5px 0px rgba(0,0,0,0.75);-webkit-box-shadow: 4px 4px 5px 0px rgba(0,0,0,0.75);-moz-box-shadow: 4px 4px 5px 0px rgba(0,0,0,0.75);">
                        <img class="flex-shrink-0 me-3 rounded-circle text-center" id="outputs" alt="64x64" style="width:200px;height:200px" src="<?= getSingleValDB('users', 'username', $user, 'avatar') ?>">
                    </div>
                    <div class="d-none" id="otp2" style="margin-left: auto; margin-right: auto; display:block;width:201px;height:201px;background-color: #cecece;border:1px #000 solid;border-radius:50%;box-shadow: 4px 4px 5px 0px rgba(0,0,0,0.75);-webkit-box-shadow: 4px 4px 5px 0px rgba(0,0,0,0.75);-moz-box-shadow: 4px 4px 5px 0px rgba(0,0,0,0.75);">
                        <img class="flex-shrink-0 me-3 rounded-circle text-center" alt="64x64" style="width:200px;height:200px;filter: blur(4px);-webkit-filter: blur(3px);" src="<?= getSingleValDB('users', 'username', $user, 'avatar') ?>">
                        <div class="spinner-border" style="margin-left:auto ;margin-right:auto;display:block;margin-top:-110px;color:#cecece"></div>
                    </div>
                    <div>
                        <div class="mb-3 mt-2">
                            <div class="me-3">
                                <!-- <form method="post" enctype="multipart/form-data"> -->
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Change Avatar</label>
                                    <input type="file" class="form-control" name="file" accept="image/*" id="exampleFormControlFile1">
                                    <input type="text" name="username" value="<?= $user ?>" hidden>
                                </div>
                                <div class="mt-2 text-center">OR
                                    <a href="#" id="avatar-generate" onclick="generateAva()" class="btn btn-primary mt-2 text-center m-auto d-block"> Generate Avatar </a>
                                    <button class="btn btn-primary mt-2 text-center m-auto d-block d-none" id="avatar-loader" type="button">
                                        <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                                        Loading...
                                    </button>
                                </div>
                                <!-- </form> -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!--  Modal content for the Large example -->
            <div class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myLargeModalLabel">Crop &amp; Upload Gambar</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <div id="image_demo"></div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-success crop_image">Crop &amp; Upload</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

        </div><!-- end col -->
    </div>
</div>
<!-- container-fluid -->
<script>
    function generateAva() {
        $('#avatar-generate').addClass('d-none');
        $('#avatar-loader').removeClass('d-none');
        $('#otp2').removeClass('d-none');
        $('#otp1').addClass('d-none');
        setTimeout(function() {
            $.ajax({
                url: "../core/App.upload.php",
                type: "POST",
                "data": {
                    "type": "updateprofileuser",
                    "id": "<?= getSingleValDB('users', 'username', $user, 'id') ?>",
                    "result": generateAvatar(),
                },
                "timeout": 0,
                "headers": {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                success: function(res) {
                    $('#otp1').removeClass('d-none');
                    $('#otp2').addClass('d-none');
                    $('#avatar-generate').removeClass('d-none');
                    $('#avatar-loader').addClass('d-none');
                    setTimeout(function() {
                        Swal.fire({
                            title: "Has been updated!!",
                            icon: "success",
                            confirmButtonColor: "#4a4fea",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location = 'profiles';
                            }
                        })
                    }, 1000);
                },
                error: function(err) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        didOpen: function() {
                            var zippi = new Audio('../assets/error.mp3')
                            zippi.play();
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    })
                    console.log(err);
                },
            });
            console.log(generateAvatar());
        }, 5000);

    }

    function generateQr(npm) {
        $('#generate-loading').addClass('d-none');
        $('#generate-loader').removeClass('d-none');
        var settings = {
            "url": "<?= API_SERVER ?>/api/generateQR",
            "method": "POST",
            "timeout": 0,
            "headers": {
                "api_key": "APICLIENTID",
                "Content-Type": "application/x-www-form-urlencoded"
            },
            "data": {
                "text": npm
            }
        };

        $.ajax(settings).done(function(response) {
            setTimeout(function() {
                    $.ajax({
                        url: "../core/App.upload.php",
                        type: "POST",
                        "data": {
                            "type": "updateqrmember",
                            "npm": npm,
                            "result": response.result
                        },
                        "timeout": 0,
                        "headers": {
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        success: function(res) {
                            $('#generate-loader').addClass('d-none');
                            $('#generate-loading').removeClass('d-none');
                            Swal.fire({
                                title: "Generated!",
                                icon: "success",
                                confirmButtonColor: "#4a4fea",
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location = 'profiles';
                                }
                            })
                        },
                        error: function(err) {
                            $('#generate-loader').addClass('d-none');
                            $('#generate-loading').removeClass('d-none');
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                                didOpen: function() {
                                    var zippi = new Audio('../assets/error.mp3')
                                    zippi.play();
                                }
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            })
                            console.log(err);
                        },
                    });
                },
                3000)
        });
    }

    // var loadFile = function(event) {
    //     var output = document.getElementById('outputs');
    //     output.src = URL.createObjectURL(event.target.files[0]);
    //     $('#otp2').removeClass('d-none');
    //     $('#otp1').addClass('d-none');

    //     var form = new FormData();
    //     form.append("api", "APISENTRABOT");
    //     form.append("file", event.target.files[0]);

    //     var settings = {
    //         "url": "https://server.sentrawidyatama.my.id:3000/api/upload_media/png",
    //         "method": "POST",
    //         "timeout": 0,
    //         "processData": false,
    //         "mimeType": "multipart/form-data",
    //         "contentType": false,
    //         "dataType": 'json',
    //         "data": form
    //     };
    //     $.ajax(settings).done(function(response) {
    //         console.log(response.result.change_name);
    //         $.ajax({
    //             url: "upload.php",
    //             type: "POST",
    //             "data": {
    //                 "type": "updateprofileuser",
    //                 "id": "<?= getSingleValDB('users', 'username', $user, 'id') ?>",
    //                 "result": "<?= str_replace(':3000', '', API_SERVER) ?>" + response.result.change_name
    //             },
    //             "timeout": 0,
    //             "headers": {
    //                 "Content-Type": "application/x-www-form-urlencoded"
    //             },
    //             success: function(res) {
    //                 $('#otp1').removeClass('d-none');
    //                 $('#otp2').addClass('d-none');
    //                 setTimeout(function() {
    //                     Swal.fire({
    //                         title: "Has been updated!!",
    //                         icon: "success",
    //                         confirmButtonColor: "#4a4fea",
    //                     }).then((result) => {
    //                         if (result.isConfirmed) {
    //                             window.location = 'profiles';
    //                         }
    //                     })
    //                 }, 1000);
    //             },
    //             error: function(err) {
    //                 Swal.fire({
    //                     icon: 'error',
    //                     title: 'Oops...',
    //                     text: 'Something went wrong!',
    //                     didOpen: function() {
    //                         var zippi = new Audio('./assets/error.mp3')
    //                         zippi.play();
    //                     }
    //                 }).then((result) => {
    //                     if (result.isConfirmed) {
    //                         location.reload();
    //                     }
    //                 })
    //                 console.log(err);
    //             },
    //         });
    //     });

    // };
    page = 'profiles';
    document.getElementById("title").innerHTML = "Profiles | Spanel - Panel BOT Automate sEntra UTama ";
</script>

<?php
include "../middleware/footer.php";
