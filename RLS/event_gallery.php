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
        $sql = "Select * from events ORDER BY timestamp DESC ";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);

        if ($num) {
            while($row = mysqli_fetch_assoc($result)){
            $event_name = strlen($row['event_name']) > 100 ? substr($row['event_name'], 0, 50) : $row['event_name'];

            $event_report = strlen($row['event_report']) > 100 ? substr($row['event_report'], 0, 250) : $row['event_report'];

           $imgKey= $row['foreign_key'] ;
         

            $sqlNew = "Select * from event_images WHERE event_key='$imgKey'";
            $resultNew = mysqli_query($conn, $sqlNew);
    
            $img = mysqli_fetch_assoc($resultNew);
           
            echo '<div class="box1">
            <div class="image box1-img">
                <img src="../admin/event_images/' . $img['image_name'] . '" alt="">
            </div>
    
            <div class="details">
                <div class="heading">
                    <p>' . $event_name . '...</p>
                </div>
                <div class="para">
                    <p>' . $event_report . '...</p>
                    <a href="./event_page.php?event_id=' . $row['foreign_key'] . '" ><i>Read more...</i></a>
                </div>
            </div>
        </div>';
            };
        }
        
        ?>
    </div>
    <?php
    include('./footer.html')
        ?>
</body>

</html>