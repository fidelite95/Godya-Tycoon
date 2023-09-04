<?php
include("./login_status.php");
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
  <link rel="stylesheet" type="text/css" href="intro.css" />
  <link rel="stylesheet" type="text/css" href="transition.css" />
</head>

<?php
// if (!$login_status) {
//   echo "<script>alert('로그인 후에 이용 가능합니다.')</script>";
//   echo "<script>location.href='login.php';</script>";
// } else {
?>

<body id="body" style="opacity: 0">

  <!-- 플레이어 컴포넌트 -->
  <!-- Player Component -->
  <div class="intro">
    <video id="vid" autoplay="autoplay" muted="muted" loop>
      <source src="./videos/tycoon_intro.mp4" type="video/mp4" />
    </video>
    <div class="intro__title">
      <div class="intro__wrapper">
        <p class="animation show__2" style="font-size: 24px">나만의 영토를 통해</p>
        <p class="animation show__3" style="font-size: 24px">더 강력한 플레이어로</p>
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
    document.getElementById("vid").play();

    /*
     * 자동 화면 전환
     * Automatic Screen Transition
     */
    const chapterBox = document.querySelector(".chapter__title");
    setTimeout(function() {
      location.href = "uranos.php";
    }, 7000);
  </script>

</body>

<?php
// }
?>

</html>