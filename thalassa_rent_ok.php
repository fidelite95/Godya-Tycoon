<?php
include("./login_status.php");
include("./brand.php");
include("./connection.php");

// if (!$login_status) {
//   echo "<script>alert('로그인 후에 이용 가능합니다.')</script>";
//   echo "<script>location.href='login.php';</script>";
// } else {

# GET 메소드로 받은 idx
# idx received by the GET method
$idx = $_GET['idx'];

# ────────────────────────────────────

# 영토 조회 쿼리
# Query to find territory data
$query = "SELECT * FROM tycoon_thalassa WHERE idx='$idx'";
$result = $con->query($query);
$row = $result->fetch_assoc();

# 영토 코드
# Land Code
$land_code = $row['land_code'];

# "land_status"에 따른 영토 상태
# Status of the territory according to "land_status"
# 0 : 판매중 (For sale)
# 1 : 판매됨 (Sold)
$land_status = $row['land_status'];

# 임차인 계정
# Tenant ID (Gmail)
$member_id = $row['member_id'];

# 영토 가격
# Price
$price_gold = $row['price_gold'];
$price_red = $row['price_red'];

// echo "<h1>price_gold: $price_gold // price_red = $price_red</h1>";

# ────────────────────────────────────

# SESSION에서 받은 현재 로그인 중인 유저 ID
# User ID received from the SESSION
$id = $_SESSION['id'];
$id_sanitized = filter_var($id, FILTER_SANITIZE_EMAIL);

# 사용자 조회 쿼리
# Query to find a user
$query_tenant = "SELECT * FROM god_member WHERE id='$id_sanitized'";
$result_tenant = $con->query($query_tenant);
$row_tenant = $result_tenant->fetch_assoc();

# 임차인 ID와 닉네임
# User ID & Nickname
$tenant_id = $row_tenant['id'];
$tenant_nick = $row_tenant['nick'];

# 유저 자산
# User Asset
$tenant_gold = $row_tenant['gold'];
$tenant_red = $row_tenant['cash'];

// echo "<h1>tenant_gold: $tenant_gold // tenant_red = $tenant_red</h1>";

# ────────────────────────────────────

# 구매 가능여부 확인 (골드)
# Check availability (Gold)
$available_gold = false;
if ($tenant_gold >= $price_gold) {
    $available_gold = true;
}

# 구매 가능여부 확인 (레드베릴)
# Check availability (Red Beryl)
$available_red = false;
if ($tenant_red >= $price_red) {
    $available_red = true;
}

# ────────────────────────────────────
?>

<!DOCTYPE html>
<html>

<head>
    <?php
    include("./head.php");
    ?>
    <title>TYCOON | <?php echo $land_code ?></title>
    <link rel="stylesheet" type="text/css" href="process.css" />
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</head>

<body id="body">
    <div class="build_ok">
        <lottie-player src="./json/success2.json" background="transparent" speed="1" style="width: 300px; height: 300px" loop autoplay direction="1" mode="normal">
        </lottie-player>

        <h1>축하드립니다!</h1>
        <p>영토 <?php echo $land_code; ?>의 임대를 완료했습니다.</p>

        <button class="btn btn-effect" style="margin-top: 40px;" onclick="back(<?= $idx; ?>)"><span>돌아가기</span></button>
    </div>

    <script>
        /*
         * 돌아가기
         * Go back to thalassa_detail
         */
        function back(idx) {
            location.href = "thalassa_detail.php?idx=" + idx;
        }
    </script>
</body>

</html>

<?php
# ────────────────────────────────────

# 가격 계산 및 차감
# Calculating and subtracting prices
$tenant_balance_gold = $tenant_gold - $price_gold;
$tenant_balance_red = $tenant_red - $price_red;

// echo "<h1>gold 나머지: $tenant_balance_gold // red 나머지 = $tenant_balance_red</h1>";

# 임대일
# Rent Date
$now = date('Y-m-d H:i:s');

# 영토가 판매중인 경우
# If the territory is for sale
if ($member_id == NULL) {

    # 구매가 가능한 경우
    # If available for purchase
    if ($available_gold == true && $available_red == true) {

        # 영토 페이지 쿼리
        # tycoon_thalassa
        $query_record = "UPDATE tycoon_thalassa
        SET land_status=1,
        member_id='$tenant_id',
        member_nick='$tenant_nick'
        WHERE idx='$idx'";
        mysqli_query($con, $query_record);

        # 사용자 자산변동 쿼리
        # god_member
        $query_balance = "UPDATE god_member
        SET gold='$tenant_balance_gold', cash='$tenant_balance_red'
        WHERE id='$id_sanitized'";
        mysqli_query($con, $query_balance);

        # 임대 내역 페이지 쿼리
        # tycoon_build_history
        $query_record = "INSERT INTO tycoon_rent_history (
            member_id,
            member_nick,
            land_code,
            region,
            price_gold,
            price_red,
            rent_date,
            content
            ) VALUES (
                '$tenant_id',
                '$tenant_nick',
                '$land_code',
                'thalassa',
                '$price_gold',
                '$price_red',
                '$now',
                '결제 완료 & 임대 성공'
            )";
        mysqli_query($con, $query_record);

        mysqli_close($con);
    }

    # 구매가 불가능한 경우
    # If not available for purchase
    else {
        echo "<script>alert('잘못된 접근입니다.')</script>";
        echo '<script>location.href = "thalassa.php"</script>';
        mysqli_close($con);
    }
}

# 영토가 판매된 경우
# If the territory is sold
else {
    echo "<script>const body = document.getElementById('body');</script>";
    echo "<script>body.style.opacity = 0;</script>";
    echo "<script>alert('이미 판매된 영토입니다.');</script>";
    echo '<script>location.href = "thalassa.php"</script>';
    mysqli_close($con);
}
