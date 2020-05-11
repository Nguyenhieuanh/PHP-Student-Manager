<?php


namespace controller;

use model\database\DBConnect;
use model\User;
use model\UserDB;

class UserController
{
    protected $userDB;

    public function __construct()
    {
        $db = new DBConnect();
        $this->userDB = new UserDB($db->connect());
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            include 'view/user-register.php';
        } else {
            $username = $_POST['username'];
            $studentId = $_POST['studentId'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $password = $_POST['password'];
            $re_psw = $_POST['re_psw'];

            $checkId = $this->userDB->checkStudentId($studentId);
            $checkUser = $this->userDB->checkUsername($username);
            $checkEmail = $this->userDB->checkEmail($email);
            $isError = false;

            if ($checkId) {
                $isError = true;
                $existId = '* Student ID already exist.';
            }

            if ($checkUser) {
                $isError = true;
                $existUser = '* Username already exist.';
            }

            if ($checkEmail) {
                $isError = true;
                $existEmail = '* Email already exist.';
            }

            if ($password !== $re_psw) {
                $isError = true;
                $errRetype = '* Re-type password miss match.';
            }

            if ($isError) {
                include 'view/user-register.php';
            } else {
                $user = new User($username, $studentId, $email, $phone, $password);
                $this->userDB->create($user);
                $success = "Created";
                include 'view/user-register.php';
            }
        }
    }

    public function userLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            include 'view/user-login.php';
        } else {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $login = $this->userDB->userLogin($username, $password);
            if ($login) {
                $_SESSION['isLogin'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $user = $this->userDB->get($username);
                $_SESSION['avatar'] = $user->getAvatar();
                $_SESSION['studentId'] = $user->getStudentId();
                $_SESSION['role'] = $user->getRole();
                header("location:index.php");
            } else {
                $errorLogin = "* Incorrect username or password";
                include 'view/user-login.php';
            }
        }
    }

    public function logout()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            session_destroy();
            header("location:index.php");
        }
    }

    public function changePsw()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            include 'view/edit-psw.php';
        } else {
            $cur_psw = $_REQUEST['cur_psw'];
            $new_psw = $_REQUEST['new_psw'];
            $re_psw = $_REQUEST['re_psw'];

            if ($cur_psw !== $_SESSION['password']) {
                $errChange = '* Wrong current password.';
                include 'view/edit-psw.php';
            } else {
                $username = $_SESSION['username'];
                $this->userDB->changePsw($username, $new_psw);
                header("location:index.php");
            }
        }
    }

    public function updateProfile()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $student = $this->userDB->getProfile($_SESSION['studentId']);
            include 'view/edit-profile.php';
        } else {
            $studentId = $_POST['studentId'];
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $dob = $_POST['dob'];
            $address = $_POST['address'];
            $avatar = $_FILES['avatar']['name'];
            $data = [
                'firstname' => $firstName,
                'lastname' => $lastName,
                'dob' => $dob,
                'address' => $address,
                'studentId' => $studentId,
                'avatar' => 'default.png'
            ];

            $student = $this->userDB->getProfile($studentId);
            $cur_avatar = $student['avatar'];
            if (!empty($avatar)) {
                $target_dir = "image/";
                if ($cur_avatar !== 'default.png') {
                    $avatar_del = $target_dir . $cur_avatar;
                    unlink($avatar_del);
                    $avatar_name = basename(time() . '_' . $avatar);
                    $target_file = $target_dir . $avatar_name;
                    move_uploaded_file($_FILES['avatar']['tmp_name'], $target_file);
                    $data['avatar'] = $avatar_name;
                    $_SESSION['avatar'] = $avatar_name;
                } else {
                    $avatar_name = basename(time() . '_' . $avatar);
                    $target_file = $target_dir . $avatar_name;
                    move_uploaded_file($_FILES['avatar']['tmp_name'], $target_file);
                    $data['avatar'] = $avatar_name;
                    $_SESSION['avatar'] = $avatar_name;
                }
            }

            $this->userDB->updateProfile($data);
            header("location:index.php");
        }
    }
}
