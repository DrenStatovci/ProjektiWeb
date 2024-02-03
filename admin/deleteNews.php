<?php

include 'inc/header.php';
include 'inc/sidebar.php';
include 'lib/News.php';


$news = new Admin\Lib\News();
if (isset($_GET['nid'])) {
    $news = $news->getNewsId($_GET['nid']);
}


if (isset($_POST['delete'])) {
    if ($news->deleteNews()) {
        echo "<script>alert('Succesfully created news!')</script>";
        header('Location:index.php');
    } else {
        echo "<script>alert('Deleting failed!')</script>";
    }
}

?>
<div class="container">
    <div class="registerBox">
        <h1>Delete News</h1>
        <form method="post" id="signupForm" enctype="multipart/form-data">
            <!-- <label for="title">Title</label> -->
            <input type="text" title="title" id="title" name="title" placeholder="Title" disabled  value="<?php if (!empty($news->getTitle())) {
                echo $news->getTitle();
            } ?>">
            <div id="errorTitle" style="color: red;"></div>

            <!-- <label for="description">Description</label> -->
            <input type="text" title="description" name="description" id="description" disabled placeholder="Description" required value="<?php if (!empty($news->getDescription())) {
                echo $news->getDescription();
            } ?>">
            <div id="errorDescription" style="color: red;"></div>

            <select title="category" name="category" disabled>
                <?php
                $categoriesArray = ['Technology', 'Sport', 'Health', 'Music'];
                foreach ($categoriesArray as $category) {
                    if ($category == $news->getCategory()) {
                        echo "<option value='$category' selected>" . $category . "</option>";
                    } else {
                        echo "<option value='$category'>" . $category . "</option>";

                    }
                }
                ?>
            </select>

            <input type="file" title="image" name="image" id="image" disabled>
            <div id="errorImage" style="color: red;"></div>

            <input type="submit" value="Delete" name="delete" title="delete" class="btn">
        </form>
    </div>
</div>
</div>
</body>