<?php
require '../middleware/header.php';
$job = $ckmembr['job'];
$users = $database->query("SELECT * FROM sentra_member WHERE job = '$job'");
$mmbr = $users->fetchAll(PDO::FETCH_ASSOC);
if ($rolee == '1') {
    redirect('../member'); // Member
} else if ($rolee == '3') {
    redirect('../admin'); // Member
} else if ($rolee == '10') {
    redirect('../dev'); // Member
}
if (post('updateMember')) {
    $id = post('ids');
    $name = post('names');
    $npm = post('npms');
    $email = post('emails');
    $phone = post('phones');
    $job = post('jobs');
    $position = post('positions');
    $angkatan = post('angkatans');
    $fakultas = post('fakultass');
    $prodi = post('prodis');
    $database->query("UPDATE sentra_member SET `name` = '$name', `npm` = '$npm', `email` = '$email', `phone` = '$phone', `job` = '$job', `position` = '$position', `faculty` = '$fakultas', `angkatan` = '$angkatan', `prodi` = '$prodi' WHERE `sentra_member`.`id` = $id ");
    swalfire('success', 'Has been updated!', 'member-list');
}

?>
<!-- Start Content-->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mt-0 header-title">Member sEntra </h4>
                </div>
                <div class="card-body table-responsive">
                    <div class="row mb-3">
                        <div class="col-auto">
                            <?php
                            $n = 1;
                            foreach ($mmbr as $v) {
                            ?>
                                <!-- Update modal content -->
                                <div id="update-member-<?= $v['id'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <div class="modal-body">
                                                <div class="text-center mt-2 mb-4">
                                                    <div class="auth-logo">
                                                        <div class="logo logo-light">
                                                            <span class="logo-lg">
                                                                <img src="../assets/images/spanel-logo.png" alt="" height="22">
                                                            </span>
                                                        </div>

                                                        <div class="logo logo-dark">
                                                            <span class="logo-lg">
                                                                <img src="../assets/images/spanel-logo.png" alt="" height="22">
                                                            </span>
                                                        </div>
                                                    </div>

                                                </div>
                                                <p class="text-center mb-3">
                                                    <b>Edit Member ID <?= $v['id'] ?></b>
                                                </p>
                                                <form class="px-3" method="post" id="contact-form">
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Name</label>
                                                        <input type="text" name="ids" id="ids" value="<?= $v['id'] ?>" hidden>
                                                        <input class="form-control" readonly type="text" name="names" id="names" required="" value="<?= $v['name'] ?>">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="npm" class="form-label">NPM (Univ. Widyatama)</label>
                                                        <input class="form-control" readonly type="number" name="npms" id="npms" required="" value="<?= $v['npm'] ?>">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="email" class="form-label">Email</label>
                                                        <input class="form-control" type="email" name="emails" required="" id="emails" value="<?= $v['email'] ?>">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="phone" class="form-label">Phone</label>
                                                        <input class="form-control" type="number" name="phones" required="" id="phones" value="<?= $v['phone'] ?>">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="jobs" class="form-label">Job</label>
                                                        <select name="jobs" class="form-select" required="" id="jobs">
                                                            <option value="<?= $v['job'] ?>">~ <?= $v['job'] ?></option>
                                                            <option value="Marketing">Marketing</option>
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="position" class="form-label">Position</label>
                                                        <select name="positions" class="form-select" required="" id="positions">
                                                            <option value="<?= $v['position'] ?>">~ <?= $v['position'] ?></option>
                                                            <optgroup label="Staff Inti">
                                                                <option value="Ketua">Ketua</option>
                                                                <option value="Wakil Ketua">Wakil Ketua</option>
                                                            </optgroup>
                                                            <optgroup label="Marketing">
                                                                <option value="Sosmed">Sosmed</option>
                                                                <option value="Reporter">Reporter</option>
                                                                <option value="Design">Design</option>
                                                                <option value="Konten">Konten</option>
                                                                <option value="IT">IT</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="angkatan" class="form-label">Angkatan</label>
                                                        <input class="form-control" type="number" name="angkatans" required="" id="angkatans" value="<?= $v['angkatan'] ?>">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="fakultas" class="form-label">Faculty</label>
                                                        <select name="fakultass" class="form-select" id="fakultass" required="">
                                                            <option value="<?= $v['faculty'] ?>">~ <?= $v['faculty'] ?></option>
                                                            <option value="FEB">FEB</option>
                                                            <option value="FIB">FIB</option>
                                                            <option value="FISIP">FISIP</option>
                                                            <option value="FT">FT</option>
                                                            <option value="FDKV">FDKV</option>
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="prodi" class="form-label">Prodi</label>
                                                        <input class="form-control" type="text" name="prodis" required="" id="prodis" value="<?= $v['prodi'] ?>">
                                                    </div>

                                                    <div class="mb-3">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" id="updateMember" name="updateMember" required>
                                                            <label class="form-check-label" for="updateMember">Data yang di update sudah benar</label>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3 text-center">
                                                        <button class="btn btn-primary" type="submit">Submit</button>
                                                    </div>

                                                </form>

                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                            <?php
                            }
                            ?>

                        </div>
                    </div>
                    <table id="datatables" class="table table-bordered dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>NPM</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Position</th>
                                <th>Edu</th>
                                <th>Years</th>
                                <th>QR Code</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $n = 1;
                            foreach ($mmbr as $v) {
                            ?>
                                <tr>
                                    <td scope="row"><?= $n++ ?></td>
                                    <td><?= $v['name'] ?></td>
                                    <td><?= $v['npm'] ?></td>
                                    <td><?= $v['phone'] ?></td>
                                    <td><?= $v['email'] ?></td>
                                    <td><?= $v['position'] ?></td>
                                    <td><?= $v['prodi'] ?></td>
                                    <td><?= $v['angkatan'] ?></td>
                                    <td><?php
                                        if ($v['qrcode'] == null) { ?>
                                            <a href="#" onclick="generateQr('<?= $v['npm'] ?>')" id="qrnpm" class='btn btn-primary'>Generate</a>
                                            <button class="btn btn-primary d-none" id="generate-loader" type="button">
                                                <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                                                Loading...
                                            </button>
                                        <?php  } else {
                                        ?>
                                            <a href="<?= $v['qrcode'] ?>" target="_blank"><img src="<?= $v['qrcode'] ?>" alt="" height="50" width="50"></a><?php  } ?>
                                    </td>
                                    <td class="text-center" scope="row"><a href="#" title="Edit" data-bs-target="#update-member-<?= $v['id'] ?>" data-bs-toggle="modal"><i class="fe-edit "></i></a>
                                        <span style="margin-left: 10px;margin-right: 10px"></span><a href="#" title="Delete" onclick="deletes('<?= $v['id'] ?>','<?= $v['name'] ?>')"><i class="fe-trash-2 text-danger"></i></a>
                                    </td>
                                </tr>
                            <?php
                            }

                            ?>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div> <!-- end row -->
</div>
<script>
    page = 'member';
    document.getElementById("title").innerHTML = "Member | Spanel - Panel BOT Automate sEntra UTama ";

    function generateQr(npm) {
        $('#qrnpm').addClass('d-none');
        $('#generate-loader').removeClass('d-none');
        var settings = {
            "url": "<?= API_SERVER ?>/api/generateQR",
            "method": "POST",
            "timeout": 0,
            "headers": {
                "api_key": "<?= API_KEY_SERVER ?>",
                "Content-Type": "application/x-www-form-urlencoded"
            },
            "data": {
                "text": npm
            }
        };

        $.ajax(settings).done(function(response) {
            setTimeout(() => {
                $.ajax({
                    url: "../core/App.upload.php",
                    type: "POST",
                    "data": {
                        "type": "updateqrmember",
                        "npm": npm,
                        "result": response.result
                    },
                    "timeout": 0,
                    "headers": {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    success: function(res) {
                        $('#generate-loader').addClass('d-none');
                        $('#qrnpm').removeClass('d-none');
                        Swal.fire({
                            title: "Generated!",
                            icon: "success",
                            confirmButtonColor: "#4a4fea",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                    },
                    error: function(err) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            }
                        })
                        console.log(err);
                    },
                });
            }, 5000);
        });
    }

    function deletes(id, name) {
        Swal.fire({
            title: "Are you sure?",
            text: "delete member " + name + " and ID " + id + ", You won't be able to revert this! ",
            icon: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            confirmButtonClass: "btn btn-success mt-2",
            cancelButtonClass: "btn btn-danger ms-2 mt-2",
            buttonsStyling: !1,
        }).then(function(e) {
            e.value ?
                $.post("../core/App.upload.php", {
                    "type": "delete-member",
                    "id": id
                }, function() {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Member (" + name + ") been deleted.",
                        icon: "success",
                        confirmButtonColor: "#4a4fea",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    })
                }) :
                e.dismiss === Swal.DismissReason.cancel &&
                Swal.fire({
                    title: "Cancelled",
                    text: name + " is safe :)",
                    icon: "success",
                    confirmButtonColor: "#4a4fea",
                });
        });
    }
</script>
<?php
require '../middleware/footer.php';
?>