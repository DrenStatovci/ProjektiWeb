<?php include_once 'inc/header.php';
include 'admin/lib/News.php';

?>


<div class="container">
    <h1 style="text-align: center; font-size: 45px;">Categories</h1>
    <div class="categoriesContainer">
        <div class='category'>
            <div class='titleHolder'>
                <h2 class='categoryTitle'>Technology</h2>
                <a href='#'>View all</a>
            </div>
            <hr>
            <div class='categories_card_holder'>
                <i class='fa-solid fa-angle-left' onclick="scrollSlider('tech','left')"></i>
                <ul class='slider' id='tech'>
                    <?php
                    $allNews = new Admin\Lib\News();
                    $allNews = $allNews->getAllNews();

                    foreach ($allNews as $news) {
                        if ($news->getCategory() == 'Technology') {
                            echo
                                "

                            <li class='card'>
                                <img src='images/" . $news->getImage() . "' alt='Tech1' width='100%' height='50%'>
                                <div class='cardContent'>
                                    <small><a href='#' class='categoryLink'>" . $news->getCategory() . "</a></small>
                                    <a href='single-page.php?nid=" . $news->getId() . "' class='cardLink'>
                                        <h3 class='cardTitle'>" . $news->getTitle() . "</h3>
                                        <p class='cardText' maxlength='20'>" . $news->getDescription() . "</p>
                                    </a>
                                </div>
                            </li>

                
                    ";
                        }
                    }

                    ?>
                </ul>
                <i class='fa-solid fa-angle-right' onclick="scrollSlider('tech', 'right')"></i>
            </div>
        </div>


        <div class='category'>
            <div class='titleHolder'>
                <h2 class='categoryTitle'>Sport</h2>
                <a href='#'>View all</a>
            </div>
            <hr>
            <div class='categories_card_holder'>
                <i class='fa-solid fa-angle-left' onclick="scrollSlider('sport','left')"></i>
                <ul class='slider' id='sport'>
                    <?php
                    foreach ($allNews as $news) {
                        if ($news->getCategory() == 'Sport') {
                            echo
                                "

                            <li class='card'>
                                <img src='images/" . $news->getImage() . "' alt='sport' width='100%' height='50%'>
                                <div class='cardContent'>
                                    <small><a href='#' class='categoryLink'>" . $news->getCategory() . "</a></small>
                                    <a href='single-page.php?nid=" . $news->getId() . "' class='cardLink'>
                                        <h3 class='cardTitle'>" . $news->getTitle() . "</h3>
                                        <p class='cardText' maxlength='20'>" . $news->getDescription() . "</p>
                                    </a>
                                </div>
                            </li>

                
                    ";
                        }
                    }

                    ?>
                </ul>
                <i class='fa-solid fa-angle-right' onclick="scrollSlider('sport', 'right')"></i>
            </div>
        </div>

        <div class='category'>
            <div class='titleHolder'>
                <h2 class='categoryTitle'>Health</h2>
                <a href='#'>View all</a>
            </div>
            <hr>
            <div class='categories_card_holder'>
                <i class='fa-solid fa-angle-left' onclick="scrollSlider('health','left')"></i>
                <ul class='slider' id='health'>
                    <?php
                    foreach ($allNews as $news) {
                        if ($news->getCategory() == 'Health') {
                            echo
                                "

                            <li class='card'>
                                <img src='images/" . $news->getImage() . "' alt='health' width='100%' height='50%'>
                                <div class='cardContent'>
                                    <small><a href='#' class='categoryLink'>" . $news->getCategory() . "</a></small>
                                    <a href='single-page.php'?nid=" . $news->getId() . " class='cardLink'>
                                        <h3 class='cardTitle'>" . $news->getTitle() . "</h3>
                                        <p class='cardText' maxlength='20'>" . $news->getDescription() . "</p>
                                    </a>
                                </div>
                            </li>

                
                    ";
                        }
                    }

                    ?>
                </ul>
                <i class='fa-solid fa-angle-right' onclick="scrollSlider('health', 'right')"></i>
            </div>
        </div>



        <div class='category'>
            <div class='titleHolder'>
                <h2 class='categoryTitle'>Music</h2>
                <a href='#'>View all</a>
            </div>
            <hr>
            <div class='categories_card_holder'>
                <i class='fa-solid fa-angle-left' onclick="scrollSlider('music','left')"></i>
                <ul class='slider' id='music'>
                    <?php
                    foreach ($allNews as $news) {
                        if ($news->getCategory() == 'Music') {
                            echo
                                "

                            <li class='card'>
                                <img src='images/" . $news->getImage() . "' alt='health' width='100%' height='50%'>
                                <div class='cardContent'>
                                    <small><a href='#' class='categoryLink'>" . $news->getCategory() . "</a></small>
                                    <a href='single-page.php'?nid=" . $news->getId() . " class='cardLink'>
                                        <h3 class='cardTitle'>" . $news->getTitle() . "</h3>
                                        <p class='cardText' maxlength='20'>" . $news->getDescription() . "</p>
                                    </a>
                                </div>
                            </li>

                
                    ";
                        }
                    }

                    ?>
                </ul>
                <i class='fa-solid fa-angle-right' onclick="scrollSlider('music', 'right')"></i>
            </div>
        </div>


    </div>
    <?php include_once 'inc/footer.php' ?>