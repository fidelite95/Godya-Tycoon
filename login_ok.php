<?php
session_start();

$id = $_POST['inputId']; // 회원 ID
$pw_before = $_POST['inputPw']; // 회원 비밀번호

$con = mysqli_connect("localhost", "gods2022", "wpdntm1004", "gods2022");
mysqli_query($con, 'SET NAMES utf8');
$con->query("SET NAMES 'UTF8'");

if ($con->connect_errno) {
    die('Connection Error : ' . $con->connect_error);
}

// MD5 암호화
$pw = md5($pw_before);

$query = "SELECT * FROM tb_member WHERE id='$id' AND pw='$pw'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);

// ID 공백확인
if ($id == null) {
    echo "<script>alert('아이디를 입력해주세요.');</script>";
    echo "<script>location.href='login.php';</script>";
}

// 비밀번호 공백확인
if ($pw == null) {
    echo "<script>alert('비밀번호를 입력해주세요.');</script>";
    echo "<script>location.href='login.php';</script>";
}

// 가입여부 확인
if ($row['id'] == null || $row['pw'] == null) {
    echo "<script>alert('신이야 회원가입 후 이용 가능합니다.');</script>";
    echo "<script>location.href='login.php';</script>";
}

// ID와 비밀번호 일치
if ($id == $row['id'] && $pw == $row['pw']) {
    $_SESSION['id'] = $row['id'];
    echo "<script>location.href='intro.php';</script>";
} else {
    echo "<script>alert('로그인에 실패했습니다.');</script>";
    echo "<script>location.href='intro.php';</script>";
}
