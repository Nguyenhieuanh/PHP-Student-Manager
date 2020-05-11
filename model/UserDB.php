<?php


namespace model;

use PDO;

class UserDB
{
    protected $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function create($user)
    {
        $sql = "INSERT INTO users(username, studentId, email, phone, password, avatar)
                VALUES (?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            $user->getUsername(),
            $user->getStudentId(),
            $user->getEmail(),
            $user->getPhone(),
            $user->getPassword(),
            $user->getAvatar()
        ]);
    }

    public function checkUsername($username)
    {
        $sql = "SELECT username FROM users WHERE username = :username";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function checkEmail($email)
    {
        $sql = "SELECT username FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function checkStudentId($studentId)
    {
        $sql = "SELECT username FROM users WHERE studentId = :studentId";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":studentId", $studentId);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function userLogin($username, $password)
    {
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
                'username' => $username,
                'password' => $password
            ]
        );
        $count = $stmt->rowCount();
        if ($count) {
            return true;
        } else
            return false;
    }

    public function get($username)
    {
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $username);
        $stmt->execute();
        $row = $stmt->fetch();
        $user = new User($row['username'], $row['studentId'], $row['email'], $row['phone'], $row['password'],$row['avatar']);
        $user->setRole($row['role']);
        return $user;
    }

    public function changePsw($username, $password)
    {

        $sql = "UPDATE users SET password = ? WHERE username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $password);
        $stmt->bindParam(2, $username);
        return $stmt->execute();
    }

    public function getProfile($studentId)
    {
        $sql = "SELECT * FROM profile WHERE studentId = '$studentId'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateProfile($data)
    {
        $sql = "UPDATE profile SET firstname = :firstname, lastname = :lastname,dob = :dob, address = :address WHERE studentId = :studentId;
                UPDATE profile SET avatar = :avatar WHERE studentId = :studentId";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($data);
    }
}