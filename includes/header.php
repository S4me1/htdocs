<?php

include 'baglan.php';

session_start();

$GET_USERNAME = $_SESSION['GET_USER_SSID'];

$USERNAMEQUERY = $db->query("SELECT * FROM users WHERE token = '$GET_USERNAME'");

while ($USERNAMEDATA = $USERNAMEQUERY->fetch()) {
    $NICKNAME = $USERNAMEDATA['username'];
    $CHECKUSERACCESS = $USERNAMEDATA['access_level'];
    $nickcolor = $USERNAMEDATA['nick_color'];
    $profileimage = $USERNAMEDATA['profile_image'];
}

$domainw = $_SERVER['SERVER_NAME'];

if ($CHECKUSERACCESS >= 1) {
    $USERACCESS = "Admin";
} else if ($CHECKUSERACCESS == "-1") {
    header("Location: https://$domainw/auth/banned");
} else if ($CHECKUSERACCESS == "-2") {
    $USERACCESS = "Deneme Üye";
} else {
    $USERACCESS = "Kullanıcı";
}

?>
<script type="module">
    import devtools from '../js/node_modules/devtools-detect/index.js';

    console.clear();

    //if (devtools.isOpen == true) {
    //    window.location = '404.html';
    //}
</script>
<script src="https://use.fontawesome.com/452826394c.js"></script>
<noscript>
    <meta http-equiv="refresh" content="0; url=404.html" />
</noscript>
<script id="Protection">
    // Sağ tıklama engelle
    //document.addEventListener('contextmenu', event => event.preventDefault());

    document.onkeydown = function(e) {

        // F12 Engelle
        if (e.keyCode == 123) {
            return false;
        }

        // CTRL+I Engelle
        if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
            return false;
        }

        // CTRL+J Engelle
        if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
            return false;
        }

        // CTRL+S Engelle
        if (e.ctrlKey && e.keyCode == 83) {
            return false;
        }

        // CTRL+U Engelle
        if (e.ctrlKey && e.keyCode == 85) {
            return false;
        }
    }
</script>

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="">
    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-dark navbar-shadow container-xxl">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon" data-feather="menu"></i></a></li>
                </ul>
                <ul class="nav navbar-nav bookmark-icons">
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="anasayfa" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ana Sayfa"><i class="ficon" data-feather="home"></i></a>
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="cikis" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Çıkış Yap"><i class="ficon" data-feather="log-out"></i></a>
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="https://discord.gg/newgate" target="_blank" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Discord"><i class="ficon" data-feather="chrome"></i></a>
                    </li>
                </ul>
            </div>
            <ul class="nav navbar-nav align-items-center ms-auto">
                <li class="nav-item dropdown dropdown-language">
                    <a class="nav-link dropdown-toggle" id="dropdown-flag" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="flag-icon flag-icon-tr"></i><span class="selected-language">Türkçe</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-flag">
                        <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-tr"></i> Türkçe</a>
                    </div>
                </li>
                <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon" data-feather="sun"></i></a></li>
                <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none">
						                            <?php
                            if ($nickcolor != "") {
                                echo "<span class='user-name' style='color: $nickcolor;font-weight: bold;'>$NICKNAME</span>";
                            } else {
                                echo "<span>$NICKNAME</span>";
                            }
                            ?>
                            <span class="user-status"><?= $USERACCESS; ?></span>
                        </div>
                        <span class="avatar">
                            <?php


                            if ($profileimage != "") {
                                echo "<img class='round' src='$profileimage' height='40' width='40'>";
                            } else {
                                echo "<img class='round' src='salam/kullanici.jpg' height='40' width='40'>";
                            }

                            ?>
						<span class="avatar-status-online"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
					    <a class="dropdown-item" href="myaccount"><i class="me-50" data-feather="edit"></i> Hesabım</a>
                        <a class="dropdown-item" href="cikis"><i class="me-50" data-feather="power"></i> Çıkış Yap</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>