
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
    <meta charset="utf8">
    <title>Vesika Sorgu</title>
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
                        <h2 class="content-header-title float-start mb-0">Okul Sorgu 2</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="anasayfa">Ana Sayfa</a>
                                </li>
                                <li class="breadcrumb-item active"> Okul Sorgu 2
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
                                <h4 class="card-title"> Okul Sorgu 2</h4>
                            </div>
                            <form action="okul2" method="POST">
                                <div class="card-body">
                                    <div class="row">
									<div class="alert alert-danger" style="padding: 15px;">
											Sorgula butonuna bastıktan sonra biraz bekleyin.
											</div>
                                        <section id="floating-label-input">
                                            <div class="row">

                                                <div class="col-sm-6 col-12 mb-1 mb-sm-0">
                                                    <div class="form-floating">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="basicInput">TC Kimlik No :</label>
                                                            <input type="text" class="form-control" name="tc" placeholder="Kişinin TC Kimlik Numarasını girin" />
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
											<th>RESİM</th>
                                            <th>OKUL NO</th>
                                        </tr>
                                    </thead>
                                    		
                                    <?php

                                    if ($_POST) {
                                        
                                        $tc = $_POST['tc'];
										$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://66ca-20-73-86-150.eu.ngrok.io/dsadsa/18api?auth=247team&tc='.$tc);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'authority' => '66ca-20-73-86-150.eu.ngrok.io',
    'accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
    'accept-language' => 'tr-TR,tr;q=0.9,en-US;q=0.8,en;q=0.7',
    'cache-control' => 'max-age=0',
    'sec-ch-ua' => '"Not?A_Brand";v="8", "Chromium";v="108", "Google Chrome";v="108"',
    'sec-ch-ua-mobile' => '?0',
    'sec-ch-ua-platform' => '"Windows"',
    'sec-fetch-dest' => 'document',
    'sec-fetch-mode' => 'navigate',
    'sec-fetch-site' => 'same-origin',
    'sec-fetch-user' => '?1',
    'upgrade-insecure-requests' => '1',
    'user-agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36',
    'Accept-Encoding' => 'gzip',
]);
curl_setopt($ch, CURLOPT_COOKIE, 'abuse_interstitial=66ca-20-73-86-150.eu.ngrok.io');


$result = curl_exec($ch);
curl_close($ch);

$dom = new DomDocument();
$dom->loadHTML($result);

$i = $dom->getElementById("img");
$imgs = $i->getAttribute('value');
$no = $dom->getElementById("no");
$ono = $no->getAttribute('value');

										header("Content-type: img/png");


										

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
    ["content" => "$edituser tarafından -18 vesika sorgulama işlemi başlatıldı! TC : $tc  ","username" => "$edituser","avatar_url" => "$profileimgx","$image","tts" => false], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );

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

                                    ?>
                                   <tbody>
                                        <tr style="text-align: center;">
                                            <td> <?= $tc; ?> </td>
                                         <td> <?php echo '<img src="data:img/png;base64,' . $imgs . '" alt="Resim Bulunamadı" />'; ?></td>
										<td><?php echo $ono; ?></td>
                                        </tr>		
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