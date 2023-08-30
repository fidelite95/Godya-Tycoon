<?php
include("./brand.php");

session_start();
$login_id = $_SESSION['id'];
if (isset($_SESSION['id'])) {
  $login_status = true;
}

// if (!$login_status) {
//   echo "<script>alert('로그인 후에 이용 가능합니다.')</script>";
//   echo "<script>location.href='login.php';</script>";
// } else {

// GET an index from the previous page
$idx = $_GET['idx'];

// GET a payment method from the previous page
$coin = $_GET['coin'];
?>

<!DOCTYPE html>
<html>

<head>
  <?php include("./head.php") ?>
  <title>TYCOON | <?php echo $land_code ?></title>
  <link rel="stylesheet" type="text/css" href="process.css" />
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</head>

<body>
  <div class="build_process">
    <lottie-player src="./json/white_cubes.json" background="transparent" speed="1" style="width: 200px; height: 200px" loop autoplay direction="1" mode="normal"></lottie-player>

    <h1>건설중입니다...</h1>
    <p>하단의 버튼을 클릭하여 건설을 완료해주세요!</p>

    <div class="bar_wrapper_ieros">
      <div id="barIeros"></div>
    </div>

    <?php
    if ($coin == 'gold') { ?>
      <button class="btnBuild" onclick="moveWithGold(<?= $idx; ?>)">CLICK</button>
    <?php
    } elseif ($coin == 'red') { ?>
      <button class="btnBuild" onclick="moveWithRed(<?= $idx; ?>)">CLICK</button>
    <?php
    }
    ?>
  </div>

  <script>
    let myBar = document.getElementById("barIeros");
    let width = 0;
    let decrease = setInterval(() => {
      if (width <= 0) {
        width = 0;
      } else {
        width -= 0.1;
        myBar.style.width = width + '%';
      }
    }, 5);

    function moveWithGold(idx) {
      if (width >= 98) {
        clearInterval(decrease);
        let answer = confirm("건설을 완료하시겠습니까?");
        if (answer == true) {
          successWithGold(idx);
        }
      } else {
        width += 9;
        myBar.style.width = width + '%';
      }
    }

    function moveWithRed(idx) {
      if (width >= 98) {
        clearInterval(decrease);
        let answer = confirm("건설을 완료하시겠습니까?");
        if (answer == true) {
          successWithRed(idx);
        }
      } else {
        width += 9;
        myBar.style.width = width + '%';
      }
    }

    function successWithGold(idx) {
      location.href = "ieros_build_ok.php?idx=" + idx + "&coin=gold";
    }

    function successWithRed(idx) {
      location.href = "ieros_build_ok.php?idx=" + idx + "&coin=red";
    }
  </script>
</body>

<?php
// }
?>

</html>