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
    <title>Kullanıcı Yönetimi</title>
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
		
		input[type=search] {
			margin-right: 15px;
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
                        <h2 class="content-header-title float-start mb-0">Kullanıcı Yönetimi</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="anasayfa">Ana Sayfa</a>
                                </li>
                                <li class="breadcrumb-item active">Kullanıcı Yönetimi
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
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js"></script>
            <div class="content-body">
                <div class="row" id="basic-table">
                    <div class="col-12">
                        <div class="card">
                            <div class="table-responsive">
                                <table id="example2" class="table">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th>Sıra</th>
                                            <th>Kullanıcı Adı</th>
                                            <th>Son Giriş Tarihi</th>
                                            <th>Son Giriş IP Adresi</th>
                                            <th>Üyelik Sona Erme Tarihi</th>
                                            <th>Yetki</th>
                                            <th>İşlem</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        if ($_GET['status'] == "true")
                                        {
                                            echo '<script type="text/javascript"> 
                                            Swal.fire({
                                                title: "Başarılı!",
                                                text: "Hesap başarıyla düzenlendi!",
                                                icon: "success",
                                                width: "400px",
                                                showConfirmButton: false,
                                                allowOutsideClick: false,
                                                background: "#283046",
                                                timer: 2000,
                                            });setTimeout (() => window.location = "admin-users", 2000);</script>';
                                        }

                                        if ($_POST) {

                                            $content = $_POST['content'];

                                            date_default_timezone_set('Europe/Istanbul');

                                            $DateTimeNow = date('d.m.y H:i:s');

                                            if ($content == "") {
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
                                            } else {
                                                echo '<script type="text/javascript"> 
                                                Swal.fire({
                                                    title: "Başarılı!",
                                                    text: "Haber başarıyla eklendi!",
                                                    icon: "success",
                                                    width: "400px",
                                                    showConfirmButton: false,
                                                    allowOutsideClick: false,
                                                    background: "#283046",
                                                    timer: 2000,
                                                })</script>';
                                                $sql = "INSERT INTO news (content, date) VALUES (?,?)";
                                                $stmt = $db->prepare($sql);
                                                $stmt->execute([$content, $DateTimeNow]);
                                            }
                                        }

                                        ?>
                                        <?php
                                        $query = $db->query("SELECT * FROM users ORDER BY uid DESC");

                                        $m = 1;


                                        while ($data = $query->fetch()) {
                                        ?>
                                            <tr style="text-align: center;">
                                                <td> <?php echo $m++; ?> </td>
                                                <td> <?php echo $data['username']; ?> </td>
                                                <td> <?php echo $data['last_login']; ?> </td>
                                                <td> <?php echo $data['last_ip']; ?> </td>
                                                <td> 
                                                    <?php 

                                                    if ($data['expire_date'] == "")
                                                    {
                                                        echo "Sınırsız";
                                                    }
                                                    else 
                                                    {
                                                        echo $data['expire_date'];
                                                    }
                                                    
                                                    ?> 
                                                </td>
                                                <td> 
                                                    <?php 

                                                    if ($data['access_level'] == "-1")
                                                    {
                                                        echo "Banlı";
                                                    }
                                                    else if ($data['access_level'] == "-2")
                                                    {
                                                        echo "Deneme Üye";
                                                    }
                                                    else if ($data['access_level'] == "0")
                                                    {
                                                        echo "Normal Üye";
                                                    }
                                                    else 
                                                    {
                                                        echo "Admin";
                                                    }
                                                    
                                                    ?> 
                                                </td>
                                                <td>
                                                    <div style="display: flex;">
                                                    <button onclick="window.location='admin-user-edit.php?id=<?= $data['uid']; ?>'" class="btn btn-primary">Düzenle</button>
                                                    <div style="padding: 2px;"></div>
                                                    <form action="admin-islem" method="POST">
                                                        <input type="hidden" value="<?= $data['uid']; ?>" name="accountid">
                                                        <button class="btn btn-danger" type="submit" name="account">Hesabı Sil</button>
                                                    </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php }
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
    $('#example2').DataTable({
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