<?php
include("./login_status.php");
include("./brand.php");
include("./connection.php");

// if (!$login_status) {
//   echo "<script>alert('로그인 후에 이용 가능합니다.')</script>";
//   echo "<script>location.href='login.php';</script>";
// } else {

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

  <!-- Tenant -->
  <?php
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
  # User Nickname
  $member_nick = $row_tenant['nick'];

  # 유저 자산
  # User Asset
  $member_gold = number_format($row_tenant['gold']);
  $member_red = number_format($row_tenant['cash']);

  # 구매 가능여부 확인 (골드)
  # Check availability (Gold)
  $available_gold = false;
  if ($row_tenant['gold'] >= $row['price_gold']) {
    $available_gold = true;
  }

  # 구매 가능여부 확인 (레드베릴)
  # Check availability (Red Beryl)
  $available_red = false;
  if ($row_tenant['cash'] >= $row['price_red']) {
    $available_red = true;
  }
  ?>
  <div class="tenant">
    <h3 class="tenant_name"><?php echo $member_nick; ?>님의 보유자산</h3>
    <div class="tenant_asset">
      <div class="tenant_gold">
        <img class="tenant_img" src="./images/tycoon_gold.png" alt="gold" />
        <p><?php echo $member_gold; ?></p>
        <?php
        if ($available_gold == false) {
          echo '<img class="tenant_warning" src="./images/warning_sign.png" alt="gold" />';
        }
        ?>
      </div>
      <div class="tenant_red">
        <img class="tenant_img" src="./images/tycoon_red.png" alt="red" />
        <p><?php echo $member_red; ?></p>
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
    <h1 class="ownership_land"><?php echo $land_code; ?></h1>
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
    <button class="btn btn-effect" onclick="<?php if ($available_gold == true && $available_red == true) { ?>
                                                              pay(<?= $idx; ?>);
                                                            <?php } else if ($available_gold == false) { ?>
                                                              alert('골드가 부족합니다.');
                                                            <?php } else if ($available_red == false) { ?>
                                                              alert('레드베릴이 부족합니다.');
                                                            <?php } else if ($available_gold == false && $available_red == false) { ?>
                                                              alert('골드와 레드베릴 모두 부족합니다.');
                                                            <?php } ?>">
      <span>
        임대하기
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
      location.href = "uranos_rent_ok.php?idx=" + idx;
    }
  </script>

</body>

</html>

<?php
// }
?>