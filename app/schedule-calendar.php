<?php
require '../middleware/header.php';
$event = $database->query("SELECT * FROM `sentra_calendar` LIMIT 6");
if (post('startdate')) {
    $title = post('title');
    $start = strtotime(post('startdate'));
    $desc = post('desc');
    $class = post('category');
    if (post('alldaycheck')) {
        $check = 'true';
        $end = strtotime(post('startdate'));
    } else {
        $check = 'false';
        $end = strtotime(post('enddate'));
    }
    $database->query("INSERT INTO sentra_calendar VALUES (NULL, '$title', '$desc', '$start', '$start', '$class', '$check', UNIX_TIMESTAMP(), '$user')");
    swalfire('success', 'Berhasil menambahkan event', 'schedule-calendar');
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-lg-3">
                    <button class="btn btn-lg font-16 btn-success w-100 mb-3" type="button" data-bs-toggle="modal" data-bs-target="#con-close-modal"><i class="fa fa-plus me-1"></i> Create New</button>
                    <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <form method="post" id="postschedule">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add New Event</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Event Name</label>
                                                    <input class="form-control" placeholder="Insert Event Name" required type="text" name="title" id="title-event" required />
                                                    <div class="invalid-feedback">Please provide a valid event name</div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Description</label>
                                                    <textarea name="desc" id="desc" class="form-control" cols="30" required rows="10" placeholder="Insert Event Description"></textarea>
                                                    <div class="invalid-feedback">Please provide a valid event description</div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Start</label>
                                                    <input type="date" name="startdate" class="form-control" required id="startdate">
                                                    <div class="invalid-feedback">Please provide a valid event start date</div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">All Day</label>
                                                <div class="mb-3">
                                                    <input type="checkbox" class="form-control" name="alldaycheck" id="alldaycheck" data-plugin="switchery" data-color="#1bb99a">
                                                    <div class="invalid-feedback">Please provide a valid event specific</div>
                                                </div>
                                            </div>
                                            <div class="col-12" id="enddatediv">
                                                <div class="mb-3">
                                                    <label class="form-label">End</label>
                                                    <input type="date" name="enddate" class="form-control" required id="enddate">
                                                    <div class="invalid-feedback">Please provide a valid event end date</div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Category</label>
                                                    <select class="form-select" name="category" required id="category-event" required>
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

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-info waves-effect waves-light">Save changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><!-- /.modal -->

                    <div class="card">
                        <div class="card-header">sEntra Schedule</div>
                        <div class="card-body">
                            <ul class="list-group mb-0 user-list">
                                <?php
                                if ($event->rowCount() > 0) {
                                    $checks = $event->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($checks as $key => $value) {
                                ?>
                                        <li class="list-group-item <?= $value['classname'] ?>">
                                            <a href="#" class="user-list-item">
                                                <div class="user-desc">
                                                    <h5 class="name text-light mt-0 mb-1"><strong><?= $value['title'] ?></strong></h5>
                                                    <p class="desc text-white mb-0 font-12"><?= date("l, d M Y", $value['start']) ?></p>
                                                </div>
                                            </a>
                                        </li>
                                <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-body">

                            <div id="calendar"></div>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div> <!-- end col -->
            </div> <!-- end row -->


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
        </div>
        <!-- end col-12 -->
    </div>
    <!-- end row -->
</div>
<!-- container-fluid -->
<script>
    page = 'calendar';
    document.getElementById("title").innerHTML = "Calendar | Spanel - Panel BOT Automate sEntra UTama ";
</script>

<?php
require '../middleware/footer.php';
?>