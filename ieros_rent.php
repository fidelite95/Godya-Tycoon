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

// Territory Data
$query = "SELECT * FROM tb_tycoon_ieros WHERE idx='$idx'";
$result = $con->query($query);
$row = $result->fetch_assoc();

$land_code = $row['land_code'];
$land_status = $row['land_status'];
$member_id = $row['member_id'];
if ($member_id == NULL) {
  $member_id = '없음';
}
$price_gold = $row['price_gold'];
$price_red = $row['price_red'];

// Buildings
$building_lv1 = $row['building_lv1'];
$building_lv2 = $row['building_lv2'];
$building_lv3 = $row['building_lv3'];
$building_lv4 = $row['building_lv4'];
$building_lv5 = $row['building_lv5'];
$building_lv6 = $row['building_lv6'];
$building_lv7 = $row['building_lv7'];
if ($building_lv1 == NULL) {
  $building_lv1 = 0;
}
if ($building_lv2 == NULL) {
  $building_lv2 = 0;
}
if ($building_lv3 == NULL) {
  $building_lv3 = 0;
}
if ($building_lv4 == NULL) {
  $building_lv4 = 0;
}
if ($building_lv5 == NULL) {
  $building_lv5 = 0;
}
if ($building_lv6 == NULL) {
  $building_lv6 = 0;
}
if ($building_lv7 == NULL) {
  $building_lv7 = 0;
}
?>

<!DOCTYPE html>
<html>

<head>
  <?php include("./head.php") ?>
  <title>TYCOON | <?php echo $land_code ?></title>
  <link rel="stylesheet" type="text/css" href="cube.css" />
  <link rel="stylesheet" type="text/css" href="./tycoon.css" />
  <link rel="stylesheet" type="text/css" href="./navbar.css" />
  <link rel="stylesheet" type="text/css" href="buy_build.css">
</head>

<body>
  <!-- Dialog -->
  <!-- <dialog data-modal class="tycoon-modal">
    <p>This is a modal!</p>
    <button data-close-modal>Close</button>
  </dialog> -->

  <?php include("./navbar.php") ?>

  <!-- Buyer -->
  <?php
  // Temporary Member ID
  $temporary_id = "grandefidelite@gmail.com";

  $query_buyer = "SELECT * FROM tb_member WHERE id='$temporary_id'";
  $result_buyer = $con->query($query_buyer);
  $row_buyer = $result_buyer->fetch_assoc();

  // Member Nickname
  $member_nick = $row_buyer['nick'];

  // Member Asset
  $member_gold = $row_buyer['point'];
  $member_red = $row_buyer['cash'];
  ?>
  <div class="buyer">
    <h3 class="buyer_name"><?php echo $member_nick ?>님의 보유자산</h3>
    <div class="buyer_asset">
      <div class="buyer_gold">
        <img src="./images/tycoon_gold.png" alt="gold" />
        <p><?php echo $member_gold ?></p>
      </div>
      <div class="buyer_red">
        <img src="./images/tycoon_red.png" alt="red" />
        <p><?php echo $member_red ?></p>
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
  // Ieros Normal
  if ($land_status == 1) {
  ?>
    <div class="cube_ieros">
      <div class="top_ieros"></div>
      <div>
        <span style="--i: 0"></span>
        <span style="--i: 1"></span>
        <span style="--i: 2"></span>
        <span style="--i: 3"></span>
      </div>
    </div>
  <?php
    // Ieros Double
  } elseif ($land_status == 2) {
  ?>
    <div class="cube_ieros_double">
      <div class="top_ieros_double"></div>
      <div>
        <span style="--i: 0"></span>
        <span style="--i: 1"></span>
        <span style="--i: 2"></span>
        <span style="--i: 3"></span>
      </div>
    </div>
  <?php
    // Ieros Triple
  } elseif ($land_status == 3) {
  ?>
    <div class="cube_ieros_triple">
      <div class="top_ieros_triple"></div>
      <div>
        <span style="--i: 0"></span>
        <span style="--i: 1"></span>
        <span style="--i: 2"></span>
        <span style="--i: 3"></span>
      </div>
    </div>
  <?php
    // Not sold
  } else {
  ?>
    <div class="cube">
      <div class="top"></div>
      <div>
        <span style="--i: 0"></span>
        <span style="--i: 1"></span>
        <span style="--i: 2"></span>
        <span style="--i: 3"></span>
      </div>
    </div>
  <?php
  }
  ?>

  <!-- Buttons -->
  <div class="description_buttons">
    <button data-open-modal class="btn btn-effect">
      <span>
        <img src="./images/tycoon_gold.png" alt="gold" style="width: 20px; margin-right: 10px; transform: translateY(3px);" />
        구매
      </span>
    </button>
    <button data-open-modal class="btn btn-effect">
      <span>
        <img src="./images/tycoon_red.png" alt="red" style="width: 20px; margin-right: 10px; transform: translateY(3px);" />
        구매
      </span>
    </button>
    <button data-open-modal class="btn btn-effect" onclick="back()">
      <span>취소</span>
    </button>
  </div>

  <script>
    const openButton = document.querySelector("[data-open-modal]");
    const closeButton = document.querySelector("[data-close-modal]");
    const modal = document.querySelector("[data-modal]");

    openButton.addEventListener("click", () => {
      modal.showModal();
    });

    closeButton.addEventListener("click", () => {
      modal.close();
    });

    // Go back
    function back() {
      location.href = "ieros.php";
    }
  </script>
</body>

<?php
// }
?>

</html>