<div class="row justify-content-center">
    <div class="col-md-3 col-xs-12 col-sm-6 my-5">
        <div class="form-group">
            <h1>Login </h1>
            <p class="mb-3 error"><?php
                if (isset($errorLogin))
                    echo "$errorLogin";
                ?></p>
        </div>
        <form action="" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-group">
                    <input type="password" id="password" name="password" placeholder="Password"
                           class="form-control" data-toggle="password">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-eye"></i></span>
                    </div>
                </div>
            </div>

            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="remember-me">
                <label for="remember-me" class="form-check-label">Remember me</label>
            </div>

            <button type="submit" class="btn btn-success btn-block my-3" name="-btn-login">Login</button>

            <div class="mb-3 text-muted text-center">
                <label>
                    Don't have account? <a href="./index.php?page=register">Register</a>
                </label>
            </div>
        </form>
    </div>
</div>
