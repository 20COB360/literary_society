<?php
require '../admin/dbconnect.php';
include('./header.html')
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/fd5c7e34ad.js" crossorigin="anonymous"></script>
    <script src="./index.js"></script>
    <link rel="stylesheet" href="./CSS/event_gallery.css">
    <title>Event Gallery</title>
</head>

<body>
    <div class="container">
        <h1 class="eventgallery">
            <p>a</p> EVENT GALLERY
        </h1>
    </div>
    <div class="container1">
        <?php
        $sql = "Select * from articles WHERE featured='YES' ORDER BY timestamp DESC limit 2 ";
        $result = mysqli_query($conn, $sql);

        $row1 = mysqli_fetch_assoc($result);
        $num = mysqli_num_rows($result);
        if ($num) {
            $article_part = strlen($row1['article']) > 30 ? substr($row1['article'], 0, 250) : $row1['article'];
            $title_part = strlen($row1['title']) > 30 ? substr($row1['title'], 0, 50) : $row1['title'];
            echo '<div class="box1">
    
            <div class="image box1-img">
                <img src="../admin/upload/' . $row1['cover_image'] . '" alt="">
            </div>
    
            <div class="details">
                <div class="heading">
                    <p>' . $title_part . '</p>
                </div>
                <div class="para">
                    <p>' . $article_part . '</p>
                    <a href="./individual_articles.php?article_id=' . $row1['article_id'] . '" ><i>Read more...</i></a>
                </div>
            </div>
        </div>';
        }
        $row2 = mysqli_fetch_assoc($result);
        $article_part = substr($row2['article'], 0, 250);
        $title_part = substr($row2['title'], 0, 50);
        echo '<div class="box11">
            <div class="details">
                <div class="heading">
                    <p>' . $title_part . '</p>
                </div>
                <div class="para">
                    <p>' . $article_part . '</p>
                    <a href="./individual_articles.php?article_id=' . $row2['article_id'] . '" ><i>Read more...</i></a>
                </div>
            </div>
            <div class="image box11-img">
                <img  src="../admin/upload/' . $row2['cover_image'] . '"   alt="">
            </div>
        </div>';
        $row1 = mysqli_fetch_assoc($result);
        $num = mysqli_num_rows($result);
        if ($num) {
            $article_part = strlen($row1['article']) > 30 ? substr($row1['article'], 0, 250) : $row1['article'];
            $title_part = strlen($row1['title']) > 30 ? substr($row1['title'], 0, 50) : $row1['title'];
            echo '<div class="box1">
    
            <div class="image box1-img">
                <img src="../admin/upload/' . $row1['cover_image'] . '" alt="">
            </div>
    
            <div class="details">
                <div class="heading">
                    <p>' . $title_part . '</p>
                </div>
                <div class="para">
                    <p>' . $article_part . '</p>
                    <a href="./individual_articles.php?article_id=' . $row1['article_id'] . '" ><i>Read more...</i></a>
                </div>
            </div>
        </div>';
        }
        $row2 = mysqli_fetch_assoc($result);
        $article_part = substr($row2['article'], 0, 250);
        $title_part = substr($row2['title'], 0, 50);
        echo '<div class="box11">
            <div class="details">
                <div class="heading">
                    <p>' . $title_part . '</p>
                </div>
                <div class="para">
                    <p>' . $article_part . '</p>
                    <a href="./individual_articles.php?article_id=' . $row2['article_id'] . '" ><i>Read more...</i></a>
                </div>
            </div>
            <div class="image box11-img">
                <img  src="../admin/upload/' . $row2['cover_image'] . '"   alt="">
            </div>
        </div>';
        ?>
    </div>
    <?php
    include('./footer.html')
        ?>
</body>

</html>