<?php
session_start();
if (isset($_SESSION['id'])) {
    $login_status = true;
}
