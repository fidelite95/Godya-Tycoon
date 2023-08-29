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

$query = "SELECT * FROM tycoon_thalassa WHERE idx='$idx'";
$result = $con->query($query);
$row = $result->fetch_assoc();

// Land Code
$land_code = $row['land_code'];

// Land Status : 0 (For sale), 1 (Sold)
$land_status = $row['land_status'];

// Member Index
$member_idX = $row['member_idX'];

// Member ID (Gmail)
$member_id = $row['member_id'];
if ($member_id == NULL) {
    $member_id = '없음';
}

// Price
$price_gold = number_format($row['price_gold']);
$price_red = number_format($row['price_red']);

// Profitability : _rate.php
$profit = $row['profit'];
$profit_name = '';

// Building : _build.php
$building = $row['building'];
$building_name = '';

// Mined resources
$item1 = $row['item1'];
$item2 = $row['item2'];
$item3 = $row['item3'];
$item4 = $row['item4'];
$item5 = $row['item5'];
$item6 = $row['item6'];
$item7 = $row['item7'];
$item8 = $row['item8'];

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

// Pricing list <Rate>
// 0 -> 1  (Alpha) : 40,000 (GOLD) 200 (RED)
// 1 -> 2  (Beta) : 80,000 (GOLD) 400 (RED)
// 2 -> 3  (Gamma) : 120,000 (GOLD) 600 (RED)
// 3 -> 4  (Delta) : 160,000 (GOLD) 800 (RED)
// 4 -> 5  (Epsilon) : 200,000 (GOLD) 1,000 (RED)
// 5 -> 6  (Zeta) : 460,000 (GOLD) 1,400 (RED)
// 6 -> 7  (Eta) : 720,000 (GOLD) 1,800 (RED)
// 7 -> 8  (Theta) : 980,000 (GOLD) 2,200 (RED)
// 8 -> 9  (Iota) : 1,240,000 (GOLD) 2,600 (RED)
// 9 -> 10  (Kappa) : 1,500,000 (GOLD) 3,000 (RED)
// 10 -> 11  (Lambda) : 2,600,000 (GOLD) 3,800 (RED)
// 11 -> 12  (Mu) : 3,700,000 (GOLD) 4,600 (RED)
// 12 -> 13  (Nu) : 4,800,000 (GOLD) 5,400 (RED)
// 13 -> 14  (Xi) : 5,900,000 (GOLD) 6,200 (RED)
// 14 -> 15  (Omicron) : 7,000,000 (GOLD) 7,000 (RED)
$price_gold_lv1 = 40000;
$price_gold_lv2 = 80000;
$price_gold_lv3 = 120000;
$price_gold_lv4 = 160000;
$price_gold_lv5 = 200000;
$price_gold_lv6 = 460000;
$price_gold_lv7 = 720000;
$price_gold_lv8 = 980000;
$price_gold_lv9 = 1240000;
$price_gold_lv10 = 1500000;
$price_gold_lv11 = 2600000;
$price_gold_lv12 = 3700000;
$price_gold_lv13 = 4800000;
$price_gold_lv14 = 5900000;
$price_gold_lv15 = 7000000;
$price_red_lv1 = 200;
$price_red_lv2 = 400;
$price_red_lv3 = 600;
$price_red_lv4 = 800;
$price_red_lv5 = 1000;
$price_red_lv6 = 1400;
$price_red_lv7 = 1800;
$price_red_lv8 = 2200;
$price_red_lv9 = 2600;
$price_red_lv10 = 3000;
$price_red_lv11 = 3800;
$price_red_lv12 = 4600;
$price_red_lv13 = 5400;
$price_red_lv14 = 6200;
$price_red_lv15 = 7000;
$final_price_gold = 0;
$final_price_red = 0;

if ($coin == 'gold') {
    switch ($profit) {
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
            $final_price_gold = $price_gold_lv5;
            break;
        case 5:
            $final_price_gold = $price_gold_lv6;
            break;
        case 6:
            $final_price_gold = $price_gold_lv7;
            break;
        case 7:
            $final_price_gold = $price_gold_lv8;
            break;
        case 8:
            $final_price_gold = $price_gold_lv9;
            break;
        case 9:
            $final_price_gold = $price_gold_lv10;
            break;
        case 10:
            $final_price_gold = $price_gold_lv11;
            break;
        case 11:
            $final_price_gold = $price_gold_lv12;
            break;
        case 12:
            $final_price_gold = $price_gold_lv13;
            break;
        case 13:
            $final_price_gold = $price_gold_lv14;
            break;
        case 14:
            $final_price_gold = $price_gold_lv15;
            break;
        case 15:
            $final_price_gold = 0;
            break;
        default:
            $final_price_gold = 0;
            break;
    }
} elseif ($coin == 'red') {
    switch ($profit) {
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
            $final_price_red = $price_red_lv5;
            break;
        case 5:
            $final_price_red = $price_red_lv6;
            break;
        case 6:
            $final_price_red = $price_red_lv7;
            break;
        case 7:
            $final_price_red = $price_red_lv8;
            break;
        case 8:
            $final_price_red = $price_red_lv9;
            break;
        case 9:
            $final_price_red = $price_red_lv10;
            break;
        case 10:
            $final_price_red = $price_red_lv11;
            break;
        case 11:
            $final_price_red = $price_red_lv12;
            break;
        case 12:
            $final_price_red = $price_red_lv13;
            break;
        case 13:
            $final_price_red = $price_red_lv14;
            break;
        case 14:
            $final_price_red = $price_red_lv15;
            break;
        case 15:
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
