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
$query = "SELECT * FROM tb_tycoon_thalassa WHERE idx='$idx'";
$result = $con->query($query);
$row = $result->fetch_assoc();

$land_code = $row['land_code'];
$land_status = $row['land_status'];
$member_id = $row['member_id'];
if ($member_id == NULL) {
  $member_id = '없음';
}
$price_gold = number_format($row['price_gold']);
$price_red = number_format($row['price_red']);

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
</head>

<body>
  <!-- Dialog -->
  <!-- <dialog data-modal class="tycoon-modal">
    <p>This is a modal!</p>
    <button data-close-modal>Close</button>
  </dialog> -->

  <?php include("./navbar.php") ?>

  <!-- Ownership -->
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
  if ($land_status == 0) {
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
  } elseif ($land_status == 1) {
    switch ($idx) {
        // Grade 1
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
        // Grade 2
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
        // Grade 3
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
        // Grade 4
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
        // Grade 5
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
        // Grade 6
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
        // Grade 7
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

  <!-- Buttons -->
  <?php
  if ($land_status == 0) {
  ?>
    <div class="description_buttons">
      <button data-open-modal class="btn btn-effect" onclick="rent(<?= $idx ?>)">
        <span>임대하기</span>
      </button>
      <button data-open-modal class="btn btn-effect" onclick="back()">
        <span>취소</span>
      </button>
    </div>
  <?php
  } else {
  ?>
    <div class="description_buttons">
      <button data-open-modal class="btn btn-effect" onclick="build(<?= $idx ?>)">
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

    // Move to thalassa.php
    function back() {
      location.href = "thalassa.php";
    }

    // Move to thalassa_rent.php
    function rent(idx) {
      location.href = "thalassa_rent.php?idx=" + idx;
    }

    // Move to thalassa_buy.php
    function build(idx) {
      location.href = "thalassa_build.php?idx=" + idx;
    }
  </script>
</body>

<?php
// }
?>

</html>