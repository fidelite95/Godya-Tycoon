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
$cost_gold_grade1_parthenon = 2200000;
$cost_gold_grade2_parthenon = 2000000;
$cost_gold_grade3_parthenon = 1800000;
$cost_gold_grade4_parthenon = 1600000;
$cost_gold_grade5_parthenon = 1400000;
$cost_gold_grade6_parthenon = 1200000;
$cost_gold_grade7_parthenon = 1000000;
$cost_gold_grade8_parthenon = 800000;
$cost_gold_grade9_parthenon = 600000;
$cost_gold_grade10_parthenon = 400000;
$cost_red_grade1_parthenon = 5600;
$cost_red_grade2_parthenon = 5200;
$cost_red_grade3_parthenon = 4800;
$cost_red_grade4_parthenon = 4400;
$cost_red_grade5_parthenon = 4000;
$cost_red_grade6_parthenon = 3600;
$cost_red_grade7_parthenon = 3200;
$cost_red_grade8_parthenon = 2800;
$cost_red_grade9_parthenon = 2400;
$cost_red_grade10_parthenon = 2000;

# ────────────────────────────────────

# GET 메소드로 받은 idx
# idx received by the GET method
$idx = $_GET['idx'];

# 영토 조회 쿼리
# Query to find territory data
$query = "SELECT * FROM tycoon_ieros WHERE idx='$idx'";
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

# 임차인 인덱스
# Tenant Index
$tenant_idx = $row['member_idx'];

# 임차인 계정
# Tenant ID (Gmail)
$tenant_id = $row['member_id'];
if ($tenant_id == NULL) {
  $tenant_id = '없음';
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

# 결제가능 확인용 변수
# Variables for payment availability check
$payable_gold = false;
$payable_red = false;

# 구매 가능여부 확인 (골드)
# Checking for availability (Gold)
$available_gold_grade1_kolona = false;
$available_gold_grade2_kolona = false;
$available_gold_grade3_kolona = false;
$available_gold_grade4_kolona = false;
$available_gold_grade5_kolona = false;
$available_gold_grade6_kolona = false;
$available_gold_grade7_kolona = false;
$available_gold_grade8_kolona = false;
$available_gold_grade9_kolona = false;
$available_gold_grade10_kolona = false;

$available_gold_grade1_odeion = false;
$available_gold_grade2_odeion = false;
$available_gold_grade3_odeion = false;
$available_gold_grade4_odeion = false;
$available_gold_grade5_odeion = false;
$available_gold_grade6_odeion = false;
$available_gold_grade7_odeion = false;
$available_gold_grade8_odeion = false;
$available_gold_grade9_odeion = false;
$available_gold_grade10_odeion = false;

$available_gold_grade1_stadion = false;
$available_gold_grade2_stadion = false;
$available_gold_grade3_stadion = false;
$available_gold_grade4_stadion = false;
$available_gold_grade5_stadion = false;
$available_gold_grade6_stadion = false;
$available_gold_grade7_stadion = false;
$available_gold_grade8_stadion = false;
$available_gold_grade9_stadion = false;
$available_gold_grade10_stadion = false;

$available_gold_grade1_parthenon = false;
$available_gold_grade2_parthenon = false;
$available_gold_grade3_parthenon = false;
$available_gold_grade4_parthenon = false;
$available_gold_grade5_parthenon = false;
$available_gold_grade6_parthenon = false;
$available_gold_grade7_parthenon = false;
$available_gold_grade8_parthenon = false;
$available_gold_grade9_parthenon = false;
$available_gold_grade10_parthenon = false;

$maximum_level_gold = false;

switch ($building) {
  case 0:
    # 콜로나 건설비용
    # Kolona Construction Cost
    switch ($land_grade) {
      case 1:
        if ($gold >= $cost_gold_grade1_kolona) {
          $available_gold_grade1_kolona = true;
          $payable_gold = true;
        } else {
          $available_gold_grade1_kolona = false;
          $payable_gold = false;
        }
        break;
      case 2:
        if ($gold >= $cost_gold_grade2_kolona) {
          $available_gold_grade2_kolona = true;
          $payable_gold = true;
        } else {
          $available_gold_grade2_kolona = false;
          $payable_gold = false;
        }
        break;
      case 3:
        if ($gold >= $cost_gold_grade3_kolona) {
          $available_gold_grade3_kolona = true;
          $payable_gold = true;
        } else {
          $available_gold_grade3_kolona = false;
          $payable_gold = false;
        }
        break;
      case 4:
        if ($gold >= $cost_gold_grade4_kolona) {
          $available_gold_grade4_kolona = true;
          $payable_gold = true;
        } else {
          $available_gold_grade4_kolona = false;
          $payable_gold = false;
        }
        break;
      case 5:
        if ($gold >= $cost_gold_grade5_kolona) {
          $available_gold_grade5_kolona = true;
          $payable_gold = true;
        } else {
          $available_gold_grade5_kolona = false;
          $payable_gold = false;
        }
        break;
      case 6:
        if ($gold >= $cost_gold_grade6_kolona) {
          $available_gold_grade6_kolona = true;
          $payable_gold = true;
        } else {
          $available_gold_grade6_kolona = false;
          $payable_gold = false;
        }
        break;
      case 7:
        if ($gold >= $cost_gold_grade7_kolona) {
          $available_gold_grade7_kolona = true;
          $payable_gold = true;
        } else {
          $available_gold_grade7_kolona = false;
          $payable_gold = false;
        }
        break;
      case 8:
        if ($gold >= $cost_gold_grade8_kolona) {
          $available_gold_grade8_kolona = true;
          $payable_gold = true;
        } else {
          $available_gold_grade8_kolona = false;
          $payable_gold = false;
        }
        break;
      case 9:
        if ($gold >= $cost_gold_grade9_kolona) {
          $available_gold_grade9_kolona = true;
          $payable_gold = true;
        } else {
          $available_gold_grade9_kolona = false;
          $payable_gold = false;
        }
        break;
      case 10:
        if ($gold >= $cost_gold_grade10_kolona) {
          $available_gold_grade10_kolona = true;
          $payable_gold = true;
        } else {
          $available_gold_grade10_kolona = false;
          $payable_gold = false;
        }
        break;
    }
    break;
  case 1:
    # 오데이온 건설비용
    # Odeion Construction Cost
    switch ($land_grade) {
      case 1:
        if ($gold >= $cost_gold_grade1_odeion) {
          $available_gold_grade1_odeion = true;
          $payable_gold = true;
        } else {
          $available_gold_grade1_odeion = false;
          $payable_gold = false;
        }
        break;
      case 2:
        if ($gold >= $cost_gold_grade2_odeion) {
          $available_gold_grade2_odeion = true;
          $payable_gold = true;
        } else {
          $available_gold_grade2_odeion = false;
          $payable_gold = false;
        }
        break;
      case 3:
        if ($gold >= $cost_gold_grade3_odeion) {
          $available_gold_grade3_odeion = true;
          $payable_gold = true;
        } else {
          $available_gold_grade3_odeion = false;
          $payable_gold = false;
        }
        break;
      case 4:
        if ($gold >= $cost_gold_grade4_odeion) {
          $available_gold_grade4_odeion = true;
          $payable_gold = true;
        } else {
          $available_gold_grade4_odeion = false;
          $payable_gold = false;
        }
        break;
      case 5:
        if ($gold >= $cost_gold_grade5_odeion) {
          $available_gold_grade5_odeion = true;
          $payable_gold = true;
        } else {
          $available_gold_grade5_odeion = false;
          $payable_gold = false;
        }
        break;
      case 6:
        if ($gold >= $cost_gold_grade6_odeion) {
          $available_gold_grade6_odeion = true;
          $payable_gold = true;
        } else {
          $available_gold_grade6_odeion = false;
          $payable_gold = false;
        }
        break;
      case 7:
        if ($gold >= $cost_gold_grade7_odeion) {
          $available_gold_grade7_odeion = true;
          $payable_gold = true;
        } else {
          $available_gold_grade7_odeion = false;
          $payable_gold = false;
        }
        break;
      case 8:
        if ($gold >= $cost_gold_grade8_odeion) {
          $available_gold_grade8_odeion = true;
          $payable_gold = true;
        } else {
          $available_gold_grade8_odeion = false;
          $payable_gold = false;
        }
        break;
      case 9:
        if ($gold >= $cost_gold_grade9_odeion) {
          $available_gold_grade9_odeion = true;
          $payable_gold = true;
        } else {
          $available_gold_grade9_odeion = false;
          $payable_gold = false;
        }
        break;
      case 10:
        if ($gold >= $cost_gold_grade10_odeion) {
          $available_gold_grade10_odeion = true;
          $payable_gold = true;
        } else {
          $available_gold_grade10_odeion = false;
          $payable_gold = false;
        }
        break;
    }
    break;
  case 2:
    # 스타디온 건설비용
    # Stadion Construction Cost
    switch ($land_grade) {
      case 1:
        if ($gold >= $cost_gold_grade1_stadion) {
          $available_gold_grade1_stadion = true;
          $payable_gold = true;
        } else {
          $available_gold_grade1_stadion = false;
          $payable_gold = false;
        }
        break;
      case 2:
        if ($gold >= $cost_gold_grade2_stadion) {
          $available_gold_grade2_stadion = true;
          $payable_gold = true;
        } else {
          $available_gold_grade2_stadion = false;
          $payable_gold = false;
        }
        break;
      case 3:
        if ($gold >= $cost_gold_grade3_stadion) {
          $available_gold_grade3_stadion = true;
          $payable_gold = true;
        } else {
          $available_gold_grade3_stadion = false;
          $payable_gold = false;
        }
        break;
      case 4:
        if ($gold >= $cost_gold_grade4_stadion) {
          $available_gold_grade4_stadion = true;
          $payable_gold = true;
        } else {
          $available_gold_grade4_stadion = false;
          $payable_gold = false;
        }
        break;
      case 5:
        if ($gold >= $cost_gold_grade5_stadion) {
          $available_gold_grade5_stadion = true;
          $payable_gold = true;
        } else {
          $available_gold_grade5_stadion = false;
          $payable_gold = false;
        }
        break;
      case 6:
        if ($gold >= $cost_gold_grade6_stadion) {
          $available_gold_grade6_stadion = true;
          $payable_gold = true;
        } else {
          $available_gold_grade6_stadion = false;
          $payable_gold = false;
        }
        break;
      case 7:
        if ($gold >= $cost_gold_grade7_stadion) {
          $available_gold_grade7_stadion = true;
          $payable_gold = true;
        } else {
          $available_gold_grade7_stadion = false;
          $payable_gold = false;
        }
        break;
      case 8:
        if ($gold >= $cost_gold_grade8_stadion) {
          $available_gold_grade8_stadion = true;
          $payable_gold = true;
        } else {
          $available_gold_grade8_stadion = false;
          $payable_gold = false;
        }
        break;
      case 9:
        if ($gold >= $cost_gold_grade9_stadion) {
          $available_gold_grade9_stadion = true;
          $payable_gold = true;
        } else {
          $available_gold_grade9_stadion = false;
          $payable_gold = false;
        }
        break;
      case 10:
        if ($gold >= $cost_gold_grade10_stadion) {
          $available_gold_grade10_stadion = true;
          $payable_gold = true;
        } else {
          $available_gold_grade10_stadion = false;
          $payable_gold = false;
        }
        break;
    }
    break;
  case 3:
    # 파르테논 건설비용
    # Parthenon Construction Cost
    switch ($land_grade) {
      case 1:
        if ($gold >= $cost_gold_grade1_parthenon) {
          $available_gold_grade1_parthenon = true;
          $payable_gold = true;
        } else {
          $available_gold_grade1_parthenon = false;
          $payable_gold = false;
        }
        break;
      case 2:
        if ($gold >= $cost_gold_grade2_parthenon) {
          $available_gold_grade2_parthenon = true;
          $payable_gold = true;
        } else {
          $available_gold_grade2_parthenon = false;
          $payable_gold = false;
        }
        break;
      case 3:
        if ($gold >= $cost_gold_grade3_parthenon) {
          $available_gold_grade3_parthenon = true;
          $payable_gold = true;
        } else {
          $available_gold_grade3_parthenon = false;
          $payable_gold = false;
        }
        break;
      case 4:
        if ($gold >= $cost_gold_grade4_parthenon) {
          $available_gold_grade4_parthenon = true;
          $payable_gold = true;
        } else {
          $available_gold_grade4_parthenon = false;
          $payable_gold = false;
        }
        break;
      case 5:
        if ($gold >= $cost_gold_grade5_parthenon) {
          $available_gold_grade5_parthenon = true;
          $payable_gold = true;
        } else {
          $available_gold_grade5_parthenon = false;
          $payable_gold = false;
        }
        break;
      case 6:
        if ($gold >= $cost_gold_grade6_parthenon) {
          $available_gold_grade6_parthenon = true;
          $payable_gold = true;
        } else {
          $available_gold_grade6_parthenon = false;
          $payable_gold = false;
        }
        break;
      case 7:
        if ($gold >= $cost_gold_grade7_parthenon) {
          $available_gold_grade7_parthenon = true;
          $payable_gold = true;
        } else {
          $available_gold_grade7_parthenon = false;
          $payable_gold = false;
        }
        break;
      case 8:
        if ($gold >= $cost_gold_grade8_parthenon) {
          $available_gold_grade8_parthenon = true;
          $payable_gold = true;
        } else {
          $available_gold_grade8_parthenon = false;
          $payable_gold = false;
        }
        break;
      case 9:
        if ($gold >= $cost_gold_grade9_parthenon) {
          $available_gold_grade9_parthenon = true;
          $payable_gold = true;
        } else {
          $available_gold_grade9_parthenon = false;
          $payable_gold = false;
        }
        break;
      case 10:
        if ($gold >= $cost_gold_grade10_parthenon) {
          $available_gold_grade10_parthenon = true;
          $payable_gold = true;
        } else {
          $available_gold_grade10_parthenon = false;
          $payable_gold = false;
        }
        break;
    }
    break;
  case 4:
    # 최고 레벨 달성 & 결제 불가
    # Highest level reached & Unable to pay
    $available_gold_grade1_kolona = false;
    $available_gold_grade2_kolona = false;
    $available_gold_grade3_kolona = false;
    $available_gold_grade4_kolona = false;
    $available_gold_grade5_kolona = false;
    $available_gold_grade6_kolona = false;
    $available_gold_grade7_kolona = false;
    $available_gold_grade8_kolona = false;
    $available_gold_grade9_kolona = false;
    $available_gold_grade10_kolona = false;
    $available_gold_grade1_odeion = false;
    $available_gold_grade2_odeion = false;
    $available_gold_grade3_odeion = false;
    $available_gold_grade4_odeion = false;
    $available_gold_grade5_odeion = false;
    $available_gold_grade6_odeion = false;
    $available_gold_grade7_odeion = false;
    $available_gold_grade8_odeion = false;
    $available_gold_grade9_odeion = false;
    $available_gold_grade10_odeion = false;
    $available_gold_grade1_stadion = false;
    $available_gold_grade2_stadion = false;
    $available_gold_grade3_stadion = false;
    $available_gold_grade4_stadion = false;
    $available_gold_grade5_stadion = false;
    $available_gold_grade6_stadion = false;
    $available_gold_grade7_stadion = false;
    $available_gold_grade8_stadion = false;
    $available_gold_grade9_stadion = false;
    $available_gold_grade10_stadion = false;
    $available_gold_grade1_parthenon = false;
    $available_gold_grade2_parthenon = false;
    $available_gold_grade3_parthenon = false;
    $available_gold_grade4_parthenon = false;
    $available_gold_grade5_parthenon = false;
    $available_gold_grade6_parthenon = false;
    $available_gold_grade7_parthenon = false;
    $available_gold_grade8_parthenon = false;
    $available_gold_grade9_parthenon = false;
    $available_gold_grade10_parthenon = false;
    $maximum_level_gold = true;
    $payable_gold = false;
    break;
  default:
    # 디폴트 : 결제 불가
    # Default : Unable to pay
    $available_gold_grade1_kolona = false;
    $available_gold_grade2_kolona = false;
    $available_gold_grade3_kolona = false;
    $available_gold_grade4_kolona = false;
    $available_gold_grade5_kolona = false;
    $available_gold_grade6_kolona = false;
    $available_gold_grade7_kolona = false;
    $available_gold_grade8_kolona = false;
    $available_gold_grade9_kolona = false;
    $available_gold_grade10_kolona = false;
    $available_gold_grade1_odeion = false;
    $available_gold_grade2_odeion = false;
    $available_gold_grade3_odeion = false;
    $available_gold_grade4_odeion = false;
    $available_gold_grade5_odeion = false;
    $available_gold_grade6_odeion = false;
    $available_gold_grade7_odeion = false;
    $available_gold_grade8_odeion = false;
    $available_gold_grade9_odeion = false;
    $available_gold_grade10_odeion = false;
    $available_gold_grade1_stadion = false;
    $available_gold_grade2_stadion = false;
    $available_gold_grade3_stadion = false;
    $available_gold_grade4_stadion = false;
    $available_gold_grade5_stadion = false;
    $available_gold_grade6_stadion = false;
    $available_gold_grade7_stadion = false;
    $available_gold_grade8_stadion = false;
    $available_gold_grade9_stadion = false;
    $available_gold_grade10_stadion = false;
    $available_gold_grade1_parthenon = false;
    $available_gold_grade2_parthenon = false;
    $available_gold_grade3_parthenon = false;
    $available_gold_grade4_parthenon = false;
    $available_gold_grade5_parthenon = false;
    $available_gold_grade6_parthenon = false;
    $available_gold_grade7_parthenon = false;
    $available_gold_grade8_parthenon = false;
    $available_gold_grade9_parthenon = false;
    $available_gold_grade10_parthenon = false;
    $maximum_level_gold = false;
    $payable_gold = false;
    break;
}

# 구매 가능여부 확인 (레드베릴)
# Checking for availability (Red Beryl)
$available_red_grade1_kolona = false;
$available_red_grade2_kolona = false;
$available_red_grade3_kolona = false;
$available_red_grade4_kolona = false;
$available_red_grade5_kolona = false;
$available_red_grade6_kolona = false;
$available_red_grade7_kolona = false;
$available_red_grade8_kolona = false;
$available_red_grade9_kolona = false;
$available_red_grade10_kolona = false;

$available_red_grade1_odeion = false;
$available_red_grade2_odeion = false;
$available_red_grade3_odeion = false;
$available_red_grade4_odeion = false;
$available_red_grade5_odeion = false;
$available_red_grade6_odeion = false;
$available_red_grade7_odeion = false;
$available_red_grade8_odeion = false;
$available_red_grade9_odeion = false;
$available_red_grade10_odeion = false;

$available_red_grade1_stadion = false;
$available_red_grade2_stadion = false;
$available_red_grade3_stadion = false;
$available_red_grade4_stadion = false;
$available_red_grade5_stadion = false;
$available_red_grade6_stadion = false;
$available_red_grade7_stadion = false;
$available_red_grade8_stadion = false;
$available_red_grade9_stadion = false;
$available_red_grade10_stadion = false;

$available_red_grade1_parthenon = false;
$available_red_grade2_parthenon = false;
$available_red_grade3_parthenon = false;
$available_red_grade4_parthenon = false;
$available_red_grade5_parthenon = false;
$available_red_grade6_parthenon = false;
$available_red_grade7_parthenon = false;
$available_red_grade8_parthenon = false;
$available_red_grade9_parthenon = false;
$available_red_grade10_parthenon = false;

$maximum_level_red = false;

switch ($building) {
  case 0:
    # 콜로나 건설비용
    # Kolona Construction Cost
    switch ($land_grade) {
      case 1:
        if ($gold >= $cost_red_grade1_kolona) {
          $available_red_grade1_kolona = true;
          $payable_red = true;
        } else {
          $available_red_grade1_kolona = false;
          $payable_red = false;
        }
        break;
      case 2:
        if ($gold >= $cost_red_grade2_kolona) {
          $available_red_grade2_kolona = true;
          $payable_red = true;
        } else {
          $available_red_grade2_kolona = false;
          $payable_red = false;
        }
        break;
      case 3:
        if ($gold >= $cost_red_grade3_kolona) {
          $available_red_grade3_kolona = true;
          $payable_red = true;
        } else {
          $available_red_grade3_kolona = false;
          $payable_red = false;
        }
        break;
      case 4:
        if ($gold >= $cost_red_grade4_kolona) {
          $available_red_grade4_kolona = true;
          $payable_red = true;
        } else {
          $available_red_grade4_kolona = false;
          $payable_red = false;
        }
        break;
      case 5:
        if ($gold >= $cost_red_grade5_kolona) {
          $available_red_grade5_kolona = true;
          $payable_red = true;
        } else {
          $available_red_grade5_kolona = false;
          $payable_red = false;
        }
        break;
      case 6:
        if ($gold >= $cost_red_grade6_kolona) {
          $available_red_grade6_kolona = true;
          $payable_red = true;
        } else {
          $available_red_grade6_kolona = false;
          $payable_red = false;
        }
        break;
      case 7:
        if ($gold >= $cost_red_grade7_kolona) {
          $available_red_grade7_kolona = true;
          $payable_red = true;
        } else {
          $available_red_grade7_kolona = false;
          $payable_red = false;
        }
        break;
      case 8:
        if ($gold >= $cost_red_grade8_kolona) {
          $available_red_grade8_kolona = true;
          $payable_red = true;
        } else {
          $available_red_grade8_kolona = false;
          $payable_red = false;
        }
        break;
      case 9:
        if ($gold >= $cost_red_grade9_kolona) {
          $available_red_grade9_kolona = true;
          $payable_red = true;
        } else {
          $available_red_grade9_kolona = false;
          $payable_red = false;
        }
        break;
      case 10:
        if ($gold >= $cost_red_grade10_kolona) {
          $available_red_grade10_kolona = true;
          $payable_red = true;
        } else {
          $available_red_grade10_kolona = false;
          $payable_red = false;
        }
        break;
    }
    break;
  case 1:
    # 오데이온 건설비용
    # Odeion Construction Cost
    switch ($land_grade) {
      case 1:
        if ($gold >= $cost_red_grade1_odeion) {
          $available_red_grade1_odeion = true;
          $payable_red = true;
        } else {
          $available_red_grade1_odeion = false;
          $payable_red = false;
        }
        break;
      case 2:
        if ($gold >= $cost_red_grade2_odeion) {
          $available_red_grade2_odeion = true;
          $payable_red = true;
        } else {
          $available_red_grade2_odeion = false;
          $payable_red = false;
        }
        break;
      case 3:
        if ($gold >= $cost_red_grade3_odeion) {
          $available_red_grade3_odeion = true;
          $payable_red = true;
        } else {
          $available_red_grade3_odeion = false;
          $payable_red = false;
        }
        break;
      case 4:
        if ($gold >= $cost_red_grade4_odeion) {
          $available_red_grade4_odeion = true;
          $payable_red = true;
        } else {
          $available_red_grade4_odeion = false;
          $payable_red = false;
        }
        break;
      case 5:
        if ($gold >= $cost_red_grade5_odeion) {
          $available_red_grade5_odeion = true;
          $payable_red = true;
        } else {
          $available_red_grade5_odeion = false;
          $payable_red = false;
        }
        break;
      case 6:
        if ($gold >= $cost_red_grade6_odeion) {
          $available_red_grade6_odeion = true;
          $payable_red = true;
        } else {
          $available_red_grade6_odeion = false;
          $payable_red = false;
        }
        break;
      case 7:
        if ($gold >= $cost_red_grade7_odeion) {
          $available_red_grade7_odeion = true;
          $payable_red = true;
        } else {
          $available_red_grade7_odeion = false;
          $payable_red = false;
        }
        break;
      case 8:
        if ($gold >= $cost_red_grade8_odeion) {
          $available_red_grade8_odeion = true;
          $payable_red = true;
        } else {
          $available_red_grade8_odeion = false;
          $payable_red = false;
        }
        break;
      case 9:
        if ($gold >= $cost_red_grade9_odeion) {
          $available_red_grade9_odeion = true;
          $payable_red = true;
        } else {
          $available_red_grade9_odeion = false;
          $payable_red = false;
        }
        break;
      case 10:
        if ($gold >= $cost_red_grade10_odeion) {
          $available_red_grade10_odeion = true;
          $payable_red = true;
        } else {
          $available_red_grade10_odeion = false;
          $payable_red = false;
        }
        break;
    }
    break;
  case 2:
    # 스타디온 건설비용
    # Stadion Construction Cost
    switch ($land_grade) {
      case 1:
        if ($gold >= $cost_red_grade1_stadion) {
          $available_red_grade1_stadion = true;
          $payable_red = true;
        } else {
          $available_red_grade1_stadion = false;
          $payable_red = false;
        }
        break;
      case 2:
        if ($gold >= $cost_red_grade2_stadion) {
          $available_red_grade2_stadion = true;
          $payable_red = true;
        } else {
          $available_red_grade2_stadion = false;
          $payable_red = false;
        }
        break;
      case 3:
        if ($gold >= $cost_red_grade3_stadion) {
          $available_red_grade3_stadion = true;
          $payable_red = true;
        } else {
          $available_red_grade3_stadion = false;
          $payable_red = false;
        }
        break;
      case 4:
        if ($gold >= $cost_red_grade4_stadion) {
          $available_red_grade4_stadion = true;
          $payable_red = true;
        } else {
          $available_red_grade4_stadion = false;
          $payable_red = false;
        }
        break;
      case 5:
        if ($gold >= $cost_red_grade5_stadion) {
          $available_red_grade5_stadion = true;
          $payable_red = true;
        } else {
          $available_red_grade5_stadion = false;
          $payable_red = false;
        }
        break;
      case 6:
        if ($gold >= $cost_red_grade6_stadion) {
          $available_red_grade6_stadion = true;
          $payable_red = true;
        } else {
          $available_red_grade6_stadion = false;
          $payable_red = false;
        }
        break;
      case 7:
        if ($gold >= $cost_red_grade7_stadion) {
          $available_red_grade7_stadion = true;
          $payable_red = true;
        } else {
          $available_red_grade7_stadion = false;
          $payable_red = false;
        }
        break;
      case 8:
        if ($gold >= $cost_red_grade8_stadion) {
          $available_red_grade8_stadion = true;
          $payable_red = true;
        } else {
          $available_red_grade8_stadion = false;
          $payable_red = false;
        }
        break;
      case 9:
        if ($gold >= $cost_red_grade9_stadion) {
          $available_red_grade9_stadion = true;
          $payable_red = true;
        } else {
          $available_red_grade9_stadion = false;
          $payable_red = false;
        }
        break;
      case 10:
        if ($gold >= $cost_red_grade10_stadion) {
          $available_red_grade10_stadion = true;
          $payable_red = true;
        } else {
          $available_red_grade10_stadion = false;
          $payable_red = false;
        }
        break;
    }
    break;
  case 3:
    # 파르테논 건설비용
    # Parthenon Construction Cost
    switch ($land_grade) {
      case 1:
        if ($gold >= $cost_red_grade1_parthenon) {
          $available_red_grade1_parthenon = true;
          $payable_red = true;
        } else {
          $available_red_grade1_parthenon = false;
          $payable_red = false;
        }
        break;
      case 2:
        if ($gold >= $cost_red_grade2_parthenon) {
          $available_red_grade2_parthenon = true;
          $payable_red = true;
        } else {
          $available_red_grade2_parthenon = false;
          $payable_red = false;
        }
        break;
      case 3:
        if ($gold >= $cost_red_grade3_parthenon) {
          $available_red_grade3_parthenon = true;
          $payable_red = true;
        } else {
          $available_red_grade3_parthenon = false;
          $payable_red = false;
        }
        break;
      case 4:
        if ($gold >= $cost_red_grade4_parthenon) {
          $available_red_grade4_parthenon = true;
          $payable_red = true;
        } else {
          $available_red_grade4_parthenon = false;
          $payable_red = false;
        }
        break;
      case 5:
        if ($gold >= $cost_red_grade5_parthenon) {
          $available_red_grade5_parthenon = true;
          $payable_red = true;
        } else {
          $available_red_grade5_parthenon = false;
          $payable_red = false;
        }
        break;
      case 6:
        if ($gold >= $cost_red_grade6_parthenon) {
          $available_red_grade6_parthenon = true;
          $payable_red = true;
        } else {
          $available_red_grade6_parthenon = false;
          $payable_red = false;
        }
        break;
      case 7:
        if ($gold >= $cost_red_grade7_parthenon) {
          $available_red_grade7_parthenon = true;
          $payable_red = true;
        } else {
          $available_red_grade7_parthenon = false;
          $payable_red = false;
        }
        break;
      case 8:
        if ($gold >= $cost_red_grade8_parthenon) {
          $available_red_grade8_parthenon = true;
          $payable_red = true;
        } else {
          $available_red_grade8_parthenon = false;
          $payable_red = false;
        }
        break;
      case 9:
        if ($gold >= $cost_red_grade9_parthenon) {
          $available_red_grade9_parthenon = true;
          $payable_red = true;
        } else {
          $available_red_grade9_parthenon = false;
          $payable_red = false;
        }
        break;
      case 10:
        if ($gold >= $cost_red_grade10_parthenon) {
          $available_red_grade10_parthenon = true;
          $payable_red = true;
        } else {
          $available_red_grade10_parthenon = false;
          $payable_red = false;
        }
        break;
    }
    break;
  case 4:
    # 최고 레벨 달성 & 결제 불가
    # Highest level reached & Unable to pay
    $available_red_grade1_kolona = false;
    $available_red_grade2_kolona = false;
    $available_red_grade3_kolona = false;
    $available_red_grade4_kolona = false;
    $available_red_grade5_kolona = false;
    $available_red_grade6_kolona = false;
    $available_red_grade7_kolona = false;
    $available_red_grade8_kolona = false;
    $available_red_grade9_kolona = false;
    $available_red_grade10_kolona = false;
    $available_red_grade1_odeion = false;
    $available_red_grade2_odeion = false;
    $available_red_grade3_odeion = false;
    $available_red_grade4_odeion = false;
    $available_red_grade5_odeion = false;
    $available_red_grade6_odeion = false;
    $available_red_grade7_odeion = false;
    $available_red_grade8_odeion = false;
    $available_red_grade9_odeion = false;
    $available_red_grade10_odeion = false;
    $available_red_grade1_stadion = false;
    $available_red_grade2_stadion = false;
    $available_red_grade3_stadion = false;
    $available_red_grade4_stadion = false;
    $available_red_grade5_stadion = false;
    $available_red_grade6_stadion = false;
    $available_red_grade7_stadion = false;
    $available_red_grade8_stadion = false;
    $available_red_grade9_stadion = false;
    $available_red_grade10_stadion = false;
    $available_red_grade1_parthenon = false;
    $available_red_grade2_parthenon = false;
    $available_red_grade3_parthenon = false;
    $available_red_grade4_parthenon = false;
    $available_red_grade5_parthenon = false;
    $available_red_grade6_parthenon = false;
    $available_red_grade7_parthenon = false;
    $available_red_grade8_parthenon = false;
    $available_red_grade9_parthenon = false;
    $available_red_grade10_parthenon = false;
    $maximum_level_red = true;
    $payable_red = false;
    break;
  default:
    # 디폴트 : 결제 불가
    # Default : Unable to pay
    $available_red_grade1_kolona = false;
    $available_red_grade2_kolona = false;
    $available_red_grade3_kolona = false;
    $available_red_grade4_kolona = false;
    $available_red_grade5_kolona = false;
    $available_red_grade6_kolona = false;
    $available_red_grade7_kolona = false;
    $available_red_grade8_kolona = false;
    $available_red_grade9_kolona = false;
    $available_red_grade10_kolona = false;
    $available_red_grade1_odeion = false;
    $available_red_grade2_odeion = false;
    $available_red_grade3_odeion = false;
    $available_red_grade4_odeion = false;
    $available_red_grade5_odeion = false;
    $available_red_grade6_odeion = false;
    $available_red_grade7_odeion = false;
    $available_red_grade8_odeion = false;
    $available_red_grade9_odeion = false;
    $available_red_grade10_odeion = false;
    $available_red_grade1_stadion = false;
    $available_red_grade2_stadion = false;
    $available_red_grade3_stadion = false;
    $available_red_grade4_stadion = false;
    $available_red_grade5_stadion = false;
    $available_red_grade6_stadion = false;
    $available_red_grade7_stadion = false;
    $available_red_grade8_stadion = false;
    $available_red_grade9_stadion = false;
    $available_red_grade10_stadion = false;
    $available_red_grade1_parthenon = false;
    $available_red_grade2_parthenon = false;
    $available_red_grade3_parthenon = false;
    $available_red_grade4_parthenon = false;
    $available_red_grade5_parthenon = false;
    $available_red_grade6_parthenon = false;
    $available_red_grade7_parthenon = false;
    $available_red_grade8_parthenon = false;
    $available_red_grade9_parthenon = false;
    $available_red_grade10_parthenon = false;
    $maximum_level_red = false;
    $payable_red = false;
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
            switch ($land_grade) {
              case 1:
                if ($available_gold_grade1_kolona == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 2:
                if ($available_gold_grade2_kolona == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 3:
                if ($available_gold_grade3_kolona == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 4:
                if ($available_gold_grade4_kolona == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 5:
                if ($available_gold_grade5_kolona == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 6:
                if ($available_gold_grade6_kolona == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 7:
                if ($available_gold_grade7_kolona == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 8:
                if ($available_gold_grade8_kolona == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 9:
                if ($available_gold_grade9_kolona == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 10:
                if ($available_gold_grade10_kolona == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
            }
            break;
          case 1:
            switch ($land_grade) {
              case 1:
                if ($available_gold_grade1_odeion == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 2:
                if ($available_gold_grade2_odeion == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 3:
                if ($available_gold_grade3_odeion == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 4:
                if ($available_gold_grade4_odeion == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 5:
                if ($available_gold_grade5_odeion == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 6:
                if ($available_gold_grade6_odeion == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 7:
                if ($available_gold_grade7_odeion == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 8:
                if ($available_gold_grade8_odeion == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 9:
                if ($available_gold_grade9_odeion == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 10:
                if ($available_gold_grade10_odeion == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
            }
            break;
          case 2:
            switch ($land_grade) {
              case 1:
                if ($available_gold_grade1_stadion == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 2:
                if ($available_gold_grade2_stadion == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 3:
                if ($available_gold_grade3_stadion == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 4:
                if ($available_gold_grade4_stadion == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 5:
                if ($available_gold_grade5_stadion == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 6:
                if ($available_gold_grade6_stadion == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 7:
                if ($available_gold_grade7_stadion == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 8:
                if ($available_gold_grade8_stadion == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 9:
                if ($available_gold_grade9_stadion == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 10:
                if ($available_gold_grade10_stadion == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
            }
            break;
          case 3:
            switch ($land_grade) {
              case 1:
                if ($available_gold_grade1_parthenon == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 2:
                if ($available_gold_grade2_parthenon == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 3:
                if ($available_gold_grade3_parthenon == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 4:
                if ($available_gold_grade4_parthenon == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 5:
                if ($available_gold_grade5_parthenon == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 6:
                if ($available_gold_grade6_parthenon == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 7:
                if ($available_gold_grade7_parthenon == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 8:
                if ($available_gold_grade8_parthenon == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 9:
                if ($available_gold_grade9_parthenon == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 10:
                if ($available_gold_grade10_parthenon == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
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
            switch ($land_grade) {
              case 1:
                if ($available_red_grade1_kolona == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 2:
                if ($available_red_grade2_kolona == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 3:
                if ($available_red_grade3_kolona == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 4:
                if ($available_red_grade4_kolona == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 5:
                if ($available_red_grade5_kolona == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 6:
                if ($available_red_grade6_kolona == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 7:
                if ($available_red_grade7_kolona == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 8:
                if ($available_red_grade8_kolona == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 9:
                if ($available_red_grade9_kolona == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 10:
                if ($available_red_grade10_kolona == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
            }
            break;
          case 1:
            switch ($land_grade) {
              case 1:
                if ($available_red_grade1_odeion == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 2:
                if ($available_red_grade2_odeion == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 3:
                if ($available_red_grade3_odeion == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 4:
                if ($available_red_grade4_odeion == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 5:
                if ($available_red_grade5_odeion == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 6:
                if ($available_red_grade6_odeion == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 7:
                if ($available_red_grade7_odeion == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 8:
                if ($available_red_grade8_odeion == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 9:
                if ($available_red_grade9_odeion == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 10:
                if ($available_red_grade10_odeion == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
            }
            break;
          case 2:
            switch ($land_grade) {
              case 1:
                if ($available_red_grade1_stadion == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 2:
                if ($available_red_grade2_stadion == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 3:
                if ($available_red_grade3_stadion == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 4:
                if ($available_red_grade4_stadion == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 5:
                if ($available_red_grade5_stadion == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 6:
                if ($available_red_grade6_stadion == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 7:
                if ($available_red_grade7_stadion == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 8:
                if ($available_red_grade8_stadion == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 9:
                if ($available_red_grade9_stadion == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 10:
                if ($available_red_grade10_stadion == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
            }
            break;
          case 3:
            switch ($land_grade) {
              case 1:
                if ($available_red_grade1_parthenon == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 2:
                if ($available_red_grade2_parthenon == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 3:
                if ($available_red_grade3_parthenon == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 4:
                if ($available_red_grade4_parthenon == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 5:
                if ($available_red_grade5_parthenon == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 6:
                if ($available_red_grade6_parthenon == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 7:
                if ($available_red_grade7_parthenon == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 8:
                if ($available_red_grade8_parthenon == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 9:
                if ($available_red_grade9_parthenon == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
              case 10:
                if ($available_red_grade10_parthenon == false) {
                  echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
                }
                break;
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
    switch ($land_grade) {
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
      case 2:
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
           </div>
          ';
        break;
      case 4:
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
      case 5:
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
      case 6:
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
      case 7:
        echo '
          <div class="ownership_star">
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
           </div>
          ';
        break;
      case 8:
        echo '
          <div class="ownership_star">
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
           </div>
          ';
        break;
      case 9:
        echo '
          <div class="ownership_star">
            <img src="./images/tycoon_star.png" alt="star" />
            <img src="./images/tycoon_star.png" alt="star" />
           </div>
          ';
        break;
      case 10:
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
    <button class="btn btn-effect" onclick="<?php if ($payable_gold == true && $payable_red == true) { ?>
                                                              pay(<?= $idx; ?>);
                                                            <?php } else if ($payable_gold == false) { ?>
                                                              alert('골드가 부족합니다.');
                                                            <?php } else if ($payable_red == false) { ?>
                                                              alert('레드베릴이 부족합니다.');
                                                            <?php } else if ($payable_gold == false && $payable_red == false) { ?>
                                                              alert('골드와 레드베릴 모두 부족합니다.');
                                                            <?php } ?>">
      <span>
        건설하기
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
      location.href = "ieros_detail.php?idx=" + idx;
    }

    const modal = document.getElementById("modal");
    const btnPay = document.getElementById("btnPay");

    /*
     * 결제하기
     * Pay
     */
    function pay() {
      modal.style.display = "block";
    }

    btnPay.addEventListener("click", () => {
      let idx = document.getElementById('idx').value;
      success(idx);
    });

    function success(idx) {
      location.href = "ieros_build_process.php?idx=" + idx;
    }

    window.addEventListener("click", () => {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    });
  </script>

</body>

<?php
// }
?>

</html>