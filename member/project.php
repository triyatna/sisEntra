<?php
require '../middleware/header.php';
$job = $ckmembr['job'];
if ($rolee == '2') {
    redirect('../staff'); // Member
} else if ($rolee == '3') {
    redirect('../admin'); // Member
} else if ($rolee == '10') {
    redirect('../dev'); // Member
}

?>
<!-- Start Content-->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-4">
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
    <div class="row">
        <!-- end row -->
        <?php
        $projectCheck = $database->query("SELECT * FROM sentra_project WHERE division='$job'");
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
    document.getElementById("title").innerHTML = "Report Project | Spanel - Panel BOT Automate sEntra UTama ";
</script>
<?php
require '../middleware/footer.php';
?>