<?php include("./brand.php"); ?>

<!DOCTYPE html>
<html>

<head>
  <?php include("./head.php") ?>
  <title>TYCOON | URANOS</title>
  <link rel="stylesheet" href="cube.css" />
  <link rel="stylesheet" type="text/css" href="./tycoon.css" />
  <link rel="stylesheet" type="text/css" href="./navbar.css" />
</head>

<?php
// if (!$login_status) {
//   echo "<script>alert('로그인 후에 이용 가능합니다.')</script>";
//   echo "<script>location.href='login.php';</script>";
// } else {

$idx = $_GET['idx'];

// Retrieving data from a database
$con = mysqli_connect("localhost", "gods2022", "wpdntm1004", "gods2022");
mysqli_query($con, 'SET NAMES utf8');
$con->query("SET NAMES 'UTF8'");

if ($con->connect_errno) {
  die('Connection Error : ' . $con->connect_error);
}
?>

<body>
  <!-- Dialog -->
  <!-- <dialog data-modal class="tycoon-modal">
    <p>This is a modal!</p>
    <button data-close-modal>Close</button>
  </dialog> -->

  <?php include("./navbar.php") ?>

  <!-- Ownership -->
  <?php
  $query = "SELECT * FROM tb_tycoon_uranos WHERE idx='$idx'";
  $result = $con->query($query);
  $row = $result->fetch_assoc();

  // Land Code
  $land_code = $row['land_code'];
  $land_lv = 0;

  // Land Status
  $land_status = $row['land_status'];

  // Member ID
  $member_id = $row['member_id'];
  if ($member_id == NULL) {
    $member_id = '없음';
  }

  // Prices
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
  <div class="ownership">
    <h1 class="ownership_land"><?php echo $land_code ?></h1>
    <h3 class="ownership_owner">소유자 : <?php echo $member_id ?></h3>
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
  // Uranos Normal
  if ($land_status == 1) {
  ?>
    <div class="cube_uranos">
      <div class="top_uranos"></div>
      <div>
        <span style="--i: 0"></span>
        <span style="--i: 1"></span>
        <span style="--i: 2"></span>
        <span style="--i: 3"></span>
      </div>
    </div>
  <?php
    // Uranos Double
  } elseif ($land_status == 2) {
  ?>
    <div class="cube_uranos_double">
      <div class="top_uranos_double"></div>
      <div>
        <span style="--i: 0"></span>
        <span style="--i: 1"></span>
        <span style="--i: 2"></span>
        <span style="--i: 3"></span>
      </div>
    </div>
  <?php
    // Uranos Triple
  } elseif ($land_status == 3) {
  ?>
    <div class="cube_uranos_triple">
      <div class="top_uranos_triple"></div>
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
  <?php
  if ($land_status == 0) {
  ?>
    <div class="description_buttons">
      <button data-open-modal class="btn btn-effect" onclick="buy(<?= $idx ?>)">
        <span>구매하기</span>
      </button>
      <button data-open-modal class="btn btn-effect" onclick="back()">
        <span>취소</span>
      </button>
    </div>
  <?php
  } else {
  ?>
    <div class="description_buttons">
      <button data-open-modal class="btn btn-effect">
        <span>건설하기</span>
      </button>
      <button data-open-modal class="btn btn-effect" onclick="back()">
        <span>취소</span>
      </button>
    </div>
  <?php
  }
  ?>

  <!-- Description -->
  <div class="description">
    <div class="description_block">
      <div class="description_name">
        <div class="description_img">
          <img src="./images/tycoon_lv1.png" alt="tycoon">
        </div>
        <p>Lv1. 주택</p>
      </div>
      <div class="description_count">
        <h4><?php echo $building_lv1 ?></h4>
      </div>
    </div>
    <div class="description_block">
      <div class="description_name">
        <div class="description_img">
          <img src="./images/tycoon_lv2.png" alt="tycoon">
        </div>
        <p>Lv2. 학교</p>
      </div>
      <div class="description_count">
        <h4><?php echo $building_lv2 ?></h4>
      </div>
    </div>
    <div class="description_block">
      <div class="description_name">
        <div class="description_img">
          <img src="./images/tycoon_lv3.png" alt="tycoon">
        </div>
        <p>Lv3. 극장</p>
      </div>
      <div class="description_count">
        <h4><?php echo $building_lv3 ?></h4>
      </div>
    </div>
    <div class="description_block">
      <div class="description_name">
        <div class="description_img">
          <img src="./images/tycoon_lv4.png" alt="tycoon">
        </div>
        <p>Lv4. 병원</p>
      </div>
      <div class="description_count">
        <h4><?php echo $building_lv4 ?></h4>
      </div>
    </div>
    <div class="description_block">
      <div class="description_name">
        <div class="description_img">
          <img src="./images/tycoon_lv5.png" alt="tycoon">
        </div>
        <p>Lv5. 은행</p>
      </div>
      <div class="description_count">
        <h4><?php echo $building_lv5 ?></h4>
      </div>
    </div>
    <div class="description_block">
      <div class="description_name">
        <div class="description_img">
          <img src="./images/tycoon_lv6.png" alt="tycoon">
        </div>
        <p>Lv6. 대경기장</p>
      </div>
      <div class="description_count">
        <h4><?php echo $building_lv6 ?></h4>
      </div>
    </div>
    <div class="description_block">
      <div class="description_name">
        <div class="description_img">
          <img src="./images/tycoon_lv7.png" alt="tycoon">
        </div>
        <p>Lv7. 파르테논</p>
      </div>
      <div class="description_count">
        <h4><?php echo $building_lv7 ?></h4>
      </div>
    </div>
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

    // Move to uranos.php
    function back() {
      location.href = "uranos.php";
    }

    // Move to uranos_buy.php
    function buy(idx) {
      location.href = "uranos_buy.php?idx=" + idx;
    }
  </script>
</body>

<?php
// }
?>

</html>