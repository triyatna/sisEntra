<?php
require '../middleware/header.php';
if ($rolee == '2') {
    redirect('../staff'); // Member
} else if ($rolee == '3') {
    redirect('../admin'); // Member
} else if ($rolee == '10') {
    redirect('../dev'); // Member
}
$job = $ckmembr['job'];
?>
<!-- Start Content-->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-4">Agenda</h4>

                    <div class="widget-chart-1">

                        <div class="widget-detail-1 text-end">
                            <h2 class="fw-normal pt-2 mb-1"> <?= countDB('sentra_agenda') ?> </h2>
                            <p class="text-muted mb-1">Total Agenda</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-4">Kehadiran Individu</h4>
                    <div class="widget-chart-1">
                        <div class="widget-detail-1 text-end">
                            <h2 class="fw-normal pt-2 mb-1"> <?= countDBrow('sentra_presence', 'name', $name) ?> </h2>
                            <p class="text-muted mb-1">Hadir dalam Agenda</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-4">Kehadiran <?= $job ?></h4>
                    <div class="widget-chart-1">
                        <div class="widget-detail-1 text-end">
                            <h2 class="fw-normal pt-2 mb-1">
                                <?php
                                if (get('agenda')) {
                                    $agenda = get('agenda');
                                    if ($agenda == 'View All') {
                                        echo $database->query("SELECT * FROM `sentra_presence` WHERE `job`='$job'")->rowCount();
                                    } else {
                                        echo $database->query("SELECT * FROM `sentra_presence` WHERE `job`='$job' AND `agenda`='$agenda'")->rowCount();
                                    }
                                } else {
                                    echo '0';
                                }
                                ?>
                            </h2>
                            <p class="text-muted mb-1">Orang Hadir dalam Agenda</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Tabel Presensi - <?= $job ?></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col mb-2">
                        </div>
                        <div class="col-lg-3 mb-2">
                            <form id="frm" method="get">
                                <select name="agenda" onchange="onSelectChange();" id="agenda" class="form-control">
                                    <?php
                                    if (get('agenda')) {
                                        $aggg = "<option value='' selected hidden>" . get('agenda') . "</option>";
                                    } else {
                                        $aggg = "<option value='' selected hidden>Select Agenda</option>";
                                    }
                                    $ckdbagenda = $database->query("SELECT * FROM `sentra_agenda`");
                                    echo $aggg;
                                    if ($ckdbagenda->rowCount() > 0) {
                                        foreach ($ckdbagenda as $row) {
                                            echo "<option value='" . $row['agenda_name'] . "'>" . $row['agenda_name'] . "</option>";
                                        }
                                    }
                                    ?>
                                    <option value='View All'>View All</option>
                                </select>
                            </form>
                        </div>
                    </div>
                    <table id="presence-table" class="table table-bordered dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th class="col-1">ID</th>
                                <th>Name</th>
                                <th>NPM</th>
                                <th>Agenda</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            if (get('agenda')) {
                                $agenda = get('agenda');
                                if ($agenda == 'View All') {
                                    $ckdbpresens = $database->query("SELECT * FROM `sentra_presence` WHERE `job`='$job'");
                                } else {
                                    $ckdbpresens = $database->query("SELECT * FROM `sentra_presence` WHERE `job`='$job' AND `agenda`='$agenda'");
                                }
                                $id = 1;
                                foreach ($ckdbpresens as $ckdbpresen) {
                                    $name = $ckdbpresen['name'];
                                    $npm = $ckdbpresen['npm'];
                                    $agenda = $ckdbpresen['agenda'];
                                    $time = $ckdbpresen['timedate'];
                                    echo "<tr>
                                    <td scope='row'>" . $id++ . "</td>
                                    <td>$name</td>
                                    <td>$npm</td>
                                    <td>$agenda</td>
                                    <td>$time</td>
                                    </tr>";
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
<!-- End Content -->
<script>
    function onSelectChange() {
        document.getElementById('frm').submit();
    }
    page = 'presence';
    document.getElementById("title").innerHTML = "Report Presence | Spanel - Panel BOT Automate sEntra UTama ";
</script>
<?php
require '../middleware/footer.php';
?>