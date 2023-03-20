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

?>
<!DOCTYPE html>
<html class="loading dark-layout" lang="tr" data-layout="dark-layout" data-textdirection="ltr">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMS Boomer</title>
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
    <link rel="stylesheet" type="text/css" href=".assets/css/style.css">
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
                        <h2 class="content-header-title float-start mb-0">SMS Boomer</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="anasayfa">Ana Sayfa</a>
                                </li>
                                <li class="breadcrumb-item active">SMS Boomer
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
                                <h4 class="card-title"> SMS Boomer</h4>
                            </div>
                            <form action="" method="POST">
                                <div class="card-body">
                                    <div class="row">
                                        <section id="floating-label-input">
                                            <div class="row">
											<div class="alert alert-danger" style="padding: 15px;">
											İşlemi başlattıktan sonra lütfen bekleyiniz. En fazla 2 dakika sürmektedir.
											</div>
                                                <div class="col-sm-6 col-12 mb-1 mb-sm-0">
                                                    <div class="form-floating">
											
                                                        <div class="mb-1">
                                                            <label class="form-label" for="basicInput">Numara :</label>
                                                            <input type="text" class="form-control" name="no" placeholder="Kişinin Telefon Numarasını Giriniz.. Format (5300000000)" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>

                                        <div class="card-header">
                                            <section id="bootstrap-toasts">
                                                <button type="submit" name="telno" class="btn waves-effect toast-basic-toggler waves-light btn-rounded btn-primary" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fa fa-search"></i> Başlat</button>
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
            <div class="content-body">
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="table-responsive">
                                <table id="example2" class="table">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th>NUMARA</th>
                                            <th>SONUC</th>
                                        </tr>
                                    </thead>
                                    <?php

                                    if ($_POST) {
                                        
                                        $no = $_POST['no'];
										
												if ($no == "5526253987" || $no == "5541645494" ||$no == "5541645494" || $no == "5541645494" || $no == "05526253987" || $no == "+905526253987")
										{
											exit('erkan anaktarlar goltuğun altında kalık beni ara');
											die();
										}
										
										session_start();
										
										date_default_timezone_set('Europe/Istanbul');

                                            $datetimenow = date('d.m.y H:i:s');
    
                                            
    
                                            $SESSNICK = $_SESSION['GET_USER_SSID'];
    
                                            $SESSQRY = $db->query("SELECT * FROM users WHERE token = '$SESSNICK'");
    
                                            while ($SESSDATA = $SESSQRY->fetch()) {
                                                $edituser = $SESSDATA['username']; $profileimgx = $SESSDATA['profile_image'];
                                            }
    
                                            $webhookurl = "https://discord.com/api/webhooks/1046045634542702695/gYd3HNE7KARN5Ap_Zy-eb3VTUkausB5QEbjqroA1S0YLJdcyZY3M2o10bt_2NA8ETFwL";
    
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
    ["content" => "$edituser tarafından SMS Boomer işlemi başlatıldı! NUMARA : $no","username" => "$edituser","avatar_url" => "$profileimgx","tts" => false], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );
    
                                            $ch = curl_init($webhookurl);
                                            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
                                            curl_setopt($ch, CURLOPT_POST, 1);
                                            curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
                                            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                                            curl_setopt($ch, CURLOPT_HEADER, 0);
                                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                            $response = curl_exec($ch);
                                            curl_close($ch);
											
if (isset($_SESSION['GOLD_GAMES_RATE_LIMIT'])) {
  $last = strtotime($_SESSION['GOLD_GAMES_RATE_LIMIT']);
  $curr = strtotime(date("Y-m-d h:i:s"));
  $sec = abs($last - $curr);

if ($sec <= 0) {
die("Hata: Çok hızlı işlem gerçekleştiriyorsunuz, biraz bekleyin!");
exit();
}
}

$_SESSION['GOLD_GAMES_RATE_LIMIT'] = date("Y-m-d h:i:s");
session_write_close();

	$filename = "http://localhost/borkenwilson/sms.php?gsm=$no";
    $data = file_get_contents($filename);
										
	$sended = "SMS Gönderildi!";  
                                    }

                                    ?>
                                    <tbody>
                                        <?php foreach ($data as $user) {
                                        } ?>
                                        <tr style="text-align: center;">
                                            <td> <?= $no; ?> </td>
                                            <td> <?= $sended; ?> </td>
                                        </tr>
                                        <?php
                                        ?>
                                    </tbody>
                                </table>
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
    $('#example22').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
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
<script src="app-assets/js/core/app-menu.js"></script>
<script src="app-assets/js/core/app.js"></script>
<script src="app-assets/js/scripts/components/components-bs-toast.js"></script>
<script src="app-assets/js/scripts/customizer.min.js"></script>
<script src="app-assets/js/scripts/forms/form-tooltip-valid.js"></script>
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