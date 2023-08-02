<?php include("./brand.php"); ?>

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

    <?php include("./navbar.php")?>

    <!-- *************************************** -->
    <!-- Desktop                                 -->
    <!-- *************************************** -->
    <div class="tycoon-container-desktop">
      <div class="tycoon-row">
        <?php
        $query = "SELECT * FROM tb_tycoon_thalassa ORDER BY idx LIMIT 0, 1";
        $result = $con->query($query);

        while ($row = $result->fetch_assoc()) {
          $sold = 0;
          $idx = $row['idx'];
          $land_code = $row['land_code'];

          $member_idx = $row['member_idx'];
          $member_id = $row['member_id'];
          if ($member_idx == NULL && $member_id == NULL) {
            $sold = 0;
          } else {
            $sold = 1;
          }

          // Check if the land is sold or not
          if ($sold == 0) { ?>
            <div class="land-wrapper">
              <div class="land-for-sale" onclick="detail(<?= $idx ?>)">
                <span class="land-ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($sold == 1) { ?>
            <div class="land-wrapper">
              <div class="land-sold-thalassa" onclick="detail(<?= $idx ?>)">
                <span class="land-ownership"><?php echo $land_code ?></span>
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
          $sold = 0;
          $idx = $row['idx'];
          $land_code = $row['land_code'];

          $member_idx = $row['member_idx'];
          $member_id = $row['member_id'];
          if ($member_idx == NULL && $member_id == NULL) {
            $sold = 0;
          } else {
            $sold = 1;
          }

          // Check if the land is sold or not
          if ($sold == 0) { ?>
            <div class="land-wrapper">
              <div class="land-for-sale" onclick="detail(<?= $idx ?>)">
                <span class="land-ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($sold == 1) { ?>
            <div class="land-wrapper">
              <div class="land-sold-thalassa" onclick="detail(<?= $idx ?>)">
                <span class="land-ownership"><?php echo $land_code ?></span>
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
          $sold = 0;
          $idx = $row['idx'];
          $land_code = $row['land_code'];

          $member_idx = $row['member_idx'];
          $member_id = $row['member_id'];
          if ($member_idx == NULL && $member_id == NULL) {
            $sold = 0;
          } else {
            $sold = 1;
          }

          // Check if the land is sold or not
          if ($sold == 0) { ?>
            <div class="land-wrapper">
              <div class="land-for-sale" onclick="detail(<?= $idx ?>)">
                <span class="land-ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($sold == 1) { ?>
            <div class="land-wrapper">
              <div class="land-sold-thalassa" onclick="detail(<?= $idx ?>)">
                <span class="land-ownership"><?php echo $land_code ?></span>
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
          $sold = 0;
          $idx = $row['idx'];
          $land_code = $row['land_code'];

          $member_idx = $row['member_idx'];
          $member_id = $row['member_id'];
          if ($member_idx == NULL && $member_id == NULL) {
            $sold = 0;
          } else {
            $sold = 1;
          }

          // Check if the land is sold or not
          if ($sold == 0) { ?>
            <div class="land-wrapper">
              <div class="land-for-sale" onclick="detail(<?= $idx ?>)">
                <span class="land-ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($sold == 1) { ?>
            <div class="land-wrapper">
              <div class="land-sold-thalassa" onclick="detail(<?= $idx ?>)">
                <span class="land-ownership"><?php echo $land_code ?></span>
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
          $sold = 0;
          $idx = $row['idx'];
          $land_code = $row['land_code'];

          $member_idx = $row['member_idx'];
          $member_id = $row['member_id'];
          if ($member_idx == NULL && $member_id == NULL) {
            $sold = 0;
          } else {
            $sold = 1;
          }

          // Check if the land is sold or not
          if ($sold == 0) { ?>
            <div class="land-wrapper">
              <div class="land-for-sale" onclick="detail(<?= $idx ?>)">
                <span class="land-ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($sold == 1) { ?>
            <div class="land-wrapper">
              <div class="land-sold-thalassa" onclick="detail(<?= $idx ?>)">
                <span class="land-ownership"><?php echo $land_code ?></span>
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
          $sold = 0;
          $idx = $row['idx'];
          $land_code = $row['land_code'];

          $member_idx = $row['member_idx'];
          $member_id = $row['member_id'];
          if ($member_idx == NULL && $member_id == NULL) {
            $sold = 0;
          } else {
            $sold = 1;
          }

          // Check if the land is sold or not
          if ($sold == 0) { ?>
            <div class="land-wrapper">
              <div class="land-for-sale" onclick="detail(<?= $idx ?>)">
                <span class="land-ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($sold == 1) { ?>
            <div class="land-wrapper">
              <div class="land-sold-thalassa" onclick="detail(<?= $idx ?>)">
                <span class="land-ownership"><?php echo $land_code ?></span>
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
          $sold = 0;
          $idx = $row['idx'];
          $land_code = $row['land_code'];

          $member_idx = $row['member_idx'];
          $member_id = $row['member_id'];
          if ($member_idx == NULL && $member_id == NULL) {
            $sold = 0;
          } else {
            $sold = 1;
          }

          // Check if the land is sold or not
          if ($sold == 0) { ?>
            <div class="land-wrapper">
              <div class="land-for-sale" onclick="detail(<?= $idx ?>)">
                <span class="land-ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($sold == 1) { ?>
            <div class="land-wrapper">
              <div class="land-sold-thalassa" onclick="detail(<?= $idx ?>)">
                <span class="land-ownership"><?php echo $land_code ?></span>
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
          $sold = 0;
          $idx = $row['idx'];
          $land_code = $row['land_code'];

          $member_idx = $row['member_idx'];
          $member_id = $row['member_id'];
          if ($member_idx == NULL && $member_id == NULL) {
            $sold = 0;
          } else {
            $sold = 1;
          }

          // Check if the land is sold or not
          if ($sold == 0) { ?>
            <div class="land-wrapper">
              <div class="land-for-sale" onclick="detail(<?= $idx ?>)">
                <span class="land-ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($sold == 1) { ?>
            <div class="land-wrapper">
              <div class="land-sold-thalassa" onclick="detail(<?= $idx ?>)">
                <span class="land-ownership"><?php echo $land_code ?></span>
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
          $sold = 0;
          $idx = $row['idx'];
          $land_code = $row['land_code'];

          $member_idx = $row['member_idx'];
          $member_id = $row['member_id'];
          if ($member_idx == NULL && $member_id == NULL) {
            $sold = 0;
          } else {
            $sold = 1;
          }

          // Check if the land is sold or not
          if ($sold == 0) { ?>
            <div class="land-wrapper">
              <div class="land-for-sale" onclick="detail(<?= $idx ?>)">
                <span class="land-ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($sold == 1) { ?>
            <div class="land-wrapper">
              <div class="land-sold-thalassa" onclick="detail(<?= $idx ?>)">
                <span class="land-ownership"><?php echo $land_code ?></span>
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
          $sold = 0;
          $idx = $row['idx'];
          $land_code = $row['land_code'];

          $member_idx = $row['member_idx'];
          $member_id = $row['member_id'];
          if ($member_idx == NULL && $member_id == NULL) {
            $sold = 0;
          } else {
            $sold = 1;
          }

          // Check if the land is sold or not
          if ($sold == 0) { ?>
            <div class="land-wrapper">
              <div class="land-for-sale" onclick="detail(<?= $idx ?>)">
                <span class="land-ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($sold == 1) { ?>
            <div class="land-wrapper">
              <div class="land-sold-thalassa" onclick="detail(<?= $idx ?>)">
                <span class="land-ownership"><?php echo $land_code ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>
    </div>

    <!-- *************************************** -->
    <!-- Mobile                                  -->
    <!-- *************************************** -->
    <div class="tycoon-container-mobile">
      <div class="tycoon-row">
        <?php
        $query = "SELECT * FROM tb_tycoon_thalassa ORDER BY idx LIMIT 0, 5";
        $result = $con->query($query);

        while ($row = $result->fetch_assoc()) {
          $sold = 0;
          $idx = $row['idx'];
          $land_code = $row['land_code'];

          $member_idx = $row['member_idx'];
          $member_id = $row['member_id'];
          if ($member_idx == NULL && $member_id == NULL) {
            $sold = 0;
          } else {
            $sold = 1;
          }

          // Check if the land is sold or not
          if ($sold == 0) { ?>
            <div class="land-wrapper">
              <div class="land-for-sale" onclick="detail(<?= $idx ?>)">
                <span class="land-ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($sold == 1) { ?>
            <div class="land-wrapper">
              <div class="land-sold-thalassa" onclick="detail(<?= $idx ?>)">
                <span class="land-ownership"><?php echo $land_code ?></span>
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
          $sold = 0;
          $idx = $row['idx'];
          $land_code = $row['land_code'];

          $member_idx = $row['member_idx'];
          $member_id = $row['member_id'];
          if ($member_idx == NULL && $member_id == NULL) {
            $sold = 0;
          } else {
            $sold = 1;
          }

          // Check if the land is sold or not
          if ($sold == 0) { ?>
            <div class="land-wrapper">
              <div class="land-for-sale" onclick="detail(<?= $idx ?>)">
                <span class="land-ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($sold == 1) { ?>
            <div class="land-wrapper">
              <div class="land-sold-thalassa" onclick="detail(<?= $idx ?>)">
                <span class="land-ownership"><?php echo $land_code ?></span>
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
          $sold = 0;
          $idx = $row['idx'];
          $land_code = $row['land_code'];

          $member_idx = $row['member_idx'];
          $member_id = $row['member_id'];
          if ($member_idx == NULL && $member_id == NULL) {
            $sold = 0;
          } else {
            $sold = 1;
          }

          // Check if the land is sold or not
          if ($sold == 0) { ?>
            <div class="land-wrapper">
              <div class="land-for-sale" onclick="detail(<?= $idx ?>)">
                <span class="land-ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($sold == 1) { ?>
            <div class="land-wrapper">
              <div class="land-sold-thalassa" onclick="detail(<?= $idx ?>)">
                <span class="land-ownership"><?php echo $land_code ?></span>
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
          $sold = 0;
          $idx = $row['idx'];
          $land_code = $row['land_code'];

          $member_idx = $row['member_idx'];
          $member_id = $row['member_id'];
          if ($member_idx == NULL && $member_id == NULL) {
            $sold = 0;
          } else {
            $sold = 1;
          }

          // Check if the land is sold or not
          if ($sold == 0) { ?>
            <div class="land-wrapper">
              <div class="land-for-sale" onclick="detail(<?= $idx ?>)">
                <span class="land-ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($sold == 1) { ?>
            <div class="land-wrapper">
              <div class="land-sold-thalassa" onclick="detail(<?= $idx ?>)">
                <span class="land-ownership"><?php echo $land_code ?></span>
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
          $sold = 0;
          $idx = $row['idx'];
          $land_code = $row['land_code'];

          $member_idx = $row['member_idx'];
          $member_id = $row['member_id'];
          if ($member_idx == NULL && $member_id == NULL) {
            $sold = 0;
          } else {
            $sold = 1;
          }

          // Check if the land is sold or not
          if ($sold == 0) { ?>
            <div class="land-wrapper">
              <div class="land-for-sale" onclick="detail(<?= $idx ?>)">
                <span class="land-ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($sold == 1) { ?>
            <div class="land-wrapper">
              <div class="land-sold-thalassa" onclick="detail(<?= $idx ?>)">
                <span class="land-ownership"><?php echo $land_code ?></span>
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
          $sold = 0;
          $idx = $row['idx'];
          $land_code = $row['land_code'];

          $member_idx = $row['member_idx'];
          $member_id = $row['member_id'];
          if ($member_idx == NULL && $member_id == NULL) {
            $sold = 0;
          } else {
            $sold = 1;
          }

          // Check if the land is sold or not
          if ($sold == 0) { ?>
            <div class="land-wrapper">
              <div class="land-for-sale" onclick="detail(<?= $idx ?>)">
                <span class="land-ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($sold == 1) { ?>
            <div class="land-wrapper">
              <div class="land-sold-thalassa" onclick="detail(<?= $idx ?>)">
                <span class="land-ownership"><?php echo $land_code ?></span>
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
          $sold = 0;
          $idx = $row['idx'];
          $land_code = $row['land_code'];

          $member_idx = $row['member_idx'];
          $member_id = $row['member_id'];
          if ($member_idx == NULL && $member_id == NULL) {
            $sold = 0;
          } else {
            $sold = 1;
          }

          // Check if the land is sold or not
          if ($sold == 0) { ?>
            <div class="land-wrapper">
              <div class="land-for-sale" onclick="detail(<?= $idx ?>)">
                <span class="land-ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($sold == 1) { ?>
            <div class="land-wrapper">
              <div class="land-sold-thalassa" onclick="detail(<?= $idx ?>)">
                <span class="land-ownership"><?php echo $land_code ?></span>
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
          $sold = 0;
          $idx = $row['idx'];
          $land_code = $row['land_code'];

          $member_idx = $row['member_idx'];
          $member_id = $row['member_id'];
          if ($member_idx == NULL && $member_id == NULL) {
            $sold = 0;
          } else {
            $sold = 1;
          }

          // Check if the land is sold or not
          if ($sold == 0) { ?>
            <div class="land-wrapper">
              <div class="land-for-sale" onclick="detail(<?= $idx ?>)">
                <span class="land-ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($sold == 1) { ?>
            <div class="land-wrapper">
              <div class="land-sold-thalassa" onclick="detail(<?= $idx ?>)">
                <span class="land-ownership"><?php echo $land_code ?></span>
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
          $sold = 0;
          $idx = $row['idx'];
          $land_code = $row['land_code'];

          $member_idx = $row['member_idx'];
          $member_id = $row['member_id'];
          if ($member_idx == NULL && $member_id == NULL) {
            $sold = 0;
          } else {
            $sold = 1;
          }

          // Check if the land is sold or not
          if ($sold == 0) { ?>
            <div class="land-wrapper">
              <div class="land-for-sale" onclick="detail(<?= $idx ?>)">
                <span class="land-ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($sold == 1) { ?>
            <div class="land-wrapper">
              <div class="land-sold-thalassa" onclick="detail(<?= $idx ?>)">
                <span class="land-ownership"><?php echo $land_code ?></span>
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
          $sold = 0;
          $idx = $row['idx'];
          $land_code = $row['land_code'];

          $member_idx = $row['member_idx'];
          $member_id = $row['member_id'];
          if ($member_idx == NULL && $member_id == NULL) {
            $sold = 0;
          } else {
            $sold = 1;
          }

          // Check if the land is sold or not
          if ($sold == 0) { ?>
            <div class="land-wrapper">
              <div class="land-for-sale" onclick="detail(<?= $idx ?>)">
                <span class="land-ownership"><?php echo $land_code ?></span>
              </div>
            </div>
          <?php
          } elseif ($sold == 1) { ?>
            <div class="land-wrapper">
              <div class="land-sold-thalassa" onclick="detail(<?= $idx ?>)">
                <span class="land-ownership"><?php echo $land_code ?></span>
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

    // Detail Page
    function detail(idx) {
      location.href = "thalassa_detail.php?idx=" + idx;
    }
  </script>
</body>

</html>