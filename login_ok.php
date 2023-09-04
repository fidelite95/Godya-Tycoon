<?php
session_start();

include("./connection.php");

# POST를 통해서만 로그인 가능
# Can only log in via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    # POST를 통해서 받은 사용자 ID
    # User ID received via POST method
    $id = $_POST['inputId'];
    $id_sanitized = filter_var($id, FILTER_SANITIZE_EMAIL);

    # 사용자 조회 쿼리
    # Query to find a user
    $query = "SELECT * FROM god_member WHERE id='$id'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);

    # 로그인 성공
    # Login Success
    if ($row != null) {
        $_SESSION['id'] = $row['id'];
        echo "<script>location.href='intro.php';</script>";
        exit;
    }

    # 로그인 실패
    # Login Failed
    if ($row == null) {
        echo "<script>alert('로그인에 실패했습니다.');</script>";
        echo "<script>location.href='index.php';</script>";
        session_unset();
        session_destroy();
        exit;
    }
}
