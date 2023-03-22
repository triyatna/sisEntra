<?php
require '../middleware/header.output.php';


?>
<div class="account-pages mt-2 mb-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-6">
                <div class="text-center mb-2">
                    <a href="../">
                        <img src="../assets/images/logo_sentra.png" alt="" height="100" class="mx-auto">
                    </a>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-4 text-black text-center">Formulir Daftar Ulang Anggota</h3>
                        <hr>
                        <p class="text-center">Bagi seluruh anggota sEntra periode 2022/2023 silahkan untuk mendaftar, gunakanlah data yang valid dan dapat dipertanggungjawabkan!</p>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="file">Data Excel</label>
                            <input type="file" name="file" class="form-control" id="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel, .xlsx, .xls">
                        </div>
                        <div id="notif1"></div>
                        <div class="mb-3 mt-3 text-end">
                            <button class="btn btn-primary" type="submit" onclick="process1()">Submit</button>
                        </div>
                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

            </div> <!-- end col -->

        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->
<!-- Vendor js -->
<script src="../assets/js/vendor.min.js"></script>
<script src="../core/getavatar.js"></script>
<script>
    function process1() {
        var file = $('#file').prop('files')[0];
        var form_data = new FormData();
        console.log(file);
        form_data.append('file', file);
        form_data.append("a", "3");
        form_data.append("b", "2");
        form_data.append("c", "3");
        form_data.append("d", "4");
        form_data.append("e", "5");
        form_data.append("f", "6");
        form_data.append("g", "7");
        form_data.append("h", "8");
        form_data.append("i", "9");
        form_data.append("j", "10");
        form_data.append("k", "11");

        if (file == undefined) {
            document.getElementById('notif1').innerHTML = '<div class="alert alert-danger" role="alert">Please fill the fields!</div>';
        } else {
            console.log(form_data);
            $('#loadingsend').removeClass('d-none');
            $('#loadingsendarea').addClass('d-none bg-bluur');
            $.ajax({
                url: '<?= $domain; ?>lib/import-excel-anggotabaru.php',
                type: 'POST',
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    $('#loadingsend').addClass('d-none');
                    $('#loadingsendarea').removeClass('d-none bg-bluur');
                    Swal.fire({
                        icon: 'success',
                        title: 'Done!',
                        text: 'Added Data Success!',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    })

                }
            });
        }

    }
    document.getElementById('title').innerHTML = "Daftar Ulang | Spanel - sEntra Panel";
    $('#avatar').val(generateAvatar());
</script>
<!-- App js -->
<script src="../assets/js/app.min.js"></script>

</body>

</html>