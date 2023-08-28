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

// Retrieving data from a database
$con = mysqli_connect("localhost", "gods2022", "wpdntm1004", "gods2022");
mysqli_query($con, 'SET NAMES utf8');
$con->query("SET NAMES 'UTF8'");

if ($con->connect_errno) {
  die('Connection Error : ' . $con->connect_error);
}

$query = "SELECT * FROM tycoon_ieros WHERE idx='$idx'";
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
?>

<!DOCTYPE html>
<html>

<head>
  <?php include("./head.php") ?>
  <title>TYCOON | <?php echo $land_code ?></title>
  <link rel="stylesheet" type="text/css" href="cube.css" />
  <link rel="stylesheet" type="text/css" href="tycoon.css" />
  <link rel="stylesheet" type="text/css" href="navbar.css" />
  <link rel="stylesheet" type="text/css" href="common.css" />
</head>

<body>
  <?php include("./navbar.php") ?>

  <!-- Tenant -->
  <?php
  // Temporary Member ID
  $temporary_id = "grandefidelite@gmail.com";

  $query_tenant = "SELECT * FROM tb_member WHERE id='$temporary_id'";
  $result_tenant = $con->query($query_tenant);
  $row_tenant = $result_tenant->fetch_assoc();

  //──────── Member Nickname
  // $member_nick = $row_tenant['nick'];
  $member_nick = "아슬란";

  //──────── Member Asset
  // $member_gold = number_format($row_tenant['point']);
  // $member_red = number_format($row_tenant['cash']);
  $gold = 8034678;
  $red = 7564;
  $member_gold = number_format($gold);
  $member_red = number_format($red);

  //──────── Comparison (Gold)
  $available_gold = false;
  if ($gold >= $row['price_gold']) {
    $available_gold = true;
  }

  //──────── Comparison (Red)
  $available_red = false;
  if ($red >= $row['price_red']) {
    $available_red = true;
  }
  ?>
  <div class="tenant">
    <h3 class="tenant_name"><?php echo $member_nick ?>님의 보유자산</h3>
    <div class="tenant_asset">
      <div class="tenant_gold">
        <img class="tenant_img" src="./images/tycoon_gold.png" alt="gold" />
        <p><?php echo $member_gold ?></p>
        <?php
        if ($available_gold == false) {
          echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
        }
        ?>
      </div>
      <div class="tenant_red">
        <img class="tenant_img" src="./images/tycoon_red.png" alt="red" />
        <p><?php echo $member_red ?></p>
        <?php
        if ($available_red == false) {
          echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
        }
        ?>
      </div>
    </div>
  </div>

  <!-- Ownership -->
  <div class="ownership_buy">
    <h1 class="ownership_land"><?php echo $land_code ?></h1>
    <div class="ownership_price">
      <div class="price_gold">
        <img src="./images/tycoon_gold.png" alt="gold" />
        <p><?php echo $price_gold ?></p>
      </div>
      <div class="price_red">
        <img src="./images/tycoon_red.png" alt="red" />
        <p><?php echo $price_red ?></p>
      </div>
    </div>
  </div>

  <!-- Land Cube -->
  <?php
  switch ($idx) {
      // Grade 1
    case 1:
      echo '
        <div class="cube_1">
          <div class="top_1"></div>
          <div>
            <span style="--i: 0"></span>
            <span style="--i: 1"></span>
            <span style="--i: 2"></span>
            <span style="--i: 3"></span>
          </div>
        </div>
        ';
      break;
      // Grade 2
    case 2:
    case 3:
      echo '
        <div class="cube_2">
          <div class="top_2"></div>
          <div>
            <span style="--i: 0"></span>
            <span style="--i: 1"></span>
            <span style="--i: 2"></span>
            <span style="--i: 3"></span>
          </div>
        </div>
        ';
      break;
      // Grade 3
    case 4:
    case 5:
    case 6:
      echo '
        <div class="cube_3">
          <div class="top_3"></div>
          <div>
            <span style="--i: 0"></span>
            <span style="--i: 1"></span>
            <span style="--i: 2"></span>
            <span style="--i: 3"></span>
          </div>
        </div>
        ';
      break;
      // Grade 4
    case 7:
    case 8:
    case 9:
    case 10:
      echo '
        <div class="cube_4">
          <div class="top_4"></div>
          <div>
            <span style="--i: 0"></span>
            <span style="--i: 1"></span>
            <span style="--i: 2"></span>
            <span style="--i: 3"></span>
          </div>
        </div>
        ';
      break;
      // Grade 5
    case 11:
    case 12:
    case 13:
    case 14:
    case 15:
      echo '
        <div class="cube_5">
          <div class="top_5"></div>
          <div>
            <span style="--i: 0"></span>
            <span style="--i: 1"></span>
            <span style="--i: 2"></span>
            <span style="--i: 3"></span>
          </div>
        </div>
        ';
      break;
      // Grade 6
    case 16:
    case 17:
    case 18:
    case 19:
    case 20:
    case 21:
      echo '
        <div class="cube_6">
          <div class="top_6"></div>
          <div>
            <span style="--i: 0"></span>
            <span style="--i: 1"></span>
            <span style="--i: 2"></span>
            <span style="--i: 3"></span>
          </div>
        </div>
        ';
      break;
      // Grade 7
    case 22:
    case 23:
    case 24:
    case 25:
    case 26:
    case 27:
    case 28:
      echo '
        <div class="cube_7">
          <div class="top_7"></div>
          <div>
            <span style="--i: 0"></span>
            <span style="--i: 1"></span>
            <span style="--i: 2"></span>
            <span style="--i: 3"></span>
          </div>
        </div>
        ';
      break;
      // Grade 8
    case 29:
    case 30:
    case 31:
    case 32:
    case 33:
    case 34:
    case 35:
    case 36:
      echo '
        <div class="cube_8">
          <div class="top_8"></div>
          <div>
            <span style="--i: 0"></span>
            <span style="--i: 1"></span>
            <span style="--i: 2"></span>
            <span style="--i: 3"></span>
          </div>
        </div>
        ';
      break;
      // Grade 9
    case 37:
    case 38:
    case 39:
    case 40:
    case 41:
    case 42:
    case 43:
    case 44:
    case 45:
      echo '
        <div class="cube_9">
          <div class="top_9"></div>
          <div>
            <span style="--i: 0"></span>
            <span style="--i: 1"></span>
            <span style="--i: 2"></span>
            <span style="--i: 3"></span>
          </div>
        </div>
        ';
      break;
      // Grade 10
    case 46:
    case 47:
    case 48:
    case 49:
    case 50:
    case 51:
    case 52:
    case 53:
    case 54:
    case 55:
      echo '
        <div class="cube_10">
          <div class="top_10"></div>
          <div>
            <span style="--i: 0"></span>
            <span style="--i: 1"></span>
            <span style="--i: 2"></span>
            <span style="--i: 3"></span>
          </div>
        </div>
        ';
      break;
  }
  ?>

  <!-- Buttons -->
  <div class="buttons">
    <button data-open-modal class="btn btn-effect" onclick="<?php if ($available_gold == true) { ?>
                                                              payWithGold(<?= $idx; ?>);
                                                            <?php } else { ?>
                                                              alert('골드 잔액이 부족합니다.');
                                                            <?php } ?>">
      <span>
        <img src="./images/tycoon_gold.png" alt="gold" style="width: 20px; margin-right: 10px; transform: translateY(3px);" />
        사용
      </span>
    </button>
    <button data-open-modal class="btn btn-effect" onclick="<?php if ($available_red == true) { ?>
                                                              payWithRed(<?= $idx; ?>);
                                                            <?php } else { ?>
                                                              alert('레드베릴 잔액이 부족합니다.');
                                                            <?php } ?>">
      <span>
        <img src="./images/tycoon_red.png" alt="red" style="width: 20px; margin-right: 10px; transform: translateY(3px);" />
        사용
      </span>
    </button>
    <button data-open-modal class="btn btn-effect" onclick="back()">
      <span>취소</span>
    </button>
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

    // Go back
    function back() {
      location.href = "ieros.php";
    }

    // Pay with Gold
    function payWithGold(idx) {
      let answer = confirm("골드로 결제하시겠습니까?");
      if (answer == true) {
        location.href = "ieros_rent_ok.php?idx=" + idx + "&coin=gold";
      }
    }

    // Pay with Red beryl
    function payWithRed(idx) {
      let answer = confirm("레드베릴로 결제하시겠습니까?");
      if (answer == true) {
        location.href = "ieros_rent_ok.php?idx=" + idx + "&coin=gold";
      }
    }
  </script>
</body>

<?php
// }
?>

</html>