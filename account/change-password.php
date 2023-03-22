<?php
require '../middleware/header.php';
if (post('confirm')) {
    $old = post('old');
    $new = post('new');
    $confirm = post('confirm');
    $pw = mysqli_query($mysqli, "SELECT * FROM users WHERE username='$user' ORDER BY id DESC LIMIT 1");
    while ($pws = mysqli_fetch_assoc($pw)) {
        if (mysqli_num_rows($pw) > 0) {
            if (password_verify($old, $pws['password']) > 0) {
                if ($new == $confirm) {
                    $uppercase = preg_match('@[A-Z]@', $confirm);
                    $lowercase = preg_match('@[a-z]@', $confirm);
                    $number    = preg_match('@[0-9]@', $confirm);
                    $specialChars = preg_match('@[^\w]@', $confirm);
                    if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($confirm) < 8) {
                        swalfire('error', 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.', 'change-password');
                    } else {
                        $id = $pws['id'];
                        $password = password_hash($confirm, PASSWORD_BCRYPT);
                        mysqli_query($mysqli, "UPDATE `users` SET `password` = '$password' WHERE `users`.`id` =$id");
                        swalfire('success', 'Password successfully changed', 'change-password');
                    }
                } else {
                    swalfire('error', 'Passwords are not the same', 'change-password');
                }
            } else {
                swalfire('error', 'Wrong old password', 'change-password');
            }
        } else {
            swalfire('error', 'Wrong old password', 'change-password');
        }
    }
}
?>
<!-- Start Content-->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-6" style="margin-left:auto;margin-right:auto;display:block">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4 mt-1">Change Password</h4>
                    <form method="post">
                        <div class="form-group mb-3">
                            <label for="old">Old Password</label>
                            <input type="password" class="form-control" id="old" name="old" placeholder="Enter old password" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="new">New Password</label>
                            <input type="password" class="form-control" id="new" name="new" placeholder="Enter new password" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="confirm">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm" name="confirm" placeholder="Enter confirm password" required>
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
    page = 'change-password';
    document.getElementById("title").innerHTML = "Change Password | Spanel - Panel BOT Automate sEntra UTama ";
</script>
<?php
require '../middleware/footer.php';
