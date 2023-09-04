<?php
session_start();

# 세션에 있는 데이터 조회
# Get data in a session
$login_id = $_SESSION['id'];

if (isset($_SESSION['id'])) {
    # 데이터가 있는 경우 로그인 상태
    # Login status, if data exists
    $login_status = true;
} else {
    # 데이터가 없는 경우 로그인 상태
    # Login status, if data doesn't exist
    $login_status = false;
}
