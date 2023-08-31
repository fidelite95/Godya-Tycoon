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

// Retrieving data frmo a database
$con = mysqli_connect("localhost", "gods2022", "wpdntm1004", "gods2022");
mysqli_query($con, 'SET NAMES utf8');
$con->query("SET NAMES 'UTF8'");

if ($con->connect_errno) {
  die('Connection Error : ' . $con->connect_error);
}

$query = "SELECT * FROM tycoon_uranos WHERE idx='$idx'";
$result = $con->query($query);
$row = $result->fetch_assoc();

// Land Code
$land_code = $row['land_code'];

// Land Status : 0 (For sale), 1 (Sold)
$land_status = $row['land_status'];

// Member Index
$member_idX = $row['member_idX'];

// Member ID (Gmail)
$member_id = $row['member_id'];
if ($member_id == NULL) {
  $member_id = '없음';
}

// Price
$price_gold = number_format($row['price_gold']);
$price_red = number_format($row['price_red']);

// Profitability : _rate.php
$profit = $row['profit'];
$profit_name = '';

// Building : _build.php
$building = $row['building'];
$building_name = '';

// Mined resources
$item1 = $row['item1'];
$item2 = $row['item2'];
$item3 = $row['item3'];
$item4 = $row['item4'];
$item5 = $row['item5'];
$item6 = $row['item6'];
$item7 = $row['item7'];
$item8 = $row['item8'];

// Card Game Level
$card_game_level;
switch ($profit) {
  case 0:
  case 1:
  case 2:
    $card_game_level = 1;
    break;
  case 3:
  case 4:
  case 5:
    $card_game_level = 2;
    break;
  case 6:
  case 7:
  case 8:
    $card_game_level = 3;
    break;
  case 9:
  case 10:
  case 11:
    $card_game_level = 4;
    break;
  case 12:
  case 13:
  case 14:
    $card_game_level = 5;
    break;
}
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

    <h1>영토 신용평가 승급</h1>
    <p>주어진 카드 게임을 완료하고 승급에 성공하세요!</p>

    <form action="uranos_rate_process2.php?idx=<?= $idx; ?>" method="POST">
      <?php
      if ($coin == 'gold') {
        switch ($card_game_level) {
          case 1:
            echo '
            <input type="hidden" name="coin" value="gold"/>
            <input type="hidden" name="level" value="1"/>
            <button type="submit" class="btn btn-effect"><span>시작하기</span></button>
            ';
            break;
          case 2:
            echo '
            <input type="hidden" name="coin" value="gold"/>
            <input type="hidden" name="level" value="2"/>
            <button type="submit" class="btn btn-effect"><span>시작하기</span></button>
            ';
            break;
          case 3:
            echo '
            <input type="hidden" name="coin" value="gold"/>
            <input type="hidden" name="level" value="3"/>
            <button type="submit" class="btn btn-effect"><span>시작하기</span></button>
            ';
            break;
          case 4:
            echo '
            <input type="hidden" name="coin" value="gold"/>
            <input type="hidden" name="level" value="4"/>
            <button type="submit" class="btn btn-effect"><span>시작하기</span></button>
            ';
            break;
          case 5:
            echo '
            <input type="hidden" name="coin" value="gold"/>
            <input type="hidden" name="level" value="5"/>
            <button type="submit" class="btn btn-effect"><span>시작하기</span></button>
            ';
            break;
          default:
            break;
        }
      } elseif ($coin == 'red') {
        switch ($card_game_level) {
          case 1:
            echo '
            <input type="hidden" name="coin" value="red"/>
            <input type="hidden" name="level" value="1"/>
            <button type="submit" class="btn btn-effect"><span>시작하기</span></button>
            ';
            break;
          case 2:
            echo '
            <input type="hidden" name="coin" value="red"/>
            <input type="hidden" name="level" value="2"/>
            <button type="submit" class="btn btn-effect"><span>시작하기</span></button>
            ';
            break;
          case 3:
            echo '
            <input type="hidden" name="coin" value="red"/>
            <input type="hidden" name="level" value="3"/>
            <button type="submit" class="btn btn-effect"><span>시작하기</span></button>
            ';
            break;
          case 4:
            echo '
            <input type="hidden" name="coin" value="red"/>
            <input type="hidden" name="level" value="4"/>
            <button type="submit" class="btn btn-effect"><span>시작하기</span></button>
            ';
            break;
          case 5:
            echo '
            <input type="hidden" name="coin" value="red"/>
            <input type="hidden" name="level" value="5"/>
            <button type="submit" class="btn btn-effect"><span>시작하기</span></button>
            ';
            break;
          default:
            break;
        }
      }
      ?>
    </form>
  </div>

  <script>
  </script>
</body>

<?php
// }
?>

</html>