<?php
namespace Admin\Lib;

include 'Database.php';
use PDO;

class User extends Database
{
    private $id;
    private $name;
    private $email;
    private $password;
    private $role;


    function getId()
    {
        return $this->id;
    }
    function getName()
    {
        return $this->name;
    }
    function setName($n)
    {
        $this->name = $n;
    }
    function getEmail()
    {
        return $this->email;
    }
    function setEmail($e)
    {
        $this->email = $e;
    }
    function getPassword()
    {
        return $this->password;
    }
    function setPassword($p)
    {
        $this->password = $p;
    }
    function getRole()
    {
        return $this->role;
    }
    function setRole($r)
    {
        $this->role = $r;
    }

    public function getAllUsers()
    {
        $sql = "SELECT * FROM user";
        $stmt = $this->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, __NAMESPACE__ . "\\User");
        return $stmt->fetchAll();
    }

    public function getUserId($id)
    {
        $sql = "SELECT * FROM user";
        $sql .= " where id=?";
        $stmt = $this->prepare($sql);
        $stmt->execute([$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, __NAMESPACE__ . "\\User");
        return $stmt->fetch();
    }

    public function createUser()
    {
        $name = $this->getName();
        $email = $this->getEmail();
        $password = $this->getPassword();
        $role = $this->getRole();
        if ($role) {
            $sql = "INSERT INTO user (name,email,password,role) VALUES (?,?,?,?)";
            $stmt = $this->prepare($sql);
            $stmt->execute([$name, $email, $password, $role]);
        } else {
            $sql = "INSERT INTO user (name,email,password) VALUES (?,?,?)";
            $stmt = $this->prepare($sql);
            $stmt->execute([$name, $email, $password]);
        }
        return true;
    }



    public function updateUser()
    {
        $id = $this->getId();
        $name = $this->getName();
        $email = $this->getEmail();
        $password = $this->getPassword();
        $role = $this->getRole();
        $sql = "UPDATE user SET name='$name',email='$email',password='$password',role='$role' where id=?";
        $stmt = $this->prepare($sql);
        $stmt->execute([$id]);
        return true;
    }


    public function deleteUser()
    {
        $id = $this->getId();
        $sql = "DELETE FROM user where id = ?";
        $stmt = $this->prepare($sql);
        $stmt->execute([$id]);
        return true;
    }




    public function verifyUser($email, $password)
    {
        $sql = "SELECT * FROM user where";
        $sql .= " email = :email and password = :password";
        $stmt = $this->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, __NAMESPACE__ . "\\User");
        return $stmt->fetch();
    }


}

?>