<?php
require '../template-app/header.php';

?>
<div id="loadingsend" class="d-none">
    <img src="<?= $domain ?>assets/images/logo_sentra.png" class="tuna" alt="">
    <div class="loading loading05">
        <span>Send Message</span>
    </div>
</div>
<!-- Start Content-->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <marquee behavior="" direction="">COMING SOON!</marquee>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
<!-- End Content -->
<script>
    page = 'schedule-wa';
    document.getElementById("title").innerHTML = "{WA}Scheduled Messages | Spanel - Panel BOT Automate sEntra UTama ";
</script>
<?php
require '../template-app/footer.php';
?>