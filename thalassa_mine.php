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

$query = "SELECT * FROM tycoon_thalassa WHERE idx='$idx'";
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

// Building = Numbers of Item Slots
// Users have at least one mining slot.
// 0. None : 1 slot
// 1. Kolona : 2 slots
// 2. Odeion : 4 slots
// 3. Stadion : 6 slots
// 4. Parthenon : 8 slots
$available_slot1 = true;
$available_slot2 = false;
$available_slot3 = false;
$available_slot4 = false;
$available_slot5 = false;
$available_slot6 = false;
$available_slot7 = false;
$available_slot8 = false;
if ($item2 == NULL) {
  $available_slot2 = false;
} else {
  $available_slot2 = true;
}
if ($item3 == NULL) {
  $available_slot3 = false;
} else {
  $available_slot3 = true;
}
if ($item4 == NULL) {
  $available_slot4 = false;
} else {
  $available_slot4 = true;
}
if ($item5 == NULL) {
  $available_slot5 = false;
} else {
  $available_slot5 = true;
}
if ($item6 == NULL) {
  $available_slot6 = false;
} else {
  $available_slot6 = true;
}
if ($item7 == NULL) {
  $available_slot7 = false;
} else {
  $available_slot7 = true;
}
if ($item8 == NULL) {
  $available_slot8 = false;
} else {
  $available_slot8 = true;
}

$number_of_slots = 1;
if ($available_slot1 && $available_slot2) {
  $number_of_slots = 2;
}
if ($available_slot3 && $available_slot4) {
  $number_of_slots = 4;
}
if ($available_slot5 && $available_slot6) {
  $number_of_slots = 6;
}
if ($available_slot7 && $available_slot8) {
  $number_of_slots = 8;
}

// Land Grade = Mining Speed (Seconds)
// 1st Grade : 5
// 2nd Grade : 10
// 3rd Grade : 15
// 4th Grade : 20
// 5th Grade : 25
// 6th Grade : 30
// 7th Grade : 35
// 8th Grade : 40
// 9th Grade : 45
// 10th Grade : 50
$mining_speed1 = 5;
$mining_speed2 = 10;
$mining_speed3 = 15;
$mining_speed4 = 20;
$mining_speed5 = 25;
$mining_speed6 = 30;
$mining_speed7 = 35;
$mining_speed8 = 40;
$mining_speed9 = 45;
$mining_speed10 = 50;

// Profitability = Numbers of Items (Seconds)
// 1. Alpha : 120%
// 2. Beta : 140%
// 3. Gamma : 160%
// 4. Delta : 170%
// 5. Epsilon : 200%
// 6. Zeta : 220%
// 7. Eta : 240%
// 8. Theta : 260%
// 9. Iota : 280%
// 10. Kappa : 300%
// 11. Lambda : 320%
// 12. Mu : 340%
// 13. Nu : 360%
// 14. Xi : 380%
// 15. Omicron : 400%
$mining_numbers;
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
  $member_nick = "아르스탄";

  //──────── Member Asset
  // $member_gold = number_format($row_tenant['point']);
  // $member_red = number_format($row_tenant['cash']);
  $gold = 8034678;
  $red = 7564;
  $member_gold = number_format($gold);
  $member_red = number_format($red);

  //──────── Comparison (Gold)
  $available_gold = false;
  $available_red = false;
  if ($gold >= $price_gold) {
    $available_gold = true;
  } else {
    $available_gold = false;
  }
  if ($red >= $price_red) {
    $available_red = true;
  } else {
    $available_red = false;
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
        if ($available_gold == false) {
          echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
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

  <!-- Mining Status -->
  <div class="mining">
    <div class="mining_desc">
      <div class="mining_img">
        <h4>채굴 슬롯 총 <?= $number_of_slots; ?>개</h4>
        <?php
        echo '<img src="./images/mining/mining_box1.png" alt="profit">';
        if ($available_slot2 == true) {
          echo '<img src="./images/mining/mining_box2.png" alt="profit">';
        }
        if ($available_slot3 == true) {
          echo '<img src="./images/mining/mining_box3.png" alt="profit">';
        }
        if ($available_slot4 == true) {
          echo '<img src="./images/mining/mining_box4.png" alt="profit">';
        }
        if ($available_slot5 == true) {
          echo '<img src="./images/mining/mining_box5.png" alt="profit">';
        }
        if ($available_slot6 == true) {
          echo '<img src="./images/mining/mining_box6.png" alt="profit">';
        }
        if ($available_slot7 == true) {
          echo '<img src="./images/mining/mining_box7.png" alt="profit">';
        }
        if ($available_slot8 == true) {
          echo '<img src="./images/mining/mining_box8.png" alt="profit">';
        }
        ?>
      </div>
      <div class="mining_price">
        <div class="rating_gold">
          <img class="tenant_img" src="./images/tycoon_gold.png" alt="gold" />
          <p>1,000</p>
        </div>
        <div class="rating_red">
          <img class="tenant_img" src="./images/tycoon_red.png" alt="red" />
          <p>10</p>
        </div>
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
      location.href = "thalassa_detail.php?idx=" + idx;
    }

    // Pay with Gold
    function payWithGold(idx) {
      let answer = confirm("골드로 결제하시겠습니까?");
      if (answer == true) {
        location.href = "thalassa_mine_process.php?idx=" + idx + "&coin=gold";
      }
    }

    // Pay with Red beryl
    function payWithRed(idx) {
      let answer = confirm("레드베릴로 결제하시겠습니까?");
      if (answer == true) {
        location.href = "thalassa_mine_process.php?idx=" + idx + "&coin=red";
      }
    }
  </script>
</body>

<?php
// }
?>

</html>