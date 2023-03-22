<?php
require '../middleware/header.php';
if ($rolee == '1') {
    redirect('../member'); // Member
}
?>
<!-- Start Content-->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">
                        Create Formulir Agenda
                    </h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="agendae" class="form-label">Nama Agenda</label>
                        <input class="form-control" type="text" name="agendae" id="agendae" required="">
                    </div>
                    <div class="mb-3">
                        <label for="catatan" class="form-label">Catatan</label>
                        <textarea name="catatan" class="form-control" id="catatan" cols="30" rows="10"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Jadwal</label>
                        <input type="date" class="form-control" name="date" id="date">
                    </div>
                    <div class="mb-3">
                        <label for="statuses" class="form-label">Rapat</label>
                        <select name="statuses" class="form-control" id="statuses">
                            <option value="" selected hidden>Pilih Sasaran</option>
                            <option value="0">Global</option>
                            <option value="1">Divisi</option>
                            <option value="2">Staff Inti</option>
                        </select>
                    </div>
                    <div class="mb-3 text-center">
                        <button class="btn btn-primary" onclick="submAgenda()" type="submit">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Copy Link URL</h3>
                </div>
                <div class="card-body">
                    <label for="agendas" class="form-label">Nama Agenda</label>
                    <select name="agendas" class="form-control" id="agendas">
                        <option selected value="" hidden>Select Agenda</option>
                        <?php
                        $check = mysqli_query($mysqli, "SELECT * FROM `sentra_agenda`");
                        while ($as = mysqli_fetch_assoc($check)) {
                        ?>
                            <option value="<?= $as['query'] ?>"><?= $as['agenda_name'] ?> ~ <?= date("d-m-Y", strtotime($as['date'])) ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <div class="mb-3 mt-3 text-center">
                        <div class="btn btn-primary" onclick="getLink()">GET LINK</div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <label for="agendas" class="form-label">Link Form</label>
                    <input type="text" class="form-control" readonly id="myInput">
                    <div id="copyybtn"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function submAgenda() {
        var agenda = $("#agendae").val();
        var catatan = $("#catatan").val();
        var date = $("#date").val();
        var statuse = $("#statuses").val();

        $.ajax({
            url: "../core/App.upload.php",
            type: "POST",
            data: {
                type: "addformAgenda",
                agenda: agenda,
                catatan: catatan,
                date: date,
                status: statuse
            },
            success: function(res) {
                navigator.clipboard.writeText(encodeURI("<?= DOMAIN_APP ?>form/?agenda-rapat=" + res.result.agenda));
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Berhasil membuat formulir agenda',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    location.reload();
                });
            },
            error: function(err) {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Gagal membuat formulir agenda',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    location.reload();
                });

            },
        });
    }

    function myFunction() {
        // Get the text field
        var copyText = document.getElementById("myInput");

        if (copyText.value != "") {
            // Select the text field
            copyText.select();
            copyText.setSelectionRange(0, 99999); // For mobile devices

            // Copy the text inside the text field
            navigator.clipboard.writeText(encodeURI(copyText.value));

            // Alert the copied text
            alert("Copied the text: " + copyText.value);
        }
    }

    function getLink() {
        const da = document.querySelector('#agendas').value;
        if (da != '') {
            document.getElementById("myInput").value = "<?= DOMAIN_APP ?>form/?agenda-rapat=" + da.replaceAll(" ", "+");
            document.getElementById("copyybtn").innerHTML = '<button onclick="myFunction()">Copy</button>';
        }
    }
    page = 'form-agenda';
    document.getElementById("title").innerHTML = "Create Form Agenda | Spanel - Panel BOT Automate sEntra UTama ";
</script>
<?php
require '../middleware/footer.php';
