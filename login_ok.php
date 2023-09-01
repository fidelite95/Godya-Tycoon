<?php
session_start();

$host = "localhost";
$username = "gods2022";
$password = "wpdntm1004";
$db = "gods2022";

$con = mysqli_connect($host, $username, $password, $db);
mysqli_query($con, 'SET NAMES utf8');
$con->query("SET NAMES 'UTF8'");

if ($con->connect_error) {
    die('Connection Error : ' . $con->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['inputId'];

    // Check for whitespace (ID)
    // if ($id == null) {
    //     echo "<script>alert('아이디를 입력해주세요.');</script>";
    //     echo "<script>location.href='login.php';</script>";
    // }

    $id_sanitized = filter_var($id, FILTER_SANITIZE_EMAIL);
    $query = "SELECT * FROM god_member WHERE id='$id'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);

    // Login Succeeded
    if ($row != null) {
        $_SESSION['id'] = $row['id'];
        $_SESSION['nick'] = $row['nick'];
        echo "<script>location.href='intro.php';</script>";
        exit;
    }

    // Login Failed
    if ($row == null) {
        echo "<script>alert('로그인에 실패했습니다.');</script>";
        echo "<script>location.href='index.php';</script>";
        exit;
    }
}
