<?php
require '../middleware/header.php';
if (post('trouble')) {
    $l = post('link');
    $t = post('trouble');
    $text = "====================={n}REPORT TROUBLE{n}====================={n}Link : $l{n}Trouble : $t{n}Laporan dari $user";
    $sentra->sendMessageText('62895349086103', $text);
    swalfire('success', 'Terimakasih atas bug yang telah kamu laporkan :)', '');
}
?>
<!-- Start Content-->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-6" style="margin-left:auto;margin-right:auto;display:block">
            <div class="card">
                <div class="card-header">
                    REPORT BUG WEBSITE
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="form-group mb-3">
                            <label for="old">Link Page Error/Bug?</label>
                            <input type="text" class="form-control" id="link" name="link" placeholder="Link Page Error/Bug?" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="confirm">Trouble?</label>
                            <textarea name="trouble" id="trouble" class="form-control" placeholder="Deskripsikan Masalah" required cols="30" rows="10"></textarea>
                        </div>
                        <div class="mb-3 mt-3 text-end">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
</div>
<script>
    page = 'report';
    document.getElementById("title").innerHTML = "Report Bug | Spanel - Panel BOT Automate sEntra UTama ";
</script>
<?php
require '../middleware/footer.php';
