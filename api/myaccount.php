<?php

include_once 'includes/baglan.php';

session_start();

if ($_SESSION['GET_USER_SSID'] == "") {
    header('Location: auth/auth-login');
}

$GET_SESSION_TOKEN = $_SESSION['GET_USER_SSID'];

$CheckAccount = $db->query("SELECT * FROM users WHERE token = '$GET_SESSION_TOKEN'");
$CheckAccountCount = $CheckAccount->rowCount();

if ($CheckAccountCount != "1") {
    exit('Error: no token');
    die();
}

while ($GetInfo = $CheckAccount->fetch()) {
    $GET_USER_NICK = $GetInfo['username'];
    $GET_LAST_LOGIN = $GetInfo['last_login'];
    $GET_EXPIRE_DATE = $GetInfo['expire_date'];
    $GET_ACCESS_LEVEL = $GetInfo['access_level'];
    $GET_PROFILE_IMG = $GetInfo['profile_image'];
    $GET_USER_ID = $GetInfo['uid'];
}


if ($GET_ACCESS_LEVEL >= "1") {
    $Result = "Admin";
} else if ($GET_ACCESS_LEVEL == "-2") {
    $Result = "Deneme Üye";
} else if ($GET_ACCESS_LEVEL == "0") {
    $Result = "Normal Üye";
} else {
    $Result = "Banlı Üye";
}




?>
<!DOCTYPE html>
<html class="loading dark-layout" lang="tr" data-layout="dark-layout" data-textdirection="ltr">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@<?= $GET_USER_NICK; ?></title>
    <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
    <link rel='stylesheet' href='app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css'>
    <link rel='stylesheet' href='app-assets/vendors/css/tables/datatable/dataTables.checkboxes.css'>
    <link rel='stylesheet' href='app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css'>
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/semi-dark-layout.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/style.css">
</head>
<?php
include_once("includes/header.php");
?>
<?php
include_once("includes/menu.php");
?>
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-body">
            <div id="user-profile">
                <div class="row">
                    <div class="col-12">
                        <div class="card profile-header mb-2">
                    
                            <div class="position-relative">
                                <div class="profile-img-container d-flex align-items-center">
                                    <div class="profile-img">
                                        <?php


                                        if ($profileimage != "") {
                                            echo "<img class='round' style='border-radius: 50%;margin-left: 20px;' src='$profileimage' height='50' width='50'>";
                                        } else {
                                            echo "<img class='round' style='border-radius: 50%;margin-left: 20px;' src='salam/kullanici.jpg' height='50' width='50'>";
                                        }

                                        ?>
                                    </div>
                                    <div class="profile-title ms-2 mt-2">
                                        <h2 class="text-white"><?= $GET_USER_NICK; ?></h2>
                                        <p class="text-white"><?= $Result; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <section id="profile-info">
                    <div class="row">
                        <div class="col-lg-3 col-12 order-2 order-lg-1">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="mb-75">Kullanıcı Adı</h5>
                                    <p class="card-text">
                                        <?= $GET_USER_NICK; ?>
                                    </p>
                                    <div class="mt-2">
                                        <h5 class="mb-75">Süre Dolma Tarihi</h5>
                                        <p class="card-text"><?= $GET_EXPIRE_DATE; ?></p>
                                    </div>
                                    <div class="mt-2">
                                        <h5 class="mb-75">Yetki</h5>
                                        <p class="card-text"><?= $Result; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css">
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js"></script>
                        <div class="col-lg-6 col-12 order-1 order-lg-2">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="text-muted">Hesabı Düzenle</h2>
                                    <form action="myaccount" method="POST">
                                        <br>
                                        <label class="form-label" for="label-textarea">İsim Rengi</label>
                                        <input class="form-control" name="nickcolor" type="color" value="<?= $nickcolor; ?>" style="border: none;height: 50px;margin-left: -14px;width: 103.5%;">
                                        <br>
                                        <label class="form-label" for="label-textarea">Profil Resmi</label>
                                        <input class="form-control" name="profileimage" type="text" value="<?= $profileimage; ?>" placeholder="Resim URL'sini Giriniz Örneğin : https://example.com/picture.gif">
                                        <br>
                                        <button type="submit" name="" class="btn btn-sm btn-primary">Güncelle</button>
                                    </form>
                                    <?php

                                    if ($_POST) {
                                        $post_color = $_POST['nickcolor'];
                                        $post_image = $_POST['profileimage'];
                                        $post_id = $GET_USER_ID;

                                        echo '<script type="text/javascript"> 
                                            Swal.fire({
                                                title: "Başarılı!",
                                                text: "Hesap başarıyla güncellendi!",
                                                icon: "success",
                                                width: "400px",
                                                showConfirmButton: false,
                                                allowOutsideClick: false,
                                                background: "#283046",
                                                timer: 2000,
                                            })</script>';
                                        $sonuc = $db->exec("UPDATE users SET 
                                            profile_image = '$post_image',
                                            nick_color = '$post_color'
                                            WHERE uid = '$post_id'");
										 echo '<script type="text/javascript"> 
                                            window.location="myaccount"</script>';
                                    }

                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-12 order-3">
                            <div class="card">
                                <div class="card">
                                    <div class="card-body">
                                        <h5>Son Kayıt Olan Kullanıcılar</h5>
                                        <?php

                                        $query = $db->query("SELECT * FROM users ORDER BY uid DESC LIMIT 5");

                                        while ($data = $query->fetch()) {

                                        ?>
                                            <div class="d-flex justify-content-start align-items-center mt-2">
                                                <div class="avatar me-75">
                                                    <?php

                                                    $profile_img = $data['profile_image'];

                                                    if ($profile_img != "") {
                                                        echo "<img src='$profile_img' height='40' width='40'>";
                                                    } else {
                                                        echo "<img src='salam/kullanici.jpg' height='40' width='40'>";
                                                    }

                                                    ?>
                                                </div>
                                                <div class="profile-user-info">
                                                    <h6 class="mb-0">
                                                        <?php

                                                        $color = $data['nick_color'];
                                                        $usernamelst = $data['username'];

                                                        if ($data['nick_color'] != "") {
                                                            echo "<span style='color: $color;'>$usernamelst</span>";
                                                        } else {
                                                            echo $data['username'];
                                                        }

                                                        if ($data['access_level'] >= "1") {
                                                            $Resultx = "Admin";
                                                        } else if ($data['access_level'] == "-2") {
                                                            $Resultx = "Deneme Üye";
                                                        } else if ($data['access_level'] == "0") {
                                                            $Resultx = "Normal Üye";
                                                        } else {
                                                            $Resultx = "Banlı Üye";
                                                        }

                                                        ?>
                                                    </h6>
                                                    <small class="text-muted"><?= $Resultx; ?></small>
                                                </div>
                                            </div>
                                        <?php

                                        }

                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once("includes/ayar.php");
?>

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js"></script>
<script src="app-assets/vendors/js/vendors.min.js"></script>
<script src="app-assets/js/scripts/customizer.min.js"></script>
<script src="app-assets/js/core/app-menu.js"></script>
<script src="app-assets/js/core/app.js"></script>
<script src="app-assets/js/scripts/pages/page-profile.js"></script>

<script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>
</body>

</html>