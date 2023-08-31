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
$coin = $_POST['coin'];

// GET a payment method from the previous page
$level = $_POST['level'];
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
  <div class="rate_process">
    <lottie-player src="./json/shifting_cube.json" background="transparent" speed="1" style="width: 300px; height: 300px" loop autoplay direction="1" mode="normal"></lottie-player>

    <h1>IDX: <?= $idx; ?></h1>
    <h1>Coin: <?= $coin; ?></h1>
    <h1>Level: <?= $level; ?></h1>

  </div>

  <script>
    function cardGameLevel1(idx) {
      location.href = "uranos_rate_process2.php?idx=" + idx + "&coin=gold&gamelevel=1";
    }

    function cardGameLevel2(idx) {
      location.href = "uranos_rate_process2.php?idx=" + idx + "&coin=gold&gamelevel=2";
    }

    function cardGameLevel3(idx) {
      location.href = "uranos_rate_process2.php?idx=" + idx + "&coin=gold&gamelevel=3";
    }

    function cardGameLevel4(idx) {
      location.href = "uranos_rate_process2.php?idx=" + idx + "&coin=gold&gamelevel=4";
    }

    function cardGameLevel5(idx) {
      location.href = "uranos_rate_process2.php?idx=" + idx + "&coin=gold&gamelevel=5";
    }
  </script>
</body>

<?php
// }
?>

</html>