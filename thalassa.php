<?php
include("./login_status.php");
include("./brand.php");
include("./connection.php");

// if (!$login_status) {
//   echo "<script>alert('로그인 후에 이용 가능합니다.')</script>";
//   echo "<script>location.href='login.php';</script>";
// } else {
?>

<!DOCTYPE html>
<html>

<head>
  <?php
  include("./head.php");
  ?>
  <title>TYCOON | THALASSA</title>
  <link rel="stylesheet" type="text/css" href="tycoon.css" />
  <link rel="stylesheet" type="text/css" href="transition.css" />
  <link rel="stylesheet" type="text/css" href="navbar.css" />
</head>

<body id="body" style="opacity: 0">

  <div class="container">

    <?php
    include("./navbar.php");
    ?>

    <!-- 데스크탑 -->
    <!-- Desktop -->
    <div class="tycoon-container-desktop">

      <!-- 1등급 영토 -->
      <!-- 1st Grade -->
      <div class="tycoon-row">
        <?php
        # land_code
        # 001
        $query = "SELECT * FROM tycoon_thalassa ORDER BY idx LIMIT 0, 1";
        $result = $con->query($query);

        while ($row = $result->fetch_assoc()) {
          $idx = $row['idx'];
          $land_code = $row['land_code'];
          $land_status = $row['land_status'];
          $member_id = $row['member_id'];
          $member_nick = $row['member_nick'];

          # "land_status"에 따른 영토 상태
          # Status of the territory according to "land_status"
          # 0 : 판매중 (For sale)
          # 1 : 판매됨 (Sold)
          if ($land_status == 0) { ?>
            <div class="land_wrapper">
              <div class="land_blank_1" onclick="detail(<?php echo $idx; ?>)">
                <span class="land_ownership"><?php echo $land_code; ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 1) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_1" onclick="detail(<?php echo $idx; ?>)">
                <span class="land_ownership"><?php echo $land_code; ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>

      <!-- 2등급 영토 -->
      <!-- 2nd Grade -->
      <div class="tycoon-row">
        <?php
        # land_code
        # 002 - 003
        $query = "SELECT * FROM tycoon_thalassa ORDER BY idx LIMIT 1, 2";
        $result = $con->query($query);

        while ($row = $result->fetch_assoc()) {
          $idx = $row['idx'];
          $land_code = $row['land_code'];
          $land_status = $row['land_status'];
          $member_id = $row['member_id'];
          $member_nick = $row['member_nick'];

          # "land_status"에 따른 영토 상태
          # Status of the territory according to "land_status"
          # 0 : 판매중 (For sale)
          # 1 : 판매됨 (Sold)
          if ($land_status == 0) { ?>
            <div class="land_wrapper">
              <div class="land_blank_2" onclick="detail(<?php echo $idx; ?>)">
                <span class="land_ownership"><?php echo $land_code; ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 1) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_2" onclick="detail(<?php echo $idx; ?>)">
                <span class="land_ownership"><?php echo $land_code; ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>

      <!-- 3등급 영토 -->
      <!-- 3rd Grade -->
      <div class="tycoon-row">
        <?php
        # land_code
        # 004 - 006
        $query = "SELECT * FROM tycoon_thalassa ORDER BY idx LIMIT 3, 3";
        $result = $con->query($query);

        while ($row = $result->fetch_assoc()) {
          $idx = $row['idx'];
          $land_code = $row['land_code'];
          $land_status = $row['land_status'];
          $member_id = $row['member_id'];
          $member_nick = $row['member_nick'];

          # "land_status"에 따른 영토 상태
          # Status of the territory according to "land_status"
          # 0 : 판매중 (For sale)
          # 1 : 판매됨 (Sold)
          if ($land_status == 0) { ?>
            <div class="land_wrapper">
              <div class="land_blank_3" onclick="detail(<?php echo $idx; ?>)">
                <span class="land_ownership"><?php echo $land_code; ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 1) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_3" onclick="detail(<?php echo $idx; ?>)">
                <span class="land_ownership"><?php echo $land_code; ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>

      <!-- 4등급 영토 -->
      <!-- 4th Grade -->
      <div class="tycoon-row">
        <?php
        # land_code
        # 007 - 010
        $query = "SELECT * FROM tycoon_thalassa ORDER BY idx LIMIT 6, 4";
        $result = $con->query($query);

        while ($row = $result->fetch_assoc()) {
          $idx = $row['idx'];
          $land_code = $row['land_code'];
          $land_status = $row['land_status'];
          $member_id = $row['member_id'];
          $member_nick = $row['member_nick'];

          # "land_status"에 따른 영토 상태
          # Status of the territory according to "land_status"
          # 0 : 판매중 (For sale)
          # 1 : 판매됨 (Sold)
          if ($land_status == 0) { ?>
            <div class="land_wrapper">
              <div class="land_blank_4" onclick="detail(<?php echo $idx; ?>)">
                <span class="land_ownership"><?php echo $land_code; ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 1) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_4" onclick="detail(<?php echo $idx; ?>)">
                <span class="land_ownership"><?php echo $land_code; ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>

      <!-- 5등급 영토 -->
      <!-- 5th Grade -->
      <div class="tycoon-row">
        <?php
        # land_code
        # 011 - 015
        $query = "SELECT * FROM tycoon_thalassa ORDER BY idx LIMIT 10, 5";
        $result = $con->query($query);

        while ($row = $result->fetch_assoc()) {
          $idx = $row['idx'];
          $land_code = $row['land_code'];
          $land_status = $row['land_status'];
          $member_id = $row['member_id'];
          $member_nick = $row['member_nick'];

          # "land_status"에 따른 영토 상태
          # Status of the territory according to "land_status"
          # 0 : 판매중 (For sale)
          # 1 : 판매됨 (Sold)
          if ($land_status == 0) { ?>
            <div class="land_wrapper">
              <div class="land_blank_5" onclick="detail(<?php echo $idx; ?>)">
                <span class="land_ownership"><?php echo $land_code; ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 1) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_5" onclick="detail(<?php echo $idx; ?>)">
                <span class="land_ownership"><?php echo $land_code; ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>

      <!-- 6등급 영토 -->
      <!-- 6th Grade -->
      <div class="tycoon-row">
        <?php
        # land_code
        # 016 - 021
        $query = "SELECT * FROM tycoon_thalassa ORDER BY idx LIMIT 15, 6";
        $result = $con->query($query);

        while ($row = $result->fetch_assoc()) {
          $idx = $row['idx'];
          $land_code = $row['land_code'];
          $land_status = $row['land_status'];
          $member_id = $row['member_id'];
          $member_nick = $row['member_nick'];

          # "land_status"에 따른 영토 상태
          # Status of the territory according to "land_status"
          # 0 : 판매중 (For sale)
          # 1 : 판매됨 (Sold)
          if ($land_status == 0) { ?>
            <div class="land_wrapper">
              <div class="land_blank_6" onclick="detail(<?php echo $idx; ?>)">
                <span class="land_ownership"><?php echo $land_code; ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 1) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_6" onclick="detail(<?php echo $idx; ?>)">
                <span class="land_ownership"><?php echo $land_code; ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>

      <!-- 7등급 영토 -->
      <!-- 7th Grade -->
      <div class="tycoon-row">
        <?php
        # land_code
        # 022 - 028
        $query = "SELECT * FROM tycoon_thalassa ORDER BY idx LIMIT 21, 7";
        $result = $con->query($query);

        while ($row = $result->fetch_assoc()) {
          $idx = $row['idx'];
          $land_code = $row['land_code'];
          $land_status = $row['land_status'];
          $member_id = $row['member_id'];
          $member_nick = $row['member_nick'];

          # "land_status"에 따른 영토 상태
          # Status of the territory according to "land_status"
          # 0 : 판매중 (For sale)
          # 1 : 판매됨 (Sold)
          if ($land_status == 0) { ?>
            <div class="land_wrapper">
              <div class="land_blank_7" onclick="detail(<?php echo $idx; ?>)">
                <span class="land_ownership"><?php echo $land_code; ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 1) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_7" onclick="detail(<?php echo $idx; ?>)">
                <span class="land_ownership"><?php echo $land_code; ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>

      <!-- 8등급 영토 -->
      <!-- 8th Grade -->
      <div class="tycoon-row">
        <?php
        # land_code
        # 029 - 036
        $query = "SELECT * FROM tycoon_thalassa ORDER BY idx LIMIT 28, 8";
        $result = $con->query($query);

        while ($row = $result->fetch_assoc()) {
          $idx = $row['idx'];
          $land_code = $row['land_code'];
          $land_status = $row['land_status'];
          $member_id = $row['member_id'];
          $member_nick = $row['member_nick'];

          # "land_status"에 따른 영토 상태
          # Status of the territory according to "land_status"
          # 0 : 판매중 (For sale)
          # 1 : 판매됨 (Sold)
          if ($land_status == 0) { ?>
            <div class="land_wrapper">
              <div class="land_blank_8" onclick="detail(<?php echo $idx; ?>)">
                <span class="land_ownership"><?php echo $land_code; ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 1) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_8" onclick="detail(<?php echo $idx; ?>)">
                <span class="land_ownership"><?php echo $land_code; ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>

      <!-- 9등급 영토 -->
      <!-- 9th Grade -->
      <div class="tycoon-row">
        <?php
        # land_code
        # 037 - 045
        $query = "SELECT * FROM tycoon_thalassa ORDER BY idx LIMIT 36, 9";
        $result = $con->query($query);

        while ($row = $result->fetch_assoc()) {
          $idx = $row['idx'];
          $land_code = $row['land_code'];
          $land_status = $row['land_status'];
          $member_id = $row['member_id'];
          $member_nick = $row['member_nick'];

          # "land_status"에 따른 영토 상태
          # Status of the territory according to "land_status"
          # 0 : 판매중 (For sale)
          # 1 : 판매됨 (Sold)
          if ($land_status == 0) { ?>
            <div class="land_wrapper">
              <div class="land_blank_9" onclick="detail(<?php echo $idx; ?>)">
                <span class="land_ownership"><?php echo $land_code; ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 1) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_9" onclick="detail(<?php echo $idx; ?>)">
                <span class="land_ownership"><?php echo $land_code; ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>

      <!-- 10등급 영토 -->
      <!-- 10th Grade -->
      <div class="tycoon-row">
        <?php
        # land_code
        # 046 - 055
        $query = "SELECT * FROM tycoon_thalassa ORDER BY idx LIMIT 45, 10";
        $result = $con->query($query);

        while ($row = $result->fetch_assoc()) {
          $idx = $row['idx'];
          $land_code = $row['land_code'];
          $land_status = $row['land_status'];
          $member_id = $row['member_id'];
          $member_nick = $row['member_nick'];

          # "land_status"에 따른 영토 상태
          # Status of the territory according to "land_status"
          # 0 : 판매중 (For sale)
          # 1 : 판매됨 (Sold)
          if ($land_status == 0) { ?>
            <div class="land_wrapper">
              <div class="land_blank_10" onclick="detail(<?php echo $idx; ?>)">
                <span class="land_ownership"><?php echo $land_code; ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 1) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_10" onclick="detail(<?php echo $idx; ?>)">
                <span class="land_ownership"><?php echo $land_code; ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>

    </div>

    <!-- 모바일 -->
    <!-- Mobile -->
    <div class="tycoon-container-mobile">

      <!-- 1등급 영토 -->
      <!-- 1st Grade -->
      <div class="tycoon-row">
        <?php
        # land_code
        # 001
        $query = "SELECT * FROM tycoon_thalassa ORDER BY idx LIMIT 0, 5";
        $result = $con->query($query);

        while ($row = $result->fetch_assoc()) {
          $idx = $row['idx'];
          $land_code = $row['land_code'];
          $land_status = $row['land_status'];
          $member_id = $row['member_id'];
          $member_nick = $row['member_nick'];

          # "land_status"에 따른 영토 상태
          # Status of the territory according to "land_status"
          # 0 : 판매중 (For sale)
          # 1 : 판매됨 (Sold)
          if ($land_status == 0) { ?>
            <div class="land_wrapper">
              <div class="land_blank_1" onclick="detail(<?php echo $idx; ?>)">
                <span class="land_ownership"><?php echo $land_code; ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 1) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_1" onclick="detail(<?php echo $idx; ?>)">
                <span class="land_ownership"><?php echo $land_code; ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>

      <!-- 2등급 영토 -->
      <!-- 2nd Grade -->
      <div class="tycoon-row">
        <?php
        # land_code
        # 002 - 003
        $query = "SELECT * FROM tycoon_thalassa ORDER BY idx LIMIT 5, 6";
        $result = $con->query($query);

        while ($row = $result->fetch_assoc()) {
          $idx = $row['idx'];
          $land_code = $row['land_code'];
          $land_status = $row['land_status'];
          $member_id = $row['member_id'];
          $member_nick = $row['member_nick'];

          # "land_status"에 따른 영토 상태
          # Status of the territory according to "land_status"
          # 0 : 판매중 (For sale)
          # 1 : 판매됨 (Sold)
          if ($land_status == 0) { ?>
            <div class="land_wrapper">
              <div class="land_blank_2" onclick="detail(<?php echo $idx; ?>)">
                <span class="land_ownership"><?php echo $land_code; ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 1) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_2" onclick="detail(<?php echo $idx; ?>)">
                <span class="land_ownership"><?php echo $land_code; ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>

      <!-- 3등급 영토 -->
      <!-- 3rd Grade -->
      <div class="tycoon-row">
        <?php
        # land_code
        # 004 - 006
        $query = "SELECT * FROM tycoon_thalassa ORDER BY idx LIMIT 11, 5";
        $result = $con->query($query);

        while ($row = $result->fetch_assoc()) {
          $idx = $row['idx'];
          $land_code = $row['land_code'];
          $land_status = $row['land_status'];
          $member_id = $row['member_id'];
          $member_nick = $row['member_nick'];

          # "land_status"에 따른 영토 상태
          # Status of the territory according to "land_status"
          # 0 : 판매중 (For sale)
          # 1 : 판매됨 (Sold)
          if ($land_status == 0) { ?>
            <div class="land_wrapper">
              <div class="land_blank_3" onclick="detail(<?php echo $idx; ?>)">
                <span class="land_ownership"><?php echo $land_code; ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 1) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_3" onclick="detail(<?php echo $idx; ?>)">
                <span class="land_ownership"><?php echo $land_code; ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>

      <!-- 4등급 영토 -->
      <!-- 4th Grade -->
      <div class="tycoon-row">
        <?php
        # land_code
        # 007 - 010
        $query = "SELECT * FROM tycoon_thalassa ORDER BY idx LIMIT 16, 6";
        $result = $con->query($query);

        while ($row = $result->fetch_assoc()) {
          $idx = $row['idx'];
          $land_code = $row['land_code'];
          $land_status = $row['land_status'];
          $member_id = $row['member_id'];
          $member_nick = $row['member_nick'];

          # "land_status"에 따른 영토 상태
          # Status of the territory according to "land_status"
          # 0 : 판매중 (For sale)
          # 1 : 판매됨 (Sold)
          if ($land_status == 0) { ?>
            <div class="land_wrapper">
              <div class="land_blank_4" onclick="detail(<?php echo $idx; ?>)">
                <span class="land_ownership"><?php echo $land_code; ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 1) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_4" onclick="detail(<?php echo $idx; ?>)">
                <span class="land_ownership"><?php echo $land_code; ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>

      <!-- 5등급 영토 -->
      <!-- 5th Grade -->
      <div class="tycoon-row">
        <?php
        # land_code
        # 011 - 015
        $query = "SELECT * FROM tycoon_thalassa ORDER BY idx LIMIT 22, 5";
        $result = $con->query($query);

        while ($row = $result->fetch_assoc()) {
          $idx = $row['idx'];
          $land_code = $row['land_code'];
          $land_status = $row['land_status'];
          $member_id = $row['member_id'];
          $member_nick = $row['member_nick'];

          # "land_status"에 따른 영토 상태
          # Status of the territory according to "land_status"
          # 0 : 판매중 (For sale)
          # 1 : 판매됨 (Sold)
          if ($land_status == 0) { ?>
            <div class="land_wrapper">
              <div class="land_blank_5" onclick="detail(<?php echo $idx; ?>)">
                <span class="land_ownership"><?php echo $land_code; ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 1) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_5" onclick="detail(<?php echo $idx; ?>)">
                <span class="land_ownership"><?php echo $land_code; ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>

      <!-- 6등급 영토 -->
      <!-- 6th Grade -->
      <div class="tycoon-row">
        <?php
        # land_code
        # 016 - 021
        $query = "SELECT * FROM tycoon_thalassa ORDER BY idx LIMIT 27, 6";
        $result = $con->query($query);

        while ($row = $result->fetch_assoc()) {
          $idx = $row['idx'];
          $land_code = $row['land_code'];
          $land_status = $row['land_status'];
          $member_id = $row['member_id'];
          $member_nick = $row['member_nick'];

          # "land_status"에 따른 영토 상태
          # Status of the territory according to "land_status"
          # 0 : 판매중 (For sale)
          # 1 : 판매됨 (Sold)
          if ($land_status == 0) { ?>
            <div class="land_wrapper">
              <div class="land_blank_6" onclick="detail(<?php echo $idx; ?>)">
                <span class="land_ownership"><?php echo $land_code; ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 1) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_6" onclick="detail(<?php echo $idx; ?>)">
                <span class="land_ownership"><?php echo $land_code; ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>

      <!-- 7등급 영토 -->
      <!-- 7th Grade -->
      <div class="tycoon-row">
        <?php
        # land_code
        # 022 - 028
        $query = "SELECT * FROM tycoon_thalassa ORDER BY idx LIMIT 33, 5";
        $result = $con->query($query);

        while ($row = $result->fetch_assoc()) {
          $idx = $row['idx'];
          $land_code = $row['land_code'];
          $land_status = $row['land_status'];
          $member_id = $row['member_id'];
          $member_nick = $row['member_nick'];

          # "land_status"에 따른 영토 상태
          # Status of the territory according to "land_status"
          # 0 : 판매중 (For sale)
          # 1 : 판매됨 (Sold)
          if ($land_status == 0) { ?>
            <div class="land_wrapper">
              <div class="land_blank_7" onclick="detail(<?php echo $idx; ?>)">
                <span class="land_ownership"><?php echo $land_code; ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 1) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_7" onclick="detail(<?php echo $idx; ?>)">
                <span class="land_ownership"><?php echo $land_code; ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>

      <!-- 8등급 영토 -->
      <!-- 8th Grade -->
      <div class="tycoon-row">
        <?php
        # land_code
        # 029 - 036
        $query = "SELECT * FROM tycoon_thalassa ORDER BY idx LIMIT 38, 6";
        $result = $con->query($query);

        while ($row = $result->fetch_assoc()) {
          $idx = $row['idx'];
          $land_code = $row['land_code'];
          $land_status = $row['land_status'];
          $member_id = $row['member_id'];
          $member_nick = $row['member_nick'];

          # "land_status"에 따른 영토 상태
          # Status of the territory according to "land_status"
          # 0 : 판매중 (For sale)
          # 1 : 판매됨 (Sold)
          if ($land_status == 0) { ?>
            <div class="land_wrapper">
              <div class="land_blank_8" onclick="detail(<?php echo $idx; ?>)">
                <span class="land_ownership"><?php echo $land_code; ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 1) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_8" onclick="detail(<?php echo $idx; ?>)">
                <span class="land_ownership"><?php echo $land_code; ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>

      <!-- 9등급 영토 -->
      <!-- 9th Grade -->
      <div class="tycoon-row">
        <?php
        # land_code
        # 037 - 045
        $query = "SELECT * FROM tycoon_thalassa ORDER BY idx LIMIT 44, 5";
        $result = $con->query($query);

        while ($row = $result->fetch_assoc()) {
          $idx = $row['idx'];
          $land_code = $row['land_code'];
          $land_status = $row['land_status'];
          $member_id = $row['member_id'];
          $member_nick = $row['member_nick'];

          # "land_status"에 따른 영토 상태
          # Status of the territory according to "land_status"
          # 0 : 판매중 (For sale)
          # 1 : 판매됨 (Sold)
          if ($land_status == 0) { ?>
            <div class="land_wrapper">
              <div class="land_blank_9" onclick="detail(<?php echo $idx; ?>)">
                <span class="land_ownership"><?php echo $land_code; ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 1) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_9" onclick="detail(<?php echo $idx; ?>)">
                <span class="land_ownership"><?php echo $land_code; ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>

      <!-- 10등급 영토 -->
      <!-- 10th Grade -->
      <div class="tycoon-row">
        <?php
        # land_code
        # 046 - 055
        $query = "SELECT * FROM tycoon_thalassa ORDER BY idx LIMIT 49, 6";
        $result = $con->query($query);

        while ($row = $result->fetch_assoc()) {
          $idx = $row['idx'];
          $land_code = $row['land_code'];
          $land_status = $row['land_status'];
          $member_id = $row['member_id'];
          $member_nick = $row['member_nick'];

          # "land_status"에 따른 영토 상태
          # Status of the territory according to "land_status"
          # 0 : 판매중 (For sale)
          # 1 : 판매됨 (Sold)
          if ($land_status == 0) { ?>
            <div class="land_wrapper">
              <div class="land_blank_10" onclick="detail(<?php echo $idx; ?>)">
                <span class="land_ownership"><?php echo $land_code; ?></span>
              </div>
            </div>
          <?php
          } elseif ($land_status == 1) { ?>
            <div class="land_wrapper">
              <div class="land_thalassa_10" onclick="detail(<?php echo $idx; ?>)">
                <span class="land_ownership"><?php echo $land_code; ?></span>
              </div>
            </div>
        <?php
          }
        } ?>
      </div>

    </div>

  </div>

  <!-- JS 스크립트 -->
  <!-- JS Script -->
  <script>
    /*
     * 페이드인 효과
     * Fade-In Effect
     */
    var opacity = 0;
    var intervalID = 0;

    function show() {
      var body = document.getElementById('body');
      opacity = Number(window.getComputedStyle(body).getPropertyValue('opacity'));
      if (opacity < 1) {
        opacity = opacity + 0.1;
        body.style.opacity = opacity;
      } else {
        clearInterval(intervalID);
      }
    }

    function fadeIn() {
      setInterval(show, 60);
    }
    window.onload = fadeIn;

    /*
     * 오버레이
     * Overlay
     */
    const menuOpen = document.querySelector('.menu');
    const menuClose = document.querySelector('.overlay_close');
    const overlay = document.querySelector('.overlay');

    menuOpen.addEventListener('click', () => {
      overlay.classList.add('active');
    });

    menuClose.addEventListener('click', () => {
      overlay.classList.remove('active');
    });

    /*
     * thalassa_detail.php 페이지로 이동
     * Go to thalassa_detail.php
     */
    function detail(idx) {
      location.href = "thalassa_detail.php?idx=" + idx;
    }
  </script>

</body>

</html>

<?php
// }
?>