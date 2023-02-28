<?php
require '../admin/dbconnect.php';
include('./header.html');

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['prose_id'])) {
        $prose_id = $_GET['prose_id'];

    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/individual_articles.css">
    <script src="./index.js"></script>
    <script src="https://kit.fontawesome.com/fd5c7e34ad.js" crossorigin="anonymous"></script>
    <title>
        <?php
        $sql = "Select * from proses where prose_id=$prose_id ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $title = $row['title'];
        echo "RLS -" . $title;
        ?>
    </title>
</head>

<body>
    <div class="tag" id="tag">
        <div class="details">
            <?php
            $sql = "Select * from proses where prose_id=$prose_id ";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $title = $row['title'];
            $author = $row['author'];
            $desc = $row['desc'];
            $prose = $row['prose'];
            $cover_image = $row['cover_image'];        
            echo '<h1> ' . $title . ' </h1>
                <p>  ' . $desc . ' </p>
            </div>
            <div class="author">
                <p>By- ' . $author . '</p>
            </div>
        </div>
        <div class="container">
            <div class="article-img" id="article-img">
                <img  src="../admin/upload/' . $cover_image . '" alt="">
            </div>
            <div class="content">
                <p class="article" id="article">
                ' . $row['prose'] . '
                </p>
            </div>';

            ?>

        </div>
        <hr>
        <?php
       echo '<div class="container2">
           <div class="img-card">
                <img src="../admin/upload/'.$row['author_image'].'" alt="">
                <h5>'.$row['author'].'</h5>
            </div>
            <p class="dialog">'.$row['author_bio'].'</p>
            </div>';
                ?>
        
        <?php
        include('./footer.html');
        ?>
</body>

</html>