<?php

include_once '../includes/baglan.php';


session_start();

$Token = htmlspecialchars(strip_tags($_POST['token']));

$Remember = htmlspecialchars(strip_tags($_POST['remembersvc']));

$TokenCheck = $db->query("SELECT * FROM users WHERE token = '$Token'");
$TokenCount = $TokenCheck->rowCount();

while ($TokenData = $TokenCheck->fetch()) {
	$Expire_Date = $TokenData['expire_date'];
}



date_default_timezone_set('Europe/Istanbul');

$DateTimeNow = date('d.m.y H:i:s');



$user = gethostbyaddr($IPAddr);
$one_time_login = $user;

if ($Token == "" || $Token == '' || $Token == null || empty($Token)) {
	exit('nullToken');
} else if ($TokenCount != "1") {
	exit('failedToken');
} else if ($Expire_Date != "") {
	function kontrol($kayit, $bitis)
	{
		$ilk = strtotime($kayit);
		$son = strtotime($bitis);
		if ($ilk - $son > 0) {
			return 1;
		} else {
			return 0;
		}
	}

                                         

	$bugun_tarih = date('Y-m-d'); // Bugünün Tarihini Çekiyoruz
	$bitis_tarihi = $Expire_Date; // Üyeligin Bitiş Süresi 

	if (kontrol($bugun_tarih, $bitis_tarihi)) {
		exit('expireToken');
	} else {
		if ($TokenCount == "1") {
			$_SESSION['GET_USER_SSID'] = $Token;
			session_write_close();
			if ($Remember == "on") {
				setcookie("USER_SSO_SERVICE", base64_encode($Token), time() + (2629743  * 30), "/");
			}
			exit('success');
			
		} else {
			exit('failedToken');
		}
	}
	
}
