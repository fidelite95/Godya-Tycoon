<?php
include("./brand.php");
?>

<!DOCTYPE html>
<html>

<head>
    <?php
    include("./head.php");
    ?>
    <title>TYCOON</title>
    <link rel="stylesheet" type="text/css" href="common.css" />
    <link rel="stylesheet" type="text/css" href="index.css" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>

<body id="body" style="opacity: 0">

    <!-- 메인 페이지 -->
    <!-- Main Page -->
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
                <!-- 로그인 Form -->
                <!-- Login Form -->
                <form class="login__form" action="login_ok.php" method="post">
                    <div class="login__box">
                        <p>신이야 계정을 입력해주세요.</p>
                        <input name="inputId" type="text" class="form-control" id="inputId" />
                    </div>
                    <button class="btn btn-effect" type="submit">
                        <span>로그인</span>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- JS 스크립트 -->
    <!-- JS Script -->
    <script>
        /*
         * 페이드인 효과
         * Fade-In Effect
         */
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

        /*
         * 배경용 비디오 자동재생
         * Background Video Autoplay
         */
        document.getElementById('vid').play();
    </script>

</body>

</html>