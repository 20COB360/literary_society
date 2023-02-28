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
    <script src="./index.js"></script>
    <script src="https://kit.fontawesome.com/fd5c7e34ad.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./CSS/poetry.css">
    <title>RLS-Poetry</title>
</head>

<body>

    <div class="container">
        <h1 class="poetry">POETRY</h1>
        <div class="titlepng">
            <img src="./Images/3.png" alt="">
        </div>
    </div>

    <div class="container1">
        <h1 class="featured-works">FEATURED POEMS</h1>

        <?php
        $sql = "Select * from poems WHERE featured='YES' ORDER BY timestamp DESC limit 2 ";
        $result = mysqli_query($conn, $sql);

        while ($row1 = mysqli_fetch_assoc($result)) {
            $poem_part = substr($row1['poem'], 0, 150);
            $title_part = substr($row1['title'], 0, 30);
            echo '<div class="box1">
    
            <div class="image">
                <img src="../admin/upload/' . $row1['cover_image'] . '" alt="">
            </div>
                <div class="heading">
                    <p>' . $title_part . '</p>
                    <p class="creator"> BY - ' . $row1['author'] . '</p>
                </div>
                <div class="para">
                    <p>' . $poem_part . '</p>
                    <a href="./individual_poem.php?poem_id=' . $row1['poem_id'] . '" ><i>Read more...</i></a>
                </div>
        </div>';
        }
        ?>
    </div>

    <div class="container2">
        <h1 class="recently-published">RECENTLY PUBLISHED</h1>

        <div class="container3">
            <?php
            $sql = "Select * from poems ORDER BY timestamp DESC limit 6 ";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $poem_part = substr($row['poem'], 0, 150);
                $title_part = substr($row['title'], 0, 30);
                echo ' 
                <div class="box">
                    <div class="img-det">
                        <div class="box-img">
                            <img src="../admin/upload/' . $row['cover_image'] . '" alt="">
                        </div>
                        <div class="box-details">
                            <div class="box-heading">' . $title_part . '...</div>
                            <div class="box-creator">BY - ' . $row['author'] . '</div>
                        </div>
                    </div>
                    <div class="box-para">
                        <p>' . $poem_part . ' ...</p>
                        <a href="./individual_poem.php?poem_id=' . $row['poem_id'] . '">Read more...</a>
                    </div>
                </div>';
            }
            ?>
        </div>
        <div class="browse-btn-box">
            <a href="./explorepo.php" class="browse">BROWSE ALL POEMS</a>
        </div>
    </div>

    <?php
    include('./footer.html')
        ?>
</body>

</html>