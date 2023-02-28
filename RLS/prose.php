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
    <link rel="stylesheet" href="./CSS/prose.css">
    <title>RLS -Prose</title>
</head>

<body>
    <div class="container">
        <h1 class="prose">PROSE</h1>
        <div class="titlepng">
            <img src="./Images/4.png" alt="">
        </div>
    </div>


    <div class="container1">
        <h1 class="featured-works">FEATURED WORKS</h1>

        <?php
        $sql = "Select * from proses WHERE featured='YES' ORDER BY timestamp DESC limit 2 ";
        $result = mysqli_query($conn, $sql);

        while ($row1 = mysqli_fetch_assoc($result)) {
            $prose_part = substr($row1['prose'], 0, 250);
            $title_part = substr($row1['title'], 0, 20);
            echo '<div class="box1">

        <div class="image">
            <img src="../admin/upload/' . $row1['cover_image'] . '" alt="">
        </div>

        <div class="details">
            <div class="heading">
                <p>' . $title_part . '</p>
                <p class="creator">BY- ' . $row1['author'] . '</p>
            </div>
            <div class="para">
                <p>' . $prose_part . '</p>
                <a href="./individual_prose.php?prose_id=' . $row1['prose_id'] . '" ><i>Read more...</i></a>
            </div>
        </div>
    </div>';
        }
               ?>
    </div>

    <div class="container2">
        <h1 class="recently-published">RECENTLY PUBLISHED</h1>

        <div class="container3">
            <?php
            $sql = "Select * from proses ORDER BY timestamp DESC limit 6 ";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $prose_part = substr($row['prose'], 0, 250);
                $title_part = substr($row['title'], 0, 30);

                echo '  <div class="box">
        <div class="box-img">
            <img src="../admin/upload/' . $row['cover_image'] . '" alt="">
        </div>
        <div class="box-details">
            <div class="box-heading">' . $title_part . '...</div>
            <div class="box-creator">BY - ' . $row['author'] . '</div>
        </div>

        <div class="box-para">
            <p>' . $prose_part . ' ...</p>
            <a href="./individual_prose.php?prose_id=' . $row['prose_id'] . '">Read more...</a>
        </div>
    </div>';
            }

            ?>
        </div>
        <div class="browse-btn-box">
            <a href="./explorepr.php" class="browse">BROWSE ALL PROSE</a>
        </div>
    </div>

    <?php
    include('./footer.html')
        ?>
</body>

</html>