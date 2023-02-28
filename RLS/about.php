<?php
include('./header.html')
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css"
        integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./CSS/index.css">
    <link rel="stylesheet" href="./CSS/about.css">
    <script src="./index.js"></script>
    <script src="https://kit.fontawesome.com/fd5c7e34ad.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>RLS AMU</title>
</head>

<body>
    <!-- <div class="blocks">
        <div class="slider owl-carousel ">
            <img src="./Images/aboutus/2.jpg" alt="">
            <img src="./Images/aboutus/3.jpg" alt="">
            <img src="./Images/aboutus/4.jpg" alt="">
            <img src="./Images/aboutus/5.jpg" alt="">
        </div>
    </div> -->
    <div id="demo" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
            <li data-target="#demo" data-slide-to="3"></li>
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./Images/aboutus/2.jpg" alt="" width="1100" height="500">
            </div>
            <div class="carousel-item">
                <img src="./Images/aboutus/3.jpg" alt="" width="1100" height="500">
            </div>
            <div class="carousel-item">
                <img src="./Images/aboutus/4.jpg" alt="" width="1100" height="500">
            </div>
            <div class="carousel-item">
                <img src="./Images/aboutus/5.jpg" alt="" width="1100" height="500">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
    <div class="container3">
        <h1>About Us</h1>
        <div class="content">
            <p>
                Keeping the spirit ofEstablished in ____, the Raleigh Literary Society is one of the oldest societies
                not only in the Aligarh Muslim University but the entirety of the country. Its namesake, Sir Walter
                Raleigh, was the first professor of English at AMU (then the Mohammedan Anglo-Oriental College) from
                1885 to 1887. He later went on to hold the first Chair of English Literature at the literature and
                performance alive, the Raleigh Literary Society is one of the most active and lively societies on campus
                and regularly organizes a variety of events, including but not limited to paper presentations, literary
                competitions, open mic sessions, debates and speeches, stage plays, etc.
            </p>
            <br>
            <p>The gratuitous variety of activities and events means each year, the Raleigh Literary society both
                produces as well as hones a diverse array of talent in the student body, from literary and creative
                artistry to oratory talent to performative flair, to name just a few.</p>
            <br>
            <p>Bibliotheca: It is the Annual Literature Fest of Shaheed Sukhdev College of Business Studies which comes
                under Crescendo, the cultural fest of our college. Under Bibliotheca, we hold several events, both
                online and offline revolving around the world of literature. We also hold our flagship event: 'Hearsay'
                under Bibliotheca, in which a diverse set of people from different walks of life come and share their
                experiences and wisdom in small groups, kind of like a library of humans.</p>
            <br>
            <p>The blog: The latest addition to the LitSoc arsenal is our very own blog. This blog is a medium for
                people to express themselves freely, a place for them to showcase their creativity. It's a place to
                capture the personalities that pass through the halls of this college; all of them in a singular quest
                for success yet defined by a unique set of ideas through which they view the world. Through this medium,
                we hope to inspire and get inspired.</p>
            <br>
            <p>The college magazine: Formerly known as the Ed-board, LitSoc is responsible for editing, designing and
                publishing the annual college magazine: Quadrangle, where we try to capture the essence of the college
                and year that went by.</p>
        </div>
    </div>
    <?php
    include('footer.html')
        ?>
</body>

</html>