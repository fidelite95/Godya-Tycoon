<?php

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

$query = "SELECT * FROM tycoon_uranos WHERE idx='$idx'";
$result = $con->query($query);
$row = $result->fetch_assoc();

// Land Code
$land_code = $row['land_code'];

// Land Status : 0 (For sale), 1 (Sold)
$land_status = $row['land_status'];

// Member Index
$member_idx = $row['member_idx'];
echo "<h1>$member_idx</h1>";

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

// ────────────────────────────────────────────────
// Calculation + SQL UPDATE
// ────────────────────────────────────────────────

echo "<h1>GOLD = $final_price_gold // RED = $final_price_red</h1>";

$now = date('Y-m-d H:i:s');
echo "<h1>$now</h1>";
if ($coin == 'gold') {
    // tycoon_uranos
    $building_update = $building + 1;
    $query_update = "UPDATE tycoon_uranos
    SET building='$building_update'
    WHERE idx='$idx'";
    mysqli_query($con, $query_update);

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
            'uranos',
            'gold',
            '$final_price_gold',
            '$now',
            '골드 결제 & 건설 성공',
            '$building',
            '$building_update'
        )";
    mysqli_query($con, $query_record);
} elseif ($coin == 'red') {
    // tycoon_uranos
    $building_update = $building + 1;
    $query_update = "UPDATE tycoon_uranos
    SET building='$building_update'
    WHERE idx='$idx'";
    mysqli_query($con, $query_update);

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
            'uranos',
            'red',
            '$final_price_red',
            '$now',
            '레드베릴 결제 & 건설 성공',
            '$building',
            '$building_update'
        )";
    mysqli_query($con, $query_record);
}
