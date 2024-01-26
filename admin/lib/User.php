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


    public function createUser($user)
    {
        $name = $user->getName();
        $email = $user->getEmail();
        $password = $user->getPassword();
        $sql = "INSERT INTO user (name,email,password) VALUES (?,?,?)";
        $stmt = $this->prepare($sql);
        $stmt->execute([$name, $email, $password]);
        return true;
    }

    public function updateUser()
    {

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