<?php
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
    <link rel="stylesheet" href="./CSS/articles.css">
    <link rel="stylesheet" href="./CSS/form.css">
    <title>Submit Your Work</title>
    <script type="application/javascript">

        function resizeIFrameToFitContent(iFrame) {

            // iFrame.width  = iFrame.contentWindow.document.body.scrollWidth;
            iFrame.height = iFrame.contentWindow.document.body.scrollHeight;
        }

        window.addEventListener('DOMContentLoaded', function (e) {

            var iFrame = document.getElementById('iFrame');
            resizeIFrameToFitContent(iFrame);

            // // or, to resize all iframes:
            // var iframes = document.querySelectorAll("iframe");
            // for( var i = 0; i < iframes.length; i++) {
            //     resizeIFrameToFitContent( iframes[i] );
            // }
        });

    </script>
</head>

<body>
    <div class="containerx">
        <h1 class="submit-work">SUBMIT YOUR WORK</h1>
        <!-- <div class="titlepng">
            <img src="./Images/4.png" alt="">
        </div> -->
    </div>

    <div class="container1">
        <div class="item">

            <div class="img">
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

                </div>
            </div>


        </div>

        <div class="item" id="iframeContainer">
            <iframe
                src="https://docs.google.com/forms/d/e/1FAIpQLSd5ItFX4tJToZY-M4xImh3dXFM0STDwQxyderkXkrtTJxJzzg/viewform"
                title="Submit Your Work" width="100%" height="100%" frameborder="0" id="iFrame"></iframe>
        </div>
    </div>

    <?php
    include('./footer.html')
        ?>
</body>

</html>