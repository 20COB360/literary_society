<?php
require '../admin/dbconnect.php';
include('header.html')
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://kit.fontawesome.com/fd5c7e34ad.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/index.css">
    <link rel="stylesheet" href="./CSS/explore.css">
    <script src="./index.js"></script>
    <title>Explore Poetry</title>
</head>

<body>

    <div class="containerx">
        <h1 class="explore">EXPLORE POEMS</h1>
        <img src="./Images/5.png" alt="">
    </div>
    <div class="sort">
        <h4>Refine by: </h4>
        <button class="refine">ALL</button>
        <button class="refine">A</button>
        <button class="refine">B</button>
        <button class="refine">C</button>
        <button class="refine">D</button>
        <button class="refine">E</button>
        <button class="refine">F</button>
        <button class="refine">G</button>
        <button class="refine">H</button>
        <button class="refine">I</button>
        <button class="refine">J</button>
        <button class="refine">K</button>
        <button class="refine">L</button>
        <button class="refine">M</button>
        <button class="refine">N</button>
        <button class="refine">O</button>
        <button class="refine">P</button>
        <button class="refine">Q</button>
        <button class="refine">R</button>
        <button class="refine">S</button>
        <button class="refine">T</button>
        <button class="refine">U</button>
        <button class="refine">V</button>
        <button class="refine">W</button>
        <button class="refine">X</button>
        <button class="refine">Y</button>
        <button class="refine">Z</button>
        <label for="view">Sort By:</label>
        <select name="view" id="view">
            <option value="date">Date</option>
            <option value="author">Author</option>
        </select>
    </div>
    <div class="container">
        <?php
        $sql = "Select * from poems ORDER BY timestamp DESC limit 20 ";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {

            echo ' <a href="./individual_poetry.php?poem_id=' . $row['poem_id'] . '" >
            <div class="content">
                <h3 class="title">' . $row['title'] . '</h3>
                <h4 class="author">BY ' . $row['author'] . ' </h4>
            </div>
        </a>';
        }

        ?>
    </div>
    <?php
    include('footer.html')
        ?>
</body>

</html>