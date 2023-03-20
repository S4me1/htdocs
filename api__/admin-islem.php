<?php

include_once 'includes/baglan.php';

session_start();

if ($_SESSION['GET_USER_SSID'] == "") {
    header('Location: auth/auth-login');
}

$GET_SESSION_TOKEN = $_SESSION['GET_USER_SSID'];

$CheckAccount = $db->query("SELECT * FROM users WHERE token = '$GET_SESSION_TOKEN'");
$CheckAccountCount = $CheckAccount->rowCount();

while ($CheckData = $CheckAccount->fetch()) {
    $access = $CheckData['access_level'];
}

if ($CheckAccountCount != "1") {
    exit('Error: no token');
    die();
}

if ($access < 1) {
    header('Location: anasayfa');
}

if (isset($_POST['delete'])) {
    $id = $_POST['deleteid'];
    $sql = "DELETE FROM news WHERE id=?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$id]);
    header('Location: admin-news');
}

if (isset($_POST['account'])) {
    $id = $_POST['accountid'];
    $sql = "DELETE FROM users WHERE uid=?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$id]);
    header('Location: admin-users');
}

if (isset($_POST['update'])) {

    $id = $_POST['updateid'];
    $sonuc = $db->exec("UPDATE users SET access_level = '0' WHERE uid = '$id'");
    header('Location: admin-ban');
}

if (isset($_POST['updatex'])) {

    $id = $_POST['id'];
    $username = $_POST['username'];
    $token = $_POST['token'];
    $expiredate = $_POST['expire_date'];
    $accesslevel = $_POST['access_level'];
    $sonuc = $db->exec("UPDATE users SET 
    username = '$username',
    expire_date = '$expiredate',
    access_level = '$accesslevel'
    WHERE uid = '$id'");
    header('Location: admin-users?status=true');
}
