<?php
include("./brand.php");

session_start();
$login_id = $_SESSION['id'];
if (isset($_SESSION['id'])) {
  $login_status = true;
}

?>

<!DOCTYPE html>
<html>

<head>
  <?php include("./head.php") ?>
  <title>TYCOON | Intro</title>
  <link rel="stylesheet" type="text/css" href="./common.css" />
  <link rel="stylesheet" type="text/css" href="./intro.css" />
  <link rel="stylesheet" type="text/css" href="./transition.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous" />
  <script type="text/javascript">
    var opacity = 0;
    var intervalID = 0;

    function show() {
      var body = document.getElementById("body");
      opacity = Number(
        window.getComputedStyle(body).getPropertyValue("opacity")
      );
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
    document.getElementById("vid").play();
  </script>
</head>

<?php
if (!$login_status) {
  echo "<script>alert('로그인 후에 이용 가능합니다.')</script>";
  echo "<script>location.href='login.php';</script>";
} else {
?>

  <body id="body" style="opacity: 0">
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

    <script type="text/javascript">
      // Transition
      const chapterBox = document.querySelector(".chapter__title");
      setTimeout(function() {
        location.href = "uranos.php";
      }, 7000);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
  
<?php
}
?>

</html>