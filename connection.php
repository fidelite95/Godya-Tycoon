<?php
# 데이터베이스 연결
# Connect to a database
$host = "localhost";
$username = "gods2022";
$password = "wpdntm1004";
$db = "gods2022";

$con = mysqli_connect($host, $username, $password, $db);
mysqli_query($con, 'SET NAMES utf8');
$con->query("SET NAMES 'UTF8'");

# DB 연결 시 에러
# Error when connecting to DB
if ($con->connect_error) {
    die('Connection Error : ' . $con->connect_error);
}
