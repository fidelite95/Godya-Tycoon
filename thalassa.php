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
  <title>TYCOON | THALASSA</title>
  <link rel="stylesheet" type="text/css" href="./tycoon.css" />
  <link rel="stylesheet" type="text/css" href="./transition.css" />
  <link rel="stylesheet" type="text/css" href="./navbar.css" />
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
    <!-- Dialog -->
    <!-- <dialog data-modal class="tycoon-modal">
      <p>This is a modal!</p>
      <button data-close-modal>Close</button>
    </dialog>
    <button data-open-modal>Open</button> -->

    <video id="vid" autoplay="autoplay" muted="muted" loop>
      <source src="./videos/tycoon_background2.mp4" type="video/mp4" />
    </video>

    <?php include("./navbar.php") ?>

    <!-- ────────────────────────────────── -->
    <!-- Desktop                            -->
    <!-- ────────────────────────────────── -->
    <div class="tycoon-container-desktop">
      <div class="tycoon-row">
        <?php
        $query = "SELECT * FROM tb_tycoon_thalassa ORDER BY idx LIMIT 0, 1";
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
              <div class="land_thalassa" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 2) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_double" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 3) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_triple" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>
      <div class="tycoon-row">
        <?php
        $query = "SELECT * FROM tb_tycoon_thalassa ORDER BY idx LIMIT 1, 2";
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
              <div class="land_thalassa" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 2) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_double" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 3) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_triple" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>
      <div class="tycoon-row">
        <?php
        $query = "SELECT * FROM tb_tycoon_thalassa ORDER BY idx LIMIT 3, 3";
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
              <div class="land_thalassa" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 2) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_double" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 3) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_triple" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>
      <div class="tycoon-row">
        <?php
        $query = "SELECT * FROM tb_tycoon_thalassa ORDER BY idx LIMIT 6, 4";
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
              <div class="land_thalassa" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 2) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_double" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 3) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_triple" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>
      <div class="tycoon-row">
        <?php
        $query = "SELECT * FROM tb_tycoon_thalassa ORDER BY idx LIMIT 10, 5";
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
              <div class="land_thalassa" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 2) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_double" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 3) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_triple" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>
      <div class="tycoon-row">
        <?php
        $query = "SELECT * FROM tb_tycoon_thalassa ORDER BY idx LIMIT 15, 6";
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
              <div class="land_thalassa" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 2) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_double" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 3) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_triple" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>
      <div class="tycoon-row">
        <?php
        $query = "SELECT * FROM tb_tycoon_thalassa ORDER BY idx LIMIT 21, 7";
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
              <div class="land_thalassa" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 2) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_double" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 3) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_triple" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>
      <div class="tycoon-row">
        <?php
        $query = "SELECT * FROM tb_tycoon_thalassa ORDER BY idx LIMIT 28, 8";
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
              <div class="land_thalassa" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 2) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_double" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 3) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_triple" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>
      <div class="tycoon-row">
        <?php
        $query = "SELECT * FROM tb_tycoon_thalassa ORDER BY idx LIMIT 36, 9";
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
              <div class="land_thalassa" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 2) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_double" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 3) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_triple" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>
      <div class="tycoon-row">
        <?php
        $query = "SELECT * FROM tb_tycoon_thalassa ORDER BY idx LIMIT 45, 10";
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
              <div class="land_thalassa" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 2) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_double" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 3) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_triple" onclick="detail(<?= $idx ?>)">
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
        $query = "SELECT * FROM tb_tycoon_thalassa ORDER BY idx LIMIT 0, 5";
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
              <div class="land_thalassa" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 2) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_double" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 3) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_triple" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>
      <div class="tycoon-row">
        <?php
        $query = "SELECT * FROM tb_tycoon_thalassa ORDER BY idx LIMIT 5, 6";
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
              <div class="land_thalassa" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 2) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_double" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 3) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_triple" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>
      <div class="tycoon-row">
        <?php
        $query = "SELECT * FROM tb_tycoon_thalassa ORDER BY idx LIMIT 11, 5";
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
              <div class="land_thalassa" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 2) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_double" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 3) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_triple" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>
      <div class="tycoon-row">
        <?php
        $query = "SELECT * FROM tb_tycoon_thalassa ORDER BY idx LIMIT 16, 6";
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
              <div class="land_thalassa" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 2) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_double" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 3) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_triple" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>
      <div class="tycoon-row">
        <?php
        $query = "SELECT * FROM tb_tycoon_thalassa ORDER BY idx LIMIT 22, 5";
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
              <div class="land_thalassa" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 2) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_double" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 3) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_triple" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>
      <div class="tycoon-row">
        <?php
        $query = "SELECT * FROM tb_tycoon_thalassa ORDER BY idx LIMIT 27, 6";
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
              <div class="land_thalassa" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 2) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_double" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 3) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_triple" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>
      <div class="tycoon-row">
        <?php
        $query = "SELECT * FROM tb_tycoon_thalassa ORDER BY idx LIMIT 33, 5";
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
              <div class="land_thalassa" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 2) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_double" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 3) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_triple" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>
      <div class="tycoon-row">
        <?php
        $query = "SELECT * FROM tb_tycoon_thalassa ORDER BY idx LIMIT 38, 6";
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
              <div class="land_thalassa" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 2) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_double" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 3) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_triple" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>
      <div class="tycoon-row">
        <?php
        $query = "SELECT * FROM tb_tycoon_thalassa ORDER BY idx LIMIT 44, 5";
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
              <div class="land_thalassa" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 2) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_double" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 3) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_triple" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>
      <div class="tycoon-row">
        <?php
        $query = "SELECT * FROM tb_tycoon_thalassa ORDER BY idx LIMIT 49, 6";
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
              <div class="land_thalassa" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 2) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_double" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 3) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_triple" onclick="detail(<?= $idx ?>)">
                <span class="land_ownership"><?php echo $land_code ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
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

    // Move to thalassa_detail.php
    function detail(idx) {
      location.href = "thalassa_detail.php?idx=" + idx;
    }
  </script>
</body>

<?php
// }
?>

</html>