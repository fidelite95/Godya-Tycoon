<?php include("./brand.php"); ?>

<!DOCTYPE html>
<html>

<head>
    <?php include("./head.php") ?>
    <title>TYCOON</title>
    <link rel="stylesheet" type="text/css" href="common.css" />
    <link rel="stylesheet" type="text/css" href="index.css" />
    <link rel="stylesheet" type="text/css" href="play.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>

<body id="body" style="opacity: 0">
    <div class="player">
        <!-- Define the section for displaying track buttons -->
        <div class="buttons">
            <div class="prev-track" onclick="prevTrack()">
                <i class="fa fa-step-backward fa-1x"></i>
            </div>
            <div class="playpause-track" onclick="playpauseTrack()">
                <i class="fa fa-play-circle fa-2x"></i>
            </div>
            <div class="next-track" onclick="nextTrack()">
                <i class="fa fa-step-forward fa-1x"></i>
            </div>
        </div>
    </div>

    <div class="App">
        <div class="video__wrapper">
            <video id="vid" autoplay="autoplay" muted="muted" loop>
                <source src="./videos/tycoon_background.mp4" type="video/mp4" />
            </video>
        </div>
        <div class="main__title">
            <div class="main__wrapper">
                <h1>T&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Y&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;C&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;O&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;O&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;N
                </h1>
                <div class="main__buttons">
                    <button id="btnPlay" class="btn btn-effect" onclick="start()">
                        <span>시작하기</span>
                    </button>
                </div>
                <div class="main__account">
                    <a href="https://play.google.com/store/apps/details?id=com.final.warofthegods&hl=ko">
                        아직 계정이 없으신가요?
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Fade-In
        var opacity = 0;
        var intervalID = 0;

        function show() {
            var body = document.getElementById('body');
            opacity = Number(window.getComputedStyle(body).getPropertyValue('opacity'));
            if (opacity < 1) {
                opacity = opacity + 0.1;
                body.style.opacity = opacity;
            } else {
                clearInterval(intervalID);
            }
        }

        function fadeIn() {
            setInterval(show, 60);
        }
        window.onload = fadeIn;

        // Video Autoplay
        document.getElementById('vid').play();

        // Start
        function start() {
            location.href = "./login.php";
        }
    </script>

    <!-- Audio Player -->
    <script src="play.js"></script>
</body>

</html>