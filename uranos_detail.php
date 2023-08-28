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
?>

<!DOCTYPE html>
<html>

<head>
  <?php include("./head.php") ?>
  <title>TYCOON | <?php echo $land_code ?></title>
  <link rel="stylesheet" type="text/css" href="cube.css" />
  <link rel="stylesheet" type="text/css" href="tycoon.css" />
  <link rel="stylesheet" type="text/css" href="navbar.css" />
  <link rel="stylesheet" type="text/css" href="description.css" />
</head>

<body>
  <?php include("./navbar.php") ?>

  <!-- Ownership -->
  <div class="ownership">
    <h1 class="ownership_land"><?php echo $land_code ?></h1>
    <h3 class="ownership_owner">소유자 : <?php echo $member_id ?></h3>
    <?php
    if ($land_status == 0) { ?>
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
    <?php
    } elseif ($land_status == 1) {
      switch ($idx) {
          // Grade 1
        case 1:
          echo '
          <div class="ownership_star">
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
           </div>
          ';
          break;
          // Grade 2
        case 2:
        case 3:
          echo '
          <div class="ownership_star">
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
           </div>
          ';
          break;
          // Grade 3
        case 4:
        case 5:
        case 6:
          echo '
          <div class="ownership_star">
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
           </div>
          ';
          break;
          // Grade 4
        case 7:
        case 8:
        case 9:
        case 10:
          echo '
          <div class="ownership_star">
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
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
          <div class="ownership_star">
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
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
          <div class="ownership_star">
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
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
          <div class="ownership_star">
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
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
          <div class="ownership_star">
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
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
          <div class="ownership_star">
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
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
          <div class="ownership_star">
            <img src="./images/tycoon_star.png" alt="star" />
           </div>
          ';
          break;
      }
    }
    ?>
  </div>

  <!-- Land Cube -->
  <?php
  if ($land_status == 0) {
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
  } elseif ($land_status == 1) {
    switch ($idx) {
        // Grade 1
      case 1:
        echo '
      <div class="cube_uranos_1">
        <div class="top_uranos_1"></div>
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
      <div class="cube_uranos_2">
        <div class="top_uranos_2"></div>
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
      <div class="cube_uranos_3">
        <div class="top_uranos_3"></div>
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
      <div class="cube_uranos_4">
        <div class="top_uranos_4"></div>
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
      <div class="cube_uranos_5">
        <div class="top_uranos_5"></div>
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
      <div class="cube_uranos_6">
        <div class="top_uranos_6"></div>
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
      <div class="cube_uranos_7">
        <div class="top_uranos_7"></div>
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
      <div class="cube_uranos_8">
        <div class="top_uranos_8"></div>
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
      <div class="cube_uranos_9">
        <div class="top_uranos_9"></div>
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
      <div class="cube_uranos_10">
        <div class="top_uranos_10"></div>
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
  }
  ?>

  <!-- Buttons -->
  <?php
  if ($land_status == 0) {
  ?>
    <div class="buttons">
      <button class="btn btn-effect" onclick="rent(<?= $idx ?>)">
        <span>임대하기</span>
      </button>
      <button class="btn btn-effect" onclick="back()">
        <span>취소</span>
      </button>
    </div>
  <?php
  } elseif ($land_status == 1) {
  ?>
    <div class="buttons">
      <button class="btn btn-effect" onclick="build(<?= $idx ?>)">
        <span>건설하기</span>
      </button>
      <button class="btn btn-effect" onclick="rate(<?= $idx ?>)">
        <span>승급하기</span>
      </button>
      <button class="btn btn-effect" onclick="mine(<?= $idx ?>)">
        <span>채굴하기</span>
      </button>
      <button class="btn btn-effect" onclick="back()">
        <span>취소</span>
      </button>
    </div>
  <?php
  }
  ?>

  <!-- Description -->
  <div class="description">
    <div class="description_profit">
      <div class="description_img">
        <?php
        switch ($profit) {
            // None
          case 0:
            $profit_name = '없음';
            echo '<img src="./images/rating/profit_lv0.png" alt="profit">';
            break;
            // Alpha
          case 1:
            $profit_name = '알파';
            echo '<img src="./images/rating/profit_lv1.png" alt="profit">';
            break;
            // Beta
          case 2:
            $profit_name = '베타';
            echo '<img src="./images/rating/profit_lv2.png" alt="profit">';
            break;
            // Gamma
          case 3:
            $profit_name = '감마';
            echo '<img src="./images/rating/profit_lv3.png" alt="profit">';
            break;
            // Delta
          case 4:
            $profit_name = '델타';
            echo '<img src="./images/rating/profit_lv4.png" alt="profit">';
            break;
            // Epsilon
          case 5:
            $profit_name = '엡실론';
            echo '<img src="./images/rating/profit_lv5.png" alt="profit">';
            break;
            // Zeta
          case 6:
            $profit_name = '제타';
            echo '<img src="./images/rating/profit_lv6.png" alt="profit">';
            break;
            // Eta
          case 7:
            $profit_name = '에타';
            echo '<img src="./images/rating/profit_lv7.png" alt="profit">';
            break;
            // Theta
          case 8:
            $profit_name = '시타';
            echo '<img src="./images/rating/profit_lv8.png" alt="profit">';
            break;
            // Iota
          case 9:
            $profit_name = '이오타';
            echo '<img src="./images/rating/profit_lv9.png" alt="profit">';
            break;
            // Kappa
          case 10:
            $profit_name = '카파';
            echo '<img src="./images/rating/profit_lv10.png" alt="profit">';
            break;
            // Lambda
          case 11:
            $profit_name = '람다';
            echo '<img src="./images/rating/profit_lv11.png" alt="profit">';
            break;
            // Mu
          case 12:
            $profit_name = '뮤';
            echo '<img src="./images/rating/profit_lv12.png" alt="profit">';
            break;
            // Nu
          case 13:
            $profit_name = '뉴';
            echo '<img src="./images/rating/profit_lv13.png" alt="profit">';
            break;
            // Xi
          case 14:
            $profit_name = '크사이';
            echo '<img src="./images/rating/profit_lv14.png" alt="profit">';
            break;
            // Omicron
          case 15:
            $profit_name = '오미크론';
            echo '<img src="./images/rating/profit_lv15.png" alt="profit">';
            break;
          default:
            $profit_name = 'ERROR';
            break;
        }
        ?>
      </div>
      <div class="description_detail">
        <p>수익 등급<br />ㅡ</p>
        <h4><?php echo $profit_name ?></h4>
      </div>
    </div>
    <div class="description_building">
      <div class="description_img">
        <?php
        switch ($building) {
          case 0:
            $building_name = '없음';
            echo '<img src="./images/building/building_none.png" alt="building">';
            break;
          case 1:
            $building_name = '콜로나';
            echo '<img src="./images/building/building_kolona.png" alt="building">';
            break;
          case 2:
            $building_name = '오데이온';
            echo '<img src="./images/building/building_odeion.png" alt="building">';
            break;
          case 3:
            $building_name = '스타디온';
            echo '<img src="./images/building/building_stadion.png" alt="building">';
            break;
          case 4:
            $building_name = '파르테논';
            echo '<img src="./images/building/building_parthenon.png" alt="building">';
            break;
          default:
            $building_name = 'ERROR';
            break;
        }
        ?>
      </div>
      <div class="description_detail">
        <p>건설 등급<br />ㅡ</p>
        <h4><?php echo $building_name ?></h4>
      </div>
    </div>
  </div>

  <script>
    // Move to uranos.php
    function back() {
      location.href = "uranos.php";
    }

    // Move to uranos_rent.php
    function rent(idx) {
      location.href = "uranos_rent.php?idx=" + idx;
    }

    // Move to uranos_build.php
    function build(idx) {
      location.href = "uranos_build.php?idx=" + idx;
    }

    // Move to uranos_rate.php
    function rate(idx) {
      location.href = "uranos_rate.php?idx=" + idx;
    }

    // Move to uranos_mine.php
    function mine(idx) {
      location.href = "uranos_mine.php?idx=" + idx;
    }
  </script>
</body>

<?php
// }
?>

</html>