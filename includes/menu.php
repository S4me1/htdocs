<DOCTYPE! html>
<html>
	<head>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/130527/h5ab-snow-flurry.js"></script>
	
	<style>
.sf-snow-flake {
	position: fixed;
	top: -20px;
	z-index: 99999;
}
.sf-snow-anim {
	top: 110%;
}
</style>
</head>

	<body>
	<script>
jQuery(document).ready(function($){
$(document).snowFlurry({
	maxSize: 6,
	numberOfFlakes: 50,
	minSpeed: 8,
	maxSpeed: 10,
	color: '#fff',
	timeout: 0
});
});
</script>
	</body>
		</html>

<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto"><a class="navbar-brand" href="anasayfa"><span class="brand-logo">
                       
                    <h2 class="brand-text">VİVA CHECK</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            
            <li><a class="d-flex align-items-center" href="anasayfa"><i data-feather="home"></i></i><span class="menu-item text-truncate" data-i18n="AnaSayfa">Ana Sayfa</span></a></li>
            <li class="nav-item"><a class="d-flex align-items-center" href="paketler"><i data-feather="credit-card"></i><span class="menu-title text-truncate">Fiyat Listesi</span></a>
            <li class="navigation-header mt-2"><span style="text-transform: capitalize;">Sorgu Çözümleri</span><i data-feather="more-horizontal"></i></li>
            <li class="nav-item"><a class="d-flex align-items-center" href="adsoyadsorgu"><i data-feather="user"></i><span class="menu-title text-truncate">Ad Soyad Sorgu</span></a>
			<li class="nav-item"><a class="d-flex align-items-center" href="tcsorgu"><i data-feather="user-check"></i><span class="menu-title text-truncate">TC Sorgu</span></a>
            <li class="nav-item"><a class="d-flex align-items-center" href="ailesorgu"><i data-feather="users"></i><span class="menu-title text-truncate">Aile Sorgu</span></a>
			            <li class="nav-item"><a class="d-flex align-items-center" href="sulale"><i data-feather="users"></i><span class="menu-title text-truncate">Sülale Sorgu</span></a>
                        <li class="nav-item"><a class="d-flex align-items-center" href="mernis2015"><i data-feather="users"></i><span class="menu-title text-truncate">2015 Sorgu</span></a>
                        <li class="nav-item"><a class="d-flex align-items-center" href="adres"><i data-feather="user-check"></i><span class="menu-title text-truncate">Adres Sorgu</span></a>

                        <li class="nav-item"><a class="d-flex align-items-center" href="üni"><i data-feather="users"></i><span class="menu-title text-truncate">Üniversite Sorgu</span></a> 
                        <li class="nav-item"><a class="d-flex align-items-center" href="ası"><i data-feather="user-check"></i><span class="menu-title text-truncate">Aşı Sorgu</span></a> 
            			<li class="nav-item"><a class="d-flex align-items-center" href="okul"><i data-feather="users"></i><span class="menu-title text-truncate">Okul Sorgu</span></a> 
                        <li class="nav-item"><a class="d-flex align-items-center" href="okul2"><i data-feather="users"></i><span class="menu-title text-truncate">E Okul Vesika</span></a> 
                        <li class="nav-item"><a class="d-flex align-items-center" href="vesika"><i data-feather="user-check"></i><span class="menu-title text-truncate">Ehliyet Vesika</span></a> 


            			<li class="navigation-header mt-2"><span style="text-transform: capitalize;">Numara Çözümleri</span><i data-feather="more-horizontal"></i></li>
            <li class="nav-item"><a class="d-flex align-items-center" href="gsmtc"><i data-feather="smartphone"></i><span class="menu-title text-truncate">GSM'den TC</span></a>
            <li class="nav-item"><a class="d-flex align-items-center" href="tcgsm"><i data-feather="phone"></i><span class="menu-title text-truncate">TC'den GSM</span></a>
            							<li class="nav-item"><a class="d-flex align-items-center" href="sms.php"><i data-feather="phone-forwarded"></i><span class="menu-title text-truncate">SMS Boomer</span></a>
            			


            <!--<li class="nav-item"><a class="d-flex align-items-center" href="soyagacısorgu.php"><i data-feather="search"></i><span class="menu-title text-truncate">Soyağacı Sorgu</span></a>-->
            
            
			
            
	<li class="navigation-header mt-2"><span style="text-transform: capitalize;">İnternet Çözümleri</span><i data-feather="more-horizontal"></i></li>
						            <li class="nav-item"><a class="d-flex align-items-center" href="discord"><i data-feather="check"></i><span class="menu-title text-truncate">Discord ID Sorgu</span></a>
                                    <li class="nav-item"><a class="d-flex align-items-center" href="facebooksorgu"><i data-feather="check"></i><span class="menu-title text-truncate">Facebook Sorgu</span></a> 
                                    <li class="nav-item"><a class="d-flex align-items-center" href="ttnetsorgu"><i data-feather="check"></i><span class="menu-title text-truncate">TTNet Sorgu</span></a>                                                     
		           <li class="nav-item"><a class="d-flex align-items-center" href="binchecker"><i data-feather="credit-card"></i><span class="menu-title text-truncate">Bin Sorgu</span></a>


			

                <?php

                include 'baglan.php';

                session_start();

                $GET_USERNAME = $_SESSION['GET_USER_SSID'];

                $USERNAMEQUERY = $db->query("SELECT * FROM users WHERE token = '$GET_USERNAME'");

                while ($USERNAMEDATA = $USERNAMEQUERY->fetch()) {
                    $NICKNAME = $USERNAMEDATA['username'];
                    $CHECKUSERACCESS = $USERNAMEDATA['access_level'];
                }

                $domainw = $_SERVER['SERVER_NAME'];

                if ($CHECKUSERACCESS >= 1) {

                ?>
            <li class="navigation-header mt-2"><span style="text-transform: capitalize;">Admin</span><i data-feather="more-horizontal"></i></li>
            <li class="nav-item"><a class="d-flex align-items-center" href="admin-news"><i data-feather="bell"></i><span class="menu-title text-truncate">Duyurular</span></a>
            <li class="nav-item"><a class="d-flex align-items-center" href="admin-users"><i data-feather="edit"></i><span class="menu-title text-truncate">Kullanıcı Yönetimi</span></a>
            <li class="nav-item"><a class="d-flex align-items-center" href="admin-user-add"><i data-feather="user-plus"></i><span class="menu-title text-truncate">Kullanıcı Ekle</span></a>
            <li class="nav-item"><a class="d-flex align-items-center" href="admin-ban"><i data-feather="slash"></i><span class="menu-title text-truncate">Ban Yönetimi</span></a>
            <li class="nav-item"><a class="d-flex align-items-center" href="admin-whitelist"><i data-feather="cloud"></i><span class="menu-title text-truncate">Whitelist Yönetimi</span></a>
            		          <li class="nav-item"><a class="d-flex align-items-center" href="didos"><i data-feather="cloud"></i><span class="menu-title text-truncate">DDOS</span></a>
            <?php
                }
            ?>
        </ul>
    </div>
</div>