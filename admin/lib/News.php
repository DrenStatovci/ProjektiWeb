<?php
namespace Admin\Lib;

include 'Database.php';
use PDO;

class News extends Database
{
    private $id;
    private $title;
    private $description;
    private $image;
    private $category;
    private $author;


    function getId()
    {
        return $this->id;
    }
    function getTitle()
    {
        return $this->title;
    }
    function setTitle($t)
    {
        $this->title = $t;
    }
    function getDescription()
    {
        return $this->description;
    }
    function setDescription($d)
    {
        $this->description = $d;
    }
    function getImage()
    {
        return $this->image;
    }
    function setImage($i)
    {
        $this->image = $i;
    }
    function getCategory()
    {
        return $this->category;
    }
    function setCategory($c)
    {
        $this->category = $c;
    }

    function getAuthor()
    {
        return $this->author;
    }
    function setAuthor($a)
    {
        $this->author = $a;
    }

    public function getAllNews()
    {
        $sql = "SELECT * FROM news";
        $stmt = $this->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, __NAMESPACE__ . "\\News");
        return $stmt->fetchAll();
    }

    public function getNewsId($id)
    {
        $sql = "SELECT * FROM news";
        $sql .= " where id=?";
        $stmt = $this->prepare($sql);
        $stmt->execute([$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, __NAMESPACE__ . "\\News");
        return $stmt->fetch();
    }

    public function createNews()
    {
        $title = $this->getTitle();
        $description = $this->getDescription();
        $image = $this->getImage();
        $category = $this->getCategory();
        $author = $this->getAuthor();
            $sql = "INSERT INTO news (title,description,image,category,author) VALUES (?,?,?,?,?)";
            $stmt = $this->prepare($sql);
            $stmt->execute([$title, $description, $image, $category,$author]);
        return true;
    }



    public function updateNews()
    {
        $id = $this->getId();
        $title = $this->getTitle();
        $description = $this->getDescription();
        $image = $this->getImage();
        $category = $this->getCategory();
        $author = $this->getAuthor();
        $sql = "UPDATE news SET title='$title',description='$description',image='$image',category='$category', author='$author' where id=?";
        $stmt = $this->prepare($sql);
        $stmt->execute([$id]);
        return true;
    }


    public function deleteNews()
    {
        $id = $this->getId();
        $sql = "DELETE FROM news where id = ?";
        $stmt = $this->prepare($sql);
        $stmt->execute([$id]);
        return true;
    }

}

?>