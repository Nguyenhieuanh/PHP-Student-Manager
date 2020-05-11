<?php
session_start();
require "model/database/DBConnect.php";
require "model/User.php";
require "model/UserDB.php";
require "controller/UserController.php";

use controller\UserController;

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Management System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet"
          href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
          integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt"
          crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-primary sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Student management system</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php if (!isset($_SESSION['role']) && !isset($_SESSION['isLogin'])): ?>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto mr-5">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link active">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="./index.php?page=login" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="./index.php?page=register" class="nav-link">Register</a>
                    </li>
                </ul>
            </div>
        <?php elseif (isset($_SESSION['isLogin'])): ?>
            <?php switch ($_SESSION['role']) {
                case 5:
                    ?>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto mr-5">
                            <li class="navbar-collapse dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo $_SESSION['username']; ?>
                                    <img src="<?php echo 'image/' . $_SESSION['avatar']; ?>" class="avatar"
                                         alt="">
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="./index.php?page=edit-profile">Edit Profile</a>
                                    <a class="dropdown-item" href="./index.php?page=change-psw">Change Password</a>
                                    <a class="dropdown-item" href="./index.php?page=logout">Logout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <?php break; ?>
                <?php case 1: ?>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto">
                            <li class="navbar-collapse dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Classes
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="/lms-demo/view/edit-profile.php">Add Class</a>
                                    <a class="dropdown-item" href="./index.php?page=change-psw">Manage Class</a>
                                </div>
                            </li>
                        </ul>
                        <ul class="navbar-nav">
                            <li class="navbar-collapse dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Students
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="/lms-demo/view/edit-profile.php">Add Student</a>
                                    <a class="dropdown-item" href="./index.php?page=change-psw">Manage Student</a>
                                </div>
                            </li>
                        </ul>
                        <ul class="navbar-nav">
                            <li class="navbar-collapse dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Scores
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="/lms-demo/view/edit-profile.php">Add Score</a>
                                    <a class="dropdown-item" href="./index.php?page=change-psw">Manage Score</a>
                                </div>
                            </li>
                        </ul>
                        <ul class="navbar-nav">
                            <li class="navbar-collapse dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Subjects
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="/lms-demo/view/edit-profile.php">Add Subject</a>
                                    <a class="dropdown-item" href="./index.php?page=change-psw">Manage Subject</a>
                                </div>
                            </li>
                        </ul>
                        <ul class="navbar-nav mr-5">
                            <li class="navbar-collapse dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo $_SESSION['username']; ?>
                                    <img src="<?php echo 'image/' . $_SESSION['avatar']; ?>" class="avatar"
                                         alt="">
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="./index.php?page=edit-profile">Edit Profile</a>
                                    <a class="dropdown-item" href="./index.php?page=change-psw">Change Password</a>
                                    <a class="dropdown-item" href="./index.php?page=logout">Logout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <?php break; ?>
                <?php default:
                    include 'view/404.php';
                    break; ?>
                <?php } ?>
        <?php endif; ?>
    </div>
</nav>
<div class="container-fluid">
    <?php
    $controller = new UserController();
    $page = isset($_REQUEST['page']) ? $_REQUEST['page'] : null;
    switch ($page) {
        case 'register':
            $controller->add();
            break;
        case"login":
            $controller->userLogin();
            break;
        case "logout":
            $controller->logout();
            break;
        case 'change-psw':
            $controller->changePsw();
            break;
        case 'edit-profile':
            $controller->updateProfile();
            break;
    }
    ?>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
<script type="text/javascript" src="js/register.js"></script>
</body>
</html>
