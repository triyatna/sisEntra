<?php
require '../template-app/header.php';
if (post('phone2')) {
    $phone = post('phone2');
    $arrphone = explode(";", $phone);
    $name = post('namee');
    $code = ["%name%", "%npm%", "%email%", "%phone%", "%job%", "%position%", "%faculty%", "%years%", "%prodi%", "/\r?\n/g"];
    $arrcode   = ["", "", "", "", "", "", "", "", "", "{n}"];
    $msg = str_replace($code, $arrcode, post('text2'));
    for ($i = 0; $i < count($arrphone); $i++) {
        $sentra->sendMessageText($arrphone[$i], $msg);
    }
}
?>
<div id="loadingsend" class="d-none">
    <img src="<?= $domain ?>assets/images/logo_sentra.png" class="tuna" alt="">
    <div class="loading loading05">
        <span>Send Message</span>
    </div>
</div>
<!-- Start Content-->
<div class="container-fluid">
    <div class="row" id="loadingsendarea">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4 mt-1">Send Message</h4>
                    <div class="form-group mb-3">
                        <label for="phone2">Phone</label>
                        <input type="text" class="form-control" id="phone2" name="phone2" placeholder="6282123232688">
                    </div>
                    <div class="form-group mb-3">
                        <label for="namee">Name</label>
                        <input type="text" class="form-control" id="namee" name="namee" placeholder="sEntra Official">
                    </div>
                    <div class="form-group mb-3">
                        <label for="text2">Message Text</label>
                        <textarea name="text2" id="text2" class="form-control" cols="30" rows="10" placeholder="Halo kak, Bagaimana Kabarnya"></textarea>
                    </div>
                    <div id="notif2"></div>
                    <div class="mb-3 mt-3 text-end">
                        <button class="btn btn-primary" type="submit" onclick="process2()">Submit</button>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4 mt-1">Send Message from Excel</h4>
                    <div class="form-group mb-3">
                        <label for="excelmsg">Data Excel</label>
                        <input type="file" name="excelmsg" class="form-control" id="excelmsg" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel, .xlsx, .xls">
                    </div>
                    <div id="notif1"></div>
                    <a href="../../lib/template-whatsapp-msg.xlsx">Download Template</a>
                    <div class="mb-3 mt-3 text-end">
                        <button class="btn btn-primary" type="submit" onclick="process1()">Submit</button>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row -->
</div>
<!-- End Content -->
<script>
    function process2() {
        text = $('#text2').val().replace(/\r?\n/g, '{n}');
        phone = $('#phone2').val();
        name = $('#namee').val();
        if (text == '' || phone == '' || name == '') {
            document.getElementById('notif2').innerHTML = '<div class="alert alert-danger" role="alert">Please fill all the fields!</div>';
        } else {
            $('#loadingsend').removeClass('d-none');
            $('#loadingsendarea').addClass('d-none bg-bluur');

            $.ajax({
                url: '<?= $domain; ?>app/whatsapp/send-message',
                type: 'POST',
                data: {
                    phone2: phone,
                    text2: text,
                    namee: name,
                },
                success: function(data) {
                    $('#loadingsend').addClass('d-none');
                    $('#loadingsendarea').removeClass('d-none bg-bluur');
                    Swal.fire({
                        icon: 'success',
                        title: 'Done!',
                        text: 'Send Message Success!',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    })

                }
            });
        }

    }

    function process1() {
        var excelmsg = $('#excelmsg').prop('files')[0];
        var form_data = new FormData();
        console.log(excelmsg);
        form_data.append('excelmsg', excelmsg);
        form_data.append("a", "3");
        form_data.append("b", "2");
        form_data.append("c", "4");
        if (excelmsg == undefined) {
            document.getElementById('notif1').innerHTML = '<div class="alert alert-danger" role="alert">Please fill the fields!</div>';
        } else {
            $('#loadingsend').removeClass('d-none');
            $('#loadingsendarea').addClass('d-none bg-bluur');
            $.ajax({
                url: '<?= $domain; ?>lib/broadcast-excel-message-wa',
                type: 'POST',
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $('#loadingsend').addClass('d-none');
                    $('#loadingsendarea').removeClass('d-none bg-bluur');
                    Swal.fire({
                        icon: 'success',
                        title: 'Done!',
                        text: 'Send Message Success!',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    })

                }
            });
        }

    }
    page = 'message-wa';
    document.getElementById("title").innerHTML = "{WA}Send Messages | Spanel - Panel BOT Automate sEntra UTama ";
</script>
<?php
require '../template-app/footer.php';
?>