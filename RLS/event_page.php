<?php
include('./header.html')
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./CSS/event_page.css">
  <script src="./index.js"></script>
  <title>Document</title>
</head>

<body>
  <div class="container">
    <h1 class="event">Event</h1>
    <div class="titlepng">
      <img src="./Images/2.png" alt="">
    </div>
  </div>
  <div class="img-container">
    <div class="img-card1 landscape-card"><img src="./Images/For Honor.jpg" alt="" onclick="modaldisplay()"></div>
    <div class="img-card2 portrait-card"><img src="./Images/yn7.jpg" alt="" onclick="modaldisplay()"></div>
    <div class="img-card3 portrait-card"><img src="./Images/yn7.jpg" alt="" onclick="modaldisplay()"></div>
    <div class="img-card4 portrait-card"><img src="./Images/yn7.jpg" alt="" onclick="modaldisplay()"></div>
    <div class="img-card5 portrait-card"><img src="./Images/yn7.jpg" alt="" onclick="modaldisplay()"></div>
    <div class="img-card6 portrait-card"><img src="./Images/yn7.jpg" alt="" onclick="modaldisplay()"></div>
    <div class="img-card7 landscape-card"><img src="./Images/For Honor.jpg" alt="" onclick="modaldisplay()"></div>
  </div>
  <div class="modal" id="modal">
    <div class="slideshow-container">

      <div class="mySlides fade">
        <img src="./Images/13-130987_for-honor-honor-knight.jpg" >
      </div>

      <div class="mySlides fade">
        <img src="./Images/55.4e28d39e88b071cd48e1376227ae0dc6-700.jpg" >
      </div>

      <div class="mySlides fade">
        <img src="./Images/guillaume-menuel-k-pole-axe.jpg" >
      </div>

      <a class="prev" onclick="plusSlides(-1)">❮</a>
      <a class="next" onclick="plusSlides(1)">❯</a>

    </div>
    <br>

    <div style="text-align:center">
      <span class="dot" onclick="currentSlide(1)"></span>
      <span class="dot" onclick="currentSlide(2)"></span>
      <span class="dot" onclick="currentSlide(3)"></span>
    </div>
  </div>
  <div class="details-container">
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam, quo dicta. Quo cum architecto veniam
      distinctio excepturi voluptatibus, voluptas nihil est accusantium inventore quisquam, et incidunt sit
      ducimus amet ex nemo voluptatem officia vel. Quia possimus soluta inventore sequi tempora vel nostrum
      facilis molestiae magni accusantium sit recusandae illum iusto repellat dolor praesentium itaque aut
      ducimus, eaque esse totam? Modi, maiores ex molestiae ipsam nostrum iure cumque blanditiis itaque.</p>
  </div>
  <?php
    include('./footer.html')
        ?>
</body>

</html>