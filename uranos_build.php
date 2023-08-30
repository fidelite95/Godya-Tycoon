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

  //──────── Pricing list <Build>
  // 0 -> 1 : 200,000 (GOLD) 1,000 (RED)
  // 1 -> 2 : 800,000 (GOLD) 2,000 (RED)
  // 2 -> 3 : 1,500,000 (GOLD) 3,000 (RED)
  // 3 -> 4 : 2,500,000 (GOLD) 4,000 (RED)
  $price_gold_lv1 = 200000;
  $price_gold_lv2 = 800000;
  $price_gold_lv3 = 1500000;
  $price_gold_lv4 = 2500000;
  $price_red_lv1 = 1000;
  $price_red_lv2 = 2000;
  $price_red_lv3 = 3000;
  $price_red_lv4 = 4000;

  //──────── Comparison (Gold)
  $available_gold_lv1 = false;
  $available_gold_lv2 = false;
  $available_gold_lv3 = false;
  $available_gold_lv4 = false;
  $maximum_level_gold = false;
  switch ($building) {
    case 0:
      if ($gold >= $price_gold_lv1) {
        $available_gold_lv1 = true;
      } else {
        $available_gold_lv1 = false;
      }
      break;
    case 1:
      if ($gold >= $price_gold_lv2) {
        $available_gold_lv2 = true;
      } else {
        $available_gold_lv2 = false;
      }
      break;
    case 2:
      if ($gold >= $price_gold_lv3) {
        $available_gold_lv3 = true;
      } else {
        $available_gold_lv3 = false;
      }
      break;
    case 3:
      if ($gold >= $price_gold_lv4) {
        $available_gold_lv4 = true;
      } else {
        $available_gold_lv4 = false;
      }
      break;
    case 4:
      $available_gold_lv1 = false;
      $available_gold_lv2 = false;
      $available_gold_lv3 = false;
      $available_gold_lv4 = false;
      $maximum_level_gold = true;
      break;
    default:
      $available_gold_lv1 = false;
      $available_gold_lv2 = false;
      $available_gold_lv3 = false;
      $available_gold_lv4 = false;
      break;
  }

  //──────── Comparison (Red)
  $available_red_lv1 = false;
  $available_red_lv2 = false;
  $available_red_lv3 = false;
  $available_red_lv4 = false;
  $maximum_level_red = false;
  switch ($building) {
    case 0:
      if ($red >= $price_red_lv1) {
        $available_red_lv1 = true;
      } else {
        $available_red_lv1 = false;
      }
      break;
    case 1:
      if ($red >= $price_red_lv2) {
        $available_red_lv2 = true;
      } else {
        $available_red_lv2 = false;
      }
      break;
    case 2:
      if ($red >= $price_red_lv3) {
        $available_red_lv3 = true;
      } else {
        $available_red_lv3 = false;
      }
      break;
    case 3:
      if ($red >= $price_red_lv4) {
        $available_red_lv4 = true;
      } else {
        $available_red_lv4 = false;
      }
      break;
    case 4:
      $available_red_lv1 = false;
      $available_red_lv2 = false;
      $available_red_lv3 = false;
      $available_red_lv4 = false;
      $maximum_level_red = true;
      break;
    default:
      $available_red_lv1 = false;
      $available_red_lv2 = false;
      $available_red_lv3 = false;
      $available_red_lv4 = false;
      break;
  }
  ?>
  <div class="tenant">
    <h3 class="tenant_name"><?php echo $member_nick ?>님의 보유자산</h3>
    <div class="tenant_asset">
      <div class="tenant_gold">
        <img class="tenant_img" src="./images/tycoon_gold.png" alt="gold" />
        <p><?php echo $member_gold ?></p>
        <?php
        switch ($building) {
          case 0:
            if ($available_gold_lv1 == false) {
              echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
            }
            break;
          case 1:
            if ($available_gold_lv2 == false) {
              echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
            }
            break;
          case 2:
            if ($available_gold_lv3 == false) {
              echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
            }
            break;
          case 3:
            if ($available_gold_lv4 == false) {
              echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
            }
            break;
          default:
            break;
        }
        ?>
      </div>
      <div class="tenant_red">
        <img class="tenant_img" src="./images/tycoon_red.png" alt="red" />
        <p><?php echo $member_red ?></p>
        <?php
        switch ($building) {
          case 0:
            if ($available_red_lv1 == false) {
              echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
            }
            break;
          case 1:
            if ($available_red_lv2 == false) {
              echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
            }
            break;
          case 2:
            if ($available_red_lv3 == false) {
              echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
            }
            break;
          case 3:
            if ($available_red_lv4 == false) {
              echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
            }
            break;
          default:
            break;
        }
        ?>
      </div>
    </div>
  </div>

  <!-- Ownership -->
  <div class="ownership_build">
    <h1 class="ownership_land"><?php echo $land_code ?></h1>
    <?php
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
    ?>
  </div>

  <!-- Building Status -->
  <div class="building">
    <h3 class="building_title">현재 영토의 건설 등급</h3>
    <div class="building_desc">
      <div class="building_img">
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
        <h4><?php echo $building_name ?></h4>
      </div>
      <div class="building_price">
        <div class="building_gold">
          <img class="tenant_img" src="./images/tycoon_gold.png" alt="gold" />
          <p><?php
              switch ($building) {
                case 0:
                  echo number_format($price_gold_lv1);
                  break;
                case 1:
                  echo number_format($price_gold_lv2);
                  break;
                case 2:
                  echo number_format($price_gold_lv3);
                  break;
                case 3:
                  echo number_format($price_gold_lv4);
                  break;
                case 4:
                  echo '최고 등급';
                  break;
                default:
                  break;
              }
              ?></p>
        </div>
        <div class="building_red">
          <img class="tenant_img" src="./images/tycoon_red.png" alt="red" />
          <p><?php
              switch ($building) {
                case 0:
                  echo number_format($price_red_lv1);
                  break;
                case 1:
                  echo number_format($price_red_lv2);
                  break;
                case 2:
                  echo number_format($price_red_lv3);
                  break;
                case 3:
                  echo number_format($price_red_lv4);
                  break;
                case 4:
                  echo '최고 등급';
                  break;
                default:
                  break;
              }
              ?></p>
        </div>
        <h4>ㅡ<br />건설에 필요한 비용</h4>
      </div>
    </div>
  </div>

  <!-- Buttons -->
  <div class="buttons">
    <button class="btn btn-effect" onclick="<?php if ($available_gold_lv1 == true || $available_gold_lv2 == true || $available_gold_lv3 == true || $available_gold_lv4 == true) { ?>
                                                              payWithGold(<?= $idx; ?>);
                                                            <?php } elseif ($maximum_level_gold == true) { ?>
                                                              alert('최고 등급을 달성했습니다.');
                                                            <?php } else { ?>
                                                              alert('골드 잔액이 부족합니다.');
                                                            <?php } ?>">
      <span>
        <img src="./images/tycoon_gold.png" alt="gold" style="width: 20px; margin-right: 10px; transform: translateY(3px);" />
        사용
      </span>
    </button>
    <button class="btn btn-effect" onclick="<?php if ($available_red_lv1 == true || $available_red_lv2 == true || $available_red_lv3 == true || $available_red_lv4 == true) { ?>
                                                              payWithRed(<?= $idx; ?>);
                                                            <?php } elseif ($maximum_level_red == true) { ?>
                                                              alert('최고 등급을 달성했습니다.');
                                                            <?php } else { ?>
                                                              alert('레드베릴 잔액이 부족합니다.');
                                                            <?php } ?>">
      <span>
        <img src="./images/tycoon_red.png" alt="red" style="width: 20px; margin-right: 10px; transform: translateY(3px);" />
        사용
      </span>
    </button>
    <button class="btn btn-effect" onclick="back(<?= $idx; ?>)">
      <span>취소</span>
    </button>
  </div>

  <script>
    // Go back
    function back(idx) {
      location.href = "uranos_detail.php?idx=" + idx;
    }

    // Pay with Gold
    function payWithGold(idx) {
      let answer = confirm("골드로 결제하시겠습니까?");
      if (answer == true) {
        location.href = "uranos_build_process.php?idx=" + idx + "&coin=gold";
      }
    }

    // Pay with Red beryl
    function payWithRed(idx) {
      let answer = confirm("레드베릴로 결제하시겠습니까?");
      if (answer == true) {
        location.href = "uranos_build_process.php?idx=" + idx + "&coin=red";
      }
    }
  </script>
</body>

<?php
// }
?>

</html>