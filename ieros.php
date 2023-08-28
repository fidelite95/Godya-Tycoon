<?php
include("./brand.php");

session_start();
$login_id = $_SESSION['id'];
if (isset($_SESSION['id'])) {
  $login_status = true;
}

?>

<!DOCTYPE html>
<html>

<head>
  <?php include("./head.php") ?>
  <title>TYCOON | IEROS</title>
  <link rel="stylesheet" type="text/css" href="tycoon.css" />
  <link rel="stylesheet" type="text/css" href="transition.css" />
  <link rel="stylesheet" type="text/css" href="navbar.css" />
</head>

<?php
// if (!$login_status) {
//   echo "<script>alert('로그인 후에 이용 가능합니다.')</script>";
//   echo "<script>location.href='login.php';</script>";
// } else {

// Retrieving data from a database
$con = mysqli_connect("localhost", "gods2022", "wpdntm1004", "gods2022");
mysqli_query($con, 'SET NAMES utf8');
$con->query("SET NAMES 'UTF8'");

if ($con->connect_errno) {
  die('Connection Error : ' . $con->connect_error);
}
?>

<body>
  <div class="container">
    <video id="vid" autoplay="autoplay" muted="muted" loop>
      <source src="./videos/tycoon_background2.mp4" type="video/mp4" />
    </video>

    <?php include("./navbar.php") ?>

    <!-- ────────────────────────────────── -->
    <!-- Desktop                            -->
    <!-- ────────────────────────────────── -->
    <div class="tycoon-container-desktop">

      <!-- 1st Grade -->
      <div class="tycoon-row">
        <?php
        $query = "SELECT * FROM tycoon_ieros ORDER BY idx LIMIT 0, 1";
        $result = $con->query($query);

        while ($row = $result->fetch_assoc()) {
          $idx = $row['idx'];
          $land_code = $row['land_code'];
          $land_status = $row['land_status'];

          $member_idx = $row['member_idx'];
          $member_id = $row['member_id'];

          // According to the "land_status"
          // 0 : For sale
          // 1 : Sold
          if ($land_status == 0) { ?>
            <div class="land_wrapper">
              <div class="land_blank_1" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 1) { ?>
            <div class="land_wrapper">
              <div class="land_ieros_1" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>

      <!-- 2nd Grade -->
      <div class="tycoon-row">
        <?php
        $query = "SELECT * FROM tycoon_ieros ORDER BY idx LIMIT 1, 2";
        $result = $con->query($query);

        while ($row = $result->fetch_assoc()) {
          $idx = $row['idx'];
          $land_code = $row['land_code'];
          $land_status = $row['land_status'];

          $member_idx = $row['member_idx'];
          $member_id = $row['member_id'];

          // According to the "land_status"
          // 0 : For sale
          // 1 : Sold
          if ($land_status == 0) { ?>
            <div class="land_wrapper">
              <div class="land_blank_2" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 1) { ?>
            <div class="land_wrapper">
              <div class="land_ieros_2" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>

      <!-- 3rd Grade -->
      <div class="tycoon-row">
        <?php
        $query = "SELECT * FROM tycoon_ieros ORDER BY idx LIMIT 3, 3";
        $result = $con->query($query);

        while ($row = $result->fetch_assoc()) {
          $idx = $row['idx'];
          $land_code = $row['land_code'];
          $land_status = $row['land_status'];

          $member_idx = $row['member_idx'];
          $member_id = $row['member_id'];

          // According to the "land_status"
          // 0 : For sale
          // 1 : Sold
          if ($land_status == 0) { ?>
            <div class="land_wrapper">
              <div class="land_blank_3" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 1) { ?>
            <div class="land_wrapper">
              <div class="land_ieros_3" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>

      <!-- 4th Grade -->
      <div class="tycoon-row">
        <?php
        $query = "SELECT * FROM tycoon_ieros ORDER BY idx LIMIT 6, 4";
        $result = $con->query($query);

        while ($row = $result->fetch_assoc()) {
          $idx = $row['idx'];
          $land_code = $row['land_code'];
          $land_status = $row['land_status'];

          $member_idx = $row['member_idx'];
          $member_id = $row['member_id'];

          // According to the "land_status"
          // 0 : For sale
          // 1 : Sold
          if ($land_status == 0) { ?>
            <div class="land_wrapper">
              <div class="land_blank_4" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 1) { ?>
            <div class="land_wrapper">
              <div class="land_ieros_4" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>

      <!-- 5th Grade -->
      <div class="tycoon-row">
        <?php
        $query = "SELECT * FROM tycoon_ieros ORDER BY idx LIMIT 10, 5";
        $result = $con->query($query);

        while ($row = $result->fetch_assoc()) {
          $idx = $row['idx'];
          $land_code = $row['land_code'];
          $land_status = $row['land_status'];

          $member_idx = $row['member_idx'];
          $member_id = $row['member_id'];

          // According to the "land_status"
          // 0 : For sale
          // 1 : Sold
          if ($land_status == 0) { ?>
            <div class="land_wrapper">
              <div class="land_blank_5" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 1) { ?>
            <div class="land_wrapper">
              <div class="land_ieros_5" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>

      <!-- 6th Grade -->
      <div class="tycoon-row">
        <?php
        $query = "SELECT * FROM tycoon_ieros ORDER BY idx LIMIT 15, 6";
        $result = $con->query($query);

        while ($row = $result->fetch_assoc()) {
          $idx = $row['idx'];
          $land_code = $row['land_code'];
          $land_status = $row['land_status'];

          $member_idx = $row['member_idx'];
          $member_id = $row['member_id'];

          // According to the "land_status"
          // 0 : For sale
          // 1 : Sold
          if ($land_status == 0) { ?>
            <div class="land_wrapper">
              <div class="land_blank_6" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 1) { ?>
            <div class="land_wrapper">
              <div class="land_ieros_6" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>

      <!-- 7th Grade -->
      <div class="tycoon-row">
        <?php
        $query = "SELECT * FROM tycoon_ieros ORDER BY idx LIMIT 21, 7";
        $result = $con->query($query);

        while ($row = $result->fetch_assoc()) {
          $idx = $row['idx'];
          $land_code = $row['land_code'];
          $land_status = $row['land_status'];

          $member_idx = $row['member_idx'];
          $member_id = $row['member_id'];

          // According to the "land_status"
          // 0 : For sale
          // 1 : Sold
          if ($land_status == 0) { ?>
            <div class="land_wrapper">
              <div class="land_blank_7" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 1) { ?>
            <div class="land_wrapper">
              <div class="land_ieros_7" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>

      <!-- 8th Grade -->
      <div class="tycoon-row">
        <?php
        $query = "SELECT * FROM tycoon_ieros ORDER BY idx LIMIT 28, 8";
        $result = $con->query($query);

        while ($row = $result->fetch_assoc()) {
          $idx = $row['idx'];
          $land_code = $row['land_code'];
          $land_status = $row['land_status'];

          $member_idx = $row['member_idx'];
          $member_id = $row['member_id'];

          // According to the "land_status"
          // 0 : For sale
          // 1 : Sold
          if ($land_status == 0) { ?>
            <div class="land_wrapper">
              <div class="land_blank_8" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 1) { ?>
            <div class="land_wrapper">
              <div class="land_ieros_8" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>

      <!-- 9th Grade -->
      <div class="tycoon-row">
        <?php
        $query = "SELECT * FROM tycoon_ieros ORDER BY idx LIMIT 36, 9";
        $result = $con->query($query);

        while ($row = $result->fetch_assoc()) {
          $idx = $row['idx'];
          $land_code = $row['land_code'];
          $land_status = $row['land_status'];

          $member_idx = $row['member_idx'];
          $member_id = $row['member_id'];

          // According to the "land_status"
          // 0 : For sale
          // 1 : Sold
          if ($land_status == 0) { ?>
            <div class="land_wrapper">
              <div class="land_blank_9" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 1) { ?>
            <div class="land_wrapper">
              <div class="land_ieros_9" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>

      <!-- 10th Grade -->
      <div class="tycoon-row">
        <?php
        $query = "SELECT * FROM tycoon_ieros ORDER BY idx LIMIT 45, 10";
        $result = $con->query($query);

        while ($row = $result->fetch_assoc()) {
          $idx = $row['idx'];
          $land_code = $row['land_code'];
          $land_status = $row['land_status'];

          $member_idx = $row['member_idx'];
          $member_id = $row['member_id'];

          // According to the "land_status"
          // 0 : For sale
          // 1 : Sold
          if ($land_status == 0) { ?>
            <div class="land_wrapper">
              <div class="land_blank_10" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 1) { ?>
            <div class="land_wrapper">
              <div class="land_ieros_10" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>

    </div>

    <!-- ────────────────────────────────── -->
    <!-- Mobile                             -->
    <!-- ────────────────────────────────── -->
    <div class="tycoon-container-mobile">
      <div class="tycoon-row">
        <?php
        $query = "SELECT * FROM tycoon_ieros ORDER BY idx LIMIT 0, 5";
        $result = $con->query($query);

        while ($row = $result->fetch_assoc()) {
          $idx = $row['idx'];
          $land_code = $row['land_code'];
          $land_status = $row['land_status'];

          $member_idx = $row['member_idx'];
          $member_id = $row['member_id'];

          // According to the "land_status"
          // 0 : For sale
          // 1 : Uranos Normal
          // 2 : Uranos Double
          // 3 : Uranos Triple
          if ($land_status == 0) { ?>
            <div class="land_wrapper">
              <div class="land_blank" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 1) { ?>
            <div class="land_wrapper">
              <div class="land_ieros" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 2) { ?>
            <div class="land_wrapper">
              <div class="land_ieros_double" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 3) { ?>
            <div class="land_wrapper">
              <div class="land_ieros_triple" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>
      <div class="tycoon-row">
        <?php
        $query = "SELECT * FROM tycoon_ieros ORDER BY idx LIMIT 5, 6";
        $result = $con->query($query);

        while ($row = $result->fetch_assoc()) {
          $idx = $row['idx'];
          $land_code = $row['land_code'];
          $land_status = $row['land_status'];

          $member_idx = $row['member_idx'];
          $member_id = $row['member_id'];

          // According to the "land_status"
          // 0 : For sale
          // 1 : Uranos Normal
          // 2 : Uranos Double
          // 3 : Uranos Triple
          if ($land_status == 0) { ?>
            <div class="land_wrapper">
              <div class="land_blank" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 1) { ?>
            <div class="land_wrapper">
              <div class="land_ieros" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 2) { ?>
            <div class="land_wrapper">
              <div class="land_ieros_double" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 3) { ?>
            <div class="land_wrapper">
              <div class="land_ieros_triple" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>
      <div class="tycoon-row">
        <?php
        $query = "SELECT * FROM tycoon_ieros ORDER BY idx LIMIT 11, 5";
        $result = $con->query($query);

        while ($row = $result->fetch_assoc()) {
          $idx = $row['idx'];
          $land_code = $row['land_code'];
          $land_status = $row['land_status'];

          $member_idx = $row['member_idx'];
          $member_id = $row['member_id'];

          // According to the "land_status"
          // 0 : For sale
          // 1 : Uranos Normal
          // 2 : Uranos Double
          // 3 : Uranos Triple
          if ($land_status == 0) { ?>
            <div class="land_wrapper">
              <div class="land_blank" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 1) { ?>
            <div class="land_wrapper">
              <div class="land_ieros" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 2) { ?>
            <div class="land_wrapper">
              <div class="land_ieros_double" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 3) { ?>
            <div class="land_wrapper">
              <div class="land_ieros_triple" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>
      <div class="tycoon-row">
        <?php
        $query = "SELECT * FROM tycoon_ieros ORDER BY idx LIMIT 16, 6";
        $result = $con->query($query);

        while ($row = $result->fetch_assoc()) {
          $idx = $row['idx'];
          $land_code = $row['land_code'];
          $land_status = $row['land_status'];

          $member_idx = $row['member_idx'];
          $member_id = $row['member_id'];

          // According to the "land_status"
          // 0 : For sale
          // 1 : Uranos Normal
          // 2 : Uranos Double
          // 3 : Uranos Triple
          if ($land_status == 0) { ?>
            <div class="land_wrapper">
              <div class="land_blank" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 1) { ?>
            <div class="land_wrapper">
              <div class="land_ieros" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 2) { ?>
            <div class="land_wrapper">
              <div class="land_ieros_double" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 3) { ?>
            <div class="land_wrapper">
              <div class="land_ieros_triple" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>
      <div class="tycoon-row">
        <?php
        $query = "SELECT * FROM tycoon_ieros ORDER BY idx LIMIT 22, 5";
        $result = $con->query($query);

        while ($row = $result->fetch_assoc()) {
          $idx = $row['idx'];
          $land_code = $row['land_code'];
          $land_status = $row['land_status'];

          $member_idx = $row['member_idx'];
          $member_id = $row['member_id'];

          // According to the "land_status"
          // 0 : For sale
          // 1 : Uranos Normal
          // 2 : Uranos Double
          // 3 : Uranos Triple
          if ($land_status == 0) { ?>
            <div class="land_wrapper">
              <div class="land_blank" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 1) { ?>
            <div class="land_wrapper">
              <div class="land_ieros" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 2) { ?>
            <div class="land_wrapper">
              <div class="land_ieros_double" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 3) { ?>
            <div class="land_wrapper">
              <div class="land_ieros_triple" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>
      <div class="tycoon-row">
        <?php
        $query = "SELECT * FROM tycoon_ieros ORDER BY idx LIMIT 27, 6";
        $result = $con->query($query);

        while ($row = $result->fetch_assoc()) {
          $idx = $row['idx'];
          $land_code = $row['land_code'];
          $land_status = $row['land_status'];

          $member_idx = $row['member_idx'];
          $member_id = $row['member_id'];

          // According to the "land_status"
          // 0 : For sale
          // 1 : Uranos Normal
          // 2 : Uranos Double
          // 3 : Uranos Triple
          if ($land_status == 0) { ?>
            <div class="land_wrapper">
              <div class="land_blank" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 1) { ?>
            <div class="land_wrapper">
              <div class="land_ieros" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 2) { ?>
            <div class="land_wrapper">
              <div class="land_ieros_double" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 3) { ?>
            <div class="land_wrapper">
              <div class="land_ieros_triple" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>
      <div class="tycoon-row">
        <?php
        $query = "SELECT * FROM tycoon_ieros ORDER BY idx LIMIT 33, 5";
        $result = $con->query($query);

        while ($row = $result->fetch_assoc()) {
          $idx = $row['idx'];
          $land_code = $row['land_code'];
          $land_status = $row['land_status'];

          $member_idx = $row['member_idx'];
          $member_id = $row['member_id'];

          // According to the "land_status"
          // 0 : For sale
          // 1 : Uranos Normal
          // 2 : Uranos Double
          // 3 : Uranos Triple
          if ($land_status == 0) { ?>
            <div class="land_wrapper">
              <div class="land_blank" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 1) { ?>
            <div class="land_wrapper">
              <div class="land_ieros" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 2) { ?>
            <div class="land_wrapper">
              <div class="land_ieros_double" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 3) { ?>
            <div class="land_wrapper">
              <div class="land_ieros_triple" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>
      <div class="tycoon-row">
        <?php
        $query = "SELECT * FROM tycoon_ieros ORDER BY idx LIMIT 38, 6";
        $result = $con->query($query);

        while ($row = $result->fetch_assoc()) {
          $idx = $row['idx'];
          $land_code = $row['land_code'];
          $land_status = $row['land_status'];

          $member_idx = $row['member_idx'];
          $member_id = $row['member_id'];

          // According to the "land_status"
          // 0 : For sale
          // 1 : Uranos Normal
          // 2 : Uranos Double
          // 3 : Uranos Triple
          if ($land_status == 0) { ?>
            <div class="land_wrapper">
              <div class="land_blank" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 1) { ?>
            <div class="land_wrapper">
              <div class="land_ieros" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 2) { ?>
            <div class="land_wrapper">
              <div class="land_ieros_double" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 3) { ?>
            <div class="land_wrapper">
              <div class="land_ieros_triple" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>
      <div class="tycoon-row">
        <?php
        $query = "SELECT * FROM tycoon_ieros ORDER BY idx LIMIT 44, 5";
        $result = $con->query($query);

        while ($row = $result->fetch_assoc()) {
          $idx = $row['idx'];
          $land_code = $row['land_code'];
          $land_status = $row['land_status'];

          $member_idx = $row['member_idx'];
          $member_id = $row['member_id'];

          // According to the "land_status"
          // 0 : For sale
          // 1 : Uranos Normal
          // 2 : Uranos Double
          // 3 : Uranos Triple
          if ($land_status == 0) { ?>
            <div class="land_wrapper">
              <div class="land_blank" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 1) { ?>
            <div class="land_wrapper">
              <div class="land_ieros" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 2) { ?>
            <div class="land_wrapper">
              <div class="land_ieros_double" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 3) { ?>
            <div class="land_wrapper">
              <div class="land_ieros_triple" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>
      <div class="tycoon-row">
        <?php
        $query = "SELECT * FROM tycoon_ieros ORDER BY idx LIMIT 49, 6";
        $result = $con->query($query);

        while ($row = $result->fetch_assoc()) {
          $idx = $row['idx'];
          $land_code = $row['land_code'];
          $land_status = $row['land_status'];

          $member_idx = $row['member_idx'];
          $member_id = $row['member_id'];

          // According to the "land_status"
          // 0 : For sale
          // 1 : Uranos Normal
          // 2 : Uranos Double
          // 3 : Uranos Triple
          if ($land_status == 0) { ?>
            <div class="land_wrapper">
              <div class="land_blank" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 1) { ?>
            <div class="land_wrapper">
              <div class="land_ieros" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 2) { ?>
            <div class="land_wrapper">
              <div class="land_ieros_double" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 3) { ?>
            <div class="land_wrapper">
              <div class="land_ieros_triple" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
            <?php
          }
        } ?>0
      </div>
    </div>
  </div>

  <script>
    // Move to ieros_detail.php
    function detail(idx) {
      location.href = "ieros_detail.php?idx=" + idx;
    }
  </script>
</body>

<?php
// }
?>

</html>