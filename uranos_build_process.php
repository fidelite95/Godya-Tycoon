<?php
# 로그인 세션
# Login Session
session_start();
$login_id = $_SESSION['id'];
if (isset($_SESSION['id'])) {
  $login_status = true;
} else {
  $login_status = false;
}

// if (!$login_status) {
//   echo "<script>alert('로그인 후에 이용 가능합니다.')</script>";
//   echo "<script>location.href='login.php';</script>";
// } else {

include("./brand.php");

# GET 방식으로 받은 데이터 : idx
# GET an index from the previous page
$idx = $_GET['idx'];

# GET 방식으로 받은 데이터 : coin
# GET a payment method from the previous page
$coin = $_GET['coin'];

# 데이터베이스 연결
# Connecting to a database
$con = mysqli_connect("localhost", "gods2022", "wpdntm1004", "gods2022");
mysqli_query($con, 'SET NAMES utf8');
$con->query("SET NAMES 'UTF8'");

# 데이터베이스 연결 시 에러가 발생한 경우
# If an error occurs when connecting to the database
if ($con->connect_errno) {
  die('Connection Error : ' . $con->connect_error);
}

# 영토 데이터 조회
# Retrieving territory data
$query = "SELECT * FROM tycoon_uranos WHERE idx='$idx'";
$result = $con->query($query);
$row = $result->fetch_assoc();

# 영토 고유코드
# Land Code
$land_code = $row['land_code'];

# 영토 판매상태 : 0 (판매중), 1 (판매됨)
# Land Status : 0 (For sale), 1 (Sold)
$land_status = $row['land_status'];

# 사용자 인덱스
# User Index
$member_idX = $row['member_idX'];

# 사용자 ID (구글 이메일)
# User Account (Gmail)
$member_id = $row['member_id'];
if ($member_id == NULL) {
  $member_id = '없음';
}

# 영토 가격
# Land Price
$price_gold = number_format($row['price_gold']);
$price_red = number_format($row['price_red']);

# 수익 등급
# Profitability : _rate.php
$profit = $row['profit'];
$profit_name = '';

# 건설 등급
# Building : _build.php
$building = $row['building'];
$building_name = '';

# 채굴 아이템 슬롯
# Mined resources
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
  <link rel="stylesheet" type="text/css" href="process.css" />
  <link rel="stylesheet" type="text/css" href="modal.css" />
  <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</head>

<body>

  <!-- 모달 시작 -->
  <!-- Modal Start -->
  <div id="modalGold" class="modal">
    <div class="modal_content">
      <p>건설을 완료하시겠습니까?</p>
      <button class="btn btn-effect" id="btnGold"><span>완료하기</span></button>
    </div>
  </div>
  <!-- 모달 끝 -->
  <!-- Modal End -->

  <!-- 모달 시작 -->
  <!-- Modal Start -->
  <div id="modalRed" class="modal">
    <div class="modal_content">
      <p>건설을 완료하시겠습니까?</p>
      <button class="btn btn-effect" id="btnRed"><span>완료하기</span></button>
    </div>
  </div>
  <!-- 모달 끝 -->
  <!-- Modal End -->

  <!-- 데이터 저장을 위한 FORM 시작 -->
  <!-- Form Start : Storing Data on Client -->
  <form>
    <input type="hidden" name="idx" id="idx" value="<?= $idx; ?>">
    <input type="hidden" name="coin" id="coin" value="<?= $coin; ?>">
  </form>
  <!-- 데이터 저장을 위한 FORM 끝 -->
  <!-- Form End -->

  <!-- 건설 페이지 시작 -->
  <!-- Build Page Start -->
  <div class="build_process">
    <lottie-player src="./json/white_cubes.json" background="transparent" speed="1" style="width: 200px; height: 200px" loop autoplay direction="1" mode="normal"></lottie-player>

    <h1>건설중입니다...</h1>
    <p>하단의 버튼을 클릭하여 건설을 완료해주세요!</p>

    <!-- 진행 상태바 시작 -->
    <!-- Progress Bar Start -->
    <div class="bar_wrapper_uranos">
      <div id="barUranos"></div>
    </div>
    <!-- 진행 상태바 끝 -->
    <!-- Progress Bar End -->

    <?php
    # 골드로 결제
    # Pay with gold
    if ($coin == 'gold') { ?>
      <button class="btnBuild" onclick="moveWithGold(<?= $idx; ?>)">CLICK</button>
    <?php
      # 레드베릴로 결제
      # Pay with red
    } elseif ($coin == 'red') { ?>
      <button class="btnBuild" onclick="moveWithRed(<?= $idx; ?>)">CLICK</button>
    <?php
    }
    ?>
  </div>
  <!-- 건설 페이지 끝 -->
  <!-- Build Page End -->

  <script>
    let myBar = document.getElementById("barUranos");
    let width = 0;
    let decrease = setInterval(() => {
      if (width <= 0) {
        width = 0;
      } else {
        width -= 0.1;
        myBar.style.width = width + '%';
      }
    }, 5);

    const modalGold = document.getElementById("modalGold");
    const modalRed = document.getElementById("modalRed");
    const btnGold = document.getElementById("btnGold");
    const btnRed = document.getElementById("btnRed");

    function moveWithGold(idx) {
      if (width >= 98) {
        clearInterval(decrease);
        modalGold.style.display = "block";
      } else {
        width += 9;
        myBar.style.width = width + '%';
      }
    }

    function moveWithRed(idx) {
      if (width >= 98) {
        clearInterval(decrease);
        modalRed.style.display = "block";
      } else {
        width += 9;
        myBar.style.width = width + '%';
      }
    }

    function success(idx, coin) {
      location.href = "uranos_build_ok.php?idx=" + idx + "&coin=" + coin;
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
  </script>

</body>

<?php
// }
?>

</html>