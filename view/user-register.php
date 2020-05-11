<?php if (isset($success)): ?>
    <script type="text/javascript">
        $(function () {
            Swal.fire({
                // position: 'top',
                icon: 'success',
                title: 'Successfully Registered',
                showConfirmButton: false,
                timer: 1500
            }).then(function () {
                window.location = 'index.php';
            })
        });
    </script>
    <!--    <script type="text/javascript">-->
    <!--        $(function () {-->
    <!--            Swal.fire({-->
    <!--                icon: 'error',-->
    <!--                title: 'Error',-->
    <!--                text: 'There were errors while saving the data.',-->
    <!--                type: 'error'-->
    <!--            })-->
    <!--        });-->
    <!--    </script>-->
<?php endif; ?>
<?php //unset($_SESSION['success']); ?>

<div class="row justify-content-center">
    <div class="col-md-4 col-xs-12 col-sm-6 my-5">
        <div class="form-group">
            <h1>Register Form</h1>
        </div>
        <form id="register-form" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                <p class="userErr error">
                    <?php if (isset($existUser)) {
                        echo $existUser;
                    } ?></p>
            </div>

            <div class="form-group">
                <label for="studentId">Student ID:</label>
                <input type="text" class="form-control" id="studentId" name="studentId" placeholder="Student ID">
                <p class="idErr error"></p>
                <span class="error"><?php if (isset($existId)) {
                        echo $existId;
                    } ?></span>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                <p class="emailErr error"></p>
                <span class="error"><?php if (isset($existEmail)) {
                        echo $existEmail;
                    } ?></span>
            </div>

            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number">
                <p class="phoneErr error"></p>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <p class="pswErr error"></p>
            </div>

            <div class="form-group">
                <label for="re_psw">Re-type password:</label>
                <input type="password" class="form-control" id="re_psw" name="re_psw" placeholder="Re-type password">
                <p class="retypeErr error"></p>
            </div>

            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="remember-me" required>
                <label for="remember-me" class="form-check-label">
                    <span>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</span>
                </label>
            </div>

            <div class="form-group my-3">
                <button class="btn-primary btn" type="submit">Register</button>
                <button class="btn-secondary btn" onclick="window.history.back(); return false;">Cancel</button>
            </div>

        </form>
    </div>
</div>
