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

  // Pricing list <Rate>
  // 0 -> 1  (Alpha) : 40,000 (GOLD) 200 (RED)
  // 1 -> 2  (Beta) : 80,000 (GOLD) 400 (RED)
  // 2 -> 3  (Gamma) : 120,000 (GOLD) 600 (RED)
  // 3 -> 4  (Delta) : 160,000 (GOLD) 800 (RED)
  // 4 -> 5  (Epsilon) : 200,000 (GOLD) 1,000 (RED)
  // 5 -> 6  (Zeta) : 460,000 (GOLD) 1,400 (RED)
  // 6 -> 7  (Eta) : 720,000 (GOLD) 1,800 (RED)
  // 7 -> 8  (Theta) : 980,000 (GOLD) 2,200 (RED)
  // 8 -> 9  (Iota) : 1,240,000 (GOLD) 2,600 (RED)
  // 9 -> 10  (Kappa) : 1,500,000 (GOLD) 3,000 (RED)
  // 10 -> 11  (Lambda) : 2,600,000 (GOLD) 3,800 (RED)
  // 11 -> 12  (Mu) : 3,700,000 (GOLD) 4,600 (RED)
  // 12 -> 13  (Nu) : 4,800,000 (GOLD) 5,400 (RED)
  // 13 -> 14  (Xi) : 5,900,000 (GOLD) 6,200 (RED)
  // 14 -> 15  (Omicron) : 7,000,000 (GOLD) 7,000 (RED)
  $price_gold_lv1 = 40000;
  $price_gold_lv2 = 80000;
  $price_gold_lv3 = 120000;
  $price_gold_lv4 = 160000;
  $price_gold_lv5 = 200000;
  $price_gold_lv6 = 460000;
  $price_gold_lv7 = 720000;
  $price_gold_lv8 = 980000;
  $price_gold_lv9 = 1240000;
  $price_gold_lv10 = 1500000;
  $price_gold_lv11 = 2600000;
  $price_gold_lv12 = 3700000;
  $price_gold_lv13 = 4800000;
  $price_gold_lv14 = 5900000;
  $price_gold_lv15 = 7000000;
  $price_red_lv1 = 200;
  $price_red_lv2 = 400;
  $price_red_lv3 = 600;
  $price_red_lv4 = 800;
  $price_red_lv5 = 1000;
  $price_red_lv6 = 1400;
  $price_red_lv7 = 1800;
  $price_red_lv8 = 2200;
  $price_red_lv9 = 2600;
  $price_red_lv10 = 3000;
  $price_red_lv11 = 3800;
  $price_red_lv12 = 4600;
  $price_red_lv13 = 5400;
  $price_red_lv14 = 6200;
  $price_red_lv15 = 7000;

  //──────── Comparison (Gold)
  $available_gold_lv1 = false;
  $available_gold_lv2 = false;
  $available_gold_lv3 = false;
  $available_gold_lv4 = false;
  $available_gold_lv5 = false;
  $available_gold_lv6 = false;
  $available_gold_lv7 = false;
  $available_gold_lv8 = false;
  $available_gold_lv9 = false;
  $available_gold_lv10 = false;
  $available_gold_lv11 = false;
  $available_gold_lv12 = false;
  $available_gold_lv13 = false;
  $available_gold_lv14 = false;
  $available_gold_lv15 = false;
  $maximum_level_gold = false;
  switch ($profit) {
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
      if ($gold >= $price_gold_lv5) {
        $available_gold_lv5 = true;
      } else {
        $available_gold_lv5 = false;
      }
      break;
    case 5:
      if ($gold >= $price_gold_lv6) {
        $available_gold_lv6 = true;
      } else {
        $available_gold_lv6 = false;
      }
      break;
    case 6:
      if ($gold >= $price_gold_lv7) {
        $available_gold_lv7 = true;
      } else {
        $available_gold_lv7 = false;
      }
      break;
    case 7:
      if ($gold >= $price_gold_lv8) {
        $available_gold_lv8 = true;
      } else {
        $available_gold_lv8 = false;
      }
      break;
    case 8:
      if ($gold >= $price_gold_lv9) {
        $available_gold_lv9 = true;
      } else {
        $available_gold_lv9 = false;
      }
      break;
    case 9:
      if ($gold >= $price_gold_lv10) {
        $available_gold_lv10 = true;
      } else {
        $available_gold_lv10 = false;
      }
      break;
    case 10:
      if ($gold >= $price_gold_lv11) {
        $available_gold_lv11 = true;
      } else {
        $available_gold_lv11 = false;
      }
      break;
    case 11:
      if ($gold >= $price_gold_lv12) {
        $available_gold_lv12 = true;
      } else {
        $available_gold_lv12 = false;
      }
      break;
    case 12:
      if ($gold >= $price_gold_lv13) {
        $available_gold_lv13 = true;
      } else {
        $available_gold_lv13 = false;
      }
      break;
    case 13:
      if ($gold >= $price_gold_lv14) {
        $available_gold_lv14 = true;
      } else {
        $available_gold_lv14 = false;
      }
      break;
    case 14:
      if ($gold >= $price_gold_lv15) {
        $available_gold_lv15 = true;
      } else {
        $available_gold_lv15 = false;
      }
      break;
    case 15:
      $available_gold_lv1 = false;
      $available_gold_lv2 = false;
      $available_gold_lv3 = false;
      $available_gold_lv4 = false;
      $available_gold_lv5 = false;
      $available_gold_lv6 = false;
      $available_gold_lv7 = false;
      $available_gold_lv8 = false;
      $available_gold_lv9 = false;
      $available_gold_lv10 = false;
      $available_gold_lv11 = false;
      $available_gold_lv12 = false;
      $available_gold_lv13 = false;
      $available_gold_lv14 = false;
      $available_gold_lv15 = false;
      $maximum_level_gold = true;
      break;
    default:
      $available_gold_lv1 = false;
      $available_gold_lv2 = false;
      $available_gold_lv3 = false;
      $available_gold_lv4 = false;
      $available_gold_lv5 = false;
      $available_gold_lv6 = false;
      $available_gold_lv7 = false;
      $available_gold_lv8 = false;
      $available_gold_lv9 = false;
      $available_gold_lv10 = false;
      $available_gold_lv11 = false;
      $available_gold_lv12 = false;
      $available_gold_lv13 = false;
      $available_gold_lv14 = false;
      $available_gold_lv15 = false;
      $maximum_level_gold = false;
      break;
  }

  //──────── Comparison (Red)
  $available_red_lv1 = false;
  $available_red_lv2 = false;
  $available_red_lv3 = false;
  $available_red_lv4 = false;
  $available_red_lv5 = false;
  $available_red_lv6 = false;
  $available_red_lv7 = false;
  $available_red_lv8 = false;
  $available_red_lv9 = false;
  $available_red_lv10 = false;
  $available_red_lv11 = false;
  $available_red_lv12 = false;
  $available_red_lv13 = false;
  $available_red_lv14 = false;
  $available_red_lv15 = false;
  $maximum_level_red = false;
  switch ($profit) {
    case 0:
      if ($gold >= $price_red_lv1) {
        $available_red_lv1 = true;
      } else {
        $available_red_lv1 = false;
      }
      break;
    case 1:
      if ($gold >= $price_red_lv2) {
        $available_red_lv2 = true;
      } else {
        $available_red_lv2 = false;
      }
      break;
    case 2:
      if ($gold >= $price_red_lv3) {
        $available_red_lv3 = true;
      } else {
        $available_red_lv3 = false;
      }
      break;
    case 3:
      if ($gold >= $price_red_lv4) {
        $available_red_lv4 = true;
      } else {
        $available_red_lv4 = false;
      }
      break;
    case 4:
      if ($gold >= $price_red_lv5) {
        $available_red_lv5 = true;
      } else {
        $available_red_lv5 = false;
      }
      break;
    case 5:
      if ($gold >= $price_red_lv6) {
        $available_red_lv6 = true;
      } else {
        $available_red_lv6 = false;
      }
      break;
    case 6:
      if ($gold >= $price_red_lv7) {
        $available_red_lv7 = true;
      } else {
        $available_red_lv7 = false;
      }
      break;
    case 7:
      if ($gold >= $price_red_lv8) {
        $available_red_lv8 = true;
      } else {
        $available_red_lv8 = false;
      }
      break;
    case 8:
      if ($gold >= $price_red_lv9) {
        $available_red_lv9 = true;
      } else {
        $available_red_lv9 = false;
      }
      break;
    case 9:
      if ($gold >= $price_red_lv10) {
        $available_red_lv10 = true;
      } else {
        $available_red_lv10 = false;
      }
      break;
    case 10:
      if ($gold >= $price_red_lv11) {
        $available_red_lv11 = true;
      } else {
        $available_red_lv11 = false;
      }
      break;
    case 11:
      if ($gold >= $price_red_lv12) {
        $available_red_lv12 = true;
      } else {
        $available_red_lv12 = false;
      }
      break;
    case 12:
      if ($gold >= $price_red_lv13) {
        $available_red_lv13 = true;
      } else {
        $available_red_lv13 = false;
      }
      break;
    case 13:
      if ($gold >= $price_red_lv14) {
        $available_red_lv14 = true;
      } else {
        $available_red_lv14 = false;
      }
      break;
    case 14:
      if ($gold >= $price_red_lv15) {
        $available_red_lv15 = true;
      } else {
        $available_red_lv15 = false;
      }
      break;
    case 15:
      $available_red_lv1 = false;
      $available_red_lv2 = false;
      $available_red_lv3 = false;
      $available_red_lv4 = false;
      $available_red_lv5 = false;
      $available_red_lv6 = false;
      $available_red_lv7 = false;
      $available_red_lv8 = false;
      $available_red_lv9 = false;
      $available_red_lv10 = false;
      $available_red_lv11 = false;
      $available_red_lv12 = false;
      $available_red_lv13 = false;
      $available_red_lv14 = false;
      $available_red_lv15 = false;
      $maximum_level_red = true;
      break;
    default:
      $available_red_lv1 = false;
      $available_red_lv2 = false;
      $available_red_lv3 = false;
      $available_red_lv4 = false;
      $available_red_lv5 = false;
      $available_red_lv6 = false;
      $available_red_lv7 = false;
      $available_red_lv8 = false;
      $available_red_lv9 = false;
      $available_red_lv10 = false;
      $available_red_lv11 = false;
      $available_red_lv12 = false;
      $available_red_lv13 = false;
      $available_red_lv14 = false;
      $available_red_lv15 = false;
      $maximum_level_red = false;
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
        switch ($profit) {
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
          case 4:
            if ($available_gold_lv5 == false) {
              echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
            }
            break;
          case 5:
            if ($available_gold_lv6 == false) {
              echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
            }
            break;
          case 6:
            if ($available_gold_lv7 == false) {
              echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
            }
            break;
          case 7:
            if ($available_gold_lv8 == false) {
              echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
            }
            break;
          case 8:
            if ($available_gold_lv9 == false) {
              echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
            }
            break;
          case 9:
            if ($available_gold_lv10 == false) {
              echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
            }
            break;
          case 10:
            if ($available_gold_lv11 == false) {
              echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
            }
            break;
          case 11:
            if ($available_gold_lv12 == false) {
              echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
            }
            break;
          case 12:
            if ($available_gold_lv13 == false) {
              echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
            }
            break;
          case 13:
            if ($available_gold_lv14 == false) {
              echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
            }
            break;
          case 14:
            if ($available_gold_lv15 == false) {
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
        switch ($profit) {
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
          case 4:
            if ($available_red_lv5 == false) {
              echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
            }
            break;
          case 5:
            if ($available_red_lv6 == false) {
              echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
            }
            break;
          case 6:
            if ($available_red_lv7 == false) {
              echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
            }
            break;
          case 7:
            if ($available_red_lv8 == false) {
              echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
            }
            break;
          case 8:
            if ($available_red_lv9 == false) {
              echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
            }
            break;
          case 9:
            if ($available_red_lv10 == false) {
              echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
            }
            break;
          case 10:
            if ($available_red_lv11 == false) {
              echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
            }
            break;
          case 11:
            if ($available_red_lv12 == false) {
              echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
            }
            break;
          case 12:
            if ($available_red_lv13 == false) {
              echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
            }
            break;
          case 13:
            if ($available_red_lv14 == false) {
              echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
            }
            break;
          case 14:
            if ($available_red_lv15 == false) {
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

  <!-- Rating Status -->
  <div class="rating">
    <h3 class="rating_title">현재 영토의 수익 등급</h3>
    <div class="rating_desc">
      <div class="rating_img">
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
        <h4><?php echo $profit_name ?></h4>
      </div>
      <div class="rating_price">
        <div class="rating_gold">
          <img class="tenant_img" src="./images/tycoon_gold.png" alt="gold" />
          <p><?php
              switch ($profit) {
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
                  echo number_format($price_gold_lv5);
                  break;
                case 5:
                  echo number_format($price_gold_lv6);
                  break;
                case 6:
                  echo number_format($price_gold_lv7);
                  break;
                case 7:
                  echo number_format($price_gold_lv8);
                  break;
                case 8:
                  echo number_format($price_gold_lv9);
                  break;
                case 9:
                  echo number_format($price_gold_lv10);
                  break;
                case 10:
                  echo number_format($price_gold_lv11);
                  break;
                case 11:
                  echo number_format($price_gold_lv12);
                  break;
                case 12:
                  echo number_format($price_gold_lv13);
                  break;
                case 13:
                  echo number_format($price_gold_lv14);
                  break;
                case 14:
                  echo number_format($price_gold_lv15);
                  break;
                case 15:
                  echo '최고 등급';
                  break;
                default:
                  break;
              }
              ?></p>
        </div>
        <div class="rating_red">
          <img class="tenant_img" src="./images/tycoon_red.png" alt="red" />
          <p><?php
              switch ($profit) {
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
                  echo number_format($price_red_lv5);
                  break;
                case 5:
                  echo number_format($price_red_lv6);
                  break;
                case 6:
                  echo number_format($price_red_lv7);
                  break;
                case 7:
                  echo number_format($price_red_lv8);
                  break;
                case 8:
                  echo number_format($price_red_lv9);
                  break;
                case 9:
                  echo number_format($price_red_lv10);
                  break;
                case 10:
                  echo number_format($price_red_lv11);
                  break;
                case 11:
                  echo number_format($price_red_lv12);
                  break;
                case 12:
                  echo number_format($price_red_lv13);
                  break;
                case 13:
                  echo number_format($price_red_lv14);
                  break;
                case 14:
                  echo number_format($price_red_lv15);
                  break;
                case 15:
                  echo '최고 등급';
                  break;
                default:
                  break;
              }
              ?></p>
        </div>
        <h4>ㅡ<br />승급에 필요한 비용</h4>
      </div>
    </div>
  </div>

  <!-- Buttons -->
  <div class="buttons">
    <button class="btn btn-effect" onclick="<?php if ($available_gold_lv1 == true || $available_gold_lv2 == true || $available_gold_lv3 == true || $available_gold_lv4 == true || $available_gold_lv5 == true || $available_gold_lv6 == true || $available_gold_lv7 == true || $available_gold_lv8 == true || $available_gold_lv9 == true || $available_gold_lv10 == true || $available_gold_lv11 == true || $available_gold_lv12 == true || $available_gold_lv13 == true || $available_gold_lv14 == true || $available_gold_lv15 == true) { ?>
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
    <button class="btn btn-effect" onclick="<?php if ($available_red_lv1 == true || $available_red_lv2 == true || $available_red_lv3 == true || $available_red_lv4 == true || $available_red_lv5 == true || $available_red_lv6 == true || $available_red_lv7 == true || $available_red_lv8 == true || $available_red_lv9 == true || $available_red_lv10 == true || $available_red_lv11 == true || $available_red_lv12 == true || $available_red_lv13 == true || $available_red_lv14 == true || $available_red_lv15 == true) { ?>
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
        location.href = "uranos_rate_ok.php?idx=" + idx + "&coin=gold";
      }
    }

    // Pay with Red beryl
    function payWithRed(idx) {
      let answer = confirm("레드베릴로 결제하시겠습니까?");
      if (answer == true) {
        location.href = "uranos_rate_ok.php?idx=" + idx + "&coin=red";
      }
    }
  </script>
</body>

<?php
// }
?>

</html>