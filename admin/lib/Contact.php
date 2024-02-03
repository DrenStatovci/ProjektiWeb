<?php
namespace Admin\Lib;

include 'Database.php';
use PDO;

class Contact extends Database
{

    
    private $id;
    private $email;
    private $message;


    function getId()
    {
        return $this->id;
    }

    function getEmail()
    {
        return $this->email;
    }
    function setEmail($e)
    {
        $this->email = $e;
    }
    function getMessage()
    {
        return $this->message;
    }
    function setMessage($m)
    {
        $this->message = $m;
    }

    public function getAllContacts()
    {
        $sql = "SELECT * FROM contact";
        $stmt = $this->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, __NAMESPACE__ . "\\Contact");
        return $stmt->fetchAll();
    }

    public function getContactId($id)
    {
        $sql = "SELECT * FROM contact";
        $sql .= " where id=?";
        $stmt = $this->prepare($sql);
        $stmt->execute([$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, __NAMESPACE__ . "\\Contact");
        return $stmt->fetch();
    }

    public function createContact()
    {
        $email = $this->getEmail();
        $message = $this->getMessage();
            $sql = "INSERT INTO contact (email,message) VALUES (?,?)";
            $stmt = $this->prepare($sql);
            $stmt->execute([$email, $message]);
        return true;
    }



    public function updateContact()
    {
        $id = $this->getId();
        $email = $this->getEmail();
        $message = $this->getMessage();
        $sql = "UPDATE contact SET email='$email',message='$message' where id=?";
        $stmt = $this->prepare($sql);
        $stmt->execute([$id]);
        return true;
    }


    public function deleteContact()
    {
        $id = $this->getId();
        $sql = "DELETE FROM contact where id = ?";
        $stmt = $this->prepare($sql);
        $stmt->execute([$id]);
        return true;
    }
}

?>