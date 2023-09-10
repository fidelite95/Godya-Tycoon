<?php
include("./login_status.php");
include("./brand.php");
include("./connection.php");

// if (!$login_status) {
//   echo "<script>alert('로그인 후에 이용 가능합니다.')</script>";
//   echo "<script>location.href='login.php';</script>";
// } else {

# 건설 가격표
# Pricing list <Build>
# grade1 ~ grade10

# 0 -> 1 : kolona
$cost_gold_grade1_kolona = 550000;
$cost_gold_grade2_kolona = 500000;
$cost_gold_grade3_kolona = 450000;
$cost_gold_grade4_kolona = 400000;
$cost_gold_grade5_kolona = 350000;
$cost_gold_grade6_kolona = 300000;
$cost_gold_grade7_kolona = 250000;
$cost_gold_grade8_kolona = 200000;
$cost_gold_grade9_kolona = 150000;
$cost_gold_grade10_kolona = 100000;
$cost_red_grade1_kolona = 1400;
$cost_red_grade2_kolona = 1300;
$cost_red_grade3_kolona = 1200;
$cost_red_grade4_kolona = 1100;
$cost_red_grade5_kolona = 1000;
$cost_red_grade6_kolona = 900;
$cost_red_grade7_kolona = 800;
$cost_red_grade8_kolona = 700;
$cost_red_grade9_kolona = 600;
$cost_red_grade10_kolona = 500;

# 1 -> 2 : odeion
$cost_gold_grade1_odeion = 1100000;
$cost_gold_grade2_odeion = 1000000;
$cost_gold_grade3_odeion = 900000;
$cost_gold_grade4_odeion = 800000;
$cost_gold_grade5_odeion = 700000;
$cost_gold_grade6_odeion = 600000;
$cost_gold_grade7_odeion = 500000;
$cost_gold_grade8_odeion = 400000;
$cost_gold_grade9_odeion = 300000;
$cost_gold_grade10_odeion = 200000;
$cost_red_grade1_odeion = 2800;
$cost_red_grade2_odeion = 2600;
$cost_red_grade3_odeion = 2400;
$cost_red_grade4_odeion = 2200;
$cost_red_grade5_odeion = 2000;
$cost_red_grade6_odeion = 1800;
$cost_red_grade7_odeion = 1600;
$cost_red_grade8_odeion = 1400;
$cost_red_grade9_odeion = 1200;
$cost_red_grade10_odeion = 1000;

# 2 -> 3 : stadion
$cost_gold_grade1_stadion = 1650000;
$cost_gold_grade2_stadion = 1500000;
$cost_gold_grade3_stadion = 1350000;
$cost_gold_grade4_stadion = 1200000;
$cost_gold_grade5_stadion = 1050000;
$cost_gold_grade6_stadion = 900000;
$cost_gold_grade7_stadion = 750000;
$cost_gold_grade8_stadion = 600000;
$cost_gold_grade9_stadion = 450000;
$cost_gold_grade10_stadion = 300000;
$cost_red_grade1_stadion = 4200;
$cost_red_grade2_stadion = 3900;
$cost_red_grade3_stadion = 3600;
$cost_red_grade4_stadion = 3300;
$cost_red_grade5_stadion = 3000;
$cost_red_grade6_stadion = 2700;
$cost_red_grade7_stadion = 2400;
$cost_red_grade8_stadion = 2100;
$cost_red_grade9_stadion = 1800;
$cost_red_grade10_stadion = 1500;

# 3 -> 4 : parthenon
$cost_gold_grade1_stadion = 2200000;
$cost_gold_grade2_stadion = 2000000;
$cost_gold_grade3_stadion = 1800000;
$cost_gold_grade4_stadion = 1600000;
$cost_gold_grade5_stadion = 1400000;
$cost_gold_grade6_stadion = 1200000;
$cost_gold_grade7_stadion = 1000000;
$cost_gold_grade8_stadion = 800000;
$cost_gold_grade9_stadion = 600000;
$cost_gold_grade10_stadion = 400000;
$cost_red_grade1_stadion = 5600;
$cost_red_grade2_stadion = 5200;
$cost_red_grade3_stadion = 4800;
$cost_red_grade4_stadion = 4400;
$cost_red_grade5_stadion = 4000;
$cost_red_grade6_stadion = 3600;
$cost_red_grade7_stadion = 3200;
$cost_red_grade8_stadion = 2800;
$cost_red_grade9_stadion = 2400;
$cost_red_grade10_stadion = 2000;

# ────────────────────────────────────

# GET 메소드로 받은 idx
# idx received by the GET method
$idx = $_GET['idx'];

# 영토 조회 쿼리
# Query to find territory data
$query = "SELECT * FROM tycoon_uranos WHERE idx='$idx'";
$result = $con->query($query);
$row = $result->fetch_assoc();

# 영토 코드
# Land Code
$land_code = $row['land_code'];

# 영토 등급
# Land Grade
$land_grade = $row['land_grade'];

# "land_status"에 따른 영토 상태
# Status of the territory according to "land_status"
# 0 : 판매중 (For sale)
# 1 : 판매됨 (Sold)
$land_status = $row['land_status'];

# 임차인 계정
# Tenant ID (Gmail)
$tenant_id = $row['member_id'];

# 임차인 닉네임
# Tenant Nickname
$tenant_nick = $row['member_nick'];
if ($tenant_nick == NULL) {
  $tenant_nick = '없음';
}

# 영토 가격
# Price
$price_gold = number_format($row['price_gold']);
$price_red = number_format($row['price_red']);

# 수익 등급 (승급하기)
# Profitability : _rate.php
$profit = $row['profit'];
$profit_name = '';

# 건설 등급 (건설하기)
# Building : _build.php
$building = $row['building'];
$building_name = '';

# 채굴 슬롯
# Mining slots
$item1 = $row['item1'];
$item2 = $row['item2'];
$item3 = $row['item3'];
$item4 = $row['item4'];
$item5 = $row['item5'];
$item6 = $row['item6'];
$item7 = $row['item7'];
$item8 = $row['item8'];

# ────────────────────────────────────

# SESSION에서 받은 현재 로그인 중인 유저 ID
# User ID received from the SESSION
$id = $_SESSION['id'];
$id_sanitized = filter_var($id, FILTER_SANITIZE_EMAIL);

# 사용자 조회 쿼리
# Query to find a user
$query_tenant = "SELECT * FROM god_member WHERE id='$id_sanitized'";
$result_tenant = $con->query($query_tenant);
$row_tenant = $result_tenant->fetch_assoc();

# 사용자 닉네임
# Member Nickname
// $member_nick = $row_tenant['nick'];
$member_nick = "아슬란";

# 사용자 자산
# Member Asset
// $member_gold = number_format($row_tenant['point']);
// $member_red = number_format($row_tenant['cash']);
$gold = 80000000;
$red = 200000;
$member_gold = number_format($gold);
$member_red = number_format($red);

# ────────────────────────────────────

# 구매 가능여부 확인 (골드)
# Checking for availability (Gold)
$available_gold_lv1 = false;
$available_gold_lv2 = false;
$available_gold_lv3 = false;
$available_gold_lv4 = false;
$maximum_level_gold = false;
switch ($building) {
  case 0:
    # 레벨 1 (콜로나)
    # LEVEL 1 (Kolona)
    if ($gold >= $price_gold_lv1) {
      $available_gold_lv1 = true;
    } else {
      $available_gold_lv1 = false;
    }
    break;
  case 1:
    # 레벨 2 (오데이온)
    # LEVEL 2 (Odeion)
    if ($gold >= $price_gold_lv2) {
      $available_gold_lv2 = true;
    } else {
      $available_gold_lv2 = false;
    }
    break;
  case 2:
    # 레벨 3 (스타디온)
    # LEVEL 3 (Stadion)
    if ($gold >= $price_gold_lv3) {
      $available_gold_lv3 = true;
    } else {
      $available_gold_lv3 = false;
    }
    break;
  case 3:
    # 레벨 4 (파르테논)
    # LEVEL 4 (Parthenon)
    if ($gold >= $price_gold_lv4) {
      $available_gold_lv4 = true;
    } else {
      $available_gold_lv4 = false;
    }
    break;
  case 4:
    # 최고 레벨 달성 & 결제 불가
    # Highest level reached & Unable to pay
    $available_gold_lv1 = false;
    $available_gold_lv2 = false;
    $available_gold_lv3 = false;
    $available_gold_lv4 = false;
    $maximum_level_gold = true;
    break;
  default:
    # 디폴트 : 결제 불가
    # Default : Unable to pay
    $available_gold_lv1 = false;
    $available_gold_lv2 = false;
    $available_gold_lv3 = false;
    $available_gold_lv4 = false;
    break;
}

# 구매 가능여부 확인 (레드베릴)
# Checking for availability (Red Beryl)
$available_red_lv1 = false;
$available_red_lv2 = false;
$available_red_lv3 = false;
$available_red_lv4 = false;
$maximum_level_red = false;
switch ($building) {
  case 0:
    # 레벨 1 (콜로나)
    # LEVEL 1 (Kolona)
    if ($red >= $price_red_lv1) {
      $available_red_lv1 = true;
    } else {
      $available_red_lv1 = false;
    }
    break;
  case 1:
    # 레벨 2 (오데이온)
    # LEVEL 2 (Odeion)
    if ($red >= $price_red_lv2) {
      $available_red_lv2 = true;
    } else {
      $available_red_lv2 = false;
    }
    break;
  case 2:
    # 레벨 3 (스타디온)
    # LEVEL 3 (Stadion)
    if ($red >= $price_red_lv3) {
      $available_red_lv3 = true;
    } else {
      $available_red_lv3 = false;
    }
    break;
  case 3:
    # 레벨 4 (파르테논)
    # LEVEL 4 (Parthenon)
    if ($red >= $price_red_lv4) {
      $available_red_lv4 = true;
    } else {
      $available_red_lv4 = false;
    }
    break;
  case 4:
    # 최고 레벨 달성 & 결제 불가
    # Highest level reached & Unable to pay
    $available_red_lv1 = false;
    $available_red_lv2 = false;
    $available_red_lv3 = false;
    $available_red_lv4 = false;
    $maximum_level_red = true;
    break;
  default:
    # 디폴트 : 결제 불가
    # Default : Unable to pay
    $available_red_lv1 = false;
    $available_red_lv2 = false;
    $available_red_lv3 = false;
    $available_red_lv4 = false;
    break;
}

# ────────────────────────────────────
?>

<!DOCTYPE html>
<html>

<head>
  <?php
  include("./head.php");
  ?>
  <title>TYCOON | <?php echo $land_code ?></title>
  <link rel="stylesheet" type="text/css" href="cube.css" />
  <link rel="stylesheet" type="text/css" href="tycoon.css" />
  <link rel="stylesheet" type="text/css" href="navbar.css" />
  <link rel="stylesheet" type="text/css" href="common.css" />
  <link rel="stylesheet" type="text/css" href="modal.css" />
</head>

<body>

  <!-- 모달 -->
  <!-- Modal -->
  <div id="modal" class="modal">
    <div class="modal_content">
      <p>결제하시겠습니까?</p>
      <button class="btn btn-effect" id="btnPay"><span>결제하기</span></button>
    </div>
  </div>

  <!-- 데이터 저장을 위한 FORM tag -->
  <!-- FORM tag for storing data -->
  <form>
    <input type="hidden" name="idx" id="idx" value="<? echo $idx; ?>">
  </form>

  <?php include("./navbar.php") ?>

  <!-- 임차인 컴포넌트 -->
  <!-- Tenant Component -->
  <div class="tenant">
    <h3 class="tenant_name"><?php echo $member_nick ?>님의 보유자산</h3>
    <div class="tenant_asset">

      <!-- 사용자 골드 -->
      <!-- User's Gold -->
      <div class="tenant_gold">
        <img class="tenant_img" src="./images/tycoon_gold.png" alt="gold" />
        <p><?php echo $member_gold ?></p>
        <?php
        # 구매 불가능한 경우 느낌표 이미지를 띄움
        # Show exclamation point image if not available for purchase
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

      <!-- 사용자 레드베릴 -->
      <!-- User's Red Beryl -->
      <div class="tenant_red">
        <img class="tenant_img" src="./images/tycoon_red.png" alt="red" />
        <p><?php echo $member_red ?></p>
        <?php
        # 구매 불가능한 경우 느낌표 이미지를 띄움
        # Show exclamation point image if not available for purchase
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

  <!-- 소유권 컴포넌트 -->
  <!-- Ownership Component -->
  <div class="ownership_build">
    <h1 class="ownership_land"><?php echo $land_code ?></h1>
    <?php
    # 영토 등급을 별(star)로 표시
    # Display territory ratings by star
    switch ($idx) {
        # 1등급
        # 1st
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
        # 2등급
        # 2nd
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
        # 3등급
        # 3rd
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
        # 4등급
        # 4th
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
        # 5등급
        # 5th
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
        # 6등급
        # 6th
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
        # 7등급
        # 7th
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
        # 8등급
        # 8th
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
        # 9등급
        # 9th
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
        # 10등급
        # 10th
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

  <!-- 건설 등급 컴포넌트 -->
  <!-- Building Status Component -->
  <div class="building">
    <h3 class="building_title">현재 영토의 건설 등급</h3>
    <div class="building_desc">

      <!-- 건설 등급에 따른 이미지 -->
      <!-- Building Image -->
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

      <!-- 건설에 필요한 비용 -->
      <!-- Cost for the building -->
      <div class="building_price">
        <div class="building_gold">
          <img class="tenant_img" src="./images/tycoon_gold.png" alt="gold" />
          <p><?php
              switch ($building) {
                case 0:
                  # 콜로나 건설비용
                  # Kolona Construction Cost
                  switch ($land_grade) {
                    case 1:
                      echo number_format($cost_gold_grade1_kolona);
                      break;
                    case 2:
                      echo number_format($cost_gold_grade2_kolona);
                      break;
                    case 3:
                      echo number_format($cost_gold_grade3_kolona);
                      break;
                    case 4:
                      echo number_format($cost_gold_grade4_kolona);
                      break;
                    case 5:
                      echo number_format($cost_gold_grade5_kolona);
                      break;
                    case 6:
                      echo number_format($cost_gold_grade6_kolona);
                      break;
                    case 7:
                      echo number_format($cost_gold_grade7_kolona);
                      break;
                    case 8:
                      echo number_format($cost_gold_grade8_kolona);
                      break;
                    case 9:
                      echo number_format($cost_gold_grade9_kolona);
                      break;
                    case 10:
                      echo number_format($cost_gold_grade10_kolona);
                      break;
                  }
                  break;
                case 1:
                  # 오데이온 건설비용
                  # Odeion Construction Cost
                  switch ($land_grade) {
                    case 1:
                      echo number_format($cost_gold_grade1_odeion);
                      break;
                    case 2:
                      echo number_format($cost_gold_grade2_odeion);
                      break;
                    case 3:
                      echo number_format($cost_gold_grade3_odeion);
                      break;
                    case 4:
                      echo number_format($cost_gold_grade4_odeion);
                      break;
                    case 5:
                      echo number_format($cost_gold_grade5_odeion);
                      break;
                    case 6:
                      echo number_format($cost_gold_grade6_odeion);
                      break;
                    case 7:
                      echo number_format($cost_gold_grade7_odeion);
                      break;
                    case 8:
                      echo number_format($cost_gold_grade8_odeion);
                      break;
                    case 9:
                      echo number_format($cost_gold_grade9_odeion);
                      break;
                    case 10:
                      echo number_format($cost_gold_grade10_odeion);
                      break;
                  }
                  break;
                case 2:
                  # 스타디온 건설비용
                  # Stadion Construction Cost
                  switch ($land_grade) {
                    case 1:
                      echo number_format($cost_gold_grade1_stadion);
                      break;
                    case 2:
                      echo number_format($cost_gold_grade2_stadion);
                      break;
                    case 3:
                      echo number_format($cost_gold_grade3_stadion);
                      break;
                    case 4:
                      echo number_format($cost_gold_grade4_stadion);
                      break;
                    case 5:
                      echo number_format($cost_gold_grade5_stadion);
                      break;
                    case 6:
                      echo number_format($cost_gold_grade6_stadion);
                      break;
                    case 7:
                      echo number_format($cost_gold_grade7_stadion);
                      break;
                    case 8:
                      echo number_format($cost_gold_grade8_stadion);
                      break;
                    case 9:
                      echo number_format($cost_gold_grade9_stadion);
                      break;
                    case 10:
                      echo number_format($cost_gold_grade10_stadion);
                      break;
                  }
                  break;
                case 3:
                  # 파르테논 건설비용
                  # Parthenon Construction Cost
                  switch ($land_grade) {
                    case 1:
                      echo number_format($cost_gold_grade1_parthenon);
                      break;
                    case 2:
                      echo number_format($cost_gold_grade2_parthenon);
                      break;
                    case 3:
                      echo number_format($cost_gold_grade3_parthenon);
                      break;
                    case 4:
                      echo number_format($cost_gold_grade4_parthenon);
                      break;
                    case 5:
                      echo number_format($cost_gold_grade5_parthenon);
                      break;
                    case 6:
                      echo number_format($cost_gold_grade6_parthenon);
                      break;
                    case 7:
                      echo number_format($cost_gold_grade7_parthenon);
                      break;
                    case 8:
                      echo number_format($cost_gold_grade8_parthenon);
                      break;
                    case 9:
                      echo number_format($cost_gold_grade9_parthenon);
                      break;
                    case 10:
                      echo number_format($cost_gold_grade10_parthenon);
                      break;
                  }
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
                  # 콜로나 건설비용
                  # Kolona Construction Cost
                  switch ($land_grade) {
                    case 1:
                      echo number_format($cost_red_grade1_kolona);
                      break;
                    case 2:
                      echo number_format($cost_red_grade2_kolona);
                      break;
                    case 3:
                      echo number_format($cost_red_grade3_kolona);
                      break;
                    case 4:
                      echo number_format($cost_red_grade4_kolona);
                      break;
                    case 5:
                      echo number_format($cost_red_grade5_kolona);
                      break;
                    case 6:
                      echo number_format($cost_red_grade6_kolona);
                      break;
                    case 7:
                      echo number_format($cost_red_grade7_kolona);
                      break;
                    case 8:
                      echo number_format($cost_red_grade8_kolona);
                      break;
                    case 9:
                      echo number_format($cost_red_grade9_kolona);
                      break;
                    case 10:
                      echo number_format($cost_red_grade10_kolona);
                      break;
                  }
                  break;
                case 1:
                  # 오데이온 건설비용
                  # Odeion Construction Cost
                  switch ($land_grade) {
                    case 1:
                      echo number_format($cost_red_grade1_odeion);
                      break;
                    case 2:
                      echo number_format($cost_red_grade2_odeion);
                      break;
                    case 3:
                      echo number_format($cost_red_grade3_odeion);
                      break;
                    case 4:
                      echo number_format($cost_red_grade4_odeion);
                      break;
                    case 5:
                      echo number_format($cost_red_grade5_odeion);
                      break;
                    case 6:
                      echo number_format($cost_red_grade6_odeion);
                      break;
                    case 7:
                      echo number_format($cost_red_grade7_odeion);
                      break;
                    case 8:
                      echo number_format($cost_red_grade8_odeion);
                      break;
                    case 9:
                      echo number_format($cost_red_grade9_odeion);
                      break;
                    case 10:
                      echo number_format($cost_red_grade10_odeion);
                      break;
                  }
                  break;
                case 2:
                  # 스타디온 건설비용
                  # Stadion Construction Cost
                  switch ($land_grade) {
                    case 1:
                      echo number_format($cost_red_grade1_stadion);
                      break;
                    case 2:
                      echo number_format($cost_red_grade2_stadion);
                      break;
                    case 3:
                      echo number_format($cost_red_grade3_stadion);
                      break;
                    case 4:
                      echo number_format($cost_red_grade4_stadion);
                      break;
                    case 5:
                      echo number_format($cost_red_grade5_stadion);
                      break;
                    case 6:
                      echo number_format($cost_red_grade6_stadion);
                      break;
                    case 7:
                      echo number_format($cost_red_grade7_stadion);
                      break;
                    case 8:
                      echo number_format($cost_red_grade8_stadion);
                      break;
                    case 9:
                      echo number_format($cost_red_grade9_stadion);
                      break;
                    case 10:
                      echo number_format($cost_red_grade10_stadion);
                      break;
                  }
                  break;
                case 3:
                  # 파르테논 건설비용
                  # Parthenon Construction Cost
                  switch ($land_grade) {
                    case 1:
                      echo number_format($cost_gold_grade1_parthenon);
                      break;
                    case 2:
                      echo number_format($cost_gold_grade2_parthenon);
                      break;
                    case 3:
                      echo number_format($cost_gold_grade3_parthenon);
                      break;
                    case 4:
                      echo number_format($cost_gold_grade4_parthenon);
                      break;
                    case 5:
                      echo number_format($cost_gold_grade5_parthenon);
                      break;
                    case 6:
                      echo number_format($cost_gold_grade6_parthenon);
                      break;
                    case 7:
                      echo number_format($cost_gold_grade7_parthenon);
                      break;
                    case 8:
                      echo number_format($cost_gold_grade8_parthenon);
                      break;
                    case 9:
                      echo number_format($cost_gold_grade9_parthenon);
                      break;
                    case 10:
                      echo number_format($cost_gold_grade10_parthenon);
                      break;
                  }
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

  <!-- 하단 버튼들 -->
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
    /*
     * 뒤로가기
     * Go back to the previous page
     */
    function back(idx) {
      location.href = "uranos_detail.php?idx=" + idx;
    }

    const modalGold = document.getElementById("modalGold");
    const modalRed = document.getElementById("modalRed");
    const btnGold = document.getElementById("btnGold");
    const btnRed = document.getElementById("btnRed");

    // Pay with Gold
    function payWithGold(idx) {
      modalGold.style.display = "block";
    }

    // Pay with Red beryl
    function payWithRed(idx) {
      modalRed.style.display = "block";
    }

    function success(idx, coin) {
      location.href = "uranos_build_process.php?idx=" + idx + "&coin=" + coin;
    }

    btnGold.addEventListener("click", () => {
      let idx = document.getElementById('idx').value;
      let coin = "gold";
      success(idx, coin);
    });

    btnRed.addEventListener("click", () => {
      let idx = document.getElementById('idx').value;
      let coin = "red";
      success(idx, coin);
    });

    window.addEventListener("click", () => {
      if (event.target == modalGold) {
        modalGold.style.display = "none";
      } else if (event.target == modalRed) {
        modalRed.style.display = "none";
      }
    });
  </script>

</body>

</html>

<?php
// }
?>