<?php
include_once 'inc/header.php';
include_once 'admin/lib/News.php';

$latestNews = new Admin\Lib\News();
$latestNews = $latestNews->getLatestNews();

$randomNews = new Admin\Lib\News();
$randomNews = $randomNews->getRandomNews(3);

$lastTech = new Admin\Lib\News();
$lastTech = $lastTech->getLastByCategory('Technology');

$lastSport = new Admin\Lib\News();
$lastSport = $lastSport->getLastByCategory('Sport');

$lastHealth = new Admin\Lib\News();
$lastHealth = $lastHealth->getLastByCategory('Health');

$lastMusic = new Admin\Lib\News();
$lastMusic = $lastMusic->getLastByCategory('Music');
?>
<div class="body">
    <div class="main-body">
        <div class="sport4-template">
            <a href="single-page.php?nid=<?php echo $latestNews->getId(); ?>"><img class="sport4-img"
                    style="display: block;" src="images/<?php echo $latestNews->getImage(); ?>"></a>
            <div class="sport4-text">
                <a class="sport4-link" href="single-page.html">
                    Latest News: <br>
                    <?php echo $latestNews->getTitle(); ?>
                </a>
            </div>
        </div>


        <div>
            <div class="home-categories-big">
                <?php
                foreach ($randomNews as $random) {
                    echo
                        "<div class='home-categories-big-template'>
                    <a href='single-page.php?nid= " . $random->getId() . "'>
                        <img class='categories-big-img' src='images/" . $random->getImage() . "'>
                        <div class='tech-big-text'>" . $random->getTitle() . "</div>
                    </a>
                </div>";
                }
                ?>
            </div>
        </div>
    </div>

    <div class="home-categories">
        <div class="home-categories-template">
            <a href="single-page.php?nid=<?php echo $lastHealth->getId(); ?>"><img class="categories-img"
                    src="images/<?php echo $lastHealth->getImage(); ?>">
                <div class="health-home">
                    <?php echo $lastHealth->getCategory(); ?>
                </div>
                <div class="health-text">
                    <?php echo $lastHealth->getTitle(); ?>
                </div>
            </a>
        </div>

        <div class="home-categories-template">
            <a href="single-page.php?nid=<?php echo $lastMusic->getId(); ?>"><img class="categories-img"
                    src="images/<?php echo $lastMusic->getImage(); ?>">
                <div class="music-home">
                    <?php echo $lastMusic->getCategory(); ?>
                </div>
                <div class="music-text">
                    <?php echo $lastMusic->getTitle(); ?>
                </div>
            </a>
        </div>

        <div class="home-categories-template">
            <a href="single-page.php?nid=<?php echo $lastTech->getId(); ?>"><img class="categories-img"
                    src="images/<?php echo $lastTech->getImage(); ?>">
                <div class="tech-home">
                    <?php echo $lastTech->getCategory(); ?>
                </div>
                <div class="tech-text">
                    <?php echo $lastTech->getTitle(); ?>
                </div>
            </a>
        </div>

        <div class="home-categories-template-sport">
            <a href="single-page.php?nid=<?php echo $lastSport->getId(); ?>"><img class="categories-img"
                    src="images/<?php echo $lastSport->getImage(); ?>">
                <div class="sport-home">
                    <?php echo $lastSport->getCategory(); ?>
                </div>
                <div class="sport-text">
                    <?php echo $lastSport->getTitle(); ?>
                </div>
            </a>
        </div>
    </div>
</div>
<?php include_once 'inc/footer.php' ?>