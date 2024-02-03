<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/c9fcbbfbdb.js" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</head>

<body>

    <div class="header">
        <nav>

            <a href="index.php">
                <h2 class="navText"><span>News</span>Web</h2>
            </a>
            <ul class="navbar">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="categories.php">Categories</a></li>
                <li><a href="contact.php">Contact</a></li>
                <?php
                if (isset($_SESSION['id'])) {
                    echo "<li><a href='logout.php'>Log Out</a></li>";
                } else {
                    ?>
                    <li class="register">
                        <a>Register</a>

                        <div class="drop_link">
                            <a href="login.php">Log In</a>
                            <a href="signup.php">Sign Up</a>
                        </div>
                    </li>
                <?php } ?>
            </ul>

            <div class="searchBar">
                <input type="text" placeholder="Search ..." class="searchInput">
                <button type="submit"><i class="fa fa-search"></i></button>
            </div>
        </nav>
    </div>