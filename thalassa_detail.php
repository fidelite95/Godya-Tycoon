<?php
include("./login_status.php");
include("./brand.php");
include("./connection.php");

# GET 메소드로 받은 idx
# idx received by the GET method
$idx = $_GET['idx'];

# 영토 조회 쿼리
# Query to find territory data
$query = "SELECT * FROM tycoon_thalassa WHERE idx='$idx'";
$result = $con->query($query);
$row = $result->fetch_assoc();

# 영토 코드
# Land Code
$land_code = $row['land_code'];

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
  <link rel="stylesheet" type="text/css" href="description.css" />
</head>

<?php
// if (!$login_status) {
//   echo "<script>alert('로그인 후에 이용 가능합니다.')</script>";
//   echo "<script>location.href='login.php';</script>";
// } else {
?>

<body>

  <?php include("./navbar.php") ?>

  <!-- 소유권 컴포넌트 -->
  <!-- Ownership Component -->
  <div class="ownership">
    <h1 class="ownership_land"><?php echo $land_code; ?></h1>
    <h3 class="ownership_owner">소유자 : <?php echo $tenant_nick; ?></h3>
    <?php
    # 영토가 판매중인 경우
    # If the territory is for sale
    if ($land_status == 0) { ?>
      <div class="ownership_price">
        <div class="price_gold">
          <img src="./images/tycoon_gold.png" alt="gold" />
          <p><?php echo $price_gold; ?></p>
        </div>
        <div class="price_red">
          <img src="./images/tycoon_red.png" alt="red" />
          <p><?php echo $price_red; ?></p>
        </div>
      </div>
    <?php
      # 영토가 판매된 경우
      # If the territory is sold
    } elseif ($land_status == 1) {
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
    }
    ?>
  </div>

  <!-- 큐브 컴포넌트 -->
  <!-- Cube Component -->
  <?php
  # 영토가 판매중인 경우
  # If the territory is for sale
  if ($land_status == 0) {
    switch ($idx) {
        # 1등급
        # 1st
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
        # 2등급
        # 2nd
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
        # 3등급
        # 3rd
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
        # 4등급
        # 4th
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
        # 5등급
        # 5th
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
        # 6등급
        # 6th
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
    # 영토가 판매된 경우
    # If the territory is sold
  } elseif ($land_status == 1) {
    switch ($idx) {
        # 1등급
        # 1st
      case 1:
        echo '
      <div class="cube_thalassa_1">
        <div class="top_thalassa_1"></div>
        <div>
          <span style="--i: 0"></span>
          <span style="--i: 1"></span>
          <span style="--i: 2"></span>
          <span style="--i: 3"></span>
        </div>
      </div>
      ';
        break;
        # 2등급
        # 2nd
      case 2:
      case 3:
        echo '
      <div class="cube_thalassa_2">
        <div class="top_thalassa_2"></div>
        <div>
          <span style="--i: 0"></span>
          <span style="--i: 1"></span>
          <span style="--i: 2"></span>
          <span style="--i: 3"></span>
        </div>
      </div>
      ';
        break;
        # 3등급
        # 3rd
      case 4:
      case 5:
      case 6:
        echo '
      <div class="cube_thalassa_3">
        <div class="top_thalassa_3"></div>
        <div>
          <span style="--i: 0"></span>
          <span style="--i: 1"></span>
          <span style="--i: 2"></span>
          <span style="--i: 3"></span>
        </div>
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
      <div class="cube_thalassa_4">
        <div class="top_thalassa_4"></div>
        <div>
          <span style="--i: 0"></span>
          <span style="--i: 1"></span>
          <span style="--i: 2"></span>
          <span style="--i: 3"></span>
        </div>
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
      <div class="cube_thalassa_5">
        <div class="top_thalassa_5"></div>
        <div>
          <span style="--i: 0"></span>
          <span style="--i: 1"></span>
          <span style="--i: 2"></span>
          <span style="--i: 3"></span>
        </div>
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
      <div class="cube_thalassa_6">
        <div class="top_thalassa_6"></div>
        <div>
          <span style="--i: 0"></span>
          <span style="--i: 1"></span>
          <span style="--i: 2"></span>
          <span style="--i: 3"></span>
        </div>
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
      <div class="cube_thalassa_7">
        <div class="top_thalassa_7"></div>
        <div>
          <span style="--i: 0"></span>
          <span style="--i: 1"></span>
          <span style="--i: 2"></span>
          <span style="--i: 3"></span>
        </div>
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
      <div class="cube_thalassa_8">
        <div class="top_thalassa_8"></div>
        <div>
          <span style="--i: 0"></span>
          <span style="--i: 1"></span>
          <span style="--i: 2"></span>
          <span style="--i: 3"></span>
        </div>
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
      <div class="cube_thalassa_9">
        <div class="top_thalassa_9"></div>
        <div>
          <span style="--i: 0"></span>
          <span style="--i: 1"></span>
          <span style="--i: 2"></span>
          <span style="--i: 3"></span>
        </div>
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
      <div class="cube_thalassa_10">
        <div class="top_thalassa_10"></div>
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

  <!-- 하단 버튼들 -->
  <!-- Buttons -->
  <?php
  # 영토가 판매중인 경우
  # If the territory is for sale
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
    # 영토가 판매된 경우
    # If the territory is sold
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

  <!-- 설명 컴포넌트 -->
  <!-- Description Component -->
  <div class="description">

    <!-- 수익 등급 -->
    <!-- Profitability Status -->
    <div class="description_profit">
      <div class="description_img">
        <?php
        switch ($profit) {
            # 없음  
            # None
          case 0:
            $profit_name = '없음';
            echo '<img src="./images/rating/profit_lv0.png" alt="profit">';
            break;
            # 알파
            # Alpha
          case 1:
            $profit_name = '알파';
            echo '<img src="./images/rating/profit_lv1.png" alt="profit">';
            break;
            # 베타
            # Beta
          case 2:
            $profit_name = '베타';
            echo '<img src="./images/rating/profit_lv2.png" alt="profit">';
            break;
            # 감마
            # Gamma
          case 3:
            $profit_name = '감마';
            echo '<img src="./images/rating/profit_lv3.png" alt="profit">';
            break;
            # 델타
            # Delta
          case 4:
            $profit_name = '델타';
            echo '<img src="./images/rating/profit_lv4.png" alt="profit">';
            break;
            # 엡실론
            # Epsilon
          case 5:
            $profit_name = '엡실론';
            echo '<img src="./images/rating/profit_lv5.png" alt="profit">';
            break;
            # 제타
            # Zeta
          case 6:
            $profit_name = '제타';
            echo '<img src="./images/rating/profit_lv6.png" alt="profit">';
            break;
            # 에타
            # Eta
          case 7:
            $profit_name = '에타';
            echo '<img src="./images/rating/profit_lv7.png" alt="profit">';
            break;
            # 시타
            # Theta
          case 8:
            $profit_name = '시타';
            echo '<img src="./images/rating/profit_lv8.png" alt="profit">';
            break;
            # 이오타
            # Iota
          case 9:
            $profit_name = '이오타';
            echo '<img src="./images/rating/profit_lv9.png" alt="profit">';
            break;
            # 카파
            # Kappa
          case 10:
            $profit_name = '카파';
            echo '<img src="./images/rating/profit_lv10.png" alt="profit">';
            break;
            # 람다
            # Lambda
          case 11:
            $profit_name = '람다';
            echo '<img src="./images/rating/profit_lv11.png" alt="profit">';
            break;
            # 뮤
            # Mu
          case 12:
            $profit_name = '뮤';
            echo '<img src="./images/rating/profit_lv12.png" alt="profit">';
            break;
            # 뉴
            # Nu
          case 13:
            $profit_name = '뉴';
            echo '<img src="./images/rating/profit_lv13.png" alt="profit">';
            break;
            # 크사이
            # Xi
          case 14:
            $profit_name = '크사이';
            echo '<img src="./images/rating/profit_lv14.png" alt="profit">';
            break;
            # 오미크론
            # Omicron
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

    <!-- 건설 등급 -->
    <!-- Building Status -->
    <div class="description_building">
      <div class="description_img">
        <?php
        switch ($building) {
            # 없음
            # None
          case 0:
            $building_name = '없음';
            echo '<img src="./images/building/building_none.png" alt="building">';
            break;
            # 콜로나
            # Kolona
          case 1:
            $building_name = '콜로나';
            echo '<img src="./images/building/building_kolona.png" alt="building">';
            break;
            # 오데이온
            # Odeion
          case 2:
            $building_name = '오데이온';
            echo '<img src="./images/building/building_odeion.png" alt="building">';
            break;
            # 스타디온
            # Stadion
          case 3:
            $building_name = '스타디온';
            echo '<img src="./images/building/building_stadion.png" alt="building">';
            break;
            # 파르테논
            # Parthenon
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
    /*
     * 뒤로가기
     * Go back to the previous page
     */
    function back() {
      location.href = "thalassa.php";
    }

    /*
     * 임대하기
     * Go to the RENT page
     */
    function rent(idx) {
      location.href = "thalassa_rent.php?idx=" + idx;
    }

    /*
     * 건설하기
     * Go to the BUILD page
     */
    function build(idx) {
      location.href = "thalassa_build.php?idx=" + idx;
    }

    /*
     * 승급하기
     * Go to the RATE page
     */
    function rate(idx) {
      location.href = "thalassa_rate.php?idx=" + idx;
    }

    /*
     * 채굴하기
     * Go to the MINE page
     */
    function mine(idx) {
      location.href = "thalassa_mine.php?idx=" + idx;
    }
  </script>
</body>

<?php
// }
?>

</html>