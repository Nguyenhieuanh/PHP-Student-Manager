<?php
if ($_SESSION['role'] == 5):
    ?>
    <div class="form-row justify-content-center">
        <div class="col-md-4 col-xs-12 col-sm-6 my-5">
            <div class="form-group">
                <h1>Edit profile</h1>
            </div>
            <form action="#" enctype="multipart/form-data" method="post">
                <input type="hidden" name="studentId" value="<?php echo $student['studentId']; ?>">
                <div class="form-group">
                    <label for="firstName">First name:</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First name"
                           value="<?php echo $student['firstname']; ?>">
                </div>

                <div class="form-group">
                    <label for="lastName">Last name:</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last name"
                           value="<?php echo $student['lastname']; ?>">
                </div>

                <div class="form-group">
                    <label for="dob">Date of birth:</label>
                    <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $student['dob']; ?>">
                </div>

                <div class="form-group">
                    <p>Gender:</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="male"
                               value="male" <?php if ($student['gender'] == 'male') {
                            echo "checked";
                        } ?>>
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="female"
                               value="female" <?php if ($student['gender'] == 'female') {
                            echo "checked";
                        } ?>>
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Address"
                           value="<?php echo $student['address']; ?>">
                </div>

                <div class="form-group">
                    <label for="avatar">Avatar:</label>
                    <input type="file" class="form-control" id="avatar" name="avatar" placeholder="Avatar">
                </div>


                <div class="form-group my-3">
                    <button type="submit" class="btn btn-success my-4" name="btn-save"><i class="fas fa-save"></i>
                        Save
                    </button>
                    <button class="btn-secondary btn" onclick="window.history.back(); return false;">Cancel</button>
                </div>
            </form>

        </div>
    </div>
<?php endif; ?>