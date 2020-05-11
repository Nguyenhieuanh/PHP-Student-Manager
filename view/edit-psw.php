<?php
if (!isset($_SESSION['isLogin'])) {
    header("location:index.php?page=login");
}
?>
<div class="row justify-content-center">
    <div class="col-md-3 col-xs-12 col-sm-6 my-5">
        <div class="form-group">
            <h1>Change password </h1>
        </div>
        <form action="" method="post">
            <div class="form-group">
                <label for="cur_psw">Current password:</label>
                <input type="password" class="form-control" id="cur_psw" name="cur_psw" placeholder="Current password">
                <p class="error"><?php
                    if (isset($errChange)) {
                        echo $errChange;
                    }
                    ?></p>
            </div>

            <div class="form-group">
                <label for="password">New password:</label>
                <input type="password" class="form-control" id="password" name="new_psw" placeholder="New password">
                <p class="pswErr error"></p>
            </div>

            <div class="form-group">
                <label for="re_psw">Re-type new password:</label>
                <input type="password" class="form-control" id="re_psw" name="re_psw"
                       placeholder="Re-type new password">
                <p class="retypeErr error"></p>
            </div>

            <button type="submit" class="btn btn-success btn-block my-3" name="btn-save"><i class="fas fa-save"></i>
                Save
            </button>
        </form>
    </div>
</div>
