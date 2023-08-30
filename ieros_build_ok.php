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

// GET a payment method from the previous page
$coin = $_GET['coin'];

// Retrieving data from a database
$con = mysqli_connect("localhost", "gods2022", "wpdntm1004", "gods2022");
mysqli_query($con, 'SET NAMES utf8');
$con->query("SET NAMES 'UTF8'");

if ($con->connect_errno) {
    die('Connection Error : ' . $con->connect_error);
}

// ────────────────────────────────────────────────
// Land Data
// ────────────────────────────────────────────────

$query = "SELECT * FROM tycoon_ieros WHERE idx='$idx'";
$result = $con->query($query);
$row = $result->fetch_assoc();

// Land Code
$land_code = $row['land_code'];

// Land Status : 0 (For sale), 1 (Sold)
$land_status = $row['land_status'];

// Member Index
$member_idx = $row['member_idx'];

// Member ID (Gmail)
$member_id = $row['member_id'];
if ($member_id == NULL) {
    $member_id = '없음';
}

// Building : _build.php
$building = $row['building'];
$building_name = '';

// ────────────────────────────────────────────────
// Tenant Data
// ────────────────────────────────────────────────

// Temporary Member ID
$temporary_id = "grandefidelite@gmail.com";

$query_tenant = "SELECT * FROM tb_member WHERE id='$temporary_id'";
$result_tenant = $con->query($query_tenant);
$row_tenant = $result_tenant->fetch_assoc();

//──────── Member Nickname
// $member_nick = $row_tenant['nick'];
$member_nick = "아슬란";

//──────── Member Asset
// $member_gold = number_format($row_tenant['point']);
// $member_red = number_format($row_tenant['cash']);
$gold = 8034678;
$red = 7564;
$member_gold = number_format($gold);
$member_red = number_format($red);

//──────── Pricing list <Build>
// 0 -> 1 (Kolona) : 200,000 (GOLD) 1,000 (RED)
// 1 -> 2 (Odeion) : 800,000 (GOLD) 2,000 (RED)
// 2 -> 3 (Stadion) : 1,500,000 (GOLD) 3,000 (RED)
// 3 -> 4 (Parthenon) : 2,500,000 (GOLD) 4,000 (RED)
$price_gold_lv1 = 200000;
$price_gold_lv2 = 800000;
$price_gold_lv3 = 1500000;
$price_gold_lv4 = 2500000;
$price_red_lv1 = 1000;
$price_red_lv2 = 2000;
$price_red_lv3 = 3000;
$price_red_lv4 = 4000;
$final_price_gold = 0;
$final_price_red = 0;

if ($coin == 'gold') {
    switch ($building) {
        case 0:
            $final_price_gold = $price_gold_lv1;
            break;
        case 1:
            $final_price_gold = $price_gold_lv2;
            break;
        case 2:
            $final_price_gold = $price_gold_lv3;
            break;
        case 3:
            $final_price_gold = $price_gold_lv4;
            break;
        case 4:
            $final_price_gold = 0;
            break;
        default:
            $final_price_gold = 0;
            break;
    }
} elseif ($coin == 'red') {
    switch ($building) {
        case 0:
            $final_price_red = $price_red_lv1;
            break;
        case 1:
            $final_price_red = $price_red_lv2;
            break;
        case 2:
            $final_price_red = $price_red_lv3;
            break;
        case 3:
            $final_price_red = $price_red_lv4;
            break;
        case 4:
            $final_price_red = 0;
            break;
        default:
            $final_price_red = 0;
            break;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <?php include("./head.php") ?>
    <title>TYCOON | <?php echo $land_code ?></title>
    <link rel="stylesheet" type="text/css" href="process.css" />
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</head>

<body>
    <div class="build_ok">
        <lottie-player src="./json/success.json" background="transparent" speed="1" style="width: 300px; height: 300px" loop autoplay direction="1" mode="normal">
        </lottie-player>

        <h1>축하드립니다!</h1>
        <p>건설 등급이 상승되었습니다.</p>

        <button class="btn btn-effect" style="margin-top: 40px;" onclick="back(<?= $idx; ?>)"><span>돌아가기</span></button>
    </div>

    <script>
        // Go back
        function back(idx) {
            location.href = "ieros_detail.php?idx=" + idx;
        }
    </script>
</body>

</html>

<?php
// ────────────────────────────────────────────────
// Calculation + SQL UPDATE
// ────────────────────────────────────────────────

$now = date('Y-m-d H:i:s');
$building_update = $building + 1;
if ($coin == 'gold') {
    // tycoon_ieros
    switch ($building_update) {
        case 1:
            $query_update = "UPDATE tycoon_ieros
            SET building='$building_update', item2='open'
            WHERE idx='$idx'";
            mysqli_query($con, $query_update);
            break;
        case 2:
            $query_update = "UPDATE tycoon_ieros
            SET building='$building_update', item3='open', item4='open'
            WHERE idx='$idx'";
            mysqli_query($con, $query_update);
            break;
        case 3:
            $query_update = "UPDATE tycoon_ieros
            SET building='$building_update', item5='open', item6='open'
            WHERE idx='$idx'";
            mysqli_query($con, $query_update);
            break;
        case 4:
            $query_update = "UPDATE tycoon_ieros
            SET building='$building_update', item7='open', item8='open'
            WHERE idx='$idx'";
            mysqli_query($con, $query_update);
            break;
        default:
            break;
    }

    // tycoon_build_history
    $query_record = "INSERT INTO tycoon_build_history (
        member_idx,
        member_id,
        land_code,
        region,
        payment,
        price,
        build_date,
        content,
        previous_level,
        future_level
        ) VALUES (
            '$member_idx',
            '$member_id',
            '$land_code',
            'ieros',
            'gold',
            '$final_price_gold',
            '$now',
            '골드 결제 & 건설 성공',
            '$building',
            '$building_update'
        )";
    // mysqli_query($con, $query_record);
    mysqli_close($con);
} elseif ($coin == 'red') {
    // tycoon_ieros
    switch ($building_update) {
        case 1:
            $query_update = "UPDATE tycoon_ieros
            SET building='$building_update', item2='open'
            WHERE idx='$idx'";
            mysqli_query($con, $query_update);
            break;
        case 2:
            $query_update = "UPDATE tycoon_ieros
            SET building='$building_update', item3='open', item4='open'
            WHERE idx='$idx'";
            mysqli_query($con, $query_update);
            break;
        case 3:
            $query_update = "UPDATE tycoon_ieros
            SET building='$building_update', item5='open', item6='open'
            WHERE idx='$idx'";
            mysqli_query($con, $query_update);
            break;
        case 4:
            $query_update = "UPDATE tycoon_ieros
            SET building='$building_update', item7='open', item8='open'
            WHERE idx='$idx'";
            mysqli_query($con, $query_update);
            break;
        default:
            break;
    }

    // tycoon_build_history
    $query_record = "INSERT INTO tycoon_build_history (
        member_idx,
        member_id,
        land_code,
        region,
        payment,
        price,
        build_date,
        content,
        previous_level,
        future_level
        ) VALUES (
            '$member_idx',
            '$member_id',
            '$land_code',
            'ieros',
            'red',
            '$final_price_red',
            '$now',
            '레드베릴 결제 & 건설 성공',
            '$building',
            '$building_update'
        )";
    // mysqli_query($con, $query_record);
    mysqli_close($con);
}

mysqli_close($con);
?>