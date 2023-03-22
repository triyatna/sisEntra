<?php
require '../middleware/header.php';
if ($rolee == '1') {
    redirect('../member'); // Member
} else if ($rolee == '3') {
    redirect('../admin'); // Member
} else if ($rolee == '10') {
    redirect('../dev'); // Member
}

if (post('namepro')) {
    $name = post('namepro');
    $desc = post('desc');
    $divisi = post('division');
    $link = post('urllink');
    $team = implode(",", $_POST['names']);
    $check = $database->query("SELECT * FROM sentra_project WHERE title = '$name'");
    if ($check->rowCount() == 0) {
        $database->query("INSERT INTO `sentra_project` VALUES (NULL, '$name', '$desc', '$divisi', '$team', '$link', UNIX_TIMESTAMP())");
        swalfire('success', 'Project has been created', 'project');
    } else {
        swalfire('error', 'Project already exists', 'project');
    }
}
?>
<!-- Start Content-->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-4">
            <a href="#" class="btn btn-purple rounded-pill w-md waves-effect waves-light mb-3" data-bs-toggle="modal" data-bs-target="#add-project"><i class="mdi mdi-plus"></i> Create Project</a>
        </div>
        <div class="col-sm-8">
            <div class="float-end">
                <form class="row g-2 align-items-center mb-2 mb-sm-0">
                    <div class="col-auto">
                        <div class="d-flex">
                            <label class="d-flex align-items-center">Phase
                                <select class="form-select form-select-sm d-inline-block ms-2">
                                    <option>All Projects(6)</option>
                                    <option>Complated</option>
                                </select>
                            </label>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="d-flex">
                            <label class="d-flex align-items-center">Sort
                                <select class="form-select form-select-sm d-inline-block ms-2">
                                    <option>Date</option>
                                    <option>Name</option>
                                    <option>End date</option>
                                    <option>Start Date</option>
                                </select>
                            </label>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- end col-->
    </div>
    <div id="add-project" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Project</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="namepro" class="form-label">Name Project</label>
                                    <input type="text" class="form-control" name="namepro" id="namepro" placeholder="Desain Poster Hari Raya Idul Fitri" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="division" class="form-label">Division</label>
                                    <select name="division" class="form-control" id="division" required>
                                        <option value="" selected hidden>Select Division</option>
                                        <option value="Marketing">Marketing</option>
                                        <option value="Berita Internasional">Berita Internasional</option>
                                        <option value="Berita Nasional">Berita Nasional</option>
                                        <option value="Berita Kampus">Berita Kampus</option>
                                        <option value="Berita Evergreen">Evergreen</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="desc" class="form-label">Description</label>
                                    <textarea name="desc" id="desc" class="form-control" cols="10" rows="5" required placeholder="Mengerjakan Desain Poster"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="names" class="form-label">By Who?</label>
                                    <select name="names[]" class="form-control" id="names" multiple required>
                                        <option value="" selected hidden>Select Name or Multi Name</option>
                                        <?php
                                        $USmember = $database->query("SELECT * FROM users");
                                        if ($USmember->rowCount() > 0) {
                                            foreach ($USmember as $USmember) {
                                                $id = $USmember['id'];
                                                $name = $USmember['name'];
                                                echo "<option value='$id'>$name</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="urllink" class="form-label">URL Link Project</label>
                                    <input type="text" class="form-control" id="urllink" name="urllink" placeholder="https://example.com/asdascdaisdaasdas" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info waves-effect waves-light">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <!-- end row -->
    <div class="row">
        <!-- end row -->
        <?php
        $projectCheck = $database->query("SELECT * FROM sentra_project");
        if ($projectCheck->rowCount() > 0) {
            $projectData = $projectCheck->fetchAll(PDO::FETCH_ASSOC);
            foreach ($projectData as $project) {
        ?>
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body project-box">
                            <div class="badge bg-success float-end">Completed</div>
                            <h4 class="mt-0"><a href="" class="text-dark"><?= $project['title'] ?></a></h4>
                            <p class="text-pink text-uppercase font-13"><?= $project['division'] ?></p>
                            <p class="text-muted font-13"><?= $project['description'] ?></p>
                            <div class="project-members mb-2">
                                <h5 class="float-start me-3">Team :</h5>
                                <div class="avatar-group">
                                    <?php
                                    $iddUsers = $project['team'];
                                    $userCheck = $database->query("SELECT * FROM users WHERE id IN ($iddUsers)");
                                    if ($userCheck->rowCount() > 0) {
                                        $userData = $userCheck->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($userData as $users) {
                                    ?>
                                            <a href="#" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= $users['name'] ?>">
                                                <img src="<?= $users['avatar'] ?>" class="rounded-circle avatar-sm" alt="Team" /> </a>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="text-end">
                                <a href="<?= $project['url_link'] ?>" target="_blank" class="text-primary"> Result</a>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>

    <!-- end row -->
</div>
<!-- End Content -->
<script>
    page = 'project';
    document.getElementById("title").innerHTML = "Data Project | Spanel - Panel BOT Automate sEntra UTama ";
</script>
<?php
require '../middleware/footer.php';
?>