<?php include_once 'inc/header.php';
include 'admin/lib/News.php';

$news = new Admin\Lib\News();

if (isset($_GET['nid'])) {
    $news = $news->getNewsId($_GET['nid']);
}


?>

<div class="single-container">
    <div class="post-container">
        <h1 class="post-title">
            <?php echo $news->getTitle(); ?>
        </h1>
        <img src="images/<?php echo $news->getImage(); ?>" alt="Post Image" class="post-img">
        <div class="post-body">
            <p><a href="#" class="categoryLink">
                    <?php echo $news->getCategory(); ?>
                </a> / March 12, 2022</p>
            <p>
                <?php
                if (isset($_SESSION['role'])) {
                    if ($_SESSION['role'] == 'admin') {
                        echo "Author: " . $news->getAuthor();
                    }
                }
                ?>
            </p>
            <p>
                <?php echo $news->getDescription(); ?>
            </p>
        </div>
    </div>

    <div class="sidebar">
        <div class="section">

            <h2>Popular Posts</h2>

            <div class="section-post">
                <img src="images/tech1.jpg" alt="">
                <a href="#">Lorem ipsum dolor</a>
            </div>
            <div class="section-post">
                <img src="images/tech2.jpg" alt="">
                <a href="#">Lorem ipsum dolor</a>
            </div>

            <div class="section-post">
                <img src="images/tech3.jpg" alt="">
                <a href="#">Lorem ipsum dolor</a>
            </div>
        </div>

        <div class="section">

            <h2>Related Posts</h2>

            <?php
            $relatedPosts = new Admin\Lib\News();
            $i = 0;
            $relatedPosts = $relatedPosts->getAllNews();

            foreach ($relatedPosts as $post) {
                if ($news->getCategory() == $post->getCategory()) {
                    echo "
                        <div class='section-post'>
                                <img src='images/" . $post->getImage() . "' alt='>
                                <a href='single-page.php?nid=" . $post->getId() . "'></a>
                            <a href='single-page.php?nid=" . $post->getId() . "'>" . $post->getTitle() . "</a>
                        </div>
                        ";
                }
            }
            ?>

        </div>

    </div>
</div>

<?php include_once 'inc/footer.php' ?>