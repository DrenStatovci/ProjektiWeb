<?php

include 'inc/header.php';
include 'inc/sidebar.php';
include 'lib/News.php';

if (isset($_POST['create']) && $_FILES['image']) {
    $news = new Admin\Lib\News();
    $news->setTitle($_POST['title']);
    $news->setDescription($_POST['description']);
    $news->setImage($_FILES['image']['name']);
    $news->setCategory($_POST['category']);
    $news->setAuthor($_SESSION['name']);
    if ($news->createNews()) {
        echo "<script>alert('Succesfully created account!')</script>";
        header('Location:index.php');
    } else {
        echo "<script>alert('Creation failed!')</script>";

    }
}

?>
<div class="container">
    <div class="registerBox">
        <h1>Create News</h1>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="signupForm" enctype="multipart/form-data">
            <!-- <label for="title">Title</label> -->
            <input type="text" name="title" title="title" id="title" placeholder="Title" required>
            <div id="errorTitle" style="color: red;"></div>

            <!-- <label for="description">Description</label> -->
            <input type="text" title="description" name="description" id="description" placeholder="Description" required>
            <div id="errorDescription" style="color: red;"></div>



            <select title="category" name="category">
                <option value="">Select category</option>
                <option value="Technology">Technology</option>
                <option value="Sport">Sport</option>
                <option value="Health">Health</option>
                <option value="Music">Music</option>

            </select>
            <input type="file" title="image" name="image" id="image" required>
            <div id="errorImage" style="color: red;"></div>

            <input type="submit" value="Create" name="create" title="create" class="btn" onclick="signupValidation()">
        </form>
    </div>
</div>
</div>
</body>