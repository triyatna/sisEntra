<?php
require '../middleware/header.php';
$job = $ckmembr['job'];
$samejob = $database->query("SELECT * FROM `sentra_member` WHERE `job` = '$job'")->fetchAll(PDO::FETCH_ASSOC);
if ($rolee == '2') {
    redirect('../staff'); // Member
} else if ($rolee == '3') {
    redirect('../admin'); // Member
} else if ($rolee == '10') {
    redirect('../dev'); // Member
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title mt-0">Member Divisi <?= $job ?></h4>
                </div>
                <div class="card-body">
                    <ul class="list-group mb-0 user-list">
                        <?php
                        foreach ($samejob as $key => $value) {
                        ?>
                            <li class="list-group-item">
                                <a href="#" class="user-list-item">
                                    <div class="user avatar-sm float-start me-2">
                                        <img src="<?= getSingleValDB('users', 'name', $value['name'], 'avatar') ?>" alt="" class="img-fluid rounded-circle">
                                    </div>
                                    <div class="user-desc">
                                        <h5 class="name mt-0 mb-1"><?= $value['name'] ?></h5>
                                        <p class="desc text-muted mb-0 font-12"><?= $value['position'] ?></p>
                                    </div>
                                </a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="card">
                <div class="card-body">

                    <h4 class="header-title mt-0 mb-4">Member Divisi <?= $job ?></h4>

                    <div class="widget-chart-1">

                        <div class="widget-detail-1 text-end">
                            <h2 class="fw-normal pt-2 mb-1"> <?= countDBrow('sentra_member', 'job', $job) ?> </h2>
                            <p class="text-muted mb-1">Anggota</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">

                    <h4 class="header-title mt-0 mb-4">Ip Address</h4>

                    <div class="widget-chart-1">

                        <div class="widget-detail-1 text-end">
                            <h2 class="fw-normal pt-2 mb-1"> <?= checkmyip() ?> </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add New Event MODAL -->
        <div class="modal fade" id="event-modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header py-3 px-4 border-bottom-0 d-block">
                        <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                        <h5 class="modal-title" id="modal-title">Event</h5>
                    </div>
                    <div class="modal-body px-4 pb-4 pt-0">
                        <form class="needs-validation" name="event-form" id="form-event" novalidate>
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Event Name</label>
                                        <input class="form-control" placeholder="Insert Event Name" type="text" name="title" id="event-title" required />
                                        <div class="invalid-feedback">Please provide a valid event name</div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Category</label>
                                        <select class="form-select" name="category" id="event-category" required>
                                            <option value="bg-primary" selected>Primary</option>
                                            <option value="bg-danger">Danger</option>
                                            <option value="bg-success">Success</option>
                                            <option value="bg-info">Info</option>
                                            <option value="bg-dark">Dark</option>
                                            <option value="bg-warning">Warning</option>
                                        </select>
                                        <div class="invalid-feedback">Please select a valid event category</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6 col-4">
                                    <button type="button" class="btn btn-danger" id="btn-delete-event">Delete</button>
                                </div>
                                <div class="col-md-6 col-8 text-end">
                                    <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success" id="btn-save-event">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> <!-- end modal-content-->
            </div> <!-- end modal dialog-->
        </div>
        <!-- end modal-->
        <div class="col-xl-6 col-md-6">
            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mt-0">Server Time</h4>
                            <div id="clock" dir="ltr" style="height: 110px"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="header-title mt-0 mb-4">Project</h4>

                            <div class="widget-chart-1">

                                <div class="widget-detail-1 text-end">
                                    <h2 class="fw-normal pt-2 mb-1"> <?= countDBrow('sentra_project', 'division', $job) ?> </h2>
                                    <p class="text-muted mb-1">Completed by <?= $job ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div id="calendar-dashboard"></div>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div>
    </div>
    <!-- end row -->
</div>
<!-- container-fluid -->
<script>
    page = 'dashboard';
    document.getElementById("title").innerHTML = "Dashboard | Spanel - Panel BOT Automate sEntra UTama ";
</script>

<?php
require '../middleware/footer.php';
?>