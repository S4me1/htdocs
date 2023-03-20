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
    <title>Sülale Sorgu</title>
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
	<link rel="stylesheet" href="app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css">
	
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
		
		input[type=search]
		{
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
                        <h2 class="content-header-title float-start mb-0">Sülale Sorgu</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="anasayfa">Ana Sayfa</a>
                                </li>
                                <li class="breadcrumb-item active">Sülale Sorgu
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
                                <h4 class="card-title"> Sülale Sorgu</h4>
                            </div>
                            <form action="sulale" method="POST">
                                <div class="card-body">
                                    <div class="row">
                                        <section id="floating-label-input">
                                            <div class="arama">
                                                <div class="col-sm-6 col-12 mb-1 mb-sm-0">
                                                    <div class="form-floating">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="basicInput">TC NO :</label>
                                                            <input type="text" maxlength="11" class="form-control" name="ad" id="ad" placeholder="Kişinin TC Kimlik Numarasını Giriniz.." />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>

                                        <div class="card-header">
                                            <section id="bootstrap-toasts">
                                                <button type="submit" name="ara" class="btn waves-effect toast-basic-toggler waves-light btn-rounded btn-primary" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fa fa-search"></i> Sorgula</button>
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
                               
                                 
										<th>YAKINLIK</th>
                                            <th>TC</th>
                                            <th>ADI</th>
                                            <th>SOYADI</th>
                                            <th>DOGUMTARIHI</th>
                                                                                        <th>ANNE</th>
                                            <th>ANNE TC</th>
                                                        <th>BABA</th>
                                            <th>BABA TC</th>
                                            <th>IL</th>
                                            <th>ILCE</th>
                                
											    <th>UYRUK</th>
                                        </tr>
                                 
                                    
                              
           <?php
            $baglanti = new mysqli('localhost', 'root', '', '101m');
            if (isset($_POST["ara"])) {
				
                $str = $_POST["ad"];
                $sth = $baglanti->prepare("SELECT * FROM `101m`");
            // read all row from database table
			$sql = "SELECT * FROM `101m` WHERE `TC` = '$str'";
			$result = $baglanti->query($sql);

            // read data of each row
			while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td> KENDİSİ </td>
                    <td>" . $row["TC"] . "</td>
                    <td>" . $row["ADI"] . "</td>
                    <td>" . $row["SOYADI"] . "</td>
                    <td>" . $row["DOGUMTARIHI"] . "</td>
                    <td>" . $row["ANNEADI"] . "</td>
                    <td>" . $row["ANNETC"] . "</td>
                    <td>" . $row["BABAADI"] . "</td>
                    <td>" . $row["BABATC"] . "</td>
                    <td>" . $row["NUFUSIL"] . "</td>
                    <td>" . $row["NUFUSILCE"] . "</td>
                    <td>" . $row["UYRUK"] . "</td>
                </tr>";
                $sqlcocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                $resultcocugu = $baglanti->query($sqlcocugu);

                $sqlkardesi = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["BABATC"] ."' OR `ANNETC` = '" . $row["ANNETC"] ."' ) ";
                $resultkardesi = $baglanti->query($sqlkardesi);
                $sqlbabasi = "SELECT * FROM `101m` WHERE `TC` = '" . $row["BABATC"] ."' ";
                $resultbabasi = $baglanti->query($sqlbabasi);
                $sqlanasi = "SELECT * FROM `101m` WHERE `TC` = '" . $row["ANNETC"] ."' ";
                $resultanasi = $baglanti->query($sqlanasi);

                $sqlkendicocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                $resultkendicocugu = $baglanti->query($sqlkendicocugu);
                while($row = $resultkendicocugu->fetch_assoc()) {
                    echo "<tr>
                        <td> ÇOCUĞU </td>
                        <td>" . $row["TC"] . "</td>
                        <td>" . $row["ADI"] . "</td>
                        <td>" . $row["SOYADI"] . "</td>
                        <td>" . $row["DOGUMTARIHI"] . "</td>
                        <td>" . $row["ANNEADI"] . "</td>
                        <td>" . $row["ANNETC"] . "</td>
                        <td>" . $row["BABAADI"] . "</td>
                        <td>" . $row["BABATC"] . "</td>
                        <td>" . $row["NUFUSIL"] . "</td>
                        <td>" . $row["NUFUSILCE"] . "</td>
                        <td>" . $row["UYRUK"] . "</td>
                    </tr>";
                    $sqlkendikendicocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                    $resultkendikendicocugu = $baglanti->query($sqlkendikendicocugu);    
                    while($row = $resultkendikendicocugu->fetch_assoc()) {
                        echo "<tr>
                            <td> TORUNU </td>
                            <td>" . $row["TC"] . "</td>
                            <td>" . $row["ADI"] . "</td>
                            <td>" . $row["SOYADI"] . "</td>
                            <td>" . $row["DOGUMTARIHI"] . "</td>
                            <td>" . $row["ANNEADI"] . "</td>
                            <td>" . $row["ANNETC"] . "</td>
                            <td>" . $row["BABAADI"] . "</td>
                            <td>" . $row["BABATC"] . "</td>
                            <td>" . $row["NUFUSIL"] . "</td>
                            <td>" . $row["NUFUSILCE"] . "</td>
                            <td>" . $row["UYRUK"] . "</td>
                        </tr>";
                        $sqlkendikendikendicocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                        $resultkendikendikendicocugu = $baglanti->query($sqlkendikendikendicocugu);    
                        while($row = $resultkendikendikendicocugu->fetch_assoc()) {
                            echo "<tr>
                                <td> TORUNUNUN ÇOCUĞU </td>
                                <td>" . $row["TC"] . "</td>
                                <td>" . $row["ADI"] . "</td>
                                <td>" . $row["SOYADI"] . "</td>
                                <td>" . $row["DOGUMTARIHI"] . "</td>
                                <td>" . $row["ANNEADI"] . "</td>
                                <td>" . $row["ANNETC"] . "</td>
                                <td>" . $row["BABAADI"] . "</td>
                                <td>" . $row["BABATC"] . "</td>
                                <td>" . $row["NUFUSIL"] . "</td>
                                <td>" . $row["NUFUSILCE"] . "</td>
                                <td>" . $row["UYRUK"] . "</td>
                            </tr>";
                            
                        }
                    }
                }
                while($row = $resultkardesi->fetch_assoc()) {
                    echo "<tr>
                        <td> KARDEŞİ </td>
                        <td>" . $row["TC"] . "</td>
                        <td>" . $row["ADI"] . "</td>
                        <td>" . $row["SOYADI"] . "</td>
                        <td>" . $row["DOGUMTARIHI"] . "</td>
                        <td>" . $row["ANNEADI"] . "</td>
                        <td>" . $row["ANNETC"] . "</td>
                        <td>" . $row["BABAADI"] . "</td>
                        <td>" . $row["BABATC"] . "</td>
                        <td>" . $row["NUFUSIL"] . "</td>
                        <td>" . $row["NUFUSILCE"] . "</td>
                        <td>" . $row["UYRUK"] . "</td>
                    </tr>";
                    $sqlkardescocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                    $resultkardescocugu = $baglanti->query($sqlkardescocugu);
                    while($row = $resultkardescocugu->fetch_assoc()) {
                        echo "<tr>
                            <td> KARDEŞİNİN ÇOCUĞU </td>
                            <td>" . $row["TC"] . "</td>
                            <td>" . $row["ADI"] . "</td>
                            <td>" . $row["SOYADI"] . "</td>
                            <td>" . $row["DOGUMTARIHI"] . "</td>
                            <td>" . $row["ANNEADI"] . "</td>
                            <td>" . $row["ANNETC"] . "</td>
                            <td>" . $row["BABAADI"] . "</td>
                            <td>" . $row["BABATC"] . "</td>
                            <td>" . $row["NUFUSIL"] . "</td>
                            <td>" . $row["NUFUSILCE"] . "</td>
                            <td>" . $row["UYRUK"] . "</td>
                        </tr>";
                        
                        $sqlkardeskardescocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                        $resultkardeskardescocugu = $baglanti->query($sqlkardeskardescocugu);    
                        while($row = $resultkardeskardescocugu->fetch_assoc()) {
                            echo "<tr>
                                <td> KARDEŞİNİN TORUNU </td>
                                <td>" . $row["TC"] . "</td>
                                <td>" . $row["ADI"] . "</td>
                                <td>" . $row["SOYADI"] . "</td>
                                <td>" . $row["DOGUMTARIHI"] . "</td>
                                <td>" . $row["ANNEADI"] . "</td>
                                <td>" . $row["ANNETC"] . "</td>
                                <td>" . $row["BABAADI"] . "</td>
                                <td>" . $row["BABATC"] . "</td>
                                <td>" . $row["NUFUSIL"] . "</td>
                                <td>" . $row["NUFUSILCE"] . "</td>
                                <td>" . $row["UYRUK"] . "</td>
                            </tr>";
                            $sqlkardeskardeskardescocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                            $resultkardeskardeskardescocugu = $baglanti->query($sqlkardeskardeskardescocugu);    
                            while($row = $resultkardeskardeskardescocugu->fetch_assoc()) {
                                echo "<tr>
                                    <td> KARDEŞİNİN TORUNUNUN ÇOCUĞU </td>
                                    <td>" . $row["TC"] . "</td>
                                    <td>" . $row["ADI"] . "</td>
                                    <td>" . $row["SOYADI"] . "</td>
                                    <td>" . $row["DOGUMTARIHI"] . "</td>
                                    <td>" . $row["ANNEADI"] . "</td>
                                    <td>" . $row["ANNETC"] . "</td>
                                    <td>" . $row["BABAADI"] . "</td>
                                    <td>" . $row["BABATC"] . "</td>
                                    <td>" . $row["NUFUSIL"] . "</td>
                                    <td>" . $row["NUFUSILCE"] . "</td>
                                    <td>" . $row["UYRUK"] . "</td>
                                </tr>";
                                
                            }
                        }
                    }
    
                }
    
                while($row = $resultbabasi->fetch_assoc()) {
                    echo "<tr>
                        <td> BABASI </td>
                        <td>" . $row["TC"] . "</td>
                        <td>" . $row["ADI"] . "</td>
                        <td>" . $row["SOYADI"] . "</td>
                        <td>" . $row["DOGUMTARIHI"] . "</td>
                        <td>" . $row["ANNEADI"] . "</td>
                        <td>" . $row["ANNETC"] . "</td>
                        <td>" . $row["BABAADI"] . "</td>
                        <td>" . $row["BABATC"] . "</td>
                        <td>" . $row["NUFUSIL"] . "</td>
                        <td>" . $row["NUFUSILCE"] . "</td>
                        <td>" . $row["UYRUK"] . "</td>
                    </tr>";
                    $sqlbabakardesi = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["BABATC"] ."' OR `ANNETC` = '" . $row["ANNETC"] ."' ) ";
                    $resultbabakardesi = $baglanti->query($sqlbabakardesi);
                    $sqlbabababasi = "SELECT * FROM `101m` WHERE `TC` = '" . $row["BABATC"] ."' ";
                    $resultbabababasi = $baglanti->query($sqlbabababasi);
                    $sqlbabaanasi = "SELECT * FROM `101m` WHERE `TC` = '" . $row["ANNETC"] ."' ";
                    $resultbabaanasi = $baglanti->query($sqlbabaanasi);
    
                    while($row = $resultbabakardesi->fetch_assoc()) {
                        echo "<tr>
                            <td> BABASININ KARDEŞİ </td>
                            <td>" . $row["TC"] . "</td>
                            <td>" . $row["ADI"] . "</td>
                            <td>" . $row["SOYADI"] . "</td>
                            <td>" . $row["DOGUMTARIHI"] . "</td>
                            <td>" . $row["ANNEADI"] . "</td>
                            <td>" . $row["ANNETC"] . "</td>
                            <td>" . $row["BABAADI"] . "</td>
                            <td>" . $row["BABATC"] . "</td>
                            <td>" . $row["NUFUSIL"] . "</td>
                            <td>" . $row["NUFUSILCE"] . "</td>
                            <td>" . $row["UYRUK"] . "</td>
                        </tr>";
                        $sqlbabakardescocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                        $resultbabakardescocugu = $baglanti->query($sqlbabakardescocugu);
                        while($row = $resultbabakardescocugu->fetch_assoc()) {
                            echo "<tr>
                                <td> BABASININ KARDEŞİNİN ÇOCUĞU </td>
                                <td>" . $row["TC"] . "</td>
                                <td>" . $row["ADI"] . "</td>
                                <td>" . $row["SOYADI"] . "</td>
                                <td>" . $row["DOGUMTARIHI"] . "</td>
                                <td>" . $row["ANNEADI"] . "</td>
                                <td>" . $row["ANNETC"] . "</td>
                                <td>" . $row["BABAADI"] . "</td>
                                <td>" . $row["BABATC"] . "</td>
                                <td>" . $row["NUFUSIL"] . "</td>
                                <td>" . $row["NUFUSILCE"] . "</td>
                                <td>" . $row["UYRUK"] . "</td>
                            </tr>";
                            $sqlbabakardesbabakardescocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                            $resultbabakardesbabakardescocugu = $baglanti->query($sqlbabakardesbabakardescocugu);    
                            while($row = $resultbabakardesbabakardescocugu->fetch_assoc()) {
                                echo "<tr>
                                    <td> BABASININ KARDEŞİNİN TORUNU </td>
                                    <td>" . $row["TC"] . "</td>
                                    <td>" . $row["ADI"] . "</td>
                                    <td>" . $row["SOYADI"] . "</td>
                                    <td>" . $row["DOGUMTARIHI"] . "</td>
                                    <td>" . $row["ANNEADI"] . "</td>
                                    <td>" . $row["ANNETC"] . "</td>
                                    <td>" . $row["BABAADI"] . "</td>
                                    <td>" . $row["BABATC"] . "</td>
                                    <td>" . $row["NUFUSIL"] . "</td>
                                    <td>" . $row["NUFUSILCE"] . "</td>
                                    <td>" . $row["UYRUK"] . "</td>
                                </tr>";
                                $sqlbabakardesbabakardesbabakardescocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                                $resultbabakardesbabakardesbabakardescocugu = $baglanti->query($sqlbabakardesbabakardesbabakardescocugu);    
                                while($row = $resultbabakardesbabakardesbabakardescocugu->fetch_assoc()) {
                                    echo "<tr>
                                        <td> BABASININ KARDEŞİNİN TORUNUNUN ÇOCUĞU </td>
                                        <td>" . $row["TC"] . "</td>
                                        <td>" . $row["ADI"] . "</td>
                                        <td>" . $row["SOYADI"] . "</td>
                                        <td>" . $row["DOGUMTARIHI"] . "</td>
                                        <td>" . $row["ANNEADI"] . "</td>
                                        <td>" . $row["ANNETC"] . "</td>
                                        <td>" . $row["BABAADI"] . "</td>
                                        <td>" . $row["BABATC"] . "</td>
                                        <td>" . $row["NUFUSIL"] . "</td>
                                        <td>" . $row["NUFUSILCE"] . "</td>
                                        <td>" . $row["UYRUK"] . "</td>
                                    </tr>";
                                    
                                }
                            }

                        }
                    }
            
                        while($row = $resultbabababasi->fetch_assoc()) {
                            echo "<tr>
                                <td> BABASININ BABASI </td>
                                <td>" . $row["TC"] . "</td>
                                <td>" . $row["ADI"] . "</td>
                                <td>" . $row["SOYADI"] . "</td>
                                <td>" . $row["DOGUMTARIHI"] . "</td>
                                <td>" . $row["ANNEADI"] . "</td>
                                <td>" . $row["ANNETC"] . "</td>
                                <td>" . $row["BABAADI"] . "</td>
                                <td>" . $row["BABATC"] . "</td>
                                <td>" . $row["NUFUSIL"] . "</td>
                                <td>" . $row["NUFUSILCE"] . "</td>
                                <td>" . $row["UYRUK"] . "</td>
                            </tr>";
                            $sqlbabakardesi = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["BABATC"] ."' OR `ANNETC` = '" . $row["ANNETC"] ."' ) ";
                            $resultbabakardesi = $baglanti->query($sqlbabakardesi);
                            $sqlbabababasi = "SELECT * FROM `101m` WHERE `TC` = '" . $row["BABATC"] ."' ";
                            $resultbabababasi = $baglanti->query($sqlbabababasi);
                            $sqlbabaanasi = "SELECT * FROM `101m` WHERE `TC` = '" . $row["ANNETC"] ."' ";
                            $resultbabaanasi = $baglanti->query($sqlbabaanasi);
            
                            while($row = $resultbabakardesi->fetch_assoc()) {
                                echo "<tr>
                                    <td> BABASININ BABASININ KARDEŞİ </td>
                                    <td>" . $row["TC"] . "</td>
                                    <td>" . $row["ADI"] . "</td>
                                    <td>" . $row["SOYADI"] . "</td>
                                    <td>" . $row["DOGUMTARIHI"] . "</td>
                                    <td>" . $row["ANNEADI"] . "</td>
                                    <td>" . $row["ANNETC"] . "</td>
                                    <td>" . $row["BABAADI"] . "</td>
                                    <td>" . $row["BABATC"] . "</td>
                                    <td>" . $row["NUFUSIL"] . "</td>
                                    <td>" . $row["NUFUSILCE"] . "</td>
                                    <td>" . $row["UYRUK"] . "</td>
                                </tr>";
                                $sqlbabababakardescocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                                $resultbabababakardescocugu = $baglanti->query($sqlbabababakardescocugu);
                                while($row = $resultbabababakardescocugu->fetch_assoc()) {
                                    echo "<tr>
                                        <td> BABASININ BABASININ KARDEŞİNİN ÇOCUĞU </td>
                                        <td>" . $row["TC"] . "</td>
                                        <td>" . $row["ADI"] . "</td>
                                        <td>" . $row["SOYADI"] . "</td>
                                        <td>" . $row["DOGUMTARIHI"] . "</td>
                                        <td>" . $row["ANNEADI"] . "</td>
                                        <td>" . $row["ANNETC"] . "</td>
                                        <td>" . $row["BABAADI"] . "</td>
                                        <td>" . $row["BABATC"] . "</td>
                                        <td>" . $row["NUFUSIL"] . "</td>
                                        <td>" . $row["NUFUSILCE"] . "</td>
                                        <td>" . $row["UYRUK"] . "</td>
                                    </tr>";
                                    $sqlbabababakardesbabababakardescocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                                    $resultbabababakardesbabababakardescocugu = $baglanti->query($sqlbabababakardesbabababakardescocugu);    
                                    while($row = $resultbabababakardesbabababakardescocugu->fetch_assoc()) {
                                        echo "<tr>
                                            <td> BABASININ BABASININ KARDEŞİNİN TORUNU </td>
                                            <td>" . $row["TC"] . "</td>
                                            <td>" . $row["ADI"] . "</td>
                                            <td>" . $row["SOYADI"] . "</td>
                                            <td>" . $row["DOGUMTARIHI"] . "</td>
                                            <td>" . $row["ANNEADI"] . "</td>
                                            <td>" . $row["ANNETC"] . "</td>
                                            <td>" . $row["BABAADI"] . "</td>
                                            <td>" . $row["BABATC"] . "</td>
                                            <td>" . $row["NUFUSIL"] . "</td>
                                            <td>" . $row["NUFUSILCE"] . "</td>
                                            <td>" . $row["UYRUK"] . "</td>
                                        </tr>";
                                        $sqlbabababakardesbabababakardesbabababakardescocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                                        $resultbabababakardesbabababakardesbabababakardescocugu = $baglanti->query($sqlbabababakardesbabababakardesbabababakardescocugu);    
                                        while($row = $resultbabababakardesbabababakardesbabababakardescocugu->fetch_assoc()) {
                                            echo "<tr>
                                                <td> BABASININ BABASININ KARDEŞİNİN TORUNUNUN ÇOCUĞU </td>
                                                <td>" . $row["TC"] . "</td>
                                                <td>" . $row["ADI"] . "</td>
                                                <td>" . $row["SOYADI"] . "</td>
                                                <td>" . $row["DOGUMTARIHI"] . "</td>
                                                <td>" . $row["ANNEADI"] . "</td>
                                                <td>" . $row["ANNETC"] . "</td>
                                                <td>" . $row["BABAADI"] . "</td>
                                                <td>" . $row["BABATC"] . "</td>
                                                <td>" . $row["NUFUSIL"] . "</td>
                                                <td>" . $row["NUFUSILCE"] . "</td>
                                                <td>" . $row["UYRUK"] . "</td>
                                            </tr>";
                                            
                                        }
                                    }
                                }
                            }
                
                            while($row = $resultbabababasi->fetch_assoc()) {
                                echo "<tr>
                                    <td> BABASININ BABASININ BABASI </td>
                                    <td>" . $row["TC"] . "</td>
                                    <td>" . $row["ADI"] . "</td>
                                    <td>" . $row["SOYADI"] . "</td>
                                    <td>" . $row["DOGUMTARIHI"] . "</td>
                                    <td>" . $row["ANNEADI"] . "</td>
                                    <td>" . $row["ANNETC"] . "</td>
                                    <td>" . $row["BABAADI"] . "</td>
                                    <td>" . $row["BABATC"] . "</td>
                                    <td>" . $row["NUFUSIL"] . "</td>
                                    <td>" . $row["NUFUSILCE"] . "</td>
                                    <td>" . $row["UYRUK"] . "</td>
                                </tr>";
                                
                            }
                            while($row = $resultbabaanasi->fetch_assoc()) {
                                echo "<tr>
                                    <td> BABASININ BABASININ ANASI </td>
                                    <td>" . $row["TC"] . "</td>
                                    <td>" . $row["ADI"] . "</td>
                                    <td>" . $row["SOYADI"] . "</td>
                                    <td>" . $row["DOGUMTARIHI"] . "</td>
                                    <td>" . $row["ANNEADI"] . "</td>
                                    <td>" . $row["ANNETC"] . "</td>
                                    <td>" . $row["BABAADI"] . "</td>
                                    <td>" . $row["BABATC"] . "</td>
                                    <td>" . $row["NUFUSIL"] . "</td>
                                    <td>" . $row["NUFUSILCE"] . "</td>
                                    <td>" . $row["UYRUK"] . "</td>
                                </tr>";
                                
                            }

                        }
                        while($row = $resultbabaanasi->fetch_assoc()) {
                            echo "<tr>
                                <td> BABASININ ANASI </td>
                                <td>" . $row["TC"] . "</td>
                                <td>" . $row["ADI"] . "</td>
                                <td>" . $row["SOYADI"] . "</td>
                                <td>" . $row["DOGUMTARIHI"] . "</td>
                                <td>" . $row["ANNEADI"] . "</td>
                                <td>" . $row["ANNETC"] . "</td>
                                <td>" . $row["BABAADI"] . "</td>
                                <td>" . $row["BABATC"] . "</td>
                                <td>" . $row["NUFUSIL"] . "</td>
                                <td>" . $row["NUFUSILCE"] . "</td>
                                <td>" . $row["UYRUK"] . "</td>
                            </tr>";
                            $sqlbabakardesi = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["BABATC"] ."' OR `ANNETC` = '" . $row["ANNETC"] ."' ) ";
                            $resultbabakardesi = $baglanti->query($sqlbabakardesi);
                            $sqlbabababasi = "SELECT * FROM `101m` WHERE `TC` = '" . $row["BABATC"] ."' ";
                            $resultbabababasi = $baglanti->query($sqlbabababasi);
                            $sqlbabaanasi = "SELECT * FROM `101m` WHERE `TC` = '" . $row["ANNETC"] ."' ";
                            $resultbabaanasi = $baglanti->query($sqlbabaanasi);
            
                            while($row = $resultbabakardesi->fetch_assoc()) {
                                echo "<tr>
                                    <td> BABASININ ANNESİNİN KARDEŞİ </td>
                                    <td>" . $row["TC"] . "</td>
                                    <td>" . $row["ADI"] . "</td>
                                    <td>" . $row["SOYADI"] . "</td>
                                    <td>" . $row["DOGUMTARIHI"] . "</td>
                                    <td>" . $row["ANNEADI"] . "</td>
                                    <td>" . $row["ANNETC"] . "</td>
                                    <td>" . $row["BABAADI"] . "</td>
                                    <td>" . $row["BABATC"] . "</td>
                                    <td>" . $row["NUFUSIL"] . "</td>
                                    <td>" . $row["NUFUSILCE"] . "</td>
                                    <td>" . $row["UYRUK"] . "</td>
                                </tr>";
                                $sqlbabaannekardescocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                                $resultbabaannekardescocugu = $baglanti->query($sqlbabaannekardescocugu);
                                while($row = $resultbabaannekardescocugu->fetch_assoc()) {
                                    echo "<tr>
                                        <td> BABASININ ANNESİNİN KARDEŞİNİN ÇOCUĞU </td>
                                        <td>" . $row["TC"] . "</td>
                                        <td>" . $row["ADI"] . "</td>
                                        <td>" . $row["SOYADI"] . "</td>
                                        <td>" . $row["DOGUMTARIHI"] . "</td>
                                        <td>" . $row["ANNEADI"] . "</td>
                                        <td>" . $row["ANNETC"] . "</td>
                                        <td>" . $row["BABAADI"] . "</td>
                                        <td>" . $row["BABATC"] . "</td>
                                        <td>" . $row["NUFUSIL"] . "</td>
                                        <td>" . $row["NUFUSILCE"] . "</td>
                                        <td>" . $row["UYRUK"] . "</td>
                                    </tr>";
                                    $sqlbabaannekardesbabaannekardescocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                                    $resultbabaannekardesbabaannekardescocugu = $baglanti->query($sqlbabaannekardesbabaannekardescocugu);    
                                    while($row = $resultbabaannekardesbabaannekardescocugu->fetch_assoc()) {
                                        echo "<tr>
                                            <td> BABASININ ANNESİNİN KARDEŞİNİN TORUNU </td>
                                            <td>" . $row["TC"] . "</td>
                                            <td>" . $row["ADI"] . "</td>
                                            <td>" . $row["SOYADI"] . "</td>
                                            <td>" . $row["DOGUMTARIHI"] . "</td>
                                            <td>" . $row["ANNEADI"] . "</td>
                                            <td>" . $row["ANNETC"] . "</td>
                                            <td>" . $row["BABAADI"] . "</td>
                                            <td>" . $row["BABATC"] . "</td>
                                            <td>" . $row["NUFUSIL"] . "</td>
                                            <td>" . $row["NUFUSILCE"] . "</td>
                                            <td>" . $row["UYRUK"] . "</td>
                                        </tr>";
                                        $sqlbabaannekardesbabaannekardesbabaannekardescocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                                        $resultbabaannekardesbabaannekardesbabaannekardescocugu = $baglanti->query($sqlbabaannekardesbabaannekardesbabaannekardescocugu);    
                                        while($row = $resultbabaannekardesbabaannekardesbabaannekardescocugu->fetch_assoc()) {
                                            echo "<tr>
                                                <td> BABASININ ANNESİNİN KARDEŞİNİN TORUNUNUN ÇOCUĞU </td>
                                                <td>" . $row["TC"] . "</td>
                                                <td>" . $row["ADI"] . "</td>
                                                <td>" . $row["SOYADI"] . "</td>
                                                <td>" . $row["DOGUMTARIHI"] . "</td>
                                                <td>" . $row["ANNEADI"] . "</td>
                                                <td>" . $row["ANNETC"] . "</td>
                                                <td>" . $row["BABAADI"] . "</td>
                                                <td>" . $row["BABATC"] . "</td>
                                                <td>" . $row["NUFUSIL"] . "</td>
                                                <td>" . $row["NUFUSILCE"] . "</td>
                                                <td>" . $row["UYRUK"] . "</td>
                                            </tr>";
                                            
                                        }
                                    }
                                }

                            }
                
                            while($row = $resultbabababasi->fetch_assoc()) {
                                echo "<tr>
                                    <td> BABASININ ANNESİNİN BABASI </td>
                                    <td>" . $row["TC"] . "</td>
                                    <td>" . $row["ADI"] . "</td>
                                    <td>" . $row["SOYADI"] . "</td>
                                    <td>" . $row["DOGUMTARIHI"] . "</td>
                                    <td>" . $row["ANNEADI"] . "</td>
                                    <td>" . $row["ANNETC"] . "</td>
                                    <td>" . $row["BABAADI"] . "</td>
                                    <td>" . $row["BABATC"] . "</td>
                                    <td>" . $row["NUFUSIL"] . "</td>
                                    <td>" . $row["NUFUSILCE"] . "</td>
                                    <td>" . $row["UYRUK"] . "</td>
                                </tr>";
                                
                            }
                            while($row = $resultbabaanasi->fetch_assoc()) {
                                echo "<tr>
                                    <td> BABASININ ANNESİNİN ANASI </td>
                                    <td>" . $row["TC"] . "</td>
                                    <td>" . $row["ADI"] . "</td>
                                    <td>" . $row["SOYADI"] . "</td>
                                    <td>" . $row["DOGUMTARIHI"] . "</td>
                                    <td>" . $row["ANNEADI"] . "</td>
                                    <td>" . $row["ANNETC"] . "</td>
                                    <td>" . $row["BABAADI"] . "</td>
                                    <td>" . $row["BABATC"] . "</td>
                                    <td>" . $row["NUFUSIL"] . "</td>
                                    <td>" . $row["NUFUSILCE"] . "</td>
                                    <td>" . $row["UYRUK"] . "</td>
                                </tr>";
                                
                            }
    
                        }
                    }
                }
                while($row = $resultanasi->fetch_assoc()) {
                    echo "<tr>
                        <td> ANASI </td>
                        <td>" . $row["TC"] . "</td>
                        <td>" . $row["ADI"] . "</td>
                        <td>" . $row["SOYADI"] . "</td>
                        <td>" . $row["DOGUMTARIHI"] . "</td>
                        <td>" . $row["ANNEADI"] . "</td>
                        <td>" . $row["ANNETC"] . "</td>
                        <td>" . $row["BABAADI"] . "</td>
                        <td>" . $row["BABATC"] . "</td>
                        <td>" . $row["NUFUSIL"] . "</td>
                        <td>" . $row["NUFUSILCE"] . "</td>
                        <td>" . $row["UYRUK"] . "</td>
                    </tr>";
                    $sqlannekardesi = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["BABATC"] ."' OR `ANNETC` = '" . $row["ANNETC"] ."' ) ";
                    $resultannekardesi = $baglanti->query($sqlannekardesi);
                    $sqlannebabasi = "SELECT * FROM `101m` WHERE `TC` = '" . $row["BABATC"] ."' ";
                    $resultannebabasi = $baglanti->query($sqlannebabasi);
                    $sqlanneanasi = "SELECT * FROM `101m` WHERE `TC` = '" . $row["ANNETC"] ."' ";
                    $resultanneanasi = $baglanti->query($sqlanneanasi);
    
                    while($row = $resultannekardesi->fetch_assoc()) {
                        echo "<tr>
                            <td> ANNESİNİN KARDEŞİ </td>
                            <td>" . $row["TC"] . "</td>
                            <td>" . $row["ADI"] . "</td>
                            <td>" . $row["SOYADI"] . "</td>
                            <td>" . $row["DOGUMTARIHI"] . "</td>
                            <td>" . $row["ANNEADI"] . "</td>
                            <td>" . $row["ANNETC"] . "</td>
                            <td>" . $row["BABAADI"] . "</td>
                            <td>" . $row["BABATC"] . "</td>
                            <td>" . $row["NUFUSIL"] . "</td>
                            <td>" . $row["NUFUSILCE"] . "</td>
                            <td>" . $row["UYRUK"] . "</td>
                        </tr>";
                        $sqlannekardescocugu = "SELECT * FROM `101m` WHERE `BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ";
                        $resultannekardescocugu = $baglanti->query($sqlannekardescocugu);
                        while($row = $resultannekardescocugu->fetch_assoc()) {
                            echo "<tr>
                                <td> ANNESİNİN KARDEŞİNİN ÇOCUĞU </td>
                                <td>" . $row["TC"] . "</td>
                                <td>" . $row["ADI"] . "</td>
                                <td>" . $row["SOYADI"] . "</td>
                                <td>" . $row["DOGUMTARIHI"] . "</td>
                                <td>" . $row["ANNEADI"] . "</td>
                                <td>" . $row["ANNETC"] . "</td>
                                <td>" . $row["BABAADI"] . "</td>
                                <td>" . $row["BABATC"] . "</td>
                                <td>" . $row["NUFUSIL"] . "</td>
                                <td>" . $row["NUFUSILCE"] . "</td>
                                <td>" . $row["UYRUK"] . "</td>
                            </tr>";
                            $sqlannekardesannekardescocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                            $resultannekardesannekardescocugu = $baglanti->query($sqlannekardesannekardescocugu);    
                            while($row = $resultannekardesannekardescocugu->fetch_assoc()) {
                                echo "<tr>
                                    <td> ANNESİNİN KARDEŞİNİN TORUNU </td>
                                    <td>" . $row["TC"] . "</td>
                                    <td>" . $row["ADI"] . "</td>
                                    <td>" . $row["SOYADI"] . "</td>
                                    <td>" . $row["DOGUMTARIHI"] . "</td>
                                    <td>" . $row["ANNEADI"] . "</td>
                                    <td>" . $row["ANNETC"] . "</td>
                                    <td>" . $row["BABAADI"] . "</td>
                                    <td>" . $row["BABATC"] . "</td>
                                    <td>" . $row["NUFUSIL"] . "</td>
                                    <td>" . $row["NUFUSILCE"] . "</td>
                                    <td>" . $row["UYRUK"] . "</td>
                                </tr>";
                                $sqlannekardesannekardesannekardescocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                                $resultannekardesannekardesannekardescocugu = $baglanti->query($sqlannekardesannekardesannekardescocugu);    
                                while($row = $resultannekardesannekardesannekardescocugu->fetch_assoc()) {
                                    echo "<tr>
                                        <td> ANNESİNİN KARDEŞİNİN TORUNUNUN ÇOCUĞU </td>
                                        <td>" . $row["TC"] . "</td>
                                        <td>" . $row["ADI"] . "</td>
                                        <td>" . $row["SOYADI"] . "</td>
                                        <td>" . $row["DOGUMTARIHI"] . "</td>
                                        <td>" . $row["ANNEADI"] . "</td>
                                        <td>" . $row["ANNETC"] . "</td>
                                        <td>" . $row["BABAADI"] . "</td>
                                        <td>" . $row["BABATC"] . "</td>
                                        <td>" . $row["NUFUSIL"] . "</td>
                                        <td>" . $row["NUFUSILCE"] . "</td>
                                        <td>" . $row["UYRUK"] . "</td>
                                    </tr>";
                                    
                                }
                            }

                        }
                    }
        
                    while($row = $resultannebabasi->fetch_assoc()) {
                        echo "<tr>
                            <td> ANNESİNİN BABASI </td>
                            <td>" . $row["TC"] . "</td>
                            <td>" . $row["ADI"] . "</td>
                            <td>" . $row["SOYADI"] . "</td>
                            <td>" . $row["DOGUMTARIHI"] . "</td>
                            <td>" . $row["ANNEADI"] . "</td>
                            <td>" . $row["ANNETC"] . "</td>
                            <td>" . $row["BABAADI"] . "</td>
                            <td>" . $row["BABATC"] . "</td>
                            <td>" . $row["NUFUSIL"] . "</td>
                            <td>" . $row["NUFUSILCE"] . "</td>
                            <td>" . $row["UYRUK"] . "</td>
                        </tr>";
                        $sqlbabakardesi = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["BABATC"] ."' OR `ANNETC` = '" . $row["ANNETC"] ."' ) ";
                        $resultbabakardesi = $baglanti->query($sqlbabakardesi);
                        $sqlbabababasi = "SELECT * FROM `101m` WHERE `TC` = '" . $row["BABATC"] ."' ";
                        $resultbabababasi = $baglanti->query($sqlbabababasi);
                        $sqlbabaanasi = "SELECT * FROM `101m` WHERE `TC` = '" . $row["ANNETC"] ."' ";
                        $resultbabaanasi = $baglanti->query($sqlbabaanasi);
        
                        while($row = $resultbabakardesi->fetch_assoc()) {
                            echo "<tr>
                                <td> ANNESİNİN BABASININ KARDEŞİ </td>
                                <td>" . $row["TC"] . "</td>
                                <td>" . $row["ADI"] . "</td>
                                <td>" . $row["SOYADI"] . "</td>
                                <td>" . $row["DOGUMTARIHI"] . "</td>
                                <td>" . $row["ANNEADI"] . "</td>
                                <td>" . $row["ANNETC"] . "</td>
                                <td>" . $row["BABAADI"] . "</td>
                                <td>" . $row["BABATC"] . "</td>
                                <td>" . $row["NUFUSIL"] . "</td>
                                <td>" . $row["NUFUSILCE"] . "</td>
                                <td>" . $row["UYRUK"] . "</td>
                            </tr>";
                            $sqlannebabakardescocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                            $resultannebabakardescocugu = $baglanti->query($sqlannebabakardescocugu);
                            while($row = $resultannebabakardescocugu->fetch_assoc()) {
                                echo "<tr>
                                    <td> ANNESİNİN BABASININ KARDEŞİNİN ÇOCUĞU </td>
                                    <td>" . $row["TC"] . "</td>
                                    <td>" . $row["ADI"] . "</td>
                                    <td>" . $row["SOYADI"] . "</td>
                                    <td>" . $row["DOGUMTARIHI"] . "</td>
                                    <td>" . $row["ANNEADI"] . "</td>
                                    <td>" . $row["ANNETC"] . "</td>
                                    <td>" . $row["BABAADI"] . "</td>
                                    <td>" . $row["BABATC"] . "</td>
                                    <td>" . $row["NUFUSIL"] . "</td>
                                    <td>" . $row["NUFUSILCE"] . "</td>
                                    <td>" . $row["UYRUK"] . "</td>
                                </tr>";
                                $sqlannebabakardesannebabakardescocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                                $resultannebabakardesannebabakardescocugu = $baglanti->query($sqlannebabakardesannebabakardescocugu);    
                                while($row = $resultannebabakardesannebabakardescocugu->fetch_assoc()) {
                                    echo "<tr>
                                        <td> ANNESİNİN BABASININ KARDEŞİNİN TORUNU </td>
                                        <td>" . $row["TC"] . "</td>
                                        <td>" . $row["ADI"] . "</td>
                                        <td>" . $row["SOYADI"] . "</td>
                                        <td>" . $row["DOGUMTARIHI"] . "</td>
                                        <td>" . $row["ANNEADI"] . "</td>
                                        <td>" . $row["ANNETC"] . "</td>
                                        <td>" . $row["BABAADI"] . "</td>
                                        <td>" . $row["BABATC"] . "</td>
                                        <td>" . $row["NUFUSIL"] . "</td>
                                        <td>" . $row["NUFUSILCE"] . "</td>
                                        <td>" . $row["UYRUK"] . "</td>
                                    </tr>";
                                    $sqlannebabakardesannebabakardesannebabakardescocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                                    $resultannebabakardesannebabakardesannebabakardescocugu = $baglanti->query($sqlannebabakardesannebabakardesannebabakardescocugu);    
                                    while($row = $resultannebabakardesannebabakardesannebabakardescocugu->fetch_assoc()) {
                                        echo "<tr>
                                            <td> ANNESİNİN BABASININ KARDEŞİNİN TORUNUNUN ÇOCUĞU </td>
                                            <td>" . $row["TC"] . "</td>
                                            <td>" . $row["ADI"] . "</td>
                                            <td>" . $row["SOYADI"] . "</td>
                                            <td>" . $row["DOGUMTARIHI"] . "</td>
                                            <td>" . $row["ANNEADI"] . "</td>
                                            <td>" . $row["ANNETC"] . "</td>
                                            <td>" . $row["BABAADI"] . "</td>
                                            <td>" . $row["BABATC"] . "</td>
                                            <td>" . $row["NUFUSIL"] . "</td>
                                            <td>" . $row["NUFUSILCE"] . "</td>
                                            <td>" . $row["UYRUK"] . "</td>
                                        </tr>";
                                        
                                    }
                                }

                            }
                        }
            
                        while($row = $resultbabababasi->fetch_assoc()) {
                            echo "<tr>
                                <td> ANNESİNİN BABASININ BABASI </td>
                                <td>" . $row["TC"] . "</td>
                                <td>" . $row["ADI"] . "</td>
                                <td>" . $row["SOYADI"] . "</td>
                                <td>" . $row["DOGUMTARIHI"] . "</td>
                                <td>" . $row["ANNEADI"] . "</td>
                                <td>" . $row["ANNETC"] . "</td>
                                <td>" . $row["BABAADI"] . "</td>
                                <td>" . $row["BABATC"] . "</td>
                                <td>" . $row["NUFUSIL"] . "</td>
                                <td>" . $row["NUFUSILCE"] . "</td>
                                <td>" . $row["UYRUK"] . "</td>
                            </tr>";
                            
                        }
                        while($row = $resultbabaanasi->fetch_assoc()) {
                            echo "<tr>
                                <td> ANNESİNİN BABASININ ANASI </td>
                                <td>" . $row["TC"] . "</td>
                                <td>" . $row["ADI"] . "</td>
                                <td>" . $row["SOYADI"] . "</td>
                                <td>" . $row["DOGUMTARIHI"] . "</td>
                                <td>" . $row["ANNEADI"] . "</td>
                                <td>" . $row["ANNETC"] . "</td>
                                <td>" . $row["BABAADI"] . "</td>
                                <td>" . $row["BABATC"] . "</td>
                                <td>" . $row["NUFUSIL"] . "</td>
                                <td>" . $row["NUFUSILCE"] . "</td>
                                <td>" . $row["UYRUK"] . "</td>
                            </tr>";
                            
                        }
                    }
                    while($row = $resultanneanasi->fetch_assoc()) {
                        echo "<tr>
                            <td> ANNESİNİN ANASI </td>
                            <td>" . $row["TC"] . "</td>
                            <td>" . $row["ADI"] . "</td>
                            <td>" . $row["SOYADI"] . "</td>
                            <td>" . $row["DOGUMTARIHI"] . "</td>
                            <td>" . $row["ANNEADI"] . "</td>
                            <td>" . $row["ANNETC"] . "</td>
                            <td>" . $row["BABAADI"] . "</td>
                            <td>" . $row["BABATC"] . "</td>
                            <td>" . $row["NUFUSIL"] . "</td>
                            <td>" . $row["NUFUSILCE"] . "</td>
                            <td>" . $row["UYRUK"] . "</td>
                        </tr>";
                        $sqlannekardesi = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["BABATC"] ."' OR `ANNETC` = '" . $row["ANNETC"] ."' ) ";
                        $resultannekardesi = $baglanti->query($sqlannekardesi);
                        $sqlannebabasi = "SELECT * FROM `101m` WHERE `TC` = '" . $row["BABATC"] ."' ";
                        $resultannebabasi = $baglanti->query($sqlannebabasi);
                        $sqlanneanasi = "SELECT * FROM `101m` WHERE `TC` = '" . $row["ANNETC"] ."' ";
                        $resultanneanasi = $baglanti->query($sqlanneanasi);
        
                        while($row = $resultannekardesi->fetch_assoc()) {
                            echo "<tr>
                                <td> ANNESİNİN ANNESİNİN KARDEŞİ </td>
                                <td>" . $row["TC"] . "</td>
                                <td>" . $row["ADI"] . "</td>
                                <td>" . $row["SOYADI"] . "</td>
                                <td>" . $row["DOGUMTARIHI"] . "</td>
                                <td>" . $row["ANNEADI"] . "</td>
                                <td>" . $row["ANNETC"] . "</td>
                                <td>" . $row["BABAADI"] . "</td>
                                <td>" . $row["BABATC"] . "</td>
                                <td>" . $row["NUFUSIL"] . "</td>
                                <td>" . $row["NUFUSILCE"] . "</td>
                                <td>" . $row["UYRUK"] . "</td>
                            </tr>";
                            $sqlanneannekardescocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                            $resultanneannekardescocugu = $baglanti->query($sqlanneannekardescocugu);
                            while($row = $resultanneannekardescocugu->fetch_assoc()) {
                                echo "<tr>
                                    <td> ANNESİNİN ANNESİNİN KARDEŞİNİN ÇOCUĞU </td>
                                    <td>" . $row["TC"] . "</td>
                                    <td>" . $row["ADI"] . "</td>
                                    <td>" . $row["SOYADI"] . "</td>
                                    <td>" . $row["DOGUMTARIHI"] . "</td>
                                    <td>" . $row["ANNEADI"] . "</td>
                                    <td>" . $row["ANNETC"] . "</td>
                                    <td>" . $row["BABAADI"] . "</td>
                                    <td>" . $row["BABATC"] . "</td>
                                    <td>" . $row["NUFUSIL"] . "</td>
                                    <td>" . $row["NUFUSILCE"] . "</td>
                                    <td>" . $row["UYRUK"] . "</td>
                                </tr>";
                                $sqlanneannekardesanneannekardescocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                                $resultanneannekardesanneannekardescocugu = $baglanti->query($sqlanneannekardesanneannekardescocugu);    
                                while($row = $resultanneannekardesanneannekardescocugu->fetch_assoc()) {
                                    echo "<tr>
                                        <td> ANNESİNİN ANNESİNİN KARDEŞİNİN TORUNU </td>
                                        <td>" . $row["TC"] . "</td>
                                        <td>" . $row["ADI"] . "</td>
                                        <td>" . $row["SOYADI"] . "</td>
                                        <td>" . $row["DOGUMTARIHI"] . "</td>
                                        <td>" . $row["ANNEADI"] . "</td>
                                        <td>" . $row["ANNETC"] . "</td>
                                        <td>" . $row["BABAADI"] . "</td>
                                        <td>" . $row["BABATC"] . "</td>
                                        <td>" . $row["NUFUSIL"] . "</td>
                                        <td>" . $row["NUFUSILCE"] . "</td>
                                        <td>" . $row["UYRUK"] . "</td>
                                    </tr>";
                                    $sqlanneannekardesanneannekardesanneannekardescocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                                    $resultanneannekardesanneannekardesanneannekardescocugu = $baglanti->query($sqlanneannekardesanneannekardesanneannekardescocugu);    
                                    while($row = $resultanneannekardesanneannekardesanneannekardescocugu->fetch_assoc()) {
                                        echo "<tr>
                                            <td> ANNESİNİN ANNESİNİN KARDEŞİNİN TORUNUNUN ÇOCUĞU </td>
                                            <td>" . $row["TC"] . "</td>
                                            <td>" . $row["ADI"] . "</td>
                                            <td>" . $row["SOYADI"] . "</td>
                                            <td>" . $row["DOGUMTARIHI"] . "</td>
                                            <td>" . $row["ANNEADI"] . "</td>
                                            <td>" . $row["ANNETC"] . "</td>
                                            <td>" . $row["BABAADI"] . "</td>
                                            <td>" . $row["BABATC"] . "</td>
                                            <td>" . $row["NUFUSIL"] . "</td>
                                            <td>" . $row["NUFUSILCE"] . "</td>
                                            <td>" . $row["UYRUK"] . "</td>
                                        </tr>";
                                        $sqlanneannekardesanneannekardesanneannekardesanneannekardescocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                                        $resultanneannekardesanneannekardesanneannekardesanneannekardescocugu = $baglanti->query($sqlanneannekardesanneannekardesanneannekardesanneannekardescocugu);    
                                        while($row = $resultanneannekardesanneannekardesanneannekardesanneannekardescocugu->fetch_assoc()) {
                                            echo "<tr>
                                                <td> ANNESİNİN ANNESİNİN KARDEŞİNİN TORUNUNUN TORUNU </td>
                                                <td>" . $row["TC"] . "</td>
                                                <td>" . $row["ADI"] . "</td>
                                                <td>" . $row["SOYADI"] . "</td>
                                                <td>" . $row["DOGUMTARIHI"] . "</td>
                                                <td>" . $row["ANNEADI"] . "</td>
                                                <td>" . $row["ANNETC"] . "</td>
                                                <td>" . $row["BABAADI"] . "</td>
                                                <td>" . $row["BABATC"] . "</td>
                                                <td>" . $row["NUFUSIL"] . "</td>
                                                <td>" . $row["NUFUSILCE"] . "</td>
                                                <td>" . $row["UYRUK"] . "</td>
                                            </tr>";
                                            
                                    }

                                }
                            }

                        }
            
                        while($row = $resultannebabasi->fetch_assoc()) {
                            echo "<tr>
                                <td> ANNESİNİN ANNESİNİN BABASI </td>
                                <td>" . $row["TC"] . "</td>
                                <td>" . $row["ADI"] . "</td>
                                <td>" . $row["SOYADI"] . "</td>
                                <td>" . $row["DOGUMTARIHI"] . "</td>
                                <td>" . $row["ANNEADI"] . "</td>
                                <td>" . $row["ANNETC"] . "</td>
                                <td>" . $row["BABAADI"] . "</td>
                                <td>" . $row["BABATC"] . "</td>
                                <td>" . $row["NUFUSIL"] . "</td>
                                <td>" . $row["NUFUSILCE"] . "</td>
                                <td>" . $row["UYRUK"] . "</td>
                            </tr>";
                            
                        }
                        while($row = $resultanneanasi->fetch_assoc()) {
                            echo "<tr>
                                <td> ANNESİNİN ANNESİNİN ANASI </td>
                                <td>" . $row["TC"] . "</td>
                                <td>" . $row["ADI"] . "</td>
                                <td>" . $row["SOYADI"] . "</td>
                                <td>" . $row["DOGUMTARIHI"] . "</td>
                                <td>" . $row["ANNEADI"] . "</td>
                                <td>" . $row["ANNETC"] . "</td>
                                <td>" . $row["BABAADI"] . "</td>
                                <td>" . $row["BABATC"] . "</td>
                                <td>" . $row["NUFUSIL"] . "</td>
                                <td>" . $row["NUFUSILCE"] . "</td>
                                <td>" . $row["UYRUK"] . "</td>
                            </tr>";
                        }
                        }
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
<script src='app-assets/vendors/js/tables/datatable/buttons.html5.min.js'></script>
<script src='app-assets/vendors/js/tables/datatable/buttons.print.min.js'></script>
<script src='app-assets/vendors/js/tables/datatable/datatables.buttons.min.js'></script>
<script src='app-assets/vendors/js/tables/datatable/buttons.bootstrap5.min.js'></script>

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