<?php
require '../admin/dbconnect.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./index.js"></script>
    <script src="https://kit.fontawesome.com/fd5c7e34ad.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./CSS/index.css">
    <title>RLS AMU</title>
</head>

<body>
    <div class="container1">
        <div class="header">
            <div class="logo"><img src="./Images/RLS LOGO.png" alt=""></div>
            <div class="name">
                <div class="r">
                    <img src="./Images/R.png" alt="">
                </div>
                <div class="title">
                    <h1>ALEIGH LITERARY SOCIETY</h1>
                </div>
            </div>
            <div class="links">
                <div class="insta"><a href="https://www.instagram.com/raleigh.amu/" target="_blank"> <img
                            class="insta-img" src="./Images/INSTA LOGO.png" alt=""></div></a>
                <div class="youtube"><a href="" target="_blank"><img class="youtube-img" src="./Images/youtubelogo.png"
                            alt=""></div></a>
                <div class="menu" id="menu-btn" onclick="btnaction()"><img class="menu-img"
                        src="./Images/OPTIONS LOGO.png" alt=""></div>
                <div class="navpanel" id="nav">
                    <a href="./index.php">Home</a>
                    <a href="./about.php">About Us</a>
                    <button class="linkbtn" onclick="linkaction()">Write-Ups</button>
                    <a href="./event_gallery.php">Event Gallery</a>
                    <a href="./founders.php">Founder's Page</a>
                    <a href="./contactus.php">Contact Us</a>
                    <a href="./form.php">Submit Your Work</a>
                </div>
                <div class="navpanel side-panel" id="side-nav">
                    <a href="./articles.php">Articles</a>
                    <a href="./prose.php">Prose</a>
                    <a href="./poetry.php">Poetry</a>
                </div>
            </div>
        </div>
        <div class="blocks">
            <div class="box">
                <a href="./articles.php"><img src="./Images/image (1).jpg" alt=""></a>
            </div>
            <div class="box">
                <a href="./prose.php"><img src="./Images/image (2).jpg" alt=""></a>
            </div>
            <div class="box">
                <a href="./poetry.php"><img src="./Images/image (3).jpg" alt=""></a>
            </div>
            <div class="box">
                <a href="./event_gallery.php"><img src="./Images/image (4).jpg" alt=""></a>
            </div>
        </div>
        <div class="blocks">
            <div class="label">
                <a href="./articles.php">ARTICLES</a>
            </div>
            <div class="label">
                <a href="./prose.php">PROSE</a>
            </div>
            <div class="label">
                <a href="./poetry.php">POETRY</a>
            </div>
            <div class="label">
                <a href="./event_gallery.php">EVENT GALLERY</a>
            </div>
        </div>
    </div>

    <div class="container2">
        <div class="content">
            <h2>WeAre</h2>
            <p>The Raleigh Literary Society, from the Department of English, Aligarh Muslim University — one of the
                oldest yet most active literary societies in the country. A group of like-minded people with a common
                goal, the Raleigh Literary Society aims to promote free exchange of creative thoughts and ideas and
                create an encouraging space for literary talent to bloom. This website is an attempt at the same, a
                rendezvous between creativity and freedom, where words flow unrestrained.
            </p>
        </div>
    </div>
    <div class="container3">
        <h1>Recently Published</h1>
        <div class="blocks2">
            <?php
            $sql = "Select * from poems ORDER BY timestamp DESC limit 2 ";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<a href = "./individual_poem.php?poem_id=' . $row['poem_id'] . '" ><div class="box2"><img src="../admin/upload/' . $row['cover_image'] . '" alt="image">
                <div class="card-author"><p>' . $row['author'] . '</p></div>
                <diiv class="card-title"><p>' . $row['title'] . '</p></diiv>
                </div></a>';

            }

            $sql = "Select * from articles ORDER BY timestamp DESC limit 2 ";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo ' <a href = "./individual_articles.php?article_id=' . $row['article_id'] . '" ><div class="box2"><img src="../admin/upload/' . $row['cover_image'] . '" alt="image">
                <div class="card-author"><p>' . $row['author'] . '</p></div>
                <diiv class="card-title"><p>' . $row['title'] . '</p></diiv>
                </div></a>';

            }

            $sql = "Select * from proses ORDER BY timestamp DESC limit 2 ";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<a href = "./individual_prose.php?prose_id=' . $row['prose_id'] . '"> <div class="box2"><img src="../admin/upload/' . $row['cover_image'] . '" alt="image">
                <div class="card-author"><p>' . $row['author'] . '</p></div>
                <diiv class="card-title"><p>' . $row['title'] . '</p></diiv>
                </div></a>';

            }


            ?>

        </div>
    </div>

    <?php
    include('./footer.html')
        ?>
</body>

</html>