<?php
use Admin\Lib\News;

include 'inc/header.php';
include 'inc/sidebar.php';
include 'lib/News.php';

if ($_SESSION['role'] == 'user') {
    header("Location:../index.php");
}
?>


<div class="dashboardContainer">
    <h1>News</h1>
    <div class="tableContainer">
        <table>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Category</th>
                <th>Author</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
            $allNews = new News();
            $allNews = $allNews->getAllNews();
            foreach ($allNews as $news) {
                echo "  
                    <tr>
                        <td>" . $news->getId() . "</td>
                        <td>" . $news->getTitle() . "</td>
                        <td>" . $news->getDescription() . "</td>
                        <td><img src='../images/".$news->getImage()."' width='150px'></td>
                        <td>" . $news->getCategory() . "</td>
                        <td>" . $news->getAuthor() . "</td>
                        <td><a href='editNews.php?nid=" . $news->getId() . "'>Edit</a></td>
                        <td><a href='deleteNews.php?nid=" . $news->getId() . "'>Delete</a></td>      
                    </tr>
                    ";
            }
            ?>
        </table>
        <a href="createNews.php" class="createUser">Create News</a>
    </div>
</div>
</div>
</body>